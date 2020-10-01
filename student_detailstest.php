<?php 
if (isset($_GET['student_id'])) {
	$id = $_GET['student_id'];

	getStudentById($id);
    $first_name = ucfirst($row["first_name"]);
    $mid_name = ucfirst($row["mid_name"]);
    $last_name = ucfirst($row["last_name"]);
    $gender_db = ucfirst($row["gender"]);
    $country_db= ucfirst($row["country"]);
    $age = $row["age"];
    $med_con = $row["med_con"];
    $medcon_det = ucfirst($row["medcon_det"]);
    $guardian_name = ucfirst($row["guardian_name"]);
    $guardian_phone = $row["guardian_phone"];
    $guardian_email = $row["guardian_email"];
    $address = ucfirst($row["res_address"]);
    $student_class= ucfirst($row["student_class"]);
    $db_id = $row['student_id'];
} 
?>
<div class="register">
      <div class="container" style="width: inherit;"> 
          <?php   
              echo getMsg('onpoint');
            echo getMsg('errors'); 
           ?>
      </div>
	<div class="image"><img src="img/default.png" style="width: 100%"></div>
	<div class="personal_data"><p><span style="color: green;">Student Id: </span><?php echo $id; ?><span style="float: right;">Class: <?php echo $student_class; ?></span> </p>
		<h2><?php echo $first_name.' ' .$mid_name.' ' .$last_name; ?></h2>
		<p><span class="span">Country: </span><?php echo $country_db; ?> </p>
		<p><span class="span">Gender: </span><?php echo $gender_db; ?> </p>
		<p><span class="span">Birthday:  </span><?php echo $age; ?> </p>
	</div>
	<div class="other_data">
		<p><span class="span">Medical Condition: </span><?php echo $med_con; ?> </p>
		<p><span class="span">Medical Condition Details: </span><?php echo $medcon_det; ?> </p>
		<p><span class="span">Guardian:  </span><?php echo $guardian_name; ?> </p>
		<p><span class="span">Guardian's Phone:  </span><?php echo $guardian_phone; ?> </p>
		<p><span class="span">Guardian's Email:  </span><?php echo $guardian_email; ?> </p>
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
          <h4 class="modal-title">Edit Student Data</h4>
        </div>
        <div class="modal-body">
          <?php include 'student_form.php'; ?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
   <script src="js/jquery-3.5.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>
