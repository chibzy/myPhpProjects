<?php
require("class/clsorder.php");
$order=new order;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" href="style/style.css"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo "Order {$_REQUEST['order_id']}";?> Cornfirmation slip</title>
</head>

<body>
<?php
$order->orderCornfirmationDisplay($_REQUEST['order_id']);
?>
</body>
</html>