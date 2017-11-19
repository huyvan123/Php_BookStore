<?php require_once("ConnectDB.php"); ?>
<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<title>CartDetail</title>
</head>
<body>
	<?php $seten = 0; echo "<br/>"; ?>
	<div class="container" style="background-color: silver">
	<div class="row">
		<h2 style="text-align: center"><i><b>Your Cart</b></i></h2>
	</div>
<br><br><br>
		<div class="row">
		<div class="col-sm-2"></div>
		<div class="col-sm-8">
				<table class="table table-bordered  ">
    					<thead >
      						<tr class="info">
       							 <th>Book Name</th>
        						<th>Author Name</th>
        						<th>Publisher Name</th>
        						<th>Category</th>
        						<th>Price</th>
        						<th>Quantity</th>
        						<th>Discount Percent</th>
        						<th>Introduction</th>
      						</tr>
    					</thead>
    					<tbody >
    						<?php 

    							$totalprice = 0;
    							$idcus = $_SESSION['idcus'];
    							$sql = "SELECT * 
									 	from bookstore.cart
										 where cart.idCustomer = '$idcus' ";
								$query = mysqli_query($conn,$sql);
								if($query->num_rows > 0){
									while ($data = mysqli_fetch_row($query)) {
										$idbook = $data[2];
										//get book info
										$sqlbook = "SELECT * 
				 							from bookstore.book,bookstore.author,bookstore.person,bookstore.company,bookstore.discount  
											where person.ID = author.idPerson and book.idCompany = company.ID
				   							and book.idAuthor = author.ID  and  book.ID = '$idbook' and discount.ID = book.idDiscount";
				   						$querybook = mysqli_query($conn,$sqlbook);
				   						while ($databook = mysqli_fetch_row($querybook)) {
				   							$totalprice = $totalprice + $data[3]*$databook[6] - $databook[6]*$databook[32]*0.01;
										?>
										<tr class="active">
		        							<td><?=$databook[5] ?></td>
		        							<td><?=$databook[19] ?></td>
		        							<td><?=$databook[24] ?></td>
		        							<td><?=$databook[4] ?></td>
		        							<td><?=$databook[6] ?></td>
		        							<td><?=$data[3] ?></td>
		        							<td><?=$databook[32] ?></td>
		        							<td><?=$databook[7] ?></td>
		        							<td>
		        								<form method="POST" action="DelCart.php">
		        								<button name="delete" class="btn btn-danger" value="<?=$idbook ?>" ><span class="glyphicon glyphicon-circle-arrow-right">Delete</span></button></td>
		        								</form>
	      								</tr>


							<?php		} 
									}
								}else{
									$seten =1;
								}
    						 ?>
					    </tbody>
 				</table>
							<b>Total Price: <?php echo $totalprice; ?> VNĐ</b>






			
		</div>
		<div class="col-sm-2"></div>
	</div><br>
	<div class = "row" >
		<div class="col-sm-4"></div>
		<div class="col-sm-2">
			<?php if ($seten == 1) {	?>
					<button class="btn btn-primary" disabled style="margin-left: 50%;" type="submit">Purchase</button>
			<?php }else{ ?>
		<form action="Order.php" method="POST" name = "getorder">
			<button class="btn btn-primary" style="margin-left: 50%;" type="submit">Purchase</button>
		</form>
			<?php } ?>
		</div>		
		<div class="col-sm-2">
		<form action="Book.php" method="POST" name = "getorder">
			<button class="btn btn-warning" style="margin-left: 50%;" type="submit">Cancel</button>
		</form>
			
		</div>
		<div class="col-sm-4"></div>
	</div>
	<br><br><Br>
	</div>
</body>
</html>