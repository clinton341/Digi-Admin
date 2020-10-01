<div class="table_student">
<h2>Book Directory</h2>
<table>
  <tr id="th">
  <td>Book ID</td>
  <td>Category</td>
  <td>Book Title</td>
    <td>Book Author</td>
    <td>Available Copies</td>
    <td>Total Copies</td>
    <td>Options</td>
  </tr>
<?php   
  $sql = "SELECT * FROM books";
  $result = $objDB->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
       $book_id = $row["book_id"]; 
        $bcat = $row["category"]; 
        $btitle = $row["title"];
        $copies = $row["t_copies"];
        $author = $row["author"];
?>
      <tr>
        <td><?php echo  $book_id; ?></td>
        <td><?php echo  ucfirst($bcat); ?></td>
        <td><?php echo ucfirst($btitle); ?></td>
         <td><?php echo  $author; ?></td>
        <td><?php echo $copies; ?></td>
        <td><?php echo $copies; ?></td>
        <td><a href="<?php echo(URLROOT) ?>/library.php?id=8&book_id=<?php echo $book_id; ?>" style="color: blue;"><a href="<?php echo(URLROOT) ?>/library?id=8&book_id=<?php echo $book_id; ?>" style="color: green">Edit</a>  &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a href="#" style="color: red;"> Delete</a></td>
      </tr>
<?php        
    }
} else {
    echo "0 results";
  }
?>
</table>
</div>
</body>
</html>