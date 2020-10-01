<?php include '../header.php'; ?>
<div class="container-fluid portal">
		<div class="row">
			<div class="col-sm-2" style="border-right:1px solid #ddd; height: 100vh; padding: 0;">
				<ul class="nav nav-pills nav-stacked">
					<li class="link">
							<a href="visitors.php" style="color: #2F4F4F;">
								<i class="fas fa-user-edit" style="font-size:30px;color:#4D59E1; "></i> Visitors
							</a>
					</li>

					<li class="link">
						 <a href="visitors.php?id=1"> Enter New Visitor </a>
					</li>
					<li class="link">
			 			<a href="visitors.php?id=2"> Visitors Log </a>
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
				 switch ($id) {
			    case 1:
			        include 'new_visitor.php';
			        break;
			    case 2:
			        include 'all_visitors.php';
			        break;
			    default:
			        echo "Your favorite color is neither red, blue, nor green!";
				}			
		}else {?>

			<div class="wrapper">
				<h2 id="wrapper_head">Visitors Registry</h2>
				<div class="menu">
					<p id="menu_head">Visitors today</p>
						<p id="menu_sub">
					  <?php
					      $date =time();
       					  $time = date('M jS Y', $date);
						  $sql = "SELECT * FROM visitors WHERE visit_date = '$time' AND status='Active'";
						  $result = $objDB->query($sql);
						  $total = $result->num_rows;
						  echo $total;
						?>
					</p>
				</div>
			</div>

<?php }	?>

			</div>
			</div>
</div>
<div class="footer"><p>Powered by Zuu Systems  &copy; Copyright 2019</p></div>
</body>
</html>