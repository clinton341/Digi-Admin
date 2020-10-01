<?php
	$title = " ";
    $amount =  " ";

	if(isset($_POST['submit'])){

//Main errors array
    $errors = array();
   //get values & sanitize them
    $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
    $amount = filter_input(INPUT_POST, 'amount', FILTER_SANITIZE_STRING);


     if(!count($errors)){
        $date =time();
        $time = date('M jS', $date);
        $status ='Active';
//Store them into database

        $stmt = $objDB->prepare(
        'INSERT INTO fee_records(fee_title, amount, date_created,status) 
         VALUES(?, ?, ?, ?)'
    );

    
   $stmt->bind_param('siss',  $title, $amount, $time, $status);

    if($stmt->execute()){
            setMsg('success', 'Record create successfully', 'success');
    }else{  $error = $objDB->errno . ' ' . $objDB->error;
    echo $error;
    exit();
}

} else{

    $data = [
        'title' => $title,
        'amount' => $amount,
    ];
    setMsg('form_data', $data);
    setMsg('errors', $errors);
 } 
}
?>


<div class="register">
	<div class="container" style="width: inherit;"> 
	<?php   
	    echo getMsg('success');
	 	echo getMsg('errors'); 
	 ?>
	</div>
	<div class="heading">
		<h4>Create New Fee Record </h4>
	</div>
	<div class="register">
<div class="login" style="padding-left: 2%;padding-right: 2%; padding-top: 2%;">
<form action="fees.php?id=1" method="post">
      <p style="font-size: 12px; color:blue;">Enter fee name or title and amount (eg.Title:School Fees, Amount:20,000)</p>
             <!-- Display Error Message-->
             <?php //require_once 'includes/error_display.php'; ?>

            <span class="invalid-feedback"><?php if (isset($err['firstname_err'])) { echo($err['firstname_err']); } ?></span>
		    <input  style="margin-bottom: 2%;" type="text" placeholder="Fee Title" name="title" required>
		    
		    <span class="invalid-feedback"><?php if (isset($err['confirm_password_err'])) { echo($err['confirm_password_err']); } ?></span>
		    <input  style="margin-bottom: 2%;" type="number" placeholder="Amount " name="amount" required>
		    
		    <button type="submit" name="submit">Save</button>
</form>
</div>
</div>
</div>
