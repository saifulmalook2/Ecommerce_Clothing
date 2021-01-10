<?php

	session_start();
	include "pm_authCheck.php"

	if(isset($_GET['pid']))
	{
		$sql_statement = "SELECT P.*, C.Name AS categoryName FROM product P, category C WHERE pid='" . $_GET['pid'] . "'";

		$result = mysqli_query($db, $sql_statement);

		if($row['isDeleted'] == 0)
		{
			$categoryName = $row['categoryName'];
			$pid = $row['pid'];
			$PMid = $row['PMid'];
			$Name = $row['Name'];
			$Price = $row['Price'];
			$Quantity = $row['Quantity'];
			$Size = $row['Size'];
			$Picture = $row['Picture'];
		}
	}


?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>Hulu - Store for Women</title>

 		<!-- Google font -->
 		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

 		<!-- Bootstrap -->
 		<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>

 		<!-- Slick -->
 		<link type="text/css" rel="stylesheet" href="css/slick.css"/>
 		<link type="text/css" rel="stylesheet" href="css/slick-theme.css"/>

 		<!-- nouislider -->
 		<link type="text/css" rel="stylesheet" href="css/nouislider.min.css"/>

 		<!-- Font Awesome Icon -->
 		<link rel="stylesheet" href="css/font-awesome.min.css">

 		<!-- Custom stlylesheet -->
 		<link type="text/css" rel="stylesheet" href="css/style.css"/>

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

    </head>
	<body>
		<!-- HEADER -->
		<header>
			<!-- TOP HEADER -->
			<div id="top-header">
				<div class="container">
					<ul class="header-links pull-left">
						<li><a href="#"></i> Product Manager Dashboard</a></li>
					</ul>
					<ul class="header-links pull-right">
						<li><a href="./pm_profile.php"><i class="fa fa-user-o"></i> My Account</a></li>
						<?php if($_SESSION['authorized'])
									{
										?>
										<li><a href="pm_logOut.php">Log Out</a></li>
								<?php	} ?>
					</ul>
				</div>
			</div>
			<!-- /TOP HEADER -->

			<!-- MAIN HEADER -->
			<div id="header">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<!-- LOGO -->
						<div class="col-md-3">
							<div class="header-logo">
								<a href="#" class="logo">
									<img src="./img/hulu.png" alt="" width="300px" height="100px">
								</a>
							</div>
						</div>
						<!-- /LOGO -->

						<!-- ACCOUNT -->
						<div class="col-md-3 clearfix">
							<div class="header-ctn">
								
								<!-- Menu Toogle -->
								<div class="menu-toggle">
									<a href="#">
										<i class="fa fa-bars"></i>
										<span>Menu</span>
									</a>
								</div>
								<!-- /Menu Toogle -->
							</div>
						</div>
						<!-- /ACCOUNT -->
					</div>
					<!-- row -->
				</div>
				<!-- container -->
			</div>
			<!-- /MAIN HEADER -->
		</header>
		<!-- /HEADER -->

		<!-- NAVIGATION -->
		<nav id="navigation">
			<!-- container -->
			<div class="container">
				<!-- responsive-nav -->
				<div id="responsive-nav">
					<!-- NAV -->
					<ul class="main-nav nav navbar-nav">
						<li ><a href="#">Home</a></li>
						<li class="active"><a href="#">Add Product</a></li>
						<li><a href="./displayProduct.php">Product</a></li>
					</ul>
					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->
			</div>
			<!-- /container -->
		</nav>
		<!-- /NAVIGATION -->

		<!-- BREADCRUMB -->
		<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<ul class="breadcrumb-tree">
							<li><a href="#">Home</a></li>
							<li><a href="#">Products</a></li>
							<li class="active">Add</li>
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /BREADCRUMB -->

		<!-- FORM-->
		<div>
			<div class="container">
		<form action="pm_addProduct.php" method="POST" enctype="multipart/form-data">
			<div class="form-group">
			  <label for="exampleFormControlInput1">Name</label>
			  <input type="text" class="form-control" id="exampleFormControlInput1" name="Name" value="<?php echo $row['Name']; ?>">
			</div>
			<div class="form-group">
				<label for="exampleFormControlInput2">Price</label>
				<input type="text" class="form-control" id="exampleFormControlInput2" name="Price" value="<?php echo $row['Price']; ?>">
			</div>
			<div class="form-group">
				<label for="exampleFormControlInput3">Quantity</label>
				<input type="text" class="form-control" id="exampleFormControlInput3" name="Quantity" value="<?php echo $row['Quantity']; ?>">
			</div>
			<div class="form-group">
				<label for="exampleFormControlInput3">Size</label>
				<input type="text" class="form-control" id="exampleFormControlInput3" name="Size" value="<?php echo $row['Size']; ?>">
			</div>
			<div class="form-group">
				<label for="exampleFormControlInput3">Category</label>
				<input type="text" class="form-control" id="exampleFormControlInput3" value="<?php echo $row['categoryName']; ?>">
			</div>
			<div>
				<p>Choose required category before submitting:</p>
			</div>
			<?php 
			include "getCategory.php"; 
			?>
			
			<div class="form-group">
				<input type="file" id="Picture" name="Picture">
			</div>
			<div class="form-group">
  				<input type="submit" name="upload" value="Submit" >
			</div>
		  </form>
		</div>
	</div>

		<!-- FORM-->

		<!-- FOOTER -->
		<footer id="footer">
			<!-- top footer -->
			<div class="section">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">About Us</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut.</p>
								<ul class="footer-links">
									<li><a href="#"><i class="fa fa-map-marker"></i>1734 Stonecoal Road</a></li>
									<li><a href="#"><i class="fa fa-phone"></i>+021-95-51-84</a></li>
									<li><a href="#"><i class="fa fa-envelope-o"></i>email@email.com</a></li>
								</ul>
							</div>
						</div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Categories</h3>
								<ul class="footer-links">
								</ul>
							</div>
						</div>

						<div class="clearfix visible-xs"></div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Information</h3>
								<ul class="footer-links">
									<li><a href="#">About Us</a></li>
									<li><a href="#">Contact Us</a></li>
									<li><a href="#">Privacy Policy</a></li>
									<li><a href="#">Orders and Returns</a></li>
									<li><a href="#">Terms & Conditions</a></li>
								</ul>
							</div>
						</div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Service</h3>
								<ul class="footer-links">
									<li><a href="#">My Account</a></li>
									<?php if($_SESSION['authorized'])
									{
										?>
										<li><a href="pm_logOut.php">Log Out</a></li>
								<?php	} ?>
								</ul>
							</div>
						</div>
					</div>
					<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /top footer -->

			<!-- bottom footer -->
			<div id="bottom-footer" class="section">
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-md-12 text-center">
							<span class="copyright">
								<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
								Copyright &copy;<script>document.write(new Date().getFullYear());</script> 
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
							</span>
						</div>
					</div>
						<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /bottom footer -->
		</footer>
		<!-- /FOOTER -->

		<!-- jQuery Plugins -->
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/slick.min.js"></script>
		<script src="js/nouislider.min.js"></script>
		<script src="js/jquery.zoom.min.js"></script>
		<script src="js/main.js"></script>

	</body>
</html>