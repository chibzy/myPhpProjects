<?php
require("clsdb.php");
class admin extends db{
	var $cmnth='';
	
	function displayOrder($cmnth){
		$Orders=$this->retrieve("select * from resturant.order");
		#echo count($Orders)." --<br>";
		include("views/dashboardview.php");
	}
	function displayUpdateItemView(){
		include("views/updateitemview.php");
	}
	function listDishItems($dishes){
	?>
    	<table width="100%" align="left">
			<?php
            for($i=0;$i<count($dishes);$i++){
            ?>
            <tr><td width="10%"><input type="checkbox" name="box<?php echo $i;?>" id="box<?php echo $i;?>"><input type="hidden" name="id<?php echo $i;?>" id="id<?php echo $i;?>" value="<?php echo $dishes[$i]['dish_ID'];?>"></td><td width="20%"><a style="text-decoration:none;" href="?update=1&id=<?php echo $dishes[$i]['dish_ID'];?>"><?php echo $dishes[$i]['name'];?></a></td><td width="15%"><?php echo $dishes[$i]['cost_per_plate'];?></td><td width="10%"><?php echo $dishes[$i]['wieght'];?></td><td width="10%"><?php echo $dishes[$i]['preparation'];?></td><td width="50%"><?php echo substr($dishes[$i]['description'],0,20)."...";?></td></tr>
            <?php
            }
            ?>
            </table>
            <input type="hidden" name="itemno" value="<?php echo count($dishes);?>" id="itemno">
    <?php
	}
	function updateOrderStatus($id){
		$sql="update resturant.order set sstatus='1' where order_id='$id'";
		#echo $sql;
		$this->update($sql);
	}
	function cancelOrder(){
		
	}
	function getLocation($id){
		$all=$this->retrieve("select location from location where location_id='$id'");
		return $all[0]['location'];
	}
	function listOrders($Orders,$mnth){
		?>
        <table width="100%" align="left">
        <?php
		if(!empty($Orders)){
			
			$sn=1;
			for($i=count($Orders);$i>0;$i--){
				$j=$i-1;
				$k=$sn-1;
				
				$odate=explode("/",$Orders[$j]['order_date']);
				$cmnth=$odate[1];
				
				if($cmnth==$mnth){
					?>
                    <tr><td width="3%"><input type="checkbox" name="box<?php echo $k?>" id="box<?php echo $k;?>" /><input type="hidden" name="id<?php echo $k;?>" id="id<?php echo $k;?>" value="<?php echo $Orders[$j]['order_id'];?>" /></td><td width="5%"><?php echo $sn;?></td><td width="15%"><?php echo $Orders[$j]['order_id'];?></td><td width="20%"><?php echo $Orders[$j]['location'];?></td><td width="10%"><?php echo $this->getLocation($Orders[$j]['location_id']);?></td><td width="20%"><?php echo $Orders[$j]['order_date'];?></td><td width="10%"><?php echo $Orders[$j]['sstatus'];?></td></tr>
                    <?php
				
				$sn++;
				}
			
			}
		}
		?>
        </table>
        <input type="hidden" name="itemno" value="<?php echo count($sn);?>" id="itemno">
        <?php	
	}
	function updateDishes($dish_id){
		#update dishes
		if(isset($_POST['btnUpdateFood'])){
			$name=mysql_escape_string($_POST['foodName']);
			$cost=mysql_escape_string($_POST['foodCost']);
			$wieght=mysql_escape_string($_POST['foodWieght']);
			$desc=mysql_escape_string($_POST['foodDescription']);
			$img=$_FILES['image'];
			if($name!="" && $cost!=""&& $wieght!="" && $desc!=""){
			if($img['name']!=''){
				
				
					$imageName=$img['name'];
					$imageSize=$img['size'];
					$imageType=$img['type'];
					
					if($imageType!='image/jpeg' || $imageType!='image/png' && $imageSize>200000){
						echo "Invalid file format or large image size<br>";
						
					}else{
						
						$dest="uploads/".$dish_id.".jpg";
						
					$sql="update dishes set name='$name',cost_per_plate='$cost',description='$desc',img='$dest',wieght='$wieght' where dish_ID='$dish_id'";
					
					$this->update($sql);
					
					move_uploaded_file($img['tmp_name'],$dest);
					echo "updated";
					}
				
			}else{
			
				$sql="update dishes set name='$name',cost_per_plate='$cost',description='$desc',wieght='$wieght' where dish_ID='$dish_id'";
				$this->update($sql);
				echo "updated";
			}
		}#end of empty control check.
		}
	}	
	function removeItems($name,$criteria){
		#remove dishes
		$sql="delete from $name where $criteria";
		#echo $sql."<br>";
		$this->delete($sql);
	}
	function displayAddItemView(){
		include("views/addItemview.php");
	}
	function addItem(){
		#add new item dis
		if(isset($_POST['btnAddFood'])){
			$name=mysql_escape_string($_POST['foodName']);
			$cost=mysql_escape_string($_POST['foodCost']);
			$wieght=mysql_escape_string($_POST['foodWieght']);
			$desc=mysql_escape_string($_POST['foodDescription']);
			$img=$_FILES['image'];
			
			$check=$this->retrieve("select * from dishes where name='$name'");
			#echo "select * from dishes where name='$name'";
			if(empty($check)){
			#Enter the items
			#echo "am in check.";
			if($name!='' && $cost!=''){
				
				if(isset($img) && isset($desc)){
					$imageName=$img['name'];
					$imageSize=$img['size'];
					$imageType=$img['type'];
					
					if($imageType!='image/jpeg' || $imageType!='image/png' && $imageSize>200000){
						echo "Invalid file format or large image size<br>";
						#echo "$imageType | <br>";
					}else{
						$fileName=$this->genDishId();
						
						$adate=date('d/m/y');
						
						$dest="uploads/".$fileName.".jpg";
						$sql="insert into dishes(name,cost_per_plate,description,img,wieght,dish_ID,adate) values('$name','$cost','$desc','$dest','$wieght','$fileName','$adate')";
						$this->save($sql);
						
						
					move_uploaded_file($img['tmp_name'],$dest);
					echo "Item Added.";
					}
				}else{
					echo "Food description or image can't be empty.";
				}
				
			}else{
				echo "Food Name or cost can't be empty.";
			}
		}#end of check.
		}
	}
	function displayLoginform(){
		include("views/usreauth.php");
	}
	function adminLogin(){
		
		if(isset($_POST['login'])){
		
		$username=mysql_escape_string($_POST['username']);
		$phone=mysql_escape_string($_POST['phone']);
		$psw=mysql_escape_string($_POST['psw']);
		
		if(isset($username) && isset($phone) && isset($psw)){
			$details=$this->retrieve("select * from admin where username='$username' and phone='$phone' and psw='$psw'");
			if(isset($details)){
				$_SESSION['login']=1;
				header("location:dashboard.php");
			}else{
				echo "Invalid username, phone number or password.";
			}
		}else{
			echo "Username, phone number, or password can't be empty.";
			
		}
		}
	}


}
?>