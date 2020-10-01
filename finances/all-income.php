<div class="table_student">
<h4>All Income Sources</h4>
<table>
  <tr id="th">
  	<td>Source Id</td>
    <td>Description</td>
    <td>Amount</td>
    <td>Options</td>
  </tr>
  <?php   
  $sql = "SELECT * FROM income_source";
  $result = $objDB->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $income_id = $row["income_id"]; 
        $i_title = $row["i_title"];
        $amount = $row["amount"];
?>
  <tr>
    <td><?php echo $income_id; ?></td>
    <td><?php echo $i_title; ?></td>
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