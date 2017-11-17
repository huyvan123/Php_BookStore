

<?php include('Search.php'); ?>
<!DOCTYPE html>
<html>
<head>
		<title>ANAVEL BOOK</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css.map">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css.map">
	<link rel="stylesheet" href="js/bootstrap.min.js">
	<link rel="stylesheet" href="js/jquery-3.2.1.min.js">
	<link rel="stylesheet" href="js/npm.js">
	<link rel="stylesheet" href="js/bootstrap.js">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body >

	<div class = "container" style="background-color:silver">
		
		<a href="#" style="text-decoration: none;"><div style="font-family: impact; color: #568203"><h1 ><i>ANAVEL BOOK</i></h1> </div></a>
	 <!--Start header-->
		<nav class="navbar navbar-inverse ">
			<div class="container-fluid ">
				<div class = "navbar-header">
					<a href="Book.php" class="navbar-brand">Home</a>
				</div>
					<ul class="nav navbar-nav">
						<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle = "dropdown">View</a>
							<ul class="dropdown-menu">
								<li><a href="#">View1</a></li>
								<li><a href="#">View2</a></li>
								<li><a href="#">View2</a></li>
							</ul>
						</li>
						<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle = "dropdown">Popular</a>
							<ul class="dropdown-menu">
								<li><a href="#">Popular1</a></li>
								<li><a href="#">Popular2</a></li>
								<li><a href="#">Popular3</a></li>
							</ul>
						</li>
						<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle = "dropdown">Caregories</a>
							<ul class="dropdown-menu">
								<li><a href="Book.php?vanhoc=1">Văn học</a></li>
								<li><a href="Book.php?lichsu=1">Lịch sử</a></li>
								<li><a href="Book.php?nuocngoai=1">Nước ngoài</a></li>
							</ul>
						</li>
					</ul>

						<ul class="nav navbar-nav navbar-right">
					<?php if (isset($_SESSION['username'])) {
						if (isset($_SESSION['itemquantity'])) {
							
						}else{
							$_SESSION['itemquantity'] = 0;
						}
						?>

						<li>
								<a href="CartDetail.php"><strong style="background-color: white;color: black;" >
									<i ><?= $_SESSION['itemquantity']; ?>  </i>	
										</strong>
										<span class="glyphicon glyphicon-shopping-cart">Cart</span>
								</a>
								</li>
							<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><b style="color: white;"><i><?= $_SESSION['username'] ?></i></b><span class="glyphicon glyphicon-user"><span class="glyphicon glyphicon-triangle-bottom"></span></span></a>
									<ul class="dropdown-menu">
										<li>
										<button class="btn btn-default" type="submit" style="width: 160px;"><span class="glyphicon glyphicon-circle-arrow-right"> ViewDetail</span></button>
										</li>
										<li>
										<form method="POST" action="Login.php">
										<button class="btn btn-default" name="logout" type="submit" style="width: 160px;"><span class="glyphicon glyphicon-log-out"> LogOut</span></button>
										</form>
										</li>
									</ul>
							</li>
					<?php }else{ ?>

						<li><a href="#"><span class="glyphicon glyphicon-shopping-cart"> Cart</span></a></li>
						<li><a href="LogSig.php"><span class="glyphicon glyphicon-user"></span> Đăng nhập</a></li>
						<li><a href="LogSig.php"><span class="glyphicon glyphicon-log-in"> Đăng ký</span></a></li>
					<?php } ?>
					</ul>



			</div>
		</nav>
		<!-- end header -->
		<!-- start search -->
		<div class="container-fluid">
			<form class="navbar-form navbar-right" action="Book.php" method="POST">
				<div class="input-group">
					<input type="text" class="form-control" placeholder="Search" name="searchbar">
					<div class="input-group-btn">
						<button class="btn btn-default" type="search" name="searchbtn">
							<i class="glyphicon glyphicon-search"></i>
							
						</button>
					</div>
				</div>
			</form>
		</div>
		<!-- end search -->
		<!-- Start body -->
		<div class="row">
			<!-- start left body -->
			<div class="col-sm-2" >
				<div class="panel-group" id="panelGroup">
					<div class="panel panel-success">
						<div class="panel-heading">
							<h4 class="panel-title">
								<a href="#collapse1" data-toggle ="collapse" data-parent ="#panelGroup">Ngôn tình</a>
							</h4>
						</div>
						<div id="collapse1" class="panel-collapse collapse in">
							<div class="panel-body">
								body body body body body body
								body body body
								body body body
								body body body
								body body body
							</div>
						</div>
					</div>
					<div class="panel panel-success">
						<div class="panel-heading">
							<h4 class="panel-title">
								<a href="#collapse2" data-toggle = "collapse"
								data-parent = "#panelGroup">Lịch sử</a>
							</h4>
						</div>
						<div id="collapse2" class="panel-collapse collapse">
							<div class="panel-body">
								body body body body body body
								body body body
								body body body
								body body body
								body body body
							</div>
						</div>
					</div>
					<div class="panel panel-success">
						<div class="panel-heading">
							<h4 class="panel-title">
								<a href="#collapse3" data-toggle ="collapse" data-parent = "#panelGroup">Học trò</a>
							</h4>
						</div>
						<div id="collapse3" class="panel-collapse collapse">
							<div class="panel-body">
								body body body body body body
								body body body
								body body body
								body body body
								body body body
							</div>
						</div>
					</div>
					<div class="panel panel-success">
						<div class="panel-heading">
							<h4 class="panel-title">
								<a href="#collapse4" data-toggle = "collapse" data-parent = "#panelGroup">
									Du ký
								</a>
							</h4>
						</div>
						<div id="collapse4" class="panel-collapse collapse">
							<div class="panel-body">
								body body body body body body
								body body body
								body body body
								body body body
								body body body
							</div>
						</div>
					</div>
					<div class="panel panel-success">
						<div class="panel-heading">
							<h4 class="panel-title">
								<a href="#collapse5" data-toggle = "collapse" data-parent = "#panelGroup">
									Văn học
								</a>
							</h4>
						</div>
						<div id="collapse5" class="panel-collapse collapse">
							<div class="panel-body">
								body body body body body body
								body body body
								body body body
								body body body
								body body body
							</div>
						</div>
					</div>
					<div class="panel panel-success">
						<div class="panel-heading">
							<h4 class="panel-title">
								<a href="#collapse7" data-toggle = "collapse" data-parent = "#panelGroup">
									Nghệ thuật
								</a>
							</h4>
						</div>
						<div id="collapse7" class="panel-collapse collapse">
							<div class="panel-body">
								body body body body body body
								body body body
								body body body
								body body body
								body body body
							</div>
						</div>
					</div>
					
				</div>
			</div>
			<!-- end left body -->
			<!-- start center body -->
			<div class="col-sm-7">



				<?php 
				if (isset($_GET['id'])) {
					$id = $_GET['id'];
					$checks = "SELECT * from bookstore.statistic
								where statistic.idBook = '$id'";
					$querys = mysqli_query($conn,$checks);
					if ($querys->num_rows > 0) {
						$sql = "UPDATE bookstore.statistic
							set statistic.viewQuantity = statistic.viewQuantity+ 1
							where statistic.idBook = '$id'";
						mysqli_query($conn,$sql);
					}else{
						$sql = "INSERT into bookstore.statistic(statistic.idBook,statistic.viewQuantity)
								values ('$id','1')";
						mysqli_query($conn,$sql);
					}

					if (isset($_GET['checklogin'])) {?>
						<h5 style="color: red; text-align: center;">You have not sign in!</h5>
					<?php }
					$id = $_GET['id'];
					$_SESSION['idbook'] = $id;

					$sql = "SELECT * 
				from bookstore.book,bookstore.author,bookstore.person,bookstore.company,bookstore.discount
				where person.ID = author.idPerson and book.idCompany = company.ID
				 and book.idAuthor = author.ID  and  book.ID = $id and discount.ID = book.idDiscount;";
					$query = mysqli_query($conn,$sql);
					while ($row = mysqli_fetch_row($query)) {
				?>



				<div style="text-align: center"><h1><b><i><?php echo $row[5]; ?></i></b></h1></div><br>
				
				<div class="row">
					<div class="col-sm-5" >
						<div class = "thumbnail" style="width: 150;height: 300px;margin-left: 30px;" >
						<img alt="image" src=<?= $row[9];  ?> style="width: 100%;height: 100%" class="img-rounded">
						</div>
					</div>
					<div class="col-sm-7" style="text-align: left;">
						<br>
						<h5><b >Author: <?php echo $row[19]; ?></b></h5>
						<h3><b style="color: red;">Price: <?php echo $row[7]; ?> VND</b></h3>
						<form action="Addtocart.php" method="POST" name="addtocart">
							<select class="select select-picker" name="bookquantity" >
								<?php for($i = 1;$i< $row[8];$i++){ ?>
									<option><?= $i ?></option>
								<?php } ?>
							</select>
							<button name="addtocart" class="btn btn-warning"><h3><b style="color: red;">Add to Cart <span class="glyphicon glyphicon-shopping-cart"></span></b></h3></button>
						</form>
					</div>
				</div>
				<div class="row">
					<ul class="nav nav-tabs">
    					<li class="active"><a data-toggle="tab" href="#bookdetail">Book Detail</a></li>
   						<li><a data-toggle="tab" href="#bookreview">Book Review</a></li>
  					</ul>
				</div>


				<?php } }elseif (isset($_GET['checkadd'])) {?>

					<div class="alert alert-success" style="margin-left: 20%">
					<b><i>Add book to cart successful!</i></b>
				</div>
				<form action="Book.php">
					<button class="btn btn-success" type="submit" style="margin-left: 20%">Ok</button>
				</form>


				<?php }else if(isset($_GET['vanhoc'])){ ?>
					<div class="row">
						<h1 style="color: black; text-align: center;">Thể loại văn học!</h1><bR>
						<?php Search("Văn học",$conn); ?>
					</div>

				<?php }else if(isset($_GET['lichsu'])){ ?>
					<div class="row">
						<h1 style="color: black; text-align: center;">Thể loại lịch sử!</h1><bR>
						<?php Search("Lịch sử",$conn); ?>
					</div>

				<?php }else if(isset($_GET['nuocngoai'])){ ?>
					<div class="row">
						<h1 style="color: black; text-align: center;">Thể loại nước ngoài!</h1><bR>
						<?php Search("Nước ngoài",$conn); ?>
					</div>

				<?php }else if(isset($_POST['searchbtn'])){ 
					$keys = $_POST['searchbar'];
					?>
					<div class="row">
						<h1 style="color: black; text-align: center;">Search với từ khóa <?=$keys?>!</h1><bR>
						<?php SearchByName($keys,$conn); ?>
					</div>

				<?php }else{ ?>

				<div id="slide1" class="carousel slide" data-ride="carousel">
    			<!-- Hiển thị -->
    				<ol class="carousel-indicators">
      					<li data-target="#slide1" data-slide-to="0" class="active"></li>
      					<li data-target="#slide1" data-slide-to="1"></li>
      					<li data-target="#slide1" data-slide-to="2"></li>
    				</ol>

    				<!-- Wrapper for slides -->
    				<div class="carousel-inner">
      					<div class="item active">
        					<img src="Image/sleepa.png" alt="Anavel" style="width:100%;">
      					</div>

      					<div class="item">
        					<img src="Image/chiwu2.png" alt="Chiwu" style="width:100%;">
      						</div>
      					<div class="item">
        					<img src="Image/anavel2.png" alt="Anavel" style="width:100%;">
      					</div>
    				</div>

    				<!-- Left and right controls -->
    				<a class="left carousel-control" href="#slide1" data-slide="prev">
      					<span class="glyphicon glyphicon-chevron-left"></span>
      					<span class="sr-only">Previous</span>
    				</a>
    				<a class="right carousel-control" href="#slide1" data-slide="next">
     				 	<span class="glyphicon glyphicon-chevron-right"></span>
      					<span class="sr-only">Next</span>
    				</a>
  				</div><br><br>
  				<!--show images -->

  				<?php if (isset($_GET['next'])) { 
  					$temp = $_GET['next'];
  						$sql =  " SELECT *  
							FROM bookstore.book 
							where book.ID > '$temp' limit 9";
						$pre = mysqli_query($conn,$sql);
	 				?>
  					<?php if ($pre->num_rows > 0) { ?>
  				<div class="row">
  					<?php while ($data = mysqli_fetch_array($pre)) {
  						$temp = $data['ID'];
  					 ?>
	  					<div class="col-md-4">
	  						<div class="thumbnail" style="width: 200px;height: 320px;">
	  							<a href="Book.php?id=<?= $data['ID'] ?>" target="_blank">
	  								<img src=<?=$data['image']?> alt=$data[name] style="width: 100%;height: 80%">
	  								<div class="caption">
	  									<?php echo $data['name']; ?><br> <?php echo $data['price']; ?>VNĐ
	  								</div>
	  							</a>
	  						</div>
	  					</div>
  					<?php } ?>
  				</div>
  					<div class="row"> 
	  					<ul class="pager">
	    					<li><a href="Book.php?pre=<?=$temp?>">Previous</a></li>
	   						<li><a href="Book.php?next=<?=$temp?>">Next</a></li>
	  					</ul>
  					</div>
  					<?php }else { ?>
  					 	<h1 style="color: red; text-align: center;">Not found!</h1>
  				<?php } 
  					}	else if (isset($_GET['pre'])) { 
  					$temp = $_GET['pre'];
  						$sql =  " SELECT *  
							FROM bookstore.book 
							where book.ID < '$temp' limit 9";
						$pre = mysqli_query($conn,$sql);
	 				?>
  				<div class="row">
  					<?php if ($pre->num_rows > 0) { 
  					 while ($data = mysqli_fetch_array($pre)) {
  						$temp = $data['ID'];
  					 ?>
	  					<div class="col-md-4">
	  						<div class="thumbnail" style="width: 200px;height: 320px;">
	  							<a href="Book.php?id=<?= $data['ID'] ?>" target="_blank">
	  								<img src=<?=$data['image']?> alt=$data[name] style="width: 100%;height: 80%">
	  								<div class="caption">
	  									<?php echo $data['name']; ?><br> <?php echo $data['price']; ?>VNĐ
	  								</div>
	  							</a>
	  						</div>
	  					</div>
  					<?php } 
  					 }else { ?>
  					 	<h1 style="color: red; text-align: center;">Not found!</h1>
  					<?php } ?>
  				</div>
		  				<div>
		  					<ul class="pager">
		    					<li><a href="Book.php?pre=<?=$temp?>">Previous</a></li>
		   						<li><a href="Book.php?next=<?=$temp?>">Next</a></li>
		  					</ul>
		  				</div>
  				<?php }else{

						$sql =  " SELECT *  
							FROM bookstore.book 
							where book.ID >= 0 limit 9";
						$pre = mysqli_query($conn,$sql);
	 				?>
  				<div class="row">
  					<?php while ($data = mysqli_fetch_array($pre)) {
  						$temp = $data['ID'];
  					 ?>
  					<div class="col-md-4">
  						<div class="thumbnail" style="width: 200px;height: 320px;">
  							<a href="Book.php?id=<?= $data['ID'] ?>" target="_blank">
  								<img src=<?=$data['image']?> alt=$data[name] style="width: 100%;height: 80%">
  								<div class="caption">
  									<?php echo $data['name']; ?><br> <?php echo $data['price']; ?>VNĐ
  								</div>
  							</a>
  						</div>
  					</div>
  					<?php } ?>
  				</div>
  				<div>
  					<ul class="pager">
    					<li><a href="#">Previous</a></li>
   						<li><a href="Book.php?next=<?=$temp?>">Next</a></li>
  					</ul>
  				</div><br><hr><br>
  				<?php } ?>
  				<h2 style="color: black;"><i>Xem nhiều nhất</i></h2>

  				<?php 
  					$sql =  " SELECT * from bookstore.statistic,bookstore.book
									where book.ID = statistic.idBook and statistic.viewQuantity > 0
									order by statistic.viewQuantity desc limit 9";
						$pre = mysqli_query($conn,$sql);
	 				?>
  				<div class="row">
  					<?php while ($data = mysqli_fetch_array($pre)) {
  						$temp = $data['ID'];
  					 ?>
  					<div class="col-md-4">
  						<div class="thumbnail" style="width: 200px;height: 320px;">
  							<a href="Book.php?id=<?= $data['ID'] ?>" target="_blank">
  								<img src=<?=$data['image']?> alt=$data[name] style="width: 100%;height: 80%">
  								<div class="caption">
  									<?php echo $data['name']; ?><br> <?php echo $data['price']; ?>VNĐ
  								</div>
  							</a>
  						</div>
  					</div>
  					<?php } ?>
  				</div><br><hr><br>

  				<h2 style="color: black;"><i>Mua nhiều nhất</i></h2>

  				<?php 
  					$sql =  " SELECT * from bookstore.statistic,bookstore.book
									where book.ID = statistic.idBook and statistic.perchaseQuantity > 0
									order by statistic.perchaseQuantity desc limit 9";
						$pre = mysqli_query($conn,$sql);
	 				?>
  				<div class="row">
  					<?php while ($data = mysqli_fetch_array($pre)) {
  						$temp = $data['ID'];
  					 ?>
  					<div class="col-md-4">
  						<div class="thumbnail" style="width: 200px;height: 320px;">
  							<a href="Book.php?id=<?= $data['ID'] ?>" target="_blank">
  								<img src=<?=$data['image']?> alt=$data[name] style="width: 100%;height: 80%">
  								<div class="caption">
  									<?php echo $data['name']; ?><br> <?php echo $data['price']; ?>VNĐ
  								</div>
  							</a>
  						</div>
  					</div>
  					<?php } ?>
  				</div>
  				<?php 
  			} ?>


<!-- paper -->
  				<!-- <div>
  					<ul class="pager">
    					<li><a href="#">Previous</a></li>
   						<li><a href="#">Next</a></li>
  					</ul>
  				</div> -->
			</div>
			<!-- end center body -->
			<!-- start right body -->
			<div class="col-sm-3">

				<ul class="nav nav-tabs">
    				<li class="active"><a data-toggle="tab" href="#about">About</a></li>
   					 <li><a data-toggle="tab" href="#tag">Tag</a></li>
    				<li><a data-toggle="tab" href="#contact">Contact</a></li>
  				</ul>

  				<div class="tab-content">
    				<div id="about" class="tab-pane fade in 		active">
      					<h3 align="center">About</h3>
      					<p>

      						Nguyễn Huy Văn<br>

      					</p>
    				</div>
    				<div id="tag" class="tab-pane fade">
      					<h3 align="center">Tag</h3>
      					<p>
      						<a href="#">A</a> là gì<br>
      						<a href="#">B</a> là gì<br>
      						<a href="#">C</a> là gì<br>
      						<a href="#">D</a> là gì<br>
      					</p>
    				</div>
    				<div id="contact" class="tab-pane fade">
      					<h3 align="center">Contact</h3>
      					<p>Yêu cầu quảng cáo, vui lòng liên hệ với trung tâm rau sạch <a href="E:\Mian\mian\mian\videoplayback.mp4">NamViet</a></p>
    				</div>
  				</div><br>
<!--sách phổ biến-->
  				<div class="panel panel-success" style="font-family: cursive; color: #cc6699; background-color: silver"><h3>Sách phổ biến gần đây</h3></div>

  			<div style="background-color: #ffffcc; align-content: center;">
  				<br>
  				<div class="row">
  					<div class="col-sm-6">
  						<div class="thumbnail" style="width: 100%">
  							<a href="Image/daivietsuky.jpg" target="_blank">
  								<img src="Image/daivietsuky.jpg" alt="daivietsuky" class="img-circle" style="width: 100%">
  							</a>
  						</div>
  					</div>
  					<div class="col-sm-6">
  						<div class="caption">
  							<p>Đại Việt Sử Ký Toàn Thư là cuốn nhập môn sử Việt, nếu bạn là một người yêu thích lịch sử thì hãy chọn nó</p>
  						</div>
  					</div>	
  				</div>
  				<hr>
  				<div class="row">
  					<div class="col-sm-6">
  						<div class="thumbnail" style="width: 100%">
  							<a href="Image/daomongmo.jpg" target="_blank">
  								<img src="Image/daomongmo.jpg" alt="daomongmo" class="img-circle" style="width: 100%">
  							</a>
  						</div>
  					</div>
  					<div class="col-sm-6">
  						<div class="caption">
  							<p> Đảo mộng mơ, dây là một trong những cuốn sach bán chạy nhất, đồng thời cũng là một trong những cuốn sách hay nhất của Nguyễn Nhật Ánh</p>
  						</div>
  					</div>	
  				</div>
  				<hr>
  				<div class="row">
  					<div class="col-sm-6">
  						<div class="thumbnail" style="width: 100%">
  							<a href="Image/quangodilen.jpg" target="_blank">
  								<img src="Image/quangodilen.jpg" alt="quangodilen" class="img-circle" style="width: 100%">
  							</a>
  						</div>
  					</div>
  					<div class="col-sm-6">
  						<div class="caption">
  							<p>Quán gò đi lên, đây là một trong những cuốn sach bán chạy nhất, đồng thời cũng là một trong những cuốn sách hay nhất của Nguyễn Nhật Ánh</p>
  						</div>
  					</div>	
  				</div>
				<hr>
  				<div class="row ">
  					<div class="col-sm-6">
  						<div class="thumbnail" style="width: 100%">
  							<a href="Image/cochutgidenho.jpg" target="_blank">
  								<img src="Image/cochutgidenho.jpg" alt="Có chút gì để nhớ" class="img-circle" style="width: 100%">
  							</a>
  						</div>
  					</div>
  					<div class="col-sm-6">
  						<div class="caption">
  							<p>Đây là một trong những cuốn sach bán chạy nhất, đồng thời cũng là một trong những cuốn sách hay nhất của Nguyễn Nhật Ánh</p>
  						</div>
  					</div>	
  				</div>
  			</div>

			</div>
			<!-- end right body -->
		</div>
		<!-- start footer-->
		<nav class="navbar navbar-inverse">
			<div class="row">
				<div class="col-sm-6" style="color: white" align="center">
					<h3>Ngũ sách</h3>
					<p>that a</p>
					<p>that b</p>
					<p>that c</p>
				</div>
				<div class="col-sm-6" style="color: white" align="center">
					<h3>Ngũ kinh</h3>
					<p>that a</p>
					<p>that b</p>
					<p>that c</p>
				</div>
			</div>
		</nav>
	</div>
</body>
</html>