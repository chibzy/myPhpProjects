<div class="updateItem">
<h3>List of foods in menu</h3>
<hr>
<form>
<?php
$dishes=$this->retrieve("select * from dishes");

if(empty($dishes)){
	echo "No Dish in menu.";
}else{
?>
<table width="100%" align="left">
<tr><td width="10%"></td><td width="20%">Name</td><td width="15%">Cost per Plate</td><td width="10%">Weight (g)</td><td width="10%">Preparation time</td><td width="50%">Description</td></tr>

</table>
<div class="clear"></div>
<div id="items" style="width:100%; height:350px; overflow:scroll;">
<?php
	$this->listDishItems($dishes);
?>
</div>
<div class="clear"></div>
<div><a href="dishes.php" class="btn"> Add new item </a> &nbsp; &nbsp; <input type="button" onclick="removeItem()" class="btn" value="Remove"></div>
<?php
}
?>
</form>
</div>