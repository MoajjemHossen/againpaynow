<?php require_once ( "functions.php" ); 

 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?= $page_title ?></title>
	<link rel="stylesheet" type="text/css" href="<?=site_url('assets/bootstrap/css/bootstrap.min.css')?>">
	<link rel="stylesheet" href="<?=site_url('assets/css/style.css')?>">
</head>
<body>

	<header id="header" class="wrap_header">
		<div class="wraper_header">
				<nav class="navbar navbar-expand-lg navbar-light bg-light">
					<div class="container-fluid">
					<a class="navbar-brand" href="">payNow</a>
					<button class="navbar-toggler" type="button" data-bs-toggle="collapse"
					data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
					aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					<li class="nav-item">
					<a class="nav-link active" aria-current="page" href="?home">Home</a>
					</li>
					
					<li class="nav-item">
					<a class="nav-link" href="?contact">Contact</a>
					</li>
					


					<?php 

						if (isset($_SESSION['authorization'])) {
					?>

					<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="?profile" id="navbarDropdown" role="button"
					data-bs-toggle="dropdown" aria-expanded="false">
					Profile
					</a>
					<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
					<li><a class="dropdown-item" href="#">Action</a></li>
					<li><a class="dropdown-item" href="#">Another action</a></li>
					<li><hr class="dropdown-divider"></li>
					<li class="nav-item"><a class="nav-link" href="assets/inc/process.php?logout" title=""><input type="submit" name="" value="Logout"></a></li>
					</ul>
					</li>

					


					<?php
						}else{


					?>
					<li class="nav-item">
					<a class="nav-link" href="?login">Login</a>
					</li>
					<li class="nav-item">
					<a class="nav-link" href="?registration">Sign Up</a>
					</li>

					<?php		
						}

					 ?>



					</ul>

					</div>
					</div>
					</nav>
			
		</div>
	</header><!-- /header -->


