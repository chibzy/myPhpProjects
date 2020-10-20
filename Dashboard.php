<?php
if(!isset($_SESSION)){
	session_start();
}
require("class/clsadmin.php");
$admin= new admin;
$admin->checkstatus();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Order :: CRUNCHES ONLINE</title>
<link rel="stylesheet" href="style/style.css"/>
<script src="style/prototype.js"></script>
<script type="application/javascript">

function removeItem(){
	var no_of_item=document.getElementById('itemno').value;
	var i;
	var cdate=document.getElementById('months').value;
	var item_id="";
	for(i=0;i<no_of_item;i++){
		
		if(document.getElementById('box'+i).checked==true){
			item_id=item_id+document.getElementById('id'+i).value+'|';
		}
	}
	
	var val=confirm("Do you really want to remove selected items?");
	
	if(val==true){
		var bals=new Ajax.Updater('items','style/file.php?id='+item_id+'&mnth='+cdate+'&fxn=deleteOrder', {method:'',parameters:''});
	}
}
function updateItem(){
	var no_of_item=document.getElementById('itemno').value;
	var i;
	var cdate=document.getElementById('months').value;
	var item_id="";
	for(i=0;i<no_of_item;i++){
		
		if(document.getElementById('box'+i).checked==true){
			item_id=item_id+document.getElementById('id'+i).value+'|';
		}
	}
	
	var val=confirm("Do you really want to update the selected items?");
	
	if(val==true){
		var bals=new Ajax.Updater('items','style/file.php?id='+item_id+'&mnth='+cdate+'&fxn=updateStatus', {method:'',parameters:''});
	}
}

</script>
</head>

<body>
<div class="bodycontent">
<div class="topbar"><div class="logo">CRUNCHES Fast food</div><a href="dashboard.php" class="navbtn">Dashboard</a><a href="dishes.php" class="navbtn">Dishes</a><a href="signout.php" class="navbtn">signout</a>
</div>
<div>
<div class="content">
<div class="bodyleft">
<?php 
if(isset($_POST['btnDisplay'])){
	$cmnth=$_POST['months'];
}else{
	$cmnth=date('m');
}
$admin->displayOrder($cmnth);
?>
</div>
<div class="bodyright">
<a href="admission.html"><div class="imgnav"><img src="Image/Admission.png" /><b>Admission</b><br />
 send copies of the data page of your Nigerian passport and your West African Senior Secondary Certificate Examination result to our contact addresses below.
</div></a>
<a href="course.html"><img src="Image/course.png" class="cls" width="90%" style="margin:10px;" /></a>
<a href="contact.html"><img src="Image/contactus.png" class="cls" width="90%" style="margin:10px;" /></a>
<a href="about.html"><div class="imgnav"><img src="Image/about.png" /><b>About SWSU</b><br />
Southwest State University (SWSU) is one of the best 50 universities in Russia and CIS.
</div></a>
</div>
</div>
<div class="clear"></div>
<div class="base"><a href="dashboard.php">Home</a>|<a href="dishes.php">dishes</a>|<a href="#">Policy</a>|<a href="signout.php">Signout</a>

<p>Copyright &copy; 2015 at Crunches Fast Food. All rights reserved.</p>
</div>
</div>
</div>
</body>
</html>
