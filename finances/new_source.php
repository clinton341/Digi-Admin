<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../styles/styles.css" media="all">
<title>Create Income Source</title>
</head>
<body>
<?php include 'logo.php'; ?>
<div class="container">
	<div class="heading">
		<h1>Create Income Source<a id="back" href="classes.php"><img id="img" src="../images/pointer_left.jpg" width="20px" height="20px;">Back</a></h1>
	</div>
<div class="login">
<form action="#" method="post">
      <p id="subHeading">Complete the form to register a source of income <span style="font-size: 11px; color: red;">(All fields are required)</span></p>
             <!-- Display Error Message-->
             <?php //require_once 'includes/error_display.php'; ?>

            <span class="invalid-feedback"><?php if (isset($err['firstname_err'])) { echo($err['firstname_err']); } ?></span>
		    <input type="text" placeholder="Name of Income Source" name="fname" required>
		    
		    <span class="invalid-feedback"><?php if (isset($err['confirm_password_err'])) { echo($err['confirm_password_err']); } ?></span>
		    <input type="text" placeholder="Amount" name="amount" required>
		    
		    <button type="submit" name="register">Create</button>
</form>
</div>

</div>
<div class="footer"><p>Powered by Zuu Systems  &copy; Copyright 2019</p></div>
</body>
</html>
