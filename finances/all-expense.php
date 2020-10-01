<div class="table_student">
<h2>All Expense Outlets</h2>
<table>
  <tr id="th">
  	<td>Expense Id</td>
    <td>Description</td>
    <td>Amount</td>
    <td>Options</td>
  </tr>

  <?php   
  $sql = "SELECT * FROM expense_outlet";
  $result = $objDB->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $expense_id = $row["expense_id"]; 
        $e_name = $row["e_name"];
        $amount = $row["amount"];
?>
  <tr>
    <td><?php echo $expense_id; ?></td>
    <td><?php echo $e_name; ?></td>
    <td><?php echo $amount; ?></td> 
    <td><a href="#" style="color: green">Update</a>  &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a href="#" style="color: red;"> Delete</a></td>
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