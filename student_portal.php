<?php
	include 'process/config.php';

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
//Store them into database

        $stmt = $objDB->prepare(
        'INSERT INTO students(first_name, mid_name, last_name, country, gender, age, med_con, medcon_det, guardian_name,guardian_phone, guardian_email, res_address, student_class, status,reg_date) 
         VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)'
    );

    
   $stmt->bind_param('sssssssssssssss', $fname, $oname, $lname, $country, $gender, $bday, $medical, $med_details, $gname, $phone, $email, $city, $class, $status, $time);

    if($stmt->execute()){
            setMsg('newstudent', 'The student has be registered successfully ', 'success');
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
    redirect('register.php'); 
} 
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Digi Admin</title>
	<link rel="stylesheet" href="css/css/bootstrap.min.css" media="all">
	<link rel="stylesheet" href="css/main.css" media="all">
	<link rel="stylesheet" href="css/css/all.css" media="all">
	<script src="js/bootstrap.min.js"></script>
</head>
<body style="overflow-x: hidden;">
	<nav class="navbar">
		<div class="row">
			<div class="col-sm-2" style="padding-bottom: 10px;">
				<a href="home.php" style="text-decoration: none;"><i class="fas fa-university" style="font-size:65px; color: #1E90FF; margin-left: 15%;">
 					</i><span style="font-family:courier,arial,helvetica; font-size: 20px;  color: #1E90FF;">Digi Admin</span>
 				</a>
			</div>
		<div class="col-sm-10" style="padding-left: 6%;">
			<a href="student_portal.php" class="portal-link" style="text-decoration: none;"> 		
				<i class="fas fa-user-graduate" style="font-size:30px;color:#EE922F;"></i> 
				<p class="link"> Students</p>
			</a>
			<a href="staff/staff_portal.php" class="portal-link" style="text-decoration: none;">
				<i class="fas fa-user-tie" style="font-size: 30px;color:#778899;"></i>
				<p class="link"> Staff</p>
			</a>
			<a href="library/library.php" class="portal-link" style="text-decoration: none;">
		      <i class="fas fa-book-reader" style="font-size: 30px;color:#4B0082;"></i> 
		      <p class="link"> Library</p>
	  		</a>
	  		<a href="fees/fees.php" class="portal-link" style="text-decoration: none;">
			 <i class="fas fa-money-bill-wave" style="font-size: 30px;color:#228B22;"></i> 
			 <p class="link">Fees</p>
			</a>
			<a href="finances/finances.php" class="portal-link" style="text-decoration: none;">
				<i class="fas fa-chart-line" style="font-size:30px; color: #2DC413;"></i>
				<p class="link">Finances</p>
			</a>
			<a href="visitors/visitors.php" class="portal-link" style="text-decoration: none;">
				<i class="fas fa-user-edit" style="font-size:30px;color:#4D59E1; "></i> 
				<p class="link"> Visitor Log</p>
			</a>

		<a href="classes/classes.php" class="portal-link" style="text-decoration: none;">
		<i class="fas fa-chalkboard-teacher" style="font-size: 30px;color:#2F4F4F;"></i>
		<p class="link"> Classes</p>
		</a>

	</div>	
	</div>
</nav>
<div class="container-fluid portal">
		<div class="row">
			<div class="col-sm-2" style="border-right:1px solid #ddd; height: 100vh; padding: 0;">
				<ul class="nav nav-pills nav-stacked">
					<li class="link">
					<a href="student_portal.php" class="dropdown-btn" style="color: #2F4F4F;"><i class="fas fa-user-graduate" style="font-size:30px;color:#EE922F;"></i> Student Management</a>
					</li>

					<li class="link">
						<a href="student_portal.php?id=1"><i class="fas fa-user-edit" style="font-size:24px;"></i> Enroll New Student</a>
					</li>
					<li class="link">
						<a href="student_portal.php?id=2"><i class="fas fa-money-bill-wave" style="font-size:24px;"></i> View All Students</a>
					</li>
				</ul>
			</div>
			<div class="col-sm-10">
				<div class="container"> 
					<?php   
					    echo getMsg('newstudent');
					    echo getMsg('delete');
					 	echo getMsg('errors'); 
					 ?>
				</div>
			<?php
				if (isset($_GET['id'])) {
						$id = $_GET['id'];
				if (isset($_GET['student_id'])) {
					$student_id =$_GET['student_id'];
				}
						switch ($id) {
					    case 1:
					        include 'new_studenttest.php';
					        break;
					    case 2:
					        include 'all_students.php';
					        break;
					    case 8:
			       			include 'student_detailstest.php';
			        		break;
					    default:
					        echo "Nothing to see here!";
						}			
					}else {?>

			<div class="wrapper">
				<h2 id="wrapper_head">Student Portal.Click on the links on the left to select an option.</h2>
				<div class="menu">
					<p id="menu_head">Academic Year</p>
					<p id="menu_sub"><?php       
					 $date =time();
        			 $time = date('Y', $date); 
        			 echo $time;
        			?></p>
				</div>
				<div class="menu">
					<p id="menu_head">Total No. of students</p>
					<p id="menu_sub">
						 <?php
							  $sql = "SELECT * FROM students";
							  $result = $objDB->query($sql);
							  $total = $result->num_rows;
							  echo $total;

							?></p>
				</div>

			</div>

<?php }	?>

			

			</div>
			</div>
</div>
</body>
</html>