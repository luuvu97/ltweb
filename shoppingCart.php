<?php 
    session_start();
	require_once('findbook.php');
    require_once('define_variable.php');

	$link = mysqli_connect(HOST, USERNAME, PASSWORD, DBNAME) or die("Cannot connect to database");

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Giỏ Hàng</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <style type="text/css">
  	th{
  		color: #004400;
  		font-size: 20px;
  		font-style: bold;
  	}
  	h2{
  		padding: 30px;
  		background-color: #DDDDDD;
  	}
  	table{
  		background-color: #FFFFCC;
  	}
  	.affect{
  		color: #000044;
  		font-size: 20px;
  		margin: 20px;
  	}
  	.font{
  		style:bold;
  		color: #003300;
  	}
  	img{
		  width: 100%;
	}
	div input, textarea{
		width: 100%;
	}

  </style>
</head>
<body>

<div class="container">
    <h2 class="text-center" style="color: #3300FF">SHOPPING CART
    </h2>           	
        <table class="table table-condensed table-hover">
    	<tbody>
    		<?php 
                 if(isset($_SESSION['cart'])){

                 	?>
                 	<thead>
    		<tr>
    		<th style="width: 50%">Book</th>
    		<th style="width: 10%" class="text-center">Unit Price</th>
    		<th style="width: 10%" class="text-center">Quantity</th>
    		<th style="width: 20%" class="text-center" class="text-center">Amount</th>
    		<th style="width: 10%" class="text-center"></th>
    	</tr>
    	</thead>
                <?php  
                 	$total=0;

                 	//Hien thi danh sach trong gio hang

                 	foreach ($_SESSION['cart'] as $key => $value) {
                        $sql = "select * from book_brief_view where bookid='" .$key ."'";
                        $result = mysqli_query($link, $sql);
						$row = mysqli_fetch_array($result);
						$total += $row['price'] * $_SESSION['cart'][$row['bookid']];
					//  }
                ?>
                <tr>
    			<td>
    			<div class="row">
				<div class="col-lg-2 "><?php echo '<img src="data:image/jpeg;base64,' .base64_encode($row["cover"]) .'"/>'; ?></div>
    			<div class="col-lg-10">
    				<h4><span class="font">ID :</span> <?php echo $row['bookid'] ?></h4>
    				<h5><span class="font">Book Name :</span> <?php echo $row['bookname'] ?> </h5>
                    <p><span class="font">Publisher :</span><?php echo $row['publishername']; ?></p>
    			    <p><span class="font">Introduction : </span><?php echo substr($row['description'],1, 200); ?></p>
    			</div>

    		</div>
    		</td>
    		<td class="text-center">
				<p id="price<?php echo $key; ?>"><?php echo $row['price']; ?></p>
    		</td>
    		<td>
				<div class="add" name="<?php echo $row['bookid']; ?>"style="background-color: red; height: 100%; width: 15%; text-align: center; float: left">+</div>
				<div class="minus" name="<?php echo $row['bookid']; ?>"style="background-color: red; height: 100%; width: 15%; text-align: center; float: right">-</div>
				<div id="quantity<?php echo $row['bookid']; ?>" style="text-align: center" name="quantity" data="<?php echo $row['bookid'] ."-" .$row['quantity']; ?>"><?php echo $_SESSION['cart'][$row['bookid']]; ?></div>
			</td>
    		<td  class="text-center">
				<p id="amount<?php echo $row['bookid'];?>"><?php echo $row['price'] * $_SESSION['cart'][$row['bookid']]; ?></p>
    		</td>
    		<td class="actions text-center" >
    			<a class="btn btn-danger"  name="remove" data="<?php echo $row['bookid'] ?>">
    			 Remove</a>
    		</td>
    		</tr>
    		</tr> 
 
                 	<?php  
                 	}
             	}
                 else{
                 	echo "<h2 style='color: purple; text-align: center'>Your shopping cart is empty. Please choose an item!</h2>";
				}

    		 ?>

    			<?php 
                     if(isset($_SESSION['cart'])){

                     	?>
    		            <tr>
							<td class="text-center" colspan="5">
							<h3 style="color: purple">Total : $<font id="total"><?php echo $total?></font></h3>
							</td>
					    </tr>
						<tr>
							<td colspan='5' style="text-align: center">
							<input style="max-width: 150px; position: relative" type="button" name="updateCart" value="Update">
							<input type="button" value="Empty Cart" style="max-width: 150px; position: relative" name="emptyCart">
							</td>
						</tr>
                     	<?php  
                     }

    			 ?>
    			
    	</tbody>
    	<tfoot>
    		<tr>
    			<td><a href="book_garden.php#bookList" class="btn btn-warning"><i class="fa fa-angle-left">Go to BOOK GARDEN</i></a></td>
    			<td></td>
    			<td></td>
    			<td></td>
    			
    			<?php 
                    if(isset($_SESSION['cart'])){

						?>
						<td><input class="btn btn-success btn-block" type="button" name="placeOrder" value="Place Order"></td>
						<?php  
                    }
    			?>
    			
    		</tr>

    	</tfoot>
    </table>
	<div name="customerInfo" style="width: 100%">
		<label><h3 style="style:bold; color: red">FILL YOUR INFORMATION</h3> </label>
		<table border="1px" style="background-color: #99CCCC; width: 100%">
			<tr>
				<td class="affect">Full name</td>
				<td><input type="text" name="name" required></td>
				<td class="affect">
					Telephone
				</td>
				<td>
					<input type="text" name="phone" pattern="[0-9]{10-11}" required>
				</td>
				<td class="affect">Address</td>
				<td>
					<textarea cols="50" rows="3" name="address" required></textarea>
				</td>
			</tr>
		</table>
		<input type="button" name="sentOrder" value="Sent" style="max-width: 200px; float: right; margin: 5px;">
	</div>
    
	<script src="js/shoppingCart.js"></script>

</body>
</html>