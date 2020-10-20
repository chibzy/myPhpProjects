<div>
<div class="titleTop"><span class="dishType">Dish type :</span> African Dishes</div>
<form method="get">
<div id="hey"></div>
<?php
for($i=$startpoint;$i<=$stoppoint;$i++){
	$j=$i+1;
	echo "<h1>$j</h1>";
	?>
    <div class="itemRow">
    <img src="<?php echo "{$same_leta[$i]['img']}";?>" width="100" height="100" alt="<?php echo "{$same_leta[$i]['name']}";?>" align="left" />
    <p class="foodName"><?php echo "{$same_leta[$i]['name']}";?></p>
    <p><span class="costTitle">Cost per plate:</span> <?php echo "{$same_leta[$i]['cost_per_plate']}";?></p>
    <p class="desc"><?php echo "{$same_leta[$i]['description']}";?></p>
    
    <div><input type="button" id="btnCart<?php echo $j;?>" class="btn" value="Add to cart" name="btnCart<?php echo $j;?>" onclick="addToCart(<?php echo "{$same_leta[$i]['dish_ID']}";?>,<?php echo $j;?>)"><input type="hidden" name="dish<?php echo $j;?>" value="<?php echo "{$same_leta[$i]['dish_ID']}";?>"> <input type="submit" name="btnPlaceOrder<?php echo $j;?>" value="Place Order" class="order"></div>
    </div>
    
    <?php			
}
?>
<?php
	$this->listPages($item,$same_leta);
?>
</form>
</div>