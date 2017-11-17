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
	
<title>AddDiscount</title>
</head>
<body>
	<br>
	<div class="container">

		<div style="text-align: center">
			<h2>
				<b><i>Add Discount</i></b>
			</h2>
		</div>
		<br>

		<?php if (isset($_GET['checkdis'])) {
			$checkbook = $_GET['checkdis'];
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
			<form name="adddiscount" action="AddDiscountExe.php" method="POST">
				<div class="col-sm-3"></div>
				<div class="col-sm-3">

					<b>Name: </b> <input class="form-control" name="name" placeholder="enter discount name"
						pattern=".{1,}" required title="Cần tên"><bR>
					<b>Discount Percent:</b> <input type="text"
						name="percent" class="form-control"
						placeholder="enter discount percent" pattern="[0-9]*" required
						title="Cần trên 1%"><br><br><br><br>
					<div style="margin-left: 40%">
						<button class="btn btn-primary" name="add" type="submit">
						ADD</button>
					</div>
					<br><br><br>
				</div>

				<div class="col-sm-3">
					<b>Start Date:</b> 
						<input type="text" name = "startdate" value="08/12/2012" class = "form-control">
					<script type="text/javascript">
					$(function() {
						$('input[name="startdate"]').daterangepicker({
							singleDatePicker : true,
							showDropdowns : true
						});
					});
					</script><br>
						
					<b>End Date:</b>
						<input type="text" name = "enddate" value="08/12/2012" class = "form-control">
					<script type="text/javascript">
						$(function () {
							$('input[name = "enddate"]').daterangepicker({
								singleDatePicker : true,
								showDropdowns :true
							});			
						});
					</script><br>
					<b>Note:</b>
						<input name = "note" type="text" class="form-control" placeholder = "enter discount note">
				</div>
			</form>
			<div class = "col-sm-3">
				<div class="btn-group" style="margin-left: 20%">
					<form action="AddPublisher.php" method="POST" name = "addbook">
					<button type="submit" name="adddiscount" class="btn btn-info"
						style="width: 150px;">Add Publisher</button>
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