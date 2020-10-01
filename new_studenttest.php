<div class="register">
<form action="student_portal.php" method="post">

		 <p id="subHeading">Enter student Data to enroll new student <span style="font-size: 11px; color: red;">(All fields are required)</span></p>

             <!-- Display Error Message-->
            
             <?php //require_once 'includes/error_display.php'; ?>

             <h5>Personal Data</h5>

            <span class="invalid-feedback"><?php if (isset($err['firstname_err'])) { echo($err['firstname_err']); } ?></span>
		    <input type="text" placeholder="Firstname" name="fname" value="<?php //echo($data['firstname']); ?>" required>

		    <span class="invalid-feedback"><?php if (isset($err['lastname_err'])) { echo($err['lastname_err']); } ?></span>
		    <input type="text" placeholder="Other Names" name="oname" value="<?php // echo($data['lastname']); ?>" required>

		    <span class="invalid-feedback"><?php if (isset($err['lastname_err'])) { echo($err['lastname_err']); } ?></span>
		    <input type="text" placeholder="Lastname" name="lname" value="<?php // echo($data['lastname']); ?>" required>

		    <div class="select" style="clear: both;">
		    <span class="invalid-feedback"><?php if (isset($err['country_err'])) { echo($err['country_err']); } ?></span> 
				<select name="country">
							<option>Student Nationality</option>
							<option>Equatorial Guinea</option>
							<option>Spain</option>
							<option>France</option>
							<option>Ghana</option>
							<option>Nigeria</option>
				</select>
		   </div>

		    <div class="select">
		      <span class="invalid-feedback"><?php if (isset($err['country_err'])) { echo($err['country_err']); } ?></span> 
				<select name="gender">
							<option>Gender</option>
							<option>Male</option>
							<option>Female</option>
				</select>
		   </div>

		   	<span style="font-size: 12px; color: #565656;">&nbsp;Date of Birth</span>
		    <input class="datepicker_pop" type="date" name="bday" placeholder="Date of birth" required style="width: 100%; border-radius: 0; padding: 6px 10px;">

		   	<div class="select">
		      <span class="invalid-feedback"><?php if (isset($err['country_err'])) { echo($err['country_err']); } ?></span> 
				<select name="medical">
							<option>Any Medical Condition?</option>
							<option>Yes</option>
							<option>No</option>
				</select>
		   </div>

		  <div>
      	  <span class="invalid-feedback"><?php if (isset($err['product_details_err'])) { echo '<br>'.($err['product_details_err']); } ?></span>
      	  <textarea name="med_details" rows="5" cols="25" class="textarea" placeholder="If Yes, Enter The Medical Condition. If No, Please Leave Empty..."></textarea>
      	  </div>

      	  	<h5>Guardian or Sponsor's Data</h5>
            <span class="invalid-feedback"><?php if (isset($err['firstname_err'])) { echo($err['firstname_err']); } ?></span>
		    <input type="text" placeholder="Guardian Name" name="gname" value="<?php //echo($data['firstname']); ?>" required>

		    <span class="invalid-feedback"><?php if (isset($err['email_err'])) { echo($err['email_err']); } ?></span>
		    <input type="email" placeholder="Guardian Email address" name="email" value="<?php //echo($data['email']); ?>" required>

		    <span class="invalid-feedback"><?php if (isset($err['phone_err'])) { echo($err['phone_err']); } ?></span>
		    <input type="phone" placeholder="Guardian Phone Number" value="<?php //echo($data['phone']); ?>" name="phone" required>
		   
		   	<span class="invalid-feedback"><?php if (isset($err['city_err'])) { echo($err['city_err']); } ?></span>
		   	<input type="text" placeholder="Residential Address" value="<?php // echo($data['city']); ?>" name="city" required></input>

		   	<h5>Academic Details</h5>
		  	<div class="select">
		      <span class="invalid-feedback"><?php if (isset($err['country_err'])) { echo($err['country_err']); } ?></span> 
				<select name="class">
							<option>Select Class For Student</option>
							<?php
							  $sql = "SELECT * FROM classes";
							  $result = $objDB->query($sql);
							  if ($result->num_rows > 0) {
							    // output data of each row
							    while($row = $result->fetch_assoc()) {
							        $class_name = $row["class_name"]; 
							?>
							<option><?php echo ucfirst($class_name); ?></option>
						<?php } }else{?>
							<option>No Available Class</option>
						<?php } ?>
				</select>

			</div>

			<button type="submit" name="register">Register Student</button>
</form>
</div>
</body>
</html>