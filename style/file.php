<?php
require("../class/clsAdmin.php");
$admin=new admin;

if($_REQUEST['fxn']=='deleteItem'){

	$id=explode("|",$_REQUEST['id']);
	
	for($i=0;$i<count($id);$i++){
		$criteria="dish_ID=$id[$i]";
		$admin->removeItems('dishes',$criteria);
	}	
	$dishes=$admin->retrieve("select * from dishes");
	$admin->listDishItems($dishes);
	
	
}elseif($_REQUEST['fxn']=='deleteOrder'){
	$id=explode("|",$_REQUEST['id']);
	$mnth=$_REQUEST['mnth'];
	
	for($i=0;$i<count($id);$i++){
		$criteria="order_id=$id[$i]";
		$admin->removeItems('resturant.order',$criteria);
		#echo "deleted ";
	}	
	
	$Orders=$admin->retrieve("select * from order");
	$admin->listOrders($Orders,$mnth);
}elseif($_REQUEST['fxn']=='updateStatus'){
	$id=explode("|",$_REQUEST['id']);
	$mnth=$_REQUEST['mnth'];
	
	for($i=0;$i<count($id);$i++){
		$criteria="order_id=$id[$i]";
		$admin->updateOrderStatus($id[$i]);
		#echo "updated";
	}	
	
	$Orders=$admin->retrieve("select * from order");
	$admin->listOrders($Orders,$mnth);
}
?>