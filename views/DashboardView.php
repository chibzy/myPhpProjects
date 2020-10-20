<div class="dash">
<form method="post">
List of Order made on 
<select class="sel" name="months" id="months">
	<?php
    $months=array(1=>'January','Febuary','March','April','May','June','July','August','September','October','November','December');
	for($i=1;$i<count($months);$i++){
		if($i==$cmnth){
			echo "<option value=\"$i\" selected=\"selected\">$months[$i]</option>";
		}else{
			{
			echo "<option value=\"$i\">$months[$i]</option>";
		}
		}
	}
	?>
</select> <input class="btn" type="submit" name="btnDisplay" value="Display">
<hr>
<table width="100%" align="left">
<tr><td width="3%"></td><td width="5%">SN</td><td width="15%">ORDER ID</td><td width="20%">ADDRESS</td><td width="10%">LOCATION</td><td width="20%">ENTRY DATE</td><td width="10%">STATUS</td></tr>

</table>
<div id="items" style="width:100%; height:350px; overflow:scroll;">
<?php
$this->listOrders($Orders,$cmnth);
?>
</div>
<div class="clear"></div>
<hr>
<div><input class="btn" type="button" value="Cancel Order" onclick="removeItem();"> <input class="btn" type="button" value="Update Order Status" onclick="updateItem();"></div>
</form>
</div>