<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../styles/styles.css" media="all">
	<title>Staff Portal</title>
</head>
<body>
<?php include 'logo.php'; ?>
<div class="container">
	<div class="dashboard">
	<h2>Staff Management <a href="home.php" id="back"><img id="img" src="../images/pointer_left.jpg" width="20px" height="20px;"> Back</a></h2>
		   <div class="search-container">
		    <form action="#">
		    <p>  <input type="text" placeholder="&nbsp;Search Staff by Firstname or Lastname" name="search">
		      <button type="submit">Search</button></p>
		    </form>
		  </div>
			<ul>
				<li><a href="new_staff.php">Add New Staff</a></li>
				<li><a href="all_staff.php">View All Staff</a></li>
				<li><a href="teachingstaff.php">Teaching Staff</a></li>
				<li><a href="non_teachingstaff.php" style="font-size:14px;">Non-Teaching Staff</a></li>
			</ul>
	</div>
</div>
<div class="footer"><p>Powered by Zuu Systems  &copy; Copyright 2019</p></div>
</body>
</html>