<?php
	$title  =  "";
    $amount = "";
    $details = "";

	if(isset($_POST['submit'])){

//Main errors array
    $errors = array();
   //get values & sanitize them
    $title  = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
    $amount = filter_input(INPUT_POST, 'amount', FILTER_SANITIZE_STRING);
    $details = filter_input(INPUT_POST, 'details', FILTER_SANITIZE_STRING);

     if(!count($errors)){
        $date =time();
        $time = date('M jS', $date);
//Store them into database
        $stmt = $objDB->prepare(
        'INSERT INTO expense_event(title, date_created, amount, comments) 
         VALUES(?, ?, ?, ?)'
    );

    
   $stmt->bind_param('ssss',  $title, $time, $amount, $details);

    if($stmt->execute()){
            setMsg('expense', 'Expenditure saved successfully ', 'success');
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
<div class="heading">
		<h4>Enter Expense Event</h4>
	</div>
<div class="register">
<div class="login">
<div class="container" style="width: inherit;"> 
	<?php   
	    echo getMsg('expense');
	 	echo getMsg('errors'); 
	 ?>
	</div>
<form action="#" method="post">
      <p id="subHeading">An event in which the school had to spend money different from expense outlets<span style="font-size: 11px; color:green;"> (eg. Classroom board replacement).</span></p>
             <!-- Display Error Message-->
             <?php //require_once 'includes/error_display.php'; ?>


            <span class="invalid-feedback"><?php if (isset($err['firstname_err'])) { echo($err['firstname_err']); } ?></span>
		    <input type="text" placeholder="Description" name="title" required style="margin-bottom: 10px;">
		    
		    <span class="invalid-feedback"><?php if (isset($err['confirm_password_err'])) { echo($err['confirm_password_err']); } ?></span>
		    <input type="number" placeholder="Amount Spent" name="amount" required>

		   <span class="invalid-feedback"><?php if (isset($err['product_details_err'])) { echo '<br>'.($err['product_details_err']); } ?></span>
      	  	<textarea name="details" rows="8" cols="25" class="textarea" placeholder="Additional Information.."></textarea>

		    
		    <button type="submit" name="submit">Enter Event</button>
</form>
</div>
</div>
</div>
</body>
</html>
