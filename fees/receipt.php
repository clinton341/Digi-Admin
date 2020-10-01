<?php
	include '../header.php';
	$record = " ";
    $student_class =  " ";
    $student_id =  " ";
    $payment_type = " ";
    $teller = " ";
    $payment_category =  " ";
   	$amount = " ";
    $date ="";
    $time = "";
    $token = "";
	if(isset($_POST['submit'])){

//Main errors array
    $errors = array();
   //get values & sanitize them
    $record = filter_input(INPUT_POST, 'record', FILTER_SANITIZE_STRING);
    $student_class = filter_input(INPUT_POST, 'student_class', FILTER_SANITIZE_STRING);
    $student_id = filter_input(INPUT_POST, 'student_id', FILTER_SANITIZE_STRING);
    $payment_type = filter_input(INPUT_POST, 'payment_type', FILTER_SANITIZE_STRING);
    $teller = filter_input(INPUT_POST, 'teller', FILTER_SANITIZE_STRING);
    $payment_category = filter_input(INPUT_POST, 'payment_category', FILTER_SANITIZE_STRING);
   	$amount = filter_input(INPUT_POST, 'amount', FILTER_SANITIZE_STRING);

     if(!count($errors)){
        $date =time();
        $time = date('M jS', $date);
        $token = md5(crypt(rand(),'aa'));
//Store them into database

        $stmt = $objDB->prepare(
        'INSERT INTO fee_payment(payment_date, fee_record, student_id, student_class, payment_type, teller_no, pay_category, amount,token) 
         VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)'
    );

    
   $stmt->bind_param('ssissisis',  $time, $record, $student_id, $student_class, $payment_type, $teller,  $payment_category, $amount, $token);

    if($stmt->execute()){
            setMsg('successful', 'The payment saved successfully ', 'success');
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
getStudentById($student_id);
$first_name = $row["first_name"];
$mid_name = $row["mid_name"];
$last_name = $row["last_name"];

?>

<div class="register" style="background: #fff;">
	<div class="container"> 
	<?php   
	    echo getMsg('successful');
	 	echo getMsg('errors'); 
	 ?>
	</div>
<div class="print" style="width: 100%; margin:0 auto;">
	<h4 style="color:#565656;font-weight: bold;">Payment Receipt</h4>
	<p class="rep"><span class="subtitle">Date: <?php echo $time; ?> </span> <span class="subtitle" style="float: right;">Student ID : <?php echo $student_id; ?>
	</span> 
	</p>

	<p class="rep"><span class="subtitle">Fee: </span><?php echo $record; ?></p>
	<p class="rep"><span class="subtitle">Student Name: </span><?php echo ucfirst($first_name).' '.ucfirst($mid_name).' '.ucfirst($last_name); ?></p>
	<p class="rep"><span class="subtitle">Payment Type: </span><?php echo $payment_type; ?></p>
	<p class="rep"><span class="subtitle">Payment Category: </span><?php echo $payment_category; ?></p>
	<p class="rep">
		<span class="subtitle">Amount: </span><?php echo $amount; ?></span> 
		<span style="float: right;" class="subtitle">Admin Signature __________________</span>
	</p>
</div>
	<p><button class="btn-print" style="width: 10%; margin-left: 40%;" onclick="window.print();return false;">Print receipt</button></p>
</div>