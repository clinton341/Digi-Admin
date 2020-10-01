<?php
if(isset($_POST['update'])){
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'dsadmin');


//URL
define('URLROOT', 'http://localhost/quickie');


//APP URL
define('APPROOT', dirname(__FILE__));


require_once 'process/function.php';


//make database connection
$objDB = objDB();
//Main errors array
    $errors = array();
   //get values & sanitize them
    $db_id = filter_input(INPUT_POST, 'db_id', FILTER_SANITIZE_STRING);
    $fname = filter_input(INPUT_POST, 'fname', FILTER_SANITIZE_STRING);
    $oname = filter_input(INPUT_POST, 'oname', FILTER_SANITIZE_STRING);
    $lname = filter_input(INPUT_POST, 'lname', FILTER_SANITIZE_STRING);
    $country = filter_input(INPUT_POST, 'country', FILTER_SANITIZE_STRING);
    $gender = filter_input(INPUT_POST, 'gender', FILTER_SANITIZE_STRING);
    $bday = filter_input(INPUT_POST, 'bday', FILTER_SANITIZE_STRING);
    $medical = filter_input(INPUT_POST, 'medical', FILTER_SANITIZE_STRING);
    $med_details = filter_input(INPUT_POST, 'med_details', FILTER_SANITIZE_STRING);
    $gname = filter_input(INPUT_POST, 'gname', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
    $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);
    $city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING);
    $class = filter_input(INPUT_POST, 'class', FILTER_SANITIZE_STRING);

//email
    $reg_email = '/^[a-z0-9]+(\.|_)?[a-z0-9]+@[a-z0-9]+(.com|.net|.org|.me)$/i'; 
    if(!preg_match($reg_email, $email)){
        $errors['email_err'] = 'Entered email is invalid';
    }

     if(!count($errors)){
        $date =time();
        $time = date('M jS, Y', $date);
        $image = 'default.png';
        $status = 'Active';

        //Store new data in database
         $sql= "UPDATE students
         SET first_name='$fname',
         mid_name='$oname',
         last_name='$lname',
         country='$country',
         gender='$gender',
         age='$bday',
         med_con='$medical',
         medcon_det='$med_details',
         guardian_name='$gname',
         guardian_phone='$phone',
         guardian_email='$email',
         res_address='$city',
         student_class='$class'
         WHERE student_id = '$db_id'";

         $stmt = $objDB->prepare($sql);
         if($stmt->execute()){
           setMsg('onpoint', 'updated successfully ', 'success');
            redirect('student_portal.php?id=8&student_id='.$db_id.'');
         } else{  $error = $objDB->errno . ' ' . $objDB->error;
              echo $error;
              exit();
          }

} else{

    $data = [
        'username' => $username,
        'email' => $email,
        'password' => $password,
        'confirm_password' => $confirm_password,
    ];
    setMsg('form_data', $data);
    setMsg('errors', $errors); 
} 
}
?>
<div class="register" style="width: 100%;">
<form action="student_form.php" method="post">

        <span class="invalid-feedback">Student ID :<input style="border: none;background: inherit; width: 30%; font-size: inherit; display: inline;" type="text" placeholder="Student ID" name="db_id" value="<?php echo $id;?>" required>
      </span>
        <span class="invalid-feedback"><?php if (isset($err['firstname_err'])) { echo($err['firstname_err']); } ?></span>
		    <input type="text" placeholder="<?php echo $first_name; ?>" name="fname" value="<?php echo $first_name; ?>" required>

		    <span class="invalid-feedback"><?php if (isset($err['lastname_err'])) { echo($err['lastname_err']); } ?></span>
		    <input type="text" placeholder="<?php echo $mid_name ; ?>" name="oname" value="<?php echo $mid_name ; ?>" required>

		    <span class="invalid-feedback"><?php if (isset($err['lastname_err'])) { echo($err['lastname_err']); } ?></span>
		    <input type="text" placeholder="<?php echo $last_name; ?>" name="lname" value="<?php echo $last_name; ?>" required>

		    <div class="select" style="clear: both;">
		    <span class="invalid-feedback"><?php if (isset($err['country_err'])) { echo($err['country_err']); } ?></span> 
				<select name="country">
							<option><?php echo $country_db; ?></option>
							<option>Student Nationality</option>
							<option>Equatorial Guinea</option>
							<option>Spain</option>
							<option>France</option>
							<option>Ghana</option>
							<option>Nigeria</option>
				</select>
		   </div>

		    <div class="select">
		      <span class="invalid-feedback"><?php if (isset($err['country_err'])) { echo($err['country_err']); } ?></span> 
				<select name="gender">
							<option><?php echo $gender_db; ?></option> 
							<option>Gender</option>
							<option>Male</option>
							<option>Female</option>
				</select>
		   </div>

		   	<span style="font-size: 12px; color: #565656;">&nbsp;Date of Birth: <?php echo $age; ?></span>
		    <input type="date" name="bday" placeholder="Date of birth" value="<?php echo $age; ?>" required style="width: 100%; border-radius: 0; padding: 6px 10px;">

		   	<div class="select">
		      <span class="invalid-feedback"><?php if (isset($err['country_err'])) { echo($err['country_err']); } ?></span> 
				<select name="medical">
							<option><?php echo $med_con; ?></option>
							<option>Any Medical Condition?</option>
							<option>Yes</option>
							<option>No</option>
				</select>
		   </div>

		  <div>
      	  <span class="invalid-feedback"><?php if (isset($err['product_details_err'])) { echo '<br>'.($err['product_details_err']); } ?></span>
      	  <textarea name="med_details" rows="5" cols="25" class="textarea" placeholder="If Yes, Enter The Medical Condition. If No, Please Leave Empty..."><?php echo $medcon_det; ?> </textarea>
      	  </div>

      	  	<h5>Guardian or Sponsor's Data</h5>
            <span class="invalid-feedback"><?php if (isset($err['firstname_err'])) { echo($err['firstname_err']); } ?></span>
		    <input type="text" placeholder="Guardian Name" name="gname" value="<?php echo $guardian_name; ?>" required>

		    <span class="invalid-feedback"><?php if (isset($err['email_err'])) { echo($err['email_err']); } ?></span>
		    <input type="email" placeholder="Guardian Email address" name="email" value="<?php echo $guardian_email; ?>" required>

		    <span class="invalid-feedback"><?php if (isset($err['phone_err'])) { echo($err['phone_err']); } ?></span>
		    <input type="phone" placeholder="Guardian Phone Number" value="<?php echo $guardian_phone; ?>" name="phone" required>
		   
		   	<span class="invalid-feedback"><?php if (isset($err['city_err'])) { echo($err['city_err']); } ?></span>
		   	<input type="text" placeholder="Residential Address" value="<?php echo $address; ?> " name="city" required></input>

		   	<h5>Academic Details</h5>
		  	<div class="select">
		      <span class="invalid-feedback"><?php if (isset($err['country_err'])) { echo($err['country_err']); } ?></span> 
				<select name="class">
							<option><?php echo $student_class; ?></option>
							<option>Select Class For Student</option>
							<?php
							  $sql = "SELECT * FROM classes";
							  $result = $objDB->query($sql);
							  if ($result->num_rows > 0) {
							    // output data of each row
							    while($row = $result->fetch_assoc()) {
							        $class_name = $row["class_name"]; 
							?>
							<option><?php echo ucfirst($class_name); ?></option>
						<?php } }else{?>
							<option>No Available Class</option>
						<?php } ?>
				</select>

			</div>

			<button type="submit" name="update">Update Info</button>
</form>
</div>