<?php require_once('ConnectDBbookstore.php'); ?>
<?php 

	if (isset($_POST['add'])) {
		$name = $_POST['name'];
		$percen = $_POST['percent'];
		$st = $_POST['startdate'];
		$ed = $_POST['enddate'];
		$note = $_POST['note'];
		$startdate = date("Y-m-d",strtotime($st));
		$enddate = date("Y-m-d",strtotime($ed));
		$sqlcheck = "SELECT *
				 from bookstore.discount 
				 where discount.name = '$name' and discount.discountPercen = '$percen'
					and discount.startDate = '$startdate' and discount.endDate = '$enddate'";
		$query = mysqli_query($connb,$sqlcheck);
		if ($query->num_rows > 0) {
			header("location:AddDiscount.php?checkdis=0");
		}else{
			$sqladd = "INSERT into bookstore.discount(discount.name,discount.discountPercen,discount.startDate,discount.endDate,discount.note) 
				 values ('$name','$percen','$startdate','$enddate','$note')";
			mysqli_query($connb,$sqladd);
			header("location:AddDiscount.php?checkdis=1");
		}
	}

 ?>