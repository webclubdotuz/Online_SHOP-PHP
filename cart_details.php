<?php
include_once("config.php");
include_once("header.php");

	if(isset($_POST['item_code']) && isset($_POST['item_qty']) && isset($_SESSION['user'])){ 
 		$query1 = "INSERT INTO sales SET total_price=".$_POST['total'].", order_date=NOW(), order_by=".(int)$_SESSION['user'];
		$mysqli->query($query1);
		$last_id = $mysqli->insert_id;
		
		$pro_num = sizeof($_POST['item_code']); 
		for($temp=0; $temp < $pro_num;  $temp++){
			$query2 = "INSERT INTO orders SET product_code='".$_POST['item_code'][$temp]."', quantity=".$_POST['item_qty'][$temp].", sale_id=".(int)$last_id;
			$mysqli->query($query2);
		}
		unset($_SESSION['products']);
		$_SESSION['msg'] = "Sizdin murajat tasdiqlandi, tez arada biz xabarlasamiz!!!!";
		header("Location: index.php");
	}
?>

 <div id="products-wrapper" style="margin-top: 30px">
 <h1>Tanlangan onimler</h1>
 <div class="view-cart">
 	<?php
    $current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
	if(isset($_SESSION["products"]))
    {
	    $total = 0;
		echo '<form method="post" action="view_cart.php" id="payform" name="payform">';
		echo '<ul>';
		$cart_items = 0;
		foreach ($_SESSION["products"] as $cart_itm)
        {
           $product_code = $cart_itm["code"];
		   $results = $mysqli->query("SELECT product_name,product_desc, price FROM products WHERE product_code='$product_code' LIMIT 1");
		   $obj = $results->fetch_object();
		   
		    echo '<li class="cart-itm">';
			echo '<span class="remove-itm"><a href="cart_update.php?removep='.$cart_itm["code"].'&return_url='.$current_url.'">&times;</a></span>';
			echo '<div class="p-price">'.$obj->price.$currency.'</div>';
            echo '<div class="product-info">';
			echo '<h3>'.$obj->product_name.' (Kodi :'.$product_code.')</h3> ';
            echo '<div class="p-qty">Sani : '.$cart_itm["qty"].'</div>';
            echo '<div>'.$obj->product_desc.'</div>';
			echo '</div>';
            echo '</li>';
			$subtotal = ($cart_itm["price"]*$cart_itm["qty"]);
			$total = ($total + $subtotal);

			echo '<input type="hidden" name="item_name['.$cart_items.']" value="'.$obj->product_name.'" />';
			echo '<input type="hidden" name="item_code['.$cart_items.']" value="'.$product_code.'" />';
			echo '<input type="hidden" name="item_desc['.$cart_items.']" value="'.$obj->product_desc.'" />';
			echo '<input type="hidden" name="item_qty['.$cart_items.']" value="'.$cart_itm["qty"].'" />';
			$cart_items ++;
			
        }
    	echo '</ul>';
		echo '<span class="check-out-txt">';
		echo '<strong>Summa : '.$total.$currency.'</strong>  ';
		echo '<input type="hidden" name="total" value="'.$total.'" />';
		echo '</span>';
		echo '<img src="uzcard.png" alt="tolew" align="left" style="margin-right:7px;cursor:pointer" onClick="paypalsubmit()">';
		echo '</form>';
		
    }else{
		echo 'Your Cart is empty';
	}
	
    ?>
    
	<script>
        function paypalsubmit(){
            document.getElementById('payform').submit();
        }
    </script>

	<div class="cleaner_with_height">&nbsp;</div>
    </div> <!-- end of content -->
    
<?php include_once("footer.php"); ?>
