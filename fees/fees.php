<?php 	include '../header.php';?>
<div class="container-fluid portal">
		<div class="row">
			<div class="col-sm-2" style="border-right:1px solid #ddd; height: 100vh; padding: 0;">
				<ul class="nav nav-pills nav-stacked">
				  <li class="link">
					<a href="student_portal.php" class="dropdown-btn" style="color: #2F4F4F;"><i class="fas fa-money-bill-wave" style="font-size:30px;color:#228B22;"></i> Fees Management</a>
					</li>
					<li class="link">
					<a href="fees.php?id=1">Create A Fee Record</a>
					</li>
					<li class="link">
						<a href="fees.php?id=2">Enter Fee Payment</a>
					</li>
					<li class="link">
						<a href="fees.php?id=3">Fee Payment Records</a>
					</li>
					<li class="link">
						<a href="fees.php?id=4">View All Fee Records</a>
					</li>
				</ul>
			</div>
			<div class="col-sm-10">
				<div class="container"> 
					<?php   
					    echo getMsg('delete'); 
					 ?>
				</div>
			<?php
				if (isset($_GET['id'])) {
						$id = $_GET['id'];
				if (isset($_GET['student_id'])) {
					$student_id =$_GET['student_id'];
				}
			switch ($id) {
			    case 1:
			        include 'new-fee.php';
			        break;
			    case 2:
			        include 'fee_entry.php';
			        break;
			    case 3:
			       include 'fee-payments.php';
			        break;
			    case 4:
			       include 'fee-records.php';
			        break;
			    case 5:
			       include 'payment_details.php';
			        break;
			    default:
			        echo "Your favorite color is neither red, blue, nor green!";
				}			
		}else {?>
			<div class="wrapper">
				<h2 id="wrapper_head">Fees. Click on the links on the left to select an option.</h2>
				<div class="menu">
					<p id="menu_head">Fees</p>
				</div>

			</div>

<?php }	?>

			</div>
			</div>
</div>

	
	</div>

<div class="footer"><p>Powered by Zuu Systems  &copy; Copyright 2019</p></div>
</body>
</html>