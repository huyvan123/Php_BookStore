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
<title>Order</title>
</head>
<body>
	<br>
	<div class="container" style="background-color: silver;">
		<h2 style="text-align: center">
			<i><b>Create Order</b></i>
		</h2>
		<br>
			<?php if(isset($_GET['checkOder'])){ ?>
				<div class="row">
					<div class="col-sm-3"></div>
					<div class="col-sm-6">
						<div class="alert alert-success">Order Successful!</div>
						<form action="Book.php">
							<button class="btn btn-primary" style="margin-left: 50%;"
								type="submit">OK</button>
						</form>
					</div>
					<div class="col-sm-2"></div>
				</div>
			<?php }else{ 
				 if(isset($_GET['checkCart'])) { ?>
					<div class="alert alert-warning">ID card unavailable!</div>
				<?php }  ?>

				<form action="OrderExecute.php" method="POST">
					<div class="row">
						<div class="col-sm-2"></div>
						<div class="col-sm-7">
							<b>Enter destination:</b>
							<div class = "row">
							<br>
								<div class = "col-sm-2">
									<input type="text" name="country"
									placeholder="country" class="form-control"
									pattern=".{1,}" required>
								</div>
								<div class = "col-sm-2">
									<input type="text" name="city"
									placeholder="city" class="form-control"
									pattern=".{1,}" required>
								</div>
								<div class = "col-sm-2">
									<input type="text" name="district"
									placeholder="district" class="form-control"
									pattern=".{1,}" required>
								</div>
								<div class = "col-sm-2">
									<input type="text" name="street"
									placeholder="street" class="form-control"
									pattern=".{1,}" required>
								</div>
								<div class = "col-sm-2">
									<input type="text" name="lane"
									placeholder="lane" class="form-control"
									pattern=".{1,}" required>
								</div>
								<div class = "col-sm-2">
									<input type="text" name="no"
									placeholder="number" class="form-control"
									pattern=".{1,}" required>
								</div>
							</div><br> 
								<b>Choose Payment Type: </b> 
									<ul>
										<li class="list-unstyled"><input type="radio" name="payment"
										value="payoff" onclick="hide()"/>Pay off<bR></li>
										<li class="list-unstyled"><input type="radio" name="payment"
										value="card" onclick="display()" checked="checked"/>Use credit card<br></li>
									</ul>
 					
 									<script>
										function display() {
  											document.getElementById("cardnam").style.display = "block";
										}

										function hide() {
  											document.getElementById("cardnam").style.display = "none";
										}
									</script>	
								
								<div id = "cardnam">
									<b>Choose a card:</b>
									<select class="select-picker" name="paycard">
										<?php  $sql = "SELECT creditcard.name,creditcard.company
															from bookstore.creditcard";
												$query = mysqli_query($conn,$sql);
												while ($datacard = mysqli_fetch_row($query)) { ?>
													<option> <?= $datacard[0].'-'.$datacard[1] ?></option>
														<?php	 }			 ?>
									</select><br> 
								<b>Enter Card Number:</b> 
								<input type="text" style="width: 300px;" 
								name="cardnumber" placeholder="enter your cardnumber"
								class="form-control" pattern="[0-9].{10,13}"><br> <br>
								</div>
								
							<table class="table table-bordered  ">
								<thead>
									<tr class="info">
										<th>Name</th>
										<th>Price</th>
										<th>Quantity</th>
										<th>DiscountPercent</th>
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
												$idbook = $data[0];
												//get book info
												$sqlbook = "SELECT * 
				 									from bookstore.book,bookstore.author,bookstore.person,bookstore.company,bookstore.discount  
													where person.ID = author.idPerson and book.idCompany = company.ID
				   									and book.idAuthor = author.ID  and  book.ID = $idbook and discount.ID = book.idDiscount";
				   								$querybook = mysqli_query($conn,$sqlbook);
				   								while ($databook = mysqli_fetch_row($querybook)) {
				   									$totalprice = $totalprice + $data[3]*$databook[6]- $databook[6]*$databook[32]*0.01;
												?>
													<tr class="active">
		        										<td><?=$databook[5] ?></td>
		        										<td><?=$databook[6] ?></td>
		        										<td><?=$data[3] ?></td>
		        										<td><?=$databook[32] ?></td>
	      											</tr>

										<?php	} 
											}
										}
    						 			?>
								</tbody>
							</table>
							<b>Total Price: <?php echo $totalprice; ?> VNĐ</b>
						</div>
						<div class="col-sm-3"></div>
					</div>
					<div class="row">
						<button name="createOder" class="btn btn-primary" style="margin-left: 50%;width: 150px;"
							type="submit">Create Order</button>
					</div>
				</form>
				<form action="CartDetail.php" method="POST">
					<div class="row">
						<button class="btn btn-primary" style="margin-left: 50%;width: 150px;"
							type="submit">Return</button>
					</div>
				</form>
				<form action="Book.php" method="POST">
					<div class="row">
						<button class="btn btn-primary" style="margin-left: 50%;width: 150px;"
							type="submit">Cancel</button>
					</div>
				</form>
			<?php }
			 ?>
	<br><br><br>
	</div>
</body>
</html>