<!DOCTYPE html>
<html>
<head>
	<title>Digi Admin</title>
	<link rel="stylesheet" href="css/bootstrap.min.css" media="all">
	<link rel="stylesheet" href="css/main.css" media="all">
	<script src="js/bootstrap.min.js"></script>
</head>
<body>
<div class="container-fluid main">
	<div class="card center" style="width: 40%;height: 50%; border: 1px solid #C0C0C0; margin:10% auto; color: #ddd;">
	  <h2 class="text-center" style="color: #C0C0C0;font-family:courier,arial,helvetica; font-size: 25px; margin-top: 5%;">
	  	Account Verification
	  </h2>
	  <form class="form" action="login.php" method="post">
	    <div class="form-group">
	      <label for="username">Username:</label>
	      <input type="username" class="form-control" id="username" placeholder="Enter username" name="username">
	    </div>
	    <div class="form-group">
	      <label for="pwd">Password:</label>
	      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
	    </div>
	    <div class="checkbox">
	      <label><input type="checkbox" name="remember"> Keep me logged in</label>
	    </div>
	   <h2 class="text-center" style="color: #C0C0C0;font-family:courier,arial,helvetica;margin-top: 3%;">
	    <button type="submit" name="submit" style="text-decoration: none; padding: 1%; border: 1px solid #ddd; color: #C0C0C0; background-color: inherit; ">Enter</button>
		</h2>
	  </form>
	</div>
	</div>
</div>
</body>
</html>