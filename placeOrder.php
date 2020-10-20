<?php
if(!isset($_SESSION)){
	session_start();
}
require("class/clsorder.php");
$order= new order;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Order :: CRUNCHES ONLINE</title>
<link rel="stylesheet" href="style/style.css"/>
<script>
function calcCost(id){
	var allCost=document.getElementById('itemCost'+id).value;
	var val=allCost.split('|');
	var cost=val[0];
	var wieght=val[1];
	var qty=document.getElementById('qty'+id).value;
	var sum=cost*qty;
	document.getElementById('amt'+id).innerHTML='N'+sum;
	//
	var netWieght=wieght*qty;
	return sum+'|'+netWieght;
}
function loadOrder(){
	var totalCount=document.getElementById('totalCount').value;
	var next=0;
	var totalWieght=0;
	
	for(i=0;i<totalCount;i++){
		
		var allRtn=calcCost(i).split('|');
		var rtnCalc=parseInt(allRtn[0]);
		var rtnWieght=parseInt(allRtn[1]);
		
		next=next+rtnCalc;
		totalWieght=totalWieght+rtnWieght;
		
	}
	
	document.getElementById('totalWieght').innerHTML=totalWieght;
	document.getElementById('totalCost').innerHTML=next;
}
function calWieght(){
	var totalCount=document.getElementById('totalCount').value;
	
	for(i=0;i<totalCount;i++){
			var allCost=document.getElementById('itemCost'+i).value;
			var val=allCost.split('|');
			var cost=val[0];
			var wieght=val[1];
			var netWieght=wieght*document.getElementById('qty'+i).value;
			
			var totalWieght=totalWieght+netWieght;
	}
	return totalWieght;
}
</script>
</head>

<body onload="loadOrder();">
<div class="bodycontent">
<div class="topbar"><div class="logo">CRUNCHES Fast food</div><a href="index.php" class="navbtn">Home</a><a href="order.php" class="navbtn">Order</a>
<a href="contact.html" class="navbtn">Contact</a><a href="about.html" class="navbtn">About us</a>
</div>
<div>
<div class="content">
<div class="bodyleft">
<?php 
$order->emptyCart();
$order->placeOrder();
$order->viewOrderList($_SESSION["cart"]);
?>
</div>
<div class="bodyright">
<a href="admission.html"><div class="imgnav"><img src="Image/img2.jpg" /><b>Admission</b><br />
 send copies of the data page of your Nigerian passport and your West African Senior Secondary Certificate Examination result to our contact addresses below.
</div></a>
<a href="course.html"><img src="Image/img1.jpg" class="cls" width="90%" style="margin:10px;" /></a>
<a href="contact.html"><img src="Image/contactus.png" class="cls" width="90%" style="margin:10px;" /></a>
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
