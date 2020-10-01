<?php include '../header.php'; ?>
<div class="container-fluid portal">
		<div class="row">
			<div class="col-sm-2" style="border-right:1px solid #ddd; height: 100vh; padding: 0;">
				<ul class="nav nav-pills nav-stacked">
					<li class="link">
						<h3><a href="finances.php" style="color: #2F4F4F;"><i class="fas fa-chart-line" style="font-size: 30px; color: #2DC413;"></i> Financial MGT</a></h3>
					</li>

					<li>
					INCOME	
					</li> 
					
					<li class="link">
					<a href="finances.php?id=1">Create Income Source</a>
					</li>

					<li class="link">
						<a href="finances.php?id=2">View All Income Sources</a>
					</li>
					<li class="link">
						<a href="finances.php?id=3">Enter Income Event</a>
					</li>
				   <li class="link">
					<a href="finances.php?id=4">View All Income Events</a>
					</li>

		
					<li class="link">
						EXPENDITURE
					</li>
		
					<li class="link">
						<a href="finances.php?id=5">Create Expense Outlet</a>
					</li>
					<li class="link">
						<a href="finances.php?id=6">View All Expense Outlet</a>
					</li>
					<li class="link">
						<a href="finances.php?id=7">Enter Expense Event</a>
					</li>
					<li class="link">
						<a href="finances.php?id=8">View All Expense Events</a>
					</li>

					<li>SUMMARY </li>
					<li class="link">
						<a href="finances.php?id=#">Income Summary</a>
					</li>

					<li class="link">
						<a href="finances.php?id=#">Expenditure Summary</a>
					</li>

					<li class="link">
					<a href="finances.php?id=#">Full Summary</a>
					</li>

				</ul>
			</div>
			<div class="col-sm-10">
		<?php
			if (isset($_GET['id'])) {
					$id = $_GET['id'];
			if (isset($_GET['student_id'])) {
				$student_id =$_GET['student_id'];
			}
			 switch ($id) {
				    case 1:
				        include 'new-income-source.php';
				        break;
				    case 2:
				        include 'all-income.php';
				        break;
				    case 3:
				       include 'income-event.php';
				        break;
				    case 4:
				       include 'all-income-events.php';
				        break;
				    case 5:
				       include 'new-expense-outlet.php';
				        break;
				    case 6:
				        include 'all-expense.php';
				        break;
				    case 7:
				        include 'expense-event.php';
				        break;
				    case 8:
				       include 'all-expense-events.php';
				        break;
				    case 9:
				       include 'all-income-events.php';
				        break;
				    default:
				        echo "Your favorite color is neither red, blue, nor green!";
					}			
			}else {
				
				include 'chart.php';
}	?>

			</div>
			</div>
</div>
<div class="footer"><p>Powered by Zuu Systems  &copy; Copyright 2019</p></div>

<!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="../js/jquery-3.5.1.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
</body>
</html>