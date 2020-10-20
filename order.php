<?php
if(!isset($_SESSION)){
	session_start();
}


#require("class/clsdishes.php");
require("class/clsOrder.php");

$order=new order;
$dishes= new dishes;

if(isset($_REQUEST['item'])){
	$e=$_REQUEST['item'];
}else{
	$e="a";
}
if(isset($_REQUEST['pg'])){
	$pg=$_REQUEST['pg'];
}else{
	$pg=1;
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Order :: CRUNCHES ONLINE</title>
<link rel="stylesheet" href="style/style.css"/>
<script src="style/prototype.js" language="javascript"></script>
<script>
function addToCart(item,id){
	
	var table='hey';//'btnCart'+id;
	
	if(item!=''){
		//alert('btnCart'+id+' suppose to change.');
		var bals=new Ajax.Updater(table,'class/file.php?id='+id+'&action=addToCart&item='+item, {method:'get',parameters:''});
	}
	document.getElementById('btnCart'+id).value='Added to Cart';
}
</script>
</head>

<body>
<div class="bodycontent">
<div class="topbar"><div class="logo">CRUNCHES Fast food</div><a href="index.php" class="navbtn">Home</a><a href="order.php" class="navbtn">Order</a>
<a href="contact.html" class="navbtn">Contact</a><a href="about.html" class="navbtn">About us</a>
</div>
<div>
<div class="content">
<div class="bodyleft">
<?php 
$order->orderDisplay('10');
$dishes->alphbetSort();
$dishes->searchListView($e,$pg);
?>
</div>
<div class="bodyright">
<a href="admission.html"><div class="imgnav"><img src="Image/img1.jpg" /><b>Admission</b><br />
 send copies of the data page of your Nigerian passport and your West African Senior Secondary Certificate Examination result to our contact addresses below.
</div></a>
<!--a href="course.html"><img src="" class="cls" width="90%" style="margin:10px;" /></a-->
<a href="contact.html"><img src="Image/img2.jpg" class="cls" width="90%" style="margin:10px;" /></a>
<a href="about.html"><div class="imgnav"><img src="Image/img3.jpg" /><b>About SWSU</b><br />
Southwest State University (SWSU) is one of the best 50 universities in Russia and CIS.
</div></a>
</div>
</div>
<div class="clear"></div>
<div class="base"><a href="index.php">Home</a>|<a href="order.php">Order</a>|<a href="Contact.html">Contact us</a>|<a href="about.html">About us</a>|<a href="Login.php">Login</a>

<p>Copyright &copy; 2015 at Crunches Fast Food. All rights reserved.</p>
</div>
</div>
</div>
</body>
</html>
