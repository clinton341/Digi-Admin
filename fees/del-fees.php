<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../styles/styles.css" media="all">
  <title>Delete Fee Records</title>
</head>
<body>
<?php include 'logo.php'; ?>
<div class="container">
  <div class="search-view">
        <form action="#">
          <p><input type="text" placeholder="&nbsp;Search Fee" name="search">
            <button type="submit">Search</button><a id="back" href="fees.php"><img id="img" src="../images/pointer_left.jpg" width="20px" height="20px;">Back </a>
          </p>
        </form>
  </div>
<div class="table_student">
<h2>Delete Fee Records
</h2>
<table>
  <tr>
  <th>ID</th>
  <th>Fee</th>
  <th>Amount</th>
    <th>&nbsp;&nbsp;&nbsp;Action</th>
  </tr>
  <tr>
    <td>0025</td>
    <td>School Fee</td>
    <td>320 000</td>
    <td>&nbsp;&nbsp;&nbsp;<a href="#" style="color: red;"> Delete</a></td>
  </tr>
   <tr>
    <td>0025</td>
    <td>Sports Fee</td>
    <td>32 000</td>
    <td>&nbsp;&nbsp;&nbsp;<a href="#" style="color: red;"> Delete</a></td>
  </tr>
</table>
</div>
<div class="bottomnav"><a href="fees.php" >Back</a></div>
</div>
<div class="footer"><p>Powered by Zuu Systems  &copy; Copyright 2019</p></div>
</body>
</html>