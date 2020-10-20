<?php
//require("clsdb.php");
require("clsdishes.php");

class order extends db{	
	
	function viewOrderList($cart){
		include("views/orderformview.php");
	}
	function emptyCart(){
		#should empty the content of the cart session variable.
		if(isset($_POST['btnEmptyCart'])){
			unset($_SESSION['cart']);
			$_SESSION['cart']=array();
			header("location:order.php");
		}
	}
	function orderDisplay($numOfDisplayedDishes){
		$dish=new dishes;
		
			for($i=0;$i<$numOfDisplayedDishes;$i++){
				$j=$i+1;
				
				if(isset($_GET["btnPlaceOrder$j"])){
					$dish->addToCart($_REQUEST["dish$j"]);
					$_SESSION['order_id']=$this->gen_id();
					header("location:placeOrder.php");
				}
				
			}
			
		
	}
	function placeOrder(){
	if(isset($_POST['btnOrder'])){
		$id=$_SESSION['order_id'];
		$clientName=mysql_escape_string($_POST['client_name']);
		$clientAddress=mysql_escape_string($_POST['client_address']);
		$locationID=$_POST['location_id'];
		#echo "hey<br>";
		if($clientName!='' && $clientAddress!=''){
			
		#check if similar orderid is in the database
		$k="select * from resturant.order where order_id='$id'";
		#echo $k."<br>";
		$ok=$this->retrieve($k);
		$cdate=date('d/m/y');
		$ctime=date('h');
		
		if(count($ok)>0){#test for the present of order id inthe table.
		}elseif(count($ok)<=0){
		$sql1="insert into resturant.order(client_name,location,location_id,order_date,order_id,sstatus,time_of_order) values('$clientName','$clientAddress',$locationID,'$cdate','$id','0','$ctime')";
		
		for($i=0;$i<count($_SESSION['cart']);$i++){
			$dish_id=$_SESSION['cart'][$i];
			$dish_qty=$_POST["qty$i"];
			#echo $_POST["itemCost$i"]."<br>";
			$all=explode("|",$_POST["itemCost$i"]);
			
			$cost=$all[0];
			$wieght=$all[1];
			#echo $cost." and ".$wieght."<br>";
			
			$ordered_dish_wieght=$dish_qty*$wieght;
			$ordered_dish_cost=$dish_qty*$cost;
			
			$sql="insert into order_list(order_id,dish_id,qty_ordered,qty_wieght,amt) values('$id','$dish_id','$dish_qty','$ordered_dish_wieght','$ordered_dish_cost')";
			$this->save($sql);
		}
		
		$this->save($sql1);
		?>
		<script language="javascript">
            
		newWindow=window.open("orderconfirmation.php?order_id=<?php echo $id;?>","subWind","status,nomenubar,height=450,width=350");
		newWindow.focus();
         </script>
        <?php
       }
	}else{
			echo "<div>Enter a valid name and address</div>";
	}
	}//end of btn isset
	}
	function calculateCost($Qty){
		
	}	
	function orderCornfirmationDisplay($order_id){
		$purchased_item=$this->retrieve("select * from order_list where order_id='$order_id'");
		$client_details=$this->retrieve("select * from resturant.order where order_id='$order_id'");
		include("views/orderconfirmview.php");
	}
	private function getFoodName($id){
		$item=$this->retrieve("select * from dishes where dish_id='$id'");
		return $item[0]['name'];
	}


}
?>