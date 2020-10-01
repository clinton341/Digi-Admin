<div class="register">
<div class="heading">
		<h4>Payment Entry</h4>
	</div>
<div class="register"style="padding: 4%;">
<form action="receipt.php" method="post">
            <div class="select">
		      <span class="invalid-feedback"><?php if (isset($err['country_err'])) { echo($err['country_err']); } ?></span> 
				<select name="record">
							<option>Select Fee Record</option>
							<?php
							  $sql = "SELECT * FROM fee_records";
							  $result = $objDB->query($sql);
							  if ($result->num_rows > 0) {
							    // output data of each row
							    while($row = $result->fetch_assoc()) {
							        $title = $row["fee_title"]; 
							?>
							<option><?php echo ucfirst($title); ?></option>
						<?php } } ?>
				</select>
		   </div>

		   <div class="select">
		      <span class="invalid-feedback"><?php if (isset($err['country_err'])) { echo($err['country_err']); } ?></span> 
				<select name="student_class">
							<option>Student Class</option>
							<option>Primary 1</option>
							<option>Primary 2</option>
				</select>
		   </div>

		    <span class="invalid-feedback"><?php if (isset($err['confirm_password_err'])) { echo($err['confirm_password_err']); } ?></span>
		    <input type="number" placeholder="Enter student ID" name="student_id" required>
		    

		      <div class="select">
		      <span class="invalid-feedback"><?php if (isset($err['country_err'])) { echo($err['country_err']); } ?></span> 
				<select name="payment_type">
							<option>Payment Type</option>
							<option>Cash</option>
							<option>Bank Transfer</option>
							<option>Cheque</option>
							<option>Bank Deposit</option>
				</select>
		   	</div><br>

		   	<span class="invalid-feedback"><?php if (isset($err['confirm_password_err'])) { echo($err['confirm_password_err']); } ?></span>
		   	<span style="font-size: 12px;">Enter teller number if payment type selected above is 'Bank Teller'</span>
		    <input type="number" placeholder="Bank teller number or transfer reference number" name="teller">

           <div class="select">
		      <span class="invalid-feedback"><?php if (isset($err['country_err'])) { echo($err['country_err']); } ?></span> 
				<select name="payment_category">
							<option>Payment Category</option>
							<option>Complete Payment</option>
							<option>Part Payment</option>
				</select>
		   	</div>
		    

		    <span class="invalid-feedback"><?php if (isset($err['confirm_password_err'])) { echo($err['confirm_password_err']); } ?></span>
		    <span style="font-size: 12px;">Amount</span>
		    <input type="number" placeholder="Amount Paid" name="amount" required>
		    
		    <button type="submit" name="submit">Enter payment</button>
</form>
</div>
</div>