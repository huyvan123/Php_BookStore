<?php require_once("ConnectDB.php"); ?>
<?php session_start(); ?>
<?php 

	if (isset($_POST['createOder'])) {

		$destination = $_POST['no'].', '. $_POST['lane'].', '.$_POST['street'].', '.$_POST['district'].', '.$_POST['city'].', '.$_POST['country'];
		$payment = $_POST['payment'];
 		$idcus = $_SESSION['idcus'];
		if ($payment === "card") {
			$paycard = $_POST['paycard'];
			$cardnumber = $_POST['cardnumber'];
			$check = "SELECT * from bookstore.creditcard
 					where creditcard.idcard = '$cardnumber'";
 			$query1 = mysqli_query($conn,$check);
 			if ($query1->num_rows > 0) {
 				$data1 = mysqli_fetch_row($query1);
 				$idcard = $data1[0];


 				$sql = "SELECT * 
					from bookstore.cart
					where cart.idCustomer = '$idcus' ";

				$query = mysqli_query($conn,$sql);
					if($query->num_rows > 0){
						while ($data = mysqli_fetch_row($query)) {
						$idbook = $data[2];

						//ADD statistic order book
						$checks = "SELECT * from bookstore.statistic
								where statistic.idBook = '$idbook'";
					$querys = mysqli_query($conn,$checks);
					if ($querys->num_rows > 0) {
						$sql = "UPDATE bookstore.statistic
							set statistic.perchaseQuantity = statistic.perchaseQuantity+ 1
							where statistic.idBook = '$idbook'";
						mysqli_query($conn,$sql);
					}else{
						$sql = "INSERT into bookstore.statistic(statistic.idBook,statistic.viewQuantity)
								values ('$idbook','1')";
						mysqli_query($conn,$sql);
					}

						$itemquantity = $data[3];
						//insert order
						$insert = "INSERT into bookstore.bookorder(bookorder.idCustomer, bookorder.paymentType, bookorder.idCreditcard, bookorder.address,bookorder.status, bookorder.idBook,bookorder.quantity )
							values ('$idcus', '$payment', '$idcard', '$destination','Waiting','$idbook','$itemquantity' )";
				   			mysqli_query($conn,$insert);
						}
					}

				//mysqli_query($conn,$insert);
 			}else{
 				header("location:Order.php?checkCart=0");
 			}
			
		}else{
			$sql = "SELECT * 
					from bookstore.cart
					where cart.idCustomer = '$idcus' ";

			$query = mysqli_query($conn,$sql);
				if($query->num_rows > 0){
					while ($data = mysqli_fetch_row($query)) {
						$idbook = $data[2];

						//ADD statistic order book
						$checks = "SELECT * from bookstore.statistic
								where statistic.idBook = '$idbook'";
					$querys = mysqli_query($conn,$checks);
					if ($querys->num_rows > 0) {
						$sql = "UPDATE bookstore.statistic
							set statistic.perchaseQuantity = statistic.perchaseQuantity+ 1
							where statistic.idBook = '$idbook'";
						mysqli_query($conn,$sql);
					}else{
						$sql = "INSERT into bookstore.statistic(statistic.idBook,statistic.viewQuantity)
								values ('$idbook','1')";
						mysqli_query($conn,$sql);
					}
						
						$itemquantity = $data[3];
						//insert order
						$insert = "INSERT into bookstore.bookorder(bookorder.idCustomer, bookorder.paymentType, bookorder.address,bookorder.status, bookorder.idBook,bookorder.quantity )
							values ('$idcus', '$payment', '$destination','Waiting','$idbook','$itemquantity' )";
				   			mysqli_query($conn,$insert);
						}
					}
		}
		$sqlcart = "DELETE from bookstore.cart
					where cart.idCustomer = '$idcus' ";
		mysqli_query($conn,$sqlcart);
		$_SESSION['itemquantity'] = 0;
		header("location:Order.php?checkOder=1");
	}
	$conn->close();
 ?>