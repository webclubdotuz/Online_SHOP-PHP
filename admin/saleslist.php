<?php
include("config.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Online Shopping | Admin Panel</title>
<meta name="keywords" content="Book Store Template, Free CSS Template, CSS Website Layout, CSS, HTML" />
<meta name="description" content="Book Store Template, Free CSS Template, Download CSS Website" />
<link href="../style/templatemo_style.css" rel="stylesheet" type="text/css" />
<link href="../style/style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="../tiny_box/tinty_style.css" /
<script type="text/javascript" src="../jquery-1.7.2.min.js"></script>
</head>
<body>
<!--  Free CSS Templates from www.templatemo.com -->
<div id="templatemo_container">
	<div id="templatemo_menu">
    	<ul>
            <li><a id="sale" href="saleslist.php" class="current">Sawda satiq</a></li>
            <li><a id="product" href="products.php" class="">Onimler</a></li> 
        	<li><a id="client" href="clientslist.php" class="">Xariydarlar</a></li>
            <li><a id="home" href="../index.php" class="">Sayt qa otiw</a></li>
    	</ul>
    </div> <!-- end of menu -->
    
<div id="products-wrapper" style="margin: 20px">
<h2>Zakazlar</h2>
<hr/>
<?php
$total_price = 0;
$sql = $mysqli->query("SELECT * FROM sales INNER JOIN users ON sales.order_by = users.user_id ORDER BY sales.id");
if($sql->num_rows > 0){
while($rows = $sql->fetch_object()) {
echo "<div style='color: #fff'><span><strong>Order ID</strong>:&nbsp;".$rows->id.'</span>&nbsp;|&nbsp;&nbsp;';
echo "<span><strong>Waqti</strong>:&nbsp;".$rows->order_date.'</span>&nbsp;|&nbsp;&nbsp;';
echo "<span><strong>Kim tarinen</strong>:&nbsp;".$rows->username.'</span>&nbsp;|&nbsp;&nbsp;';
echo "<span><strong>Summa</strong>:&nbsp;".$rows->total_price.'</span>&nbsp;</div>';
$total_price = $total_price + $rows->total_price;

$query = "SELECT * FROM orders LEFT JOIN products ON orders.product_code = products.product_code WHERE orders.sale_id = ". (int)$rows->id;
$result = $mysqli->query($query); //print_r($result); exit();
$num = 1;

if($result->num_rows > 0){
	echo "<table style='border:1px solid #fff; padding:6px;margin-bottom:12px; width:100%; text-align:center'>";
	echo "<tr><th><u>#Item No.</u></th>";
	echo "<th><u>Onim kodi</u></th>";
	echo "<th><u>Onim ati</u></th>";
	echo "<th><u>Onim bahasi</u></th>";
	echo "<th><u>Sani</u></th>";
	echo "<th><u>Barshesi</u></th>";
	echo "</tr>";
	while($row = $result->fetch_object()) {
		echo "<tr>";
  		echo "<td>". $num . "</td>";
  		echo "<td>". $row->product_code . "</td>";
  		echo "<td>". $row->product_name . "</td>";
  		echo "<td>". $row->price . "</td>";
  		echo "<td>". $row->quantity  . "</td>";
  		echo "<td>". $row->price * $row->quantity . "</td>";
		echo "</tr>";	
	$num++;
	}
	echo "</table>";
}
echo "<hr/>"; 
}
	echo "<h3 style='text-align:right'>Barshe summa - ". $total_price ."</h3>";	
} else {
	echo "Horray! No Sales Yet"; 
	}

?>

<div class="cleaner_with_height">&nbsp;</div>
</div>

<?php include_once("../footer.php"); ?>