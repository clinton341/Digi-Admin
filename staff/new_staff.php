<div class="register">
<form action="staff_portal.php" method="post">
		 <p id="subHeading">Please enter data to create new staff account <span style="font-size: 11px; color: red;">(All fields are required)</span></p><br>
             <!-- Display Error Message-->
             <?php //require_once 'includes/error_display.php'; ?>

             <h5>Personal Data</h5>

            <span class="invalid-feedback"><?php if (isset($err['firstname_err'])) { echo($err['firstname_err']); } ?></span>
		    <input type="text" placeholder="Firstname" name="fname" value="<?php //echo($data['firstname']); ?>" required>
           

             <span class="invalid-feedback"><?php if (isset($err['lastname_err'])) { echo($err['lastname_err']); } ?></span>
		    <input type="text" placeholder="Middlename" name="oname" value="<?php // echo($data['lastname']); ?>" required>

		    <span class="invalid-feedback"><?php if (isset($err['lastname_err'])) { echo($err['lastname_err']); } ?></span>
		    <input type="text" placeholder="Lastname" name="lname" value="<?php // echo($data['lastname']); ?>" required>

		    <div class="select">
		      <span class="invalid-feedback"><?php if (isset($err['country_err'])) { echo($err['country_err']); } ?></span> 
				<select name="country">
							<option>Nationality</option>
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
		    <input type="date" name="bday" placeholder="Date of birth" required style="width: 100%; border-radius: 0; padding: 6px 10px;">  <br>

		    <h5>Work Data</h5>

		   <div class="select">
		      <span class="invalid-feedback"><?php if (isset($err['job_err'])) { echo($err['job_err']); } ?></span> 
				<select name="job_status">
							<option>Job Type</option>
							<option>Teaching staff</option>
							<option>Non-teaching staff</option>
				</select>
		   </div>

		    <span class="invalid-feedback"><?php if (isset($err['lastname_err'])) { echo($err['lastname_err']); } ?></span>
		    <input type="text" placeholder="Job Description" name="job_desc" value="<?php // echo($data['lastname']); ?>" required>

		     <span style="font-size: 12px; color: #565656;">&nbsp;Employment Date</span>
		    <input type="date" name="eday" placeholder="Date of birth" required style="width: 100%; border-radius: 0; padding: 6px 10px;">


		    <span class="invalid-feedback"><?php if (isset($err['phone_err'])) { echo($err['phone_err']); } ?></span>
		    <input type="number" placeholder="Salary Amount" value="<?php //echo($data['phone']); ?>" name="salary" required><br>

		    <h5 style="clear: both;">Contact Information</h5>

		    <span class="invalid-feedback"><?php if (isset($err['phone_err'])) { echo($err['phone_err']); } ?></span>
		    <input type="phone" placeholder="Phone Number" value="<?php //echo($data['phone']); ?>" name="phone" required>


		  	<span class="invalid-feedback"><?php if (isset($err['email_err'])) { echo($err['email_err']); } ?></span>
		    <input type="email" placeholder="Email address" name="email" value="<?php //echo($data['email']); ?>" required>

		 
		   	 <span class="invalid-feedback"><?php if (isset($err['city_err'])) { echo($err['city_err']); } ?></span>
		   	 <input type="text" placeholder="Residential Address" value="<?php // echo($data['city']); ?>" name="city"></input>
		 
		    
		    <button type="submit" name="register">Create Staff Account</button>		  
		  </div>
</form>
</div>

</body>
</html>
