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


require_once '../process/function.php';


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
   	$job_status = filter_input(INPUT_POST, 'job_status', FILTER_SANITIZE_STRING);
   	$job_desc = filter_input(INPUT_POST, 'job_desc', FILTER_SANITIZE_STRING);
   	$eday = filter_input(INPUT_POST, 'eday', FILTER_SANITIZE_STRING);
   	$salary = filter_input(INPUT_POST, 'salary', FILTER_SANITIZE_STRING);
   	$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
   	$phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);
   	$city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING);

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
         $sql= "UPDATE staff
         SET first_name='$fname',
         mid_name='$oname',
         last_name='$lname',
         country='$country',
         gender='$gender',
         age='$bday',
         employ_date='$eday',
         job_status='$job_status',
         job_desc='$job_desc ',
         salary='$salary',
         phone='$phone',
         email='$email',
         res_add='$city'
         WHERE staff_id = '$db_id'";

         $stmt = $objDB->prepare($sql);
         if($stmt->execute()){
           setMsg('staff', 'updated successfully ', 'success');
            redirect('staff/staff_portal.php?id=8&staff_id='.$db_id.'');
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
<form action="staff_form.php" method="post">
			<span class="invalid-feedback">Staff ID :<input style="border: none;background: inherit; width: 30%; font-size: inherit; display: inline;" type="text" placeholder="Student ID" name="db_id" value="<?php echo $id;?>" required>
      		</span>
            <span class="invalid-feedback"><?php if (isset($err['firstname_err'])) { echo($err['firstname_err']); } ?></span>
		    <input type="text" placeholder="Firstname" name="fname" value="<?php echo $first_name; ?>" required>
           

             <span class="invalid-feedback"><?php if (isset($err['lastname_err'])) { echo($err['lastname_err']); } ?></span>
		    <input type="text" placeholder="Middlename" name="oname" value="<?php echo $mid_name; ?>" required>

		    <span class="invalid-feedback"><?php if (isset($err['lastname_err'])) { echo($err['lastname_err']); } ?></span>
		    <input type="text" placeholder="Lastname" name="lname" value="<?php echo $last_name; ?>" required>

		    <div class="select">
		      <span class="invalid-feedback"><?php if (isset($err['country_err'])) { echo($err['country_err']); } ?></span> 
				<select name="country">
             <option><?php echo $country; ?></option>
							<option>Nationality</option>
							<option>Ghana</option>
							<option>Nigeria</option>
				</select>
		   </div>

		    <div class="select">
		      <span class="invalid-feedback"><?php if (isset($err['country_err'])) { echo($err['country_err']); } ?></span> 
				<select name="gender">
              <option><?php echo $gender; ?> </option>
							<option>Gender</option>
							<option>Male</option>
							<option>Female</option>
				</select>
		   </div>

		   	<span style="font-size: 12px; color: #565656;">&nbsp;Date of Birth: <?php echo $age; ?></span>
		    <input type="date" name="bday" placeholder="Date of birth" value="<?php echo $age; ?>" required style="width: 20%; border-radius: 0; padding: 6px 10px;">  <br>

		    <h5>Work Data</h5>

		   <div class="select">
		      <span class="invalid-feedback"><?php if (isset($err['job_err'])) { echo($err['job_err']); } ?></span> 
				<select name="job_status">
              <option><?php echo $job_status; ?></option>
							<option>Job Type</option>
							<option>Teaching staff</option>
							<option>Non-teaching staff</option>
				</select>
		   </div>

       <span style="font-size: 12px; color: #565656;">&nbsp;job Description </span>
		    <span class="invalid-feedback"><?php if (isset($err['lastname_err'])) { echo($err['lastname_err']); } ?></span>
		    <input type="text" placeholder="Job Description" name="job_desc" value="<?php echo $job_desc; ?>" required>

		     <span style="font-size: 12px; color: #565656;">&nbsp;Employment Date: <?php echo $eday; ?> </span>
		    <input type="date" name="eday" placeholder="Date of birth" value="<?php echo $eday; ?>" required style="width: 20%; border-radius: 0; padding: 6px 10px;">


		    <span style="font-size: 12px; color: #565656;">&nbsp;Salary </span>
		    <input type="number" placeholder="Salary Amount" value="<?php echo $salary; ?>" name="salary" required><br>

		    <h5 style="clear: both;">Contact Information</h5>

		    <span class="invalid-feedback"><?php if (isset($err['phone_err'])) { echo($err['phone_err']); } ?></span>
		    <input type="phone" placeholder="Phone Number" value="<?php echo $phone; ?>" name="phone" required>


		  	<span class="invalid-feedback"><?php if (isset($err['email_err'])) { echo($err['email_err']); } ?></span>
		    <input type="email" placeholder="Email address" name="email" value="<?php echo $email; ?>" required>

		 
		   	 <span class="invalid-feedback"><?php if (isset($err['city_err'])) { echo($err['city_err']); } ?></span>
		   	 <input type="text" placeholder="Residential Address" value="<?php echo $address; ?>" name="city"></input>
		 
		    
		    <button type="submit" name="update">Update record</button>		  
		  </div>
</form>
</div>
