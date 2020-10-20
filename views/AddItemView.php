<div class="addItem">
<?php

$name='';
$cost='';
$wieght='';
$desc='';

if(isset($_REQUEST['update']) && $_REQUEST['update']==1){
	$dish_id=mysql_escape_string($_REQUEST['id']);
	
	$details=$this->retrieve("select * from dishes where dish_ID='$dish_id'");

	if(!empty($details)){
		$name= $details[0]['name'];
		$cost= $details[0]['cost_per_plate'];
		$wieght= $details[0]['wieght'];
		$desc= $details[0]['description'];
	}
}else{
	
}
?>
<form method="post" enctype="multipart/form-data">
<table align="left">
<tr><td>Name :</td><td><input class="sel" name="foodName" type="text" value="<?php echo $name;?>"></td></tr>
<tr><td>Cost :</td><td><input class="sel" name="foodCost" type="text" value="<?php echo $cost;?>"></td></tr>
<tr><td>Weight per dish :</td><td><select class="sel" name="foodWieght">
<option value="<?php echo $wieght;?>"><?php echo $wieght;?>g</option>
<option value="150">150g</option><option value="120">120g</option><option value="200">200g</option></select></td></tr>
<tr><td valign="top">Description :</td><td><textarea class="sel" cols="20" rows="8" name="foodDescription"><?php echo $desc;?></textarea></td></tr>
</table>
<div class="clear"></div>
<div>Upload Image: <br><input name="image" class="sel" type="file"></div>
<div class="clear"></div>
<div><input type="submit" name="btnAddFood" value="Add Item" class="btn" />
<?php
if(isset($_REQUEST['update']) && $_REQUEST['update']==1){
	?>
    <input type="submit" name="btnUpdateFood" value="Update Item" class="btn" />
    <?php
}
?>
</div>
</form>
</div>