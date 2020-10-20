<?php
if(!isset($_SESSION)){
	session_start();
}

require_once('clsDishes.php');

$action=$_REQUEST['action'];
$id=$_REQUEST['id'];
$item=$_REQUEST['item'];

$cart=new dishes;

if ($action=='addToCart'){
	$cart->addToCart($item);
}
?>