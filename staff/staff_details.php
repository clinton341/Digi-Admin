<?php 
if (isset($_GET['staff_id'])) {
	$id = $_GET['staff_id'];

	getStaffById($id);
    $first_name = ucfirst($row["first_name"]);
    $mid_name = ucfirst($row["mid_name"]);
    $last_name = ucfirst($row["last_name"]);
    $gender = ucfirst($row["gender"]);
    $country= ucfirst($row["country"]);
    $age = $row["age"];
    $job_desc = $row["job_desc"];
    $job_status = ucfirst($row["job_status"]);
    $eday = ucfirst($row["employ_date"]);
    $salary = $row["salary"];
    $phone = $row["phone"];
    $email = $row["email"];
    $address = ucfirst($row["res_add"]);
    $db_id = $row["staff_id"];
} 
?>
<div class="register">
	<div class="image"><img src="../img/default.png" style="width: 100%"></div>
	<div class="personal_data"><p><span style="color: green;">Staff Id: </span><?php echo $id; ?> </p>
		<h2><?php echo $first_name.' ' .$mid_name.' ' .$last_name; ?></h2>
		<p><span class="span">Country: </span><?php echo $country; ?> </p>
		<p><span class="span">Gender: </span><?php echo $gender; ?> </p>
		<p><span class="span">Birthday:  </span><?php echo $age; ?> </p>
	</div>
	<div class="other_data">
		<p><span class="span">Job Status: </span><?php echo $job_status; ?> </p>
		<p><span class="span">Job Description: </span><?php echo $job_desc; ?> </p>
		<p><span class="span">Date of Employment:  </span><?php echo $eday; ?> </p>
		<p><span class="span">Salary:  </span><?php echo $salary; ?> </p>
		<p><span class="span">Email Address:  </span><?php echo $email; ?> </p>
		<p><span class="span">Phone Number:  </span><?php echo $phone; ?> </p>
		<p><span class="span">Residential Address:  </span><?php echo $address; ?> </p>
	</div>
	<div class="st_link"><a data-toggle="modal" data-target="#myModal" style="cursor: pointer;">Edit</a>
</div>

</div>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Staff Data</h4>
        </div>
        <div class="modal-body">
          <?php include 'staff_form.php'; ?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
   <script src="../js/jquery-3.5.1.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
</body>
</html>
