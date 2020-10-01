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
        $time = date('M jS Y', $date);
//Store them into database

        $stmt = $objDB->prepare(
        'INSERT INTO income_source(i_title, amount, date_created) 
         VALUES(?, ?, ?)'
    );

    
   $stmt->bind_param('sis',  $title, $amount, $time);

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
<div class="heading">
		<h4>Create Income Source </h4>
	</div>
	<div class="register">
		<div class="login" style="padding-left: 2%;padding-right: 2%; padding-top: 2%;">
			<div class="container" style="width: inherit;"> 
	<?php   
	    echo getMsg('success');
	 	echo getMsg('errors'); 
	 ?>
	</div>
<form action="finances.php?id=1" method="post">
      <p id="subHeading">Income source is an established source of income for the school<span style="font-size: 11px; color: green;"> (eg. School Fees)</span></p>
             <!-- Display Error Message-->
             <?php //require_once 'includes/error_display.php'; ?>

            <span class="invalid-feedback"><?php if (isset($err['firstname_err'])) { echo($err['firstname_err']); } ?></span>
		    <input type="text" placeholder="Description" name="title" required>
		    
		    <span class="invalid-feedback"><?php if (isset($err['confirm_password_err'])) { echo($err['confirm_password_err']); } ?></span>
		    <input type="number" placeholder="Amount " name="amount" required>
		    
		    <button type="submit" name="submit">Create</button>
</form>
</div>
</div>
</div>

</div>