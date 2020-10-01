<?php include '../header.php'; ?>
<div class="container-fluid portal">
		<div class="row">
			<div class="col-sm-2" style="border-right:1px solid #ddd; height: 100vh; padding: 0;">
				<ul class="nav nav-pills nav-stacked">
					<li class="link">
						<h3><a href="classes.php" style="color: #2F4F4F;"><i class="fas fa-chalkboard-teacher" style="font-size: 30px;color:#2F4F4F;"></i> Classes </a></h3>
					</li>

					<li class="link">
						<a href="classes.php?id=1">Create New Class</a>
					</li>
					<li class="link">
						<a href="classes.php?id=2">View All Classes</a>
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
				        include 'create_class.php';
				        break;
				    case 2:
				        include 'all_classes.php';
				        break;
				    case 3:
				      // include 'create_subject.php';
				        break;
				    case 4:
				       include 'sub_reg.php';
				        break;
				    case 8:
				      // include 'all_subjects.php';
				        break;
				    default:
				        echo "Your favorite color is neither red, blue, nor green!";
					}			
			}else {?>
				<div class="wrapper">
					<h2 id="wrapper_head">You can manage classes and subjects here. Click on the links on the left to select an option.</h2>
					<div class="menu">
						<p id="menu_head">Academic Year</p>
						<p id="menu_sub"><?php       
								 $date =time();
			        			 $time = date('Y', $date); 
			        			 echo $time;
        						?>
        				</p>
					</div>
					<div class="menu">
						<p id="menu_head">Number of Classes</p>
						<p id="menu_sub">							
							<?php
							  $sql = "SELECT * FROM classes";
							  $result = $objDB->query($sql);
							  $total = $result->num_rows;
							  echo $total;

							?>

					</div>

				</div>

<?php }	?>

</div>
</div>
</div>

<div class="footer"><p>Powered by Zuu Systems  &copy; Copyright 2019</p></div>
</body>
</html>