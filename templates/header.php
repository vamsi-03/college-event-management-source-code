<?php

$server = 'http://' . $_SERVER['SERVER_NAME'] . '/events/';

$user_logged = false;

?>
<!DOCTYPE html>
<html>


	<head>
	<title>Event Management System</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

	<link rel="stylesheet" href="<?php echo $server; ?>css/style.css">
	<link rel="stylesheet" href="<?php echo $server; ?>css/style1.css">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
	<style type="text/css">
		body {
			font: 14px sans-serif;
		}

		.wrapper {
			width: 350px;
			padding: 20px;
		}
	</style>
</head>
<body>
	<header class="d-flex w-100">
		<nav class="navbar navbar-expand-lg w-100 bg-light">
			<div class="navbar-collapse collapse justify-content-between">
				<ul class="navbar-nav" id="navbar">
					<li class="nav-item active">
						<a class="nav-link text-dark" href="<?php echo $server; ?>home.php">College Event Management</a>
					</li>
					<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
						$user_logged = true;
					
						if ($_SESSION['role'] == 'admin') { ?>
							<li class="nav-item">
								<a class="nav-link text-dark" href="<?php echo $server; ?>components/event/view.php">Events</a></li>
					
								
						
					<?php }
						
				
					} ?>
					

				</ul>
				
				<ul class="navbar-nav">
						<form class="d-flex my-2 my-lg-0" action="<?php echo $server; ?>templates/searchForm.php" method="post">
							<input class="form-control mr-sm-2" type="text" name="term" aria-label="Search" required>
							<button type="submit" class="btn btn-primary m-2 my-sm-0" value="Submit" >Search</button>
						</form>
				</ul>
				<ul class="navbar-nav">
					

					<?php
					if ($user_logged) { ?>
						<li>
						<a class="nav-link btn btn-light text-black" href="<?php echo $server; ?>home1.php">Join Event</a>
						</li>
						
						<li class="nav-item mr-sm-2">
							<a class="nav-link btn btn-dark text-white" href="<?php echo $server; ?>components/user/logout.php"><span><i class="fa fa-sign-out text-white"></i></span>Sign Out</a>
						</li>
					
					<?php } else { ?>
						<li class="nav-item mr-sm-2">
							<a class="nav-link btn btn-primary text-white" href="<?php echo $server; ?>components/user/login.php"><span><i class="fa fa-sign-in text-white"></i></span> Sign In</a>
						</li>
					<?php } ?>
				</ul>
			</div>
		</nav>
	</header>

	<div class="container-fluid page-container">
