<?php 
if (isset($_GET['payment_id'])) {
	$id = $_GET['payment_id'];

	getPaymentById($id);
        $payment_id = $row["payment_id"]; 
        $payment_date = $row["payment_date"];
        $fee_record = $row["fee_record"];
        $student_id = $row["student_id"];
        $payment_type = $row["payment_type"];
        $teller_no = $row["teller_no"];
        $pay_category = $row["pay_category"];
        $amount = $row["amount"];
        getStudentById($student_id);
        $first_name = $row["first_name"];
        $mid_name = $row["mid_name"];
        $last_name = $row["last_name"];
} 
?>
<div class="register" style="background: #fff;">
	<div class="container"> 
	<?php   
	    echo getMsg('successful');
	 	echo getMsg('errors'); 
	 ?>
	</div>
<div class="register" style="width: 100%;">
	<h4 style="color:#565656;font-weight: bold;">Payment Details</h4>
	<p class="rep"><span class="subtitle">Date: <?php echo $payment_date; ?> </span> <span class="subtitle" style="float: right;">Student ID : <?php echo $student_id; ?>
	</span> 
	</p>
	<p class="rep"><span class="subtitle">Student Name: </span><?php echo ucfirst($first_name).' '.ucfirst($mid_name).' '.ucfirst($last_name); ?></p>

	<p class="rep"><span class="subtitle">Fee: </span><?php echo $fee_record; ?></p>
	<p class="rep"><span class="subtitle">Payment Type: </span><?php echo $payment_type; ?></p>
	<p class="rep"><span class="subtitle">Payment Category: </span><?php echo $pay_category; ?></p>
	<p class="rep">
		<span class="subtitle">Amount: </span><?php echo $amount; ?></span> 
		
	</p>
</div>
	<p><div class="st_link"><a data-toggle="modal" data-target="#myModal" style="cursor: pointer;">Edit</a></p>
</div>
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Payment Details</h4>
        </div>
        <div class="modal-body">
          <?php include 'payment_form.php'; ?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
   <script src="../js/jquery-3.5.1.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>