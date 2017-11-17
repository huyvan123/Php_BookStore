<?php require_once('ConnectDBbookstore.php'); ?>
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
	
<title>AddPublisher</title>
</head>
<body>
	<br>
	<div class="container">

		<div style="text-align: center">
			<h2>
				<b><i>Add Publisher</i></b>
			</h2>
		</div>
		<br>

		<?php if (isset($_GET['checkpu'])) {
			$checkbook = $_GET['checkpu'];
			if ($checkbook == 1) { ?>
				<div class="alert alert-success" style="text-align: center">
					<strong>Add Successful</strong>
				</div>
			<?php }else{ ?>
				<div class="alert alert-danger">
					<strong>Add Fail</strong>
				</div>
			<?php }
		} ?>

		<div class="row">
			<form name="addpublisher" action="AddPublisherExe.php" method="POST">
				<div class="col-sm-3">
					<b>Introduction:</b> <input name="introduction" type="text"
						class="form-control" placeholder="enter introduction"
						pattern=".{5,}" title="Cần 5 ký tự trở lên"><br>
					<b>Rank:</b> 
						<select class="form-control" name = "rank">
							<option>0</option>
							<option>1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
							<option>5</option>
						</select>
					<br>
					<b>Website:</b>
					<input name = "website" type="text" class="form-control" placeholder = "enter publisher website">
				</div>
				<div class="col-sm-3">

					<b>Country: </b> 
					<select class="form-control" name="country">
							<?php 
							$sqlcate = "SELECT country.name FROM bookstore.country order by country.name asc";
							$query = mysqli_query($connb,$sqlcate);
							while ( $datacate = mysqli_fetch_row($query)) { ?>
								<option> <?=$datacate[0]; ?></option>
							<?php	}		
						 ?>

					</select> <br> <b>Address:</b> <input type="text"
						name="address" class="form-control"
						placeholder="enter author address" pattern=".{5,}" required
						title="Cần 5 - 16 ký tự"><br>
					<br>
					<div style="margin-left: 40%">
						<button class="btn btn-primary" name="add" type="submit">
						ADD</button>
					</div>
					<br><br><br>
				</div>

				<div class="col-sm-3">
					<b>Name:</b> <input name="name" type="text"
						class="form-control" placeholder="enter publisher name"
						pattern=".{1,}" required title="Cần tên"><br>
					<b>PhoneNumber:</b> <input name="phonenumber" type="text"
						class="form-control" placeholder="enter publisher phonenumber"><br>
					<b>Email:</b>
						<input name = "email" type="text" class="form-control" placeholder = "enter publisher email">
				</div>
			</form>
			<div class = "col-sm-3">
				<div class="btn-group" style="margin-left: 20%">
					<form action="AddDiscount.php" method="POST" name = "addbook">
					<button type="submit" name="adddiscount" class="btn btn-info"
						style="width: 150px;">Add Discount</button>
					</form>
					<form action="AddAuthor.php" method="POST" name = "addbook">
					<button type="submit" name="addauthor" class="btn btn-info"
						style="width: 150px;">Add Author</button>
					</form>
					<form action="AddCategory.php" method="POST" name = "addbook">
					<button type="submit" name="addcategoy" class="btn btn-info"
						style="width: 150px;">Add Category</button>
					</form>
					<form action="AddBook.php" method="POST" name = "addbook">
					<button type="submit" name="addbook" class="btn btn-info"
						style="width: 150px;">Add Book</button>
					</form>
				</div>
			</div>
		</div>

	</div>
</body>
</html>