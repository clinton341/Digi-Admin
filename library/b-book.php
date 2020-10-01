<?php
	if(isset($_POST['register'])){

//Main errors array
    $errors = array();
   //get values & sanitize them
    $bname = filter_input(INPUT_POST, 'bname', FILTER_SANITIZE_STRING);
    $student = filter_input(INPUT_POST, 'student', FILTER_SANITIZE_STRING);
    $sid = filter_input(INPUT_POST, 'sid', FILTER_SANITIZE_STRING);
    $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);
    $address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
    $bid = filter_input(INPUT_POST, 'bid', FILTER_SANITIZE_STRING);
   	$dob = filter_input(INPUT_POST, 'dob', FILTER_SANITIZE_STRING);
   	$dor = filter_input(INPUT_POST, 'dor', FILTER_SANITIZE_STRING);

   	//confirm password
     if(empty($bname)){
        $bname = 'Unavailable';
     }

    if(empty($phone)){
        $phone = 'Unavailable';
     }

    if(empty($address)){
        $address = 'Unavailable';
     }


     if(!count($errors)){
     	$status = "Pending";
//Store them into database

        $stmt = $objDB->prepare(
        'INSERT INTO borrowed_books(book_id, student_borrower, student_id, borrower_name, borrower_phone, borrower_address, date_borrowed, return_date, status) 
         VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)'
    );

    
   $stmt->bind_param('isissssss', $bid, $student, $sid, $bname, $phone, $address, $dob, $dor, $status);

    if($stmt->execute()){
            setMsg('borrowsuccess', 'Book borrowing record saved successfully', 'success');
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
<div class="register">
<div class="heading" style="width: 60%;">
		<h4>Book Borrower Register</h4>
		<div class="container" style="width: inherit;"> 
	<?php   
	    echo getMsg('borrowsuccess');
	 	echo getMsg('errors'); 
	 ?>
	</div>
	</div>
<div class="register" style="padding: 3%;">
<form action="library.php?id=3" method="post">
		 <p id="subHeading">Please enter details to record book borrower<span style="font-size: 11px; color: red;">(All fields are required)</span></p>

             </p>
             <!-- Display Error Message-->
             <?php //require_once 'includes/error_display.php'; ?>

             <h3>Borrower Info</h3>

		    <div class="select">
		      <span class="invalid-feedback"><?php if (isset($err['country_err'])) { echo($err['country_err']); } ?></span>
		      <span class="info">Is Borrower a student of the school?</span><br> 
				<select name="student">
							<option>Select Yes or No</option>
							<option>Yes</option>
							<option>No</option>
				</select>
		   </div>

		    <span class="invalid-feedback"><?php if (isset($err['firstname_err'])) { echo($err['firstname_err']); } ?></span>
		    <input type="number" placeholder="Student ID" name="sid" value="<?php //echo($data['firstname']); ?>"><br>

		   <span class="info">If borrower is not a student of the school, please enter name, phone number and residential address</span>
		     <span class="invalid-feedback"><?php if (isset($err['firstname_err'])) { echo($err['firstname_err']); } ?></span>
		    <input type="text" placeholder="Borrower Name" name="bname" value="<?php //echo($data['firstname']); ?>" >

		    <span class="invalid-feedback"><?php if (isset($err['phone_err'])) { echo($err['phone_err']); } ?></span>
		    <input type="phone" placeholder="Borrower Phone Number" value="<?php //echo($data['phone']); ?>" name="phone" >

		    <span class="invalid-feedback"><?php if (isset($err['lastname_err'])) { echo($err['lastname_err']); } ?></span>
		    <input type="text" placeholder="Borrower Residential Address" name="address" value="<?php // echo($data['lastname']); ?>">

		     <h3>Book Info</h3>

		    <span class="invalid-feedback"><?php if (isset($err['lastname_err'])) { echo($err['lastname_err']); } ?></span>
		    <input type="text" placeholder="Book ID" name="bid" value="<?php // echo($data['lastname']); ?>" required>

		   	<h3>Borrowing Info</h3>

		   	<span style="font-size: 12px; color: #565656;">&nbsp;Date of Borrowing</span>
		    <input type="date" name="dob" placeholder="Date of borrow" required>


		   	<span style="font-size: 12px; color: #565656;">&nbsp;Date to be returned</span>
		    <input type="date" name="dor" placeholder="Date to be returned" required>

		    <button type="submit" name="register">Save</button>
		    
		  </div>
</form>
</div>
</div>
</body>
</html>
