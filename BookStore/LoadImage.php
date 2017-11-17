<?php require_once("ConnectDB.php"); ?>
<?php session_start(); ?>
<?php 

	if (isset($_GET['next'])) {

	}else if(isset($_GET['next'])){

	}else{	
						$sql =  " SELECT *  
							FROM bookstore.book 
							where book.ID >= 0 limit 9";
						$pre = mysqli_query($conn,$sql);
	 				?>
  				<div class="row">
  					

  					<?php while ($data = mysqli_fetch_array($pre)) {
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
    					<li><a href="LoadImage.php?pre=1">Previous</a></li>
   						<li><a href="LoadImage.php?next=1">Next</a></li>
  					</ul>
  				</div>

	}
 ?>