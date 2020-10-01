<!DOCTYPE html>
<html>
<head>
	<title>Digi Admin</title>
	<link rel="stylesheet" href="css/css/bootstrap.min.css" media="all">
	<link rel="stylesheet" href="css/main.css" media="all">
	<link rel="stylesheet" href="css/css/all.css" media="all">
	<script src="js/bootstrap.min.js"></script>
</head>
<body>
<div class="container-fluid home">
	<div class="card center" style="width: 80%; border: 1px solid #ddd; margin:5% auto;overflow: hidden;">
		<div class="row">
			<div class="col-sm-3" style="border-right:1px solid #ddd;padding: 0;">
 			<a href="home.php" style="text-decoration: none;"><i class="fas fa-university" style="font-size:65px; margin-bottom: 10px;margin-left:10%; color: #1E90FF;">
 			</i> <span style="font-family:courier,arial,helvetica; font-size: 30px;  color: #1E90FF;margin-bottom: 20px;"> Digi Admin</span></a>
				<ul class="nav nav-pills nav-stacked">
					<li class="link">
						<a href="visitors/visitors.php"><i class="fas fa-user-edit" style="font-size:24px;"></i> New Visitor</a>
					</li>
					<li class="link">
						<a href="fees/fees.php?id=2"><i class="fas fa-money-bill-wave" style="font-size:24px;"></i> Fee Payment</a>
					</li>
					<li class="link">
						<a href="student_portal.php?id=1"><i class="fas fa-graduation-cap" style="font-size:24px;"></i> Enroll New Student</a>
					</li>
					<li class="link">
						<a href="staff/staff_portal.php?id=1"><i class="fas fa-user-tie" style="font-size:24px;"></i> Register New Staff</a>
					</li>
					<li class="link"><a href="student_portal.php?id=2"><i class="fas fa-search" style="font-size:24px;"></i>Students Records</a></li>
					<li class="link"><a href="finances/finances.php?id=3">Enter Income Event</a></li>
					<li class="link"><a href="finances/finances.php?id=7">Enter Expense Event</a></li>
					<li class="link"><a href="finances/finances.php">Financial Summary</a></li>
				</ul>
			</div>
			<div class="col-sm-9 " style=" padding: 0;">
				<div class="card center" style="width: 80%; margin:8% auto;">
					<div class="row">
						<a href="student_portal.php"> <div class="col-sm-4 dashlink">		
						<i class="fas fa-user-graduate" style="font-size:40px;color:#EE922F; text-align: center; "></i> 
       						<p class="links"> Students</p>
						</div></a>

						<a href="staff/staff_portal.php"><div class="col-sm-4 dashlink">
							 <i class="fas fa-user-tie" style="font-size: 40px;color:#778899;"></i>
      						<p class="links"> Staff</p>
						</div></a>

						<a href="classes/classes.php"><div class="col-sm-4 dashlink">
						<i class="fas fa-chalkboard-teacher" style="font-size: 40px;color:#2F4F4F;"></i>
      					<p class="links"> Classes</p>
       					</div></a>
						  
     					<a href="library/library.php"><div class="col-sm-4 dashlink">
					      <i class="fas fa-book-reader" style="font-size: 40px;color:#4B0082;"></i> 
					      <p class="links"> Library</p>
					   </div></a>

						<a href="fees/fees.php"><div class="col-sm-4 dashlink">
							 <i class="fas fa-money-bill-wave" style="font-size: 40px;color:#228B22;"></i> 
       						<p class="links"> Fees</p>
						</div></a>

						<a href="finances/finances.php"><div class="col-sm-4 dashlink">
    						<i class="fas fa-chart-line" style="font-size: 40px; color: #2DC413;"></i>
      						<p class="links"> Finances</p>
						</div></a>

						<a href="visitors/visitors.php"><div class="col-sm-4 dashlink">
							 <i class="fas fa-user-edit" style="font-size:40px;color:#4D59E1; "></i> 
       						<p class="links"> Visitor Log</p>
						</div></a>
					</div>
					
				</div>
			</div>
		</div>

	</div>
</div>
</body>
</html>