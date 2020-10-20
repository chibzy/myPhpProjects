<?php
require("clsdb.php");
class dishes extends db{
	
	function searchListView($item,$page){
		#extract files
		if (!isset($page)) $page=1;
		if (!isset($item)) $item='a';
#		$sql="select * from dishes where name like '$item**'";
		$sql="select * from dishes";
		$same_leta=array();
		
		$all=$this->retrieve($sql);
		$k=0;
		for($i=0;$i<count($all);$i++){
			$leta=substr($all[$i]['name'],0,1);
			 
			if(strtolower($leta)==strtolower($item)){
				 $same_leta[$k]=$all[$i];
				 $k++;
			}
			#echo "<br>The first letter is $leta";
		}		#$all=array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21);# used for test purpose
		if(!empty($same_leta)){
			if($page<=1){
				$startpoint=0;
				if(count($same_leta)>10){
					$stoppoint=9;
				}else{
					$stoppoint=count($same_leta)-1;
				}
			}elseif($page>1){
				$startpoint=($page-1)."0";
				$lastNum=$page."0";
				if(count($same_leta)>$lastNum){
					$stoppoint=$startpoint+9;
				}else{
					$stoppoint=count($same_leta)-1;
				}
			}
			
			
			include("views/ordersearch.php");
				
		}
	}
	function addToCart($item){
		#should transfer item id to cart session variable .
		
		$isPresent=false;
		
		$lastCount=count($_SESSION['cart']);
		
		for($j=0;$j<$lastCount;$j++){
			if($_SESSION['cart'][$j]==$item){
				$isPresent=true;
				break;
			}
		}
		if($isPresent==false){
			$_SESSION['cart'][$lastCount]=$item;//not tested yet.
		}
		if(count($_SESSION['cart'])<=1){
			echo "You have ".count($_SESSION['cart'])." dish in cart";
		}else{
			echo "You have ".count($_SESSION['cart'])." seperate dishes in cart";
		}
		
	}
	function searchDish($type){
		
	}
	function listPages($leta,$total){
		$total=count($total);
		$page=$total/10;
		#$page=39/10; test sample
		if($page<=1){
			?>
            <div class="pageNav"><a href="?item=<?php echo $leta;?>&pg=1">1</a></div>
            <?php
		}elseif($page>1){
			echo "<div class=\"pageNav\">";
			$pages="";
			for($i=1;$i<$page+1;$i++){
				$pages=$pages."<a href=\"?item=$leta&pg=$i\">$i</a>";
			}
			echo $pages;
			echo "</div>";
		}
		
	}
	function alphbetSort(){
	?>
    <div><a href="?item=a">[A]</a> <a href="?item=b">[B]</a> <a href="?item=c">[C]</a> <a href="?item=d">[D]</a> <a href="?item=e">[E]</a> <a href="?item=f">[F]</a> <a href="?item=g">[G]</a> <a href="?item=h">[H]</a> <a href="?item=i">[I]</a> <a href="?item=j">[J]</a> <a href="?item=k">[K]</a> <a href="?item=l">[L]</a> <a href="?item=m">[M]</a> <a href="?item=n">[N]</a> <a href="?item=o">[O]</a> <a href="?item=p">[P]</a> <a href="?item=q">[Q]</a> <a href="?item=r">[R]</a> <a href="?item=s">[S]</a> <a href="?item=u">[U]</a> <a href="?item=v">[V]</a> <a href="?item=w">[W]</a> <a href="?item=x">[X]</a> <a href="?item=y">[Y]</a> <a href="?item=z">[Z]</a></div>
    <br />
	<?php
    }
	function showDishDetails(){
		
	}
	function dishDetails($item_ID){
		$dish=array();
		if(isset($item_ID)) {#exit();
		
		$sql="select * from  dishes where dish_id='$item_ID'";
		$dish=$this->retrieve($sql);
		}
		return $dish;
	}	


}
?>