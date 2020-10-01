<?php 
include 'process/config.php';
//	if (!isset($_SESSION['username'])) {
 //   	header("location: login.php");
 // 	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Digi Admin</title>
	<link rel="stylesheet" href="../css/css/bootstrap.min.css" media="all">
	<link rel="stylesheet" href="../css/main.css" media="all">
	<link rel="stylesheet" href="../css/css/all.css" media="all">
	<script src="js/bootstrap.min.js"></script>
</head>
<body style=" overflow-x: hidden;">
	<nav class="navbar">
		<div class="row">
			<div class="col-sm-2" style="padding-bottom: 10px;">
				<a href="<?php echo(URLROOT) ?>/home.php" style="text-decoration: none;"><i class="fas fa-university" style="font-size:65px; color: #1E90FF; margin-left: 15%;">
 					</i><span style="font-family:courier,arial,helvetica; font-size: 20px;  color: #1E90FF;">Digi Admin</span>
 				</a>
			</div>
		<div class="col-sm-10" style="padding-left: 6%;">
			<a href="<?php echo(URLROOT) ?>/student_portal.php" class="portal-link" style="text-decoration: none;"> 		
				<i class="fas fa-user-graduate" style="font-size:30px;color:#EE922F;"></i> 
				<p class="link"> Students</p>
			</a>
			<a href="<?php echo(URLROOT) ?>/staff/staff_portal.php" class="portal-link" style="text-decoration: none;">
				<i class="fas fa-user-tie" style="font-size: 30px;color:#778899;"></i>
				<p class="link"> Staff</p>
			</a>
			<a href="<?php echo(URLROOT) ?>/library/library.php" class="portal-link" style="text-decoration: none;">
		      <i class="fas fa-book-reader" style="font-size: 30px;color:#4B0082;"></i> 
		      <p class="link"> Library</p>
	  		</a>
	  		<a href="<?php echo(URLROOT) ?>/fees/fees.php" class="portal-link" style="text-decoration: none;">
			 <i class="fas fa-money-bill-wave" style="font-size: 30px;color:#228B22;"></i> 
			 <p class="link">Fees</p>
			</a>
			<a href="<?php echo(URLROOT) ?>/finances/finances.php" class="portal-link" style="text-decoration: none;">
				<i class="fas fa-chart-line" style="font-size:30px; color: #2DC413;"></i>
				<p class="link">Finances</p>
			</a>
			<a href="<?php echo(URLROOT) ?>/visitors/visitors.php" class="portal-link" style="text-decoration: none;">
				<i class="fas fa-user-edit" style="font-size:30px;color:#4D59E1; "></i> 
				<p class="link"> Visitor Log</p>
			</a>

		<a href="<?php echo(URLROOT) ?>/classes/classes.php" class="portal-link" style="text-decoration: none;">
		<i class="fas fa-chalkboard-teacher" style="font-size: 30px;color:#2F4F4F;"></i>
		<p class="link"> Classes</p>
		</a>

	</div>	
	</div>
</nav>