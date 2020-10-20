<?php
if(!isset($_SESSION)){
	session_start();
}
$_SESSION['cart']=array();
$_SESSION['login']=0;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome :: CRUNCHES ONLINE</title>
<link rel="stylesheet" href="style/style.css"/>
</head>

<body>
<div class="bodycontent">
<div class="topbar">
  <div class="logo">CRUNCHES Fast food</div>
  <a href="index.php" class="navbtn">Home</a><a href="order.php" class="navbtn">Order</a>
<a href="contact.html" class="navbtn">Contact</a><a href="about.html" class="navbtn">About us</a>
</div>
<div class="introImg">
<img src="Image/foodbanner..jpg" alt="graduants"/>
</div>
<div>
<div class="content">
<div class="bodyleft">
<h1>Welcome to <span class="studyabroadnet">Crunches online </span></h1>
<P>
Study Abroad Net is a non-commercial oriented agency whose aim is to alleviate the frustrations which students who travel abroad to study suffer at the hands of certain greedy agents.</P>
<p>
The agency works with volunteers, mainly students studying in Kursk, Russia, who take their pains to travel to Moscow airports to meet new students on arrival and accompany them to South-West State University, which is currently admitting English speaking student into Economic Sociology department.</p>

<p><b>SOUTHWEST STATE UNIVERSITY (SWSU)</b> is one of the best 50 universities in Russia and CIS.</p>

<p></p><b>The FACULTY OF ECONOMICS AND MANAGEMENT</b> is the most in demand among all the faculties of the university.</p>
<p><b>The DEPARTMENT OF PHILOSOPHY AND SOCIOLOGY</b> is one of the oldest departments in SWSU.

<p>It offers the following degrees:
<p>BACHELOR DEGREE IN SOCIOLOGY: ECONOMIC SOCIOLOGY AS MAJOR</p>

<p>MASTER DEGREE IN SOCIOLOGY OF CULTURE</p>

POSTGRADUATE PROGRAM:<br />
SOCIOLOGY OF CULTURE <br />
ECONOMIC SOCIOLOGY, DEMOGRAPHY<br />
PHILOSOPHY OF SCIENCE AND TECHNOLOGY<br />

Scope of professional activities of a sociologist<br />

Market and Advertizing Research :<br />
Public Relations <br />
Mass Media       <br />
Publishing Business  <br />
</p>
</div>
<div class="bodyright">
<a href="admission.html"><div class="imgnav"><img src="Image/img1.jpg" /><b>Admission</b><br />
 send copies of the data page of your Nigerian passport and your West African Senior Secondary Certificate Examination result to our contact addresses below.
</div></a>
<a href="order.php"><img src="Image/img3.jpg" class="cls" width="90%" style="margin:10px;" /></a>
<a href="contact.html"><img src="Image/contactus.png" class="cls" width="90%" style="margin:10px;" /></a>
<a href="about.html"><div class="imgnav"><img src="Image/img2.jpg" /><b>About SWSU</b><br />
Southwest State University (SWSU) is one of the best 50 universities in Russia and CIS.
</div></a>
</div>
</div>
<div class="clear"></div>
<div class="base"><a href="index.php">Home</a>|<a href="order.php">Order</a>|<a href="Contact.html">Contact us</a>|<a href="about.html">About us</a>|<a href="login.php">Login</a>

<p>Copyright &copy; 2015 at Crunches Fast Food. All rights reserved.</p>
</div>
</div>
</div>
</body>
</html>
