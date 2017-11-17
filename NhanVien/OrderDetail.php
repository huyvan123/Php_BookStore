<?php require_once('ConnectDBbookstore.php'); ?>
<?php require_once('ConnectDB.php'); ?>
<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<script type="text/javascript"
	src="//cdn.jsdelivr.net/jquery/1/jquery.min.js"></script>
<script type="text/javascript"
	src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<link rel="stylesheet" type="text/css"
	href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" />

<script type="text/javascript"
	src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<link rel="stylesheet" type="text/css"
	href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
	
<title>AddBookCategoryr</title>
</head>
<body>
	<br>
	<div class="container">

		<div style="text-align: center">
			<h2>
				<b><i>Order Detail</i></b>
			</h2>
		</div>
		<br>

			<?php 
				$username = $_SESSION['username'];
				$position = $_SESSION['position']; 
				$name = $_POST['ordername'];
				$destiantion = '';
				$totalprice = 0;
				$sql = "SELECT employee.nameEmployee
						from mydb.employee
						where employee.idEmployee = '$username'";
				$que = mysqli_query($conn,$sql);
				$dat = mysqli_fetch_row($que);
				$cus = $dat[0];
			 ?>
		<div class="row">
				<div class="col-sm-3">	</div>
			<!-- <form  action="" method="POST"> -->
				<div class="col-sm-6">
					<div class="row">
						<h2>
							<b><i><?=$name; ?></i></b>
						</h2>
					</div>
					<div class="row">
						
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
									<?php $sqlpu = "SELECT * from bookstore.bookorder,bookstore.customer,bookstore.person,bookstore.book,bookstore.discount
										where  bookorder.idCustomer = customer.ID and person.name = '$name'
										and person.ID = customer.idPerson and book.ID = bookorder.idBook and book.idDiscount = discount.ID";
										$query = mysqli_query($connb,$sqlpu);
										if($query->num_rows > 0){
										while ($datapu = mysqli_fetch_row($query)) {
											$totalprice = $totalprice + $datapu[29]*$datapu[8]- $datapu[29]*$datapu[35]*0.01; 
											$destiantion = $datapu[4]; ?>

											<tr class="active">
					        					<td><?=$datapu[28] ?></td>
					        					<td><?=$datapu[29] ?></td>
					        					<td><?=$datapu[8] ?></td>
					        					<td><?=$datapu[35] ?></td>
			      							</tr>

									<?php	}
										}
									 ?>
								</tbody>
						</table>
						<b>Destination: <?php echo $destiantion; ?></b><br>
						<b>Total Price: <?php echo $totalprice; ?> VNĐ</b><br>
						<b>Employee: <?php echo $cus; ?></b>

					</div><br><br>
					<div >
						<button style="width: 150px;margin-left: 40%" class="btn btn-primary" name="add" >
						Create Bill</button>
					</div>
				</div>
			<!-- </form> -->
				<div class="col-sm-3"></div>
		</div>
		<div class="row">
			<div class="col-sm-3"></div>
			<div class="col-sm-6">
					<form action="CheckOrder.php" method="POST">
						<button style="width: 150px;margin-left: 40%;" class="btn btn-success" type="submit" name="update">Return</button>
					</form>
				
			</div>
			<div class="col-sm-3"></div>
		</div>
	</div>
</body>
</html>