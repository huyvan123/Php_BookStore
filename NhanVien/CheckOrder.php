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
				<b><i>Check Order</i></b>
			</h2>
		</div>
		<br>

		<?php 
				$iduser = $_SESSION['iduser'];
				$position = $_SESSION['position']; 
				$cc =0;
			 ?>
		<div class="row">
				<div class="col-sm-3">	</div>
			<form  action="OrderDetail.php" method="POST">
				<div class="col-sm-3">

					<b>Order Waiting: </b> 
					<select name="ordername" class="form-control">
							<?php $sqlpu = "SELECT distinct(person.name)
								from bookstore.bookorder, bookstore.person, bookstore.customer
									where bookorder.status = 'Waiting' and customer.ID = bookorder.idCustomer
										and customer.idPerson = person.ID";
								$query = mysqli_query($connb,$sqlpu);
								if($query->num_rows > 0){
								while ($datapu = mysqli_fetch_row($query)) { ?>
									<option><?=$datapu[0]; ?></option>
							<?php	}
								}else{
									$cc = 1;
								}
							 ?>
					</select>

					<div class="row"></div><br>
					<div >
						<?php if ($cc==1) { ?>
						<button style="width: 150px;margin-left: 40%" class="btn btn-primary" name="add" disabled>
						View Detail</button>
						<?php }else{ ?>
							<button style="width: 150px;margin-left: 40%" class="btn btn-primary" name="add" type="submit">
							View Detail</button>
						<?php } ?>
					</div>
				</div>
			</form>
				<div class="col-sm-3"></div>
		</div>
		<div class="row">
			<div class="col-sm-3"></div>
			<div class="col-sm-3">
					<form action="HomePage.php?iduser=<?=$iduser?>&position=<?=$position?>" method="POST">
						<button style="width: 150px;margin-left: 40%;" class="btn btn-success" type="submit" name="update">Cancel</button>
					</form>
				
			</div>
			<div class="col-sm-3"></div>
		</div>
	</div>
</body>
</html>