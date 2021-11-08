<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/all.min.css">
	<link rel="stylesheet" href="CSSFiles/Add-to-cart.css">
	<title>Kids Corner Add to cart</title>
</head>

<body>
	<?php
	include('header.php');
	include('dbcon.php');
	$status = "";
	if (isset($_POST['action']) && $_POST['action'] == "remove") {
		if (!empty($_SESSION["Shop"])) {
			foreach ($_SESSION["Shop"] as $key => $value) {
				if ($_POST["code"] === $key) {
					unset($_SESSION["Shop"][$key]);
	?>
					<script>
						alert('Product is removed from Cart');
						window.location.href = 'http://localhost/FYP/Add-to-cart.php';
					</script>
	<?php
				}
				if (empty($_SESSION["Shop"]))
					unset($_SESSION["Shop"]);
			}
		}
	}
	if (isset($_POST['action']) && $_POST['action'] == "changeQuantity") {
		foreach ($_SESSION["Shop"] as &$value) {
			if ($value["code"] === $_POST['code']) {
				$value['prdQuantity'] = $_POST["prdQuantity"];
				break; // Stop the loop after we've found the product
			}
		}
	}
	if (isset($_POST['action']) && $_POST['action'] == "changeSize") {
		foreach ($_SESSION["Shop"] as &$value) {
			if ($value["code"] === $_POST['code']) {
				$value['prdSize'] = $_POST["prdSize"];
				break; // Stop the loop after we've found the product
			}
		}
	}
	?>
	<div class="Home-path">
		<p><a href="index.html">Home</a> / Cart</p>
	</div>
	<div class="Page1">
		<h1 style="text-align: center;">Shopping Cart</h1>
		<div class="Checkcart">
			<?php
			if (!empty($_SESSION["Shop"])) {
				$total_quantity = 0;
				$total_price = 0;
			?>
				<table class="table">
					<tbody class="Forheight">
						<tr class="r1">
							<td>NAME</td>
							<td>Size</td>
							<td>QUANTITY</td>
							<td>UNIT PRICE</td>
							<td>ITEMS TOTAL</td>
							<td>Remove Item</td>
						</tr>
						<?php
						foreach ($_SESSION["Shop"] as $product) {
						?>
							<tr class="r2">
								<td>
									<form action="" method="POST">
										<input type='hidden' name='prdid' value="<?php echo $product["prdid"]; ?>" />
										<input name="code" type="hidden" value="<?php echo $product['code']; ?>">
										<img src='<?php echo  $product["prdImage"]; ?>' width="50" height="40" />
										<text style="position: absolute;width: 100px;height: auto ;top: 30px;left: 70px;"><?php echo  $product["prdName"]; ?></text>
									</form>
								</td>
								<td>
									<form action="" method="POST">
										<input type='hidden' name='prdid' value="<?php echo $product["prdid"]; ?>" />
										<input name="code" type="hidden" value="<?php echo $product['code']; ?>">
										<input type='hidden' name='action' value="changeSize" />
										<select name='prdSize' class="size" <?php echo $product["prdSize"]; ?> onchange="this.form.submit()" required>

											<option value="" selected hidden disabled>Select</option>
											<?php
											$pid =$product["prdid"];
											$Saquery = mysqli_query($con, "SELECT * from  `product_size` where id = '$pid'");
											while ($FQeury = mysqli_fetch_array($Saquery)) {
											?>
												<option <?php if ($product['prdSize'] == $FQeury['Size']) echo "selected"; ?> value="<?php echo $FQeury['Size'] ?>"><?php echo $FQeury['Size'] ?></option>
											<?php
											}
											?>
										</select>
									</form>
								</td>
								<td>
									<form action="" method="GET">
										<input type='hidden' name='prdid' value="<?php echo $product["prdid"]; ?>" />
										<input name="code" type="hidden" value="<?php echo $product['code']; ?>">
										<input type='hidden' name='action' value="changeQuantity" />
										<select name='prdQuantity' id="quantity" class="prdQuantity" onchange="this.form.submit()">
										<?php
										$SPid =$product["prdid"];
										$SPquery = mysqli_query($con, "SELECT * from  `product` where prdid = '$SPid'");
										while ($SQeury = mysqli_fetch_array($SPquery)) {
											for($i=1; $i<=$SQeury["prdQuantity"]; $i++){
										?>
											<option <?php if ($product["prdQuantity"] == $i) echo "selected"; ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
											
											<?php
											}
										}
											?>
										</select>
									</form>
								</td>
								<td><?php echo "$" .  $product["prdPrice"]; ?></td>
								<td><?php echo "$" .  $product["prdPrice"] *  $product["prdQuantity"]; ?></td>
								<td>
									<form action="" method="POST">
										<input type='hidden' name='prdid' value="<?php echo $product["prdid"]; ?>" />
										<input name="code" type="hidden" value="<?php echo $product['code']; ?>">
										<input type='hidden' name='action' value="remove" />
										<button type='submit' class='remove'>X</button>
									</form>
								</td>
							</tr>
						<?php
							$total_quantity += $product["prdQuantity"];
							$total_price += ($product["prdPrice"] *  $product["prdQuantity"]);
						}
						?>
						<tr class="r3">
								<td></td>
								<td></td>
								<td style="text-align: center;">
									<strong>TOTAL: <?php echo $total_quantity; ?></strong>
								</td>
								<td></td>
								<td style="text-align: center;">
									<strong>TOTAL: <?php echo "$" . $total_price; ?></strong>
								</td>
								<td></td>
							</tr>
					</tbody>
				</table>
			<?php
			} else {
				echo "<h3>Your cart is Currently Empty!</h3>";
			}
			?>
		</div>
			<span class="home"><a href="index.php">continue Shopping</a></span>
			<?php
			if (!empty($_SESSION['Shop'])) {
				?>
				<form action="checkout.php?code = <?php echo  $product['code']; ?>" method="POST">
					<span class ='checkoutproccess'>
							<button type="submit" class='checkoutbtn'>
								Checkout To Proceed
							</button>
					</span>
				</form>
				<?php
			}
			?>

		
	</div>
	<div style="margin-top: 30%;">
		<?php
		include('Footer.php');
		include('js.php');
		?>
	</div>

</body>

</html>