<?php require_once('ConnectDBbookstore.php'); ?>
<?php require_once('ConnectDB.php'); ?>
<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" type="text/css"
	href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css"
	href="css/bootstrap-theme.min.css">
<link rel="stylesheet" type="text/css"
	href="css/bootstrap-select.css">
	<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
	<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<title>AddBook</title>
</head>
<body>
			<?php 
				$iduser = $_SESSION['iduser'];
				$position = $_SESSION['position']; 
			 ?>
	<br>
	<div class="container">
		<div>
			<h1 style="text-align: center;">
				<b>ADD BOOK</b>
			</h1>
		</div>
		<?php if (isset($_GET['checkbook'])) {
			$checkbook = $_GET['checkbook'];
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
		<br>
		<div class="row">
			<form action="AddBookExe.php" name="addbook" method="POST">
				<div class="col-sm-3">
					<b>Quantity:</b> 
					<input class="form-control" name="bookquantity"
						type="text" pattern=".{1,}" required placeholder="enter quantity"><br>
					<b>Category:</b> 
					<select class="form-control" onchange="getname();" name="category" id="cc">
						<?php 
							$sqlcate = "SELECT bookcategory.name
									from bookstore.bookcategory order by bookcategory.name asc";
							$query = mysqli_query($connb,$sqlcate);
							while ( $datacate = mysqli_fetch_row($query)) { ?>
										<option onclick="getname();"><?=$datacate[0]; ?></option>

							<?php		}		
						 ?>
					</select><br>
					<input type="text" class="form-control" name="bookcategory" id="cate" required>

								<script type="text/javascript">
										function getname() {
											var c1= document.getElementById("cc").value;
											var c2= document.getElementById("cate").value;
											if(c2==""){
  											document.getElementById("cate").value = c1;
											}
											else{
												document.getElementById("cate").value = c2+", "+c1;	
											} 
										}
								</script>	
					
					<br> <b>Discount:</b> 
					<select class="form-control" name="discount">
						<?php $sqldis = "SELECT discount.ID,discount.name,discount.discountPercen
										from bookstore.discount";
								$query = mysqli_query($connb,$sqldis);
								while ($datadis = mysqli_fetch_row($query)) { ?>
									<option><?=$datadis[0] ?>- <?=$datadis[1]; ?> - <?=$datadis[2]; ?></option>
							<?php	}
							 ?>
					</select>
				</div>
				<div class="col-sm-3">
					<b>Name:</b> 
					<input class="form-control" name="bookname"
						type="text" pattern=".{1,}" required
						placeholder="enter book's name"><br>
					<div>
						<b>Author:</b><br> 
						<select name="author" class="form-control">
							<?php $sqlau = "SELECT author.ID,person.name
										from bookstore.author,bookstore.person
											where author.idPerson = person.ID";
								$queryau = mysqli_query($connb,$sqlau);
								while ($datapu = mysqli_fetch_row($queryau)) { ?>
									<option><?=$datapu[0]; ?>: <?=$datapu[1]; ?></option>
							<?php	}
							 ?>
						</select>
					</div>
					<br>
					<div>
						<b>Publisher:</b> <br> 
						<select name="publisher" class="form-control">
							<?php $sqlpu = "SELECT company.ID,company.name
										from bookstore.company";
								$query = mysqli_query($connb,$sqlpu);
								while ($datapu = mysqli_fetch_row($query)) { ?>
									<option><?=$datapu[0]; ?>: <?=$datapu[1]; ?></option>
							<?php	}
							 ?>
						</select>
					</div>
					<br> 
					<b>Price:</b> 
					<input class="form-control" name="price"
						type="text" pattern="[0-9].{3,19}" required
						placeholder="enter price"><br> 
						<b>Introduction:</b>
						 <input
						class="form-control" name="introduction" type="text"
						placeholder="enter introduction of this book"><br>
					<button style="width: 150px;" class="btn btn-primary" name="addbookbtn" type="submit" value="cc">Add</button>
				</div>
				<br>
			</form>
			<?php if (isset($_GET['path'])) {
				$path = $_GET['path'];
			} ?>
			<!-- <form  name="chooseimage" method="POST" -->
				<!-- enctype="multipart/form-data"> -->
				<div class="col-sm-3">
					<div class="thumbnail" style="width: 120px; height: 150px;" id="anh">
						<img src="<?=$path ?>" id= "ima" style="width: 100%; height: 100%;">
					</div>
					<b>Choose book's image</b> 
					<input id="image" type="file" name = "image" required><br>
					<button class="btn btn-primary" name="setimage" onclick="loaddata1();">Set Image</button>
				</div>
			<!-- </form> -->

			<script type="text/javascript">


					function loaddata1()
					{
					 var name=document.getElementById( "image" ).value;
						
					 if(name)
					 {
					  $.ajax({
					  type: 'POST',
					  url: 'AddBookExe.php',
					  data: {
					   image:name,
					  },
					  success: function (response) {
					   document.getElementById("ima").src=response;
					  }
					  });
					 }
						
					 else
					 {
					  $( '#anh' ).html("Please Enter Some Words");
					 }
					}

			</script>







			<div class="col-sm-3">
				<div class="btn-group" style="margin-left: 20%">
					<form action="AddDiscount.php" method="POST" name = "addauthor">
					<button type="submit" name="adddiscount" class="btn btn-info"
						style="width: 150px;">Add Discount</button>
					</form>
					<form action="AddPublisher.php" method="POST" name = "addauthor">
					<button type="submit" name="addpublisher" class="btn btn-info"
						style="width: 150px;">Add Publisher</button>
					</form>
					<form action="AddCategory.php" method="POST" name = "addauthor">
					<button type="submit" name="addcategoy" class="btn btn-info"
						style="width: 150px;">Add Category</button>
					</form>
					<form action="AddAuthor.php" method="POST" name = "addauthor">
					<button type="submit" name="addauthor" class="btn btn-info"
						style="width: 150px;">Add Author</button>
					</form>
				</div>
			</div>
		</div>
		<div class="col-sm-3"></div>
		<div class="col-sm-3">
		<form action="HomePage.php?iduser=<?=$iduser?>&position=<?=$position?>" method="POST">
								<button style="width: 150px;" class="btn btn-success" type="submit" name="update">Cancel</button>
							</form>
			
		</div>
		<div class="col-sm-3"></div>
	</div>
</body>
</html>