<?php
	$vname = " ";
    $reason =  " ";
    $email = " ";
    $phone = " ";
	if(isset($_POST['register'])){

//Main errors array
    $errors = array();
   //get values & sanitize them
    $vname = filter_input(INPUT_POST, 'vname', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
    $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);
   	$reason = filter_input(INPUT_POST, 'reason', FILTER_SANITIZE_STRING);

     if(!count($errors)){
        $date =time();
        $time = date('M jS Y', $date);
        $status = "Active";
//Store them into database

        $stmt = $objDB->prepare(
        'INSERT INTO visitors(visitor_name, visitor_phone, visitor_email, visit_date, visit_reason, status) 
         VALUES(?, ?, ?, ?, ?, ?)'
    );

    
   $stmt->bind_param('ssssss',  $vname, $phone, $email, $time, $reason, $status);

    if($stmt->execute()){
            setMsg('vsuccess', 'Visitors log updated ', 'success');
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
<div class="register">
<form action="visitors.php?id=1" method="post">
		<h5 style="color: #565656;">Visitor's Entry </h5><br/>
			<div class="container" style="width: inherit;"> 
				<?php   
				    echo getMsg('vsuccess');
				 	echo getMsg('errors'); 
				 ?>
			</div>

		<div class="register" style="padding:3%;">
            <span class="invalid-feedback"><?php if (isset($err['firstname_err'])) { echo($err['firstname_err']); } ?></span>
		    <input type="text" placeholder="Visitor's Name" name="vname" value="<?php //echo($data['firstname']); ?>" required>

		    <span class="invalid-feedback"><?php if (isset($err['lastname_err'])) { echo($err['lastname_err']); } ?></span>
		    <input type="text" placeholder="Reason for visit" name="reason" value="<?php // echo($data['lastname']); ?>" required>

		    <span class="invalid-feedback"><?php if (isset($err['phone_err'])) { echo($err['phone_err']); } ?></span>
		    <input type="number" placeholder="Phone Number" value="<?php //echo($data['phone']); ?>" name="phone" required>


		  	<span class="invalid-feedback"><?php if (isset($err['email_err'])) { echo($err['email_err']); } ?></span>
		    <input type="email" placeholder="Email address" name="email" value="<?php //echo($data['email']); ?>" required>

		    <button type="submit" name="register">Save Log</button>		  
		  </div>

</form>
</div>
</body>
</html>
