<?php include '../header.php'; ?>
<div class="container-fluid portal">
		<div class="row">
			<div class="col-sm-2" style="border-right:1px solid #ddd; height: 100vh; padding: 0;">
				<ul class="nav nav-pills nav-stacked">
					<li class="link">
					<a href="library.php?id=1"><i class="fas fa-book-reader" style="font-size: 30px;color:#4B0082;"></i> Library MGT
					</a>
					</li>
					<li class="link">
					<a href="library.php?id=1">Book Directory</a>
					</li>

					<li class="link">
						<a href="library.php?id=2">Add New Book</a>
					</li>
					<li class="link">
						<a href="library.php?id=3">Book Borrowing</a>
					</li>

					<li class="link">
						<a href="library.php?id=4">Borrowed Books</a>
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
			        include 'book-directory.php';
			        break;
			    case 2:
			        include 'add-book.php';
			        break;
			    case 3:
			       include 'b-book.php';
			        break;
			    case 4:
			       include 'borrowed-books.php';
			        break;
			    default:
			        echo "Your favorite color is neither red, blue, nor green!";
				}			
		}else {?>
			<div class="wrapper">
				<h2 id="wrapper_head">Library Management. Click on the links on the left to select an option.</h2>
				<div class="menu">
					<p id="menu_head">Academic Year</p>
					<p id="menu_sub">
						<?php       
						 $date =time();
	        			 $time = date('Y', $date); 
	        			 echo $time;
						?>
        			</p>
				</div>
				<div class="menu">
					<p id="menu_head">Borrowed Books</p>
					<p id="menu_sub">
						<?php
						  $sql = "SELECT * FROM borrowed_books";
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
</div>
<div class="footer"><p>Powered by Zuu Systems  &copy; Copyright 2019</p></div>
</body>
</html>