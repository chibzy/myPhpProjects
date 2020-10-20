<div class="confirm">
<p class="intro">Order Confirmation Slip</p>
<p>Crunches Fast Food
<br><i><b>Order ID :</b> <?php echo $order_id;?></i>
</p>
<p class="clientName"><?php echo $client_details[0]['client_name'];?></p>
<p class="address"><?php echo $client_details[0]['location'];?></p>
<div><span class="tableTitle">Items Ordered</span><br />
<table width="100%" style="border:#CCC solid thin;">
<tr><td>Item</td><td>Quantity</td><td>Cost (N)</td></tr><?php 
$total_wieght=0;
$total_cost=0;

for($i=0;$i<count($purchased_item);$i++){?>
<tr><td><?php echo $this->getFoodName($purchased_item[$i]['dish_id']);?></td><td><?php echo $purchased_item[$i]['qty_ordered'];?></td><td><?php echo $purchased_item[$i]['amt'];?></td></tr>
<?php 
	$total_wieght+=$purchased_item[$i]['qty_wieght'];
	$total_cost+=$purchased_item[$i]['amt'];
}
?>
<tr><td></td><td><b>Total Item cost :</b></td><td>N<?php
echo $total_cost;
?></td>
</table>
<div class="clear"></div>
VAT Inclusive.
<div><b>Shipping Cost : </b>N<?php
$wieght_cost=($total_wieght/300)*100;
echo $wieght_cost;
?></div>
<div>Total amount payable : N<?php echo ($total_cost+$wieght_cost).".00";?></div>
</div>
<div class="clear"></div>
<div><a class="order" href="#">Pay Through Bank</a> <a class="order" href="#">Pay Through PayPal</a></div>
<div class="clear"></div>
<div><a class="btn" href="#" onclick="print();">Print Slip</a></div>
</div>