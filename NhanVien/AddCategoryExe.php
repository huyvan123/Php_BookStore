<?php require_once('ConnectDBbookstore.php'); ?>
<?php 

	if (isset($_POST['add'])) {
		$name = $_POST['name'];
		$sqlcheck = "SELECT *  
				 from bookstore.bookcategory 
				 where bookcategory.name = '$name'";
		$query = mysqli_query($connb,$sqlcheck);
		if ($query->num_rows > 0) {
			header("location:AddCategory.php?checkcate=0");
		}else{
			$sqladd = "INSERT into bookstore.bookcategory(bookcategory.name)
				 values ('$name')";
			mysqli_query($connb,$sqladd);
			header("location:AddCategory.php?checkcate=1");
		}
	}

 ?>