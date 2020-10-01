<?php
	include '../header.php';

	if(isset($_POST['register'])){

//Main errors array
    $errors = array();
   //get values & sanitize them
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
     	$status ='Active';
//Store them into database

        $stmt = $objDB->prepare(
        'INSERT INTO staff(first_name, mid_name, last_name, country, gender, age, employ_date, job_status, job_desc, salary, phone, email, res_add, status) 
         VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)'
    );

    
   		$stmt->bind_param('ssssssssssssss', $fname, $oname, $lname, $country, $gender, $bday, $eday, $job_status, $job_desc, $salary, $phone, $email, $city, $status);

	    if($stmt->execute()){
	            setMsg('newstaff', 'The staff has be registered successfully ', 'success');
	    }else{  $error = $objDB->errno . ' ' . $objDB->error;
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


<div class="container-fluid portal">
		<div class="row">
			<div class="col-sm-2" style="border-right:1px solid #ddd; height: 100vh; padding: 0;">
				<ul class="nav nav-pills nav-stacked">
					<li><a href="staff_portal.php" style="color: #2F4F4F;"><i class="fas fa-user-tie" style="font-size: 30px;color:#778899;"></i> Staff Management</a></li>
					<li class="link"><a href="staff_portal.php?id=1">Add New Staff</a></li>
					<li class="link"><a href="staff_portal.php?id=2">View All Staff</a></li>
					<li class="link"><a href="staff_portal.php?id=3">Teaching Staff</a></li>
					<li class="link"><a href="staff_portal.php?id=4">Non-Teaching Staff</a></li>
				</ul>
			</div>
			<div class="col-sm-10">
				<div class="container"> 
					<?php  
						 echo getMsg('staff'); 
					    echo getMsg('newstaff');
					     echo getMsg('delete');
					 	echo getMsg('errors'); 
					 ?>
				</div>
	<?php
		if (isset($_GET['id'])) {
				$id = $_GET['id'];
		if (isset($_GET['staff_id'])) {
			$student_id =$_GET['staff_id'];
		}
				switch ($id) {
			    case 1:
			        include 'new_staff.php';
			        break;
			    case 2:
			        include 'all_staff.php';
			        break;
			    case 3:
			       include 'teachingstaff.php';
			        break;
			    case 4:
			       include 'non_teachingstaff.php';
			        break;
			    case 8:
			       include 'staff_details.php';
			        break;
			    default:
			        echo "Nothing to see here!";
				}			
		}else {?>
			<div class="wrapper">
				<h2 id="wrapper_head">Staff Management. Click on the links on the left to select an option.</h2>
				<div class="menu">
					<p id="menu_head">Academic Year</p>
					<p id="menu_sub"><?php       
					 $date =time();
        			 $time = date('Y', $date); 
        			 echo $time;
        			?></p>
				</div>
				<div class="menu">
					<p id="menu_head">Total Number of staff</p>
					<p id="menu_sub">							<?php
							  $sql = "SELECT * FROM staff";
							  $result = $objDB->query($sql);
							  $total = $result->num_rows;
							  echo $total;

							?>
					</p>
				</div>

			</div>

<?php }	?>


			</div>
			</div>
</div>

	
	

</body>
</html>