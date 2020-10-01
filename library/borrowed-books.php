<div class="table_student">
<h2>Book Directory<form action="#" metdod="post" style="float: right;">
			<select name="">
				<option>Filter by Status</option>
				<option>Returned</option>
				<option>Unreturned</option>
			</select>
			<input type="submit" name="" value="Go">
</form>
</h2>
<table>
<tr id="th">
<td>Book ID</td>
<td>Student Borrower</td>
<td>Student ID</td>
<td>Borrower Name</td>
<td>Borrower Phone</td>
<td>Borrower Address</td>
<td>Date Borrowed</td>
<td>Return Date</td>
<td>Status</td>
<td>Action</td>
 </tr>

<tr>
<?php   
  $sql = "SELECT * FROM borrowed_books";
  $result = $objDB->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $book_id = $row["book_id"]; 
        $student_borrower = $row["student_borrower"]; 
        $student_id = $row["student_id"];
        $borrower_name = $row["borrower_name"];
        $borrower_phone = $row["borrower_phone"];
        $borrower_address = $row["borrower_address"];
        $date_borrowed = $row["date_borrowed"];
        $return_date = $row["return_date"];
        $status = $row["status"];
?>
      <tr>
        <td><?php echo  $book_id; ?></td>
        <td><?php echo  $student_borrower; ?></td>
        <td><?php echo $student_id; ?></td>
         <td><?php echo  ucfirst($borrower_name); ?></td>
        <td><?php echo $borrower_phone; ?></td>
        <td><?php echo ucfirst($borrower_address); ?></td>
        <td><?php echo $date_borrowed; ?></td>
        <td><?php echo $return_date; ?></td>
        <td><?php echo $status; ?></td>
        <td><a href="<?php echo(URLROOT) ?>/library.php?id=8&book_id=<?php echo $book_id; ?>" style="color: blue;"><a href="<?php echo(URLROOT) ?>/library?id=8&book_id=<?php echo $book_id; ?>" style="color: green">Change Status</a>  &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a href="#" style="color: red;"> Delete</a></td>
      </tr>
<?php        
    }
} else {
    echo "0 results";
  }
?>
  <tr>
</table>
</div>
</body>
</html>