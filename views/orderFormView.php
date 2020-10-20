<div>
<form method="post">
<div class="borderall"><div class="title">Items in cart</div>
<div class="clear"></div>
<table width="60">
<?php
$dish=new dishes;
#$itemInCart=count($_SESSION['cart']);
$itemInCart=count($cart);
echo "<p>You have $itemInCart different item(s) in your cart</p>";
for($i=0;$i<$itemInCart;$i++){
	#$selItem=$dish->dishDetails($_SESSION['cart'][$i]);
	$selItem=$dish->dishDetails($cart[$i]);
	
?>
<tr><td><?php echo $selItem[0]['name'];?> </td>
<td>Quantity <input type="hidden" name="itemCost<?php echo $i;?>" id="itemCost<?php echo $i;?>" value="<?php echo "{$selItem[0]['cost_per_plate']}|{$selItem[0]['wieght']}";?>"><select onchange="loadOrder();" name="qty<?php echo $i;?>" id="qty<?php echo $i;?>" class="sel">
	<option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
    </select>
</td>
<td><div id="amt<?php echo $i;?>"></div></td>
</tr>
<input type="hidden" id="totalCount" value="<?php echo count($_SESSION['cart']);?>"?>
<?php
}
?>
<tr><td></td><td>Total Cost : (N)</td><td><div id="totalCost"></div></td></tr>
<tr><td></td><td>Total Wieght : (g)</td><td><div id="totalWieght"></div></td></tr>
</table>
<div class="clear"></div>
<div class="btnArea"><input type="submit" name="btnEmptyCart" value="Empty Cart" class="btn"></div>
</div>
<div class="borderall"><div class="title">Shipping Info.</div>
<div class="clear"></div>
<table>
<tr><td>Client Name :</td><td><input class="sel" type="text" name="client_name"></td></tr>
<tr><td>Address :</td><td><input class="sel" type="text" name="client_address" maxlength="30" size="40"></td></tr>
<tr><td>Location :</td><td>
<select class="sel" name="location_id">
<option value="12">Mbari</option>
<option value="13">Wetheral Rd.</option>
</select>
</td></tr>
</table>
<div class="clear"></div>
</div>
<div class="btnArea"><input class="btn" type="submit" name="btnOrder" value="Order"></div>
</form>
</div>