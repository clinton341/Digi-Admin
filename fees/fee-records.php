<div class="register">
<h2>All Fee Records
</h2>
<table>
  <tr id="th">
  <td>ID</td>
  <td>Fee</td>
  <td>Amount</td>
  <td>Action</td>
  </tr>
 <?php   
  $sql = "SELECT * FROM fee_records WHERE status='Active'";
  $result = $objDB->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $id = $row["id"]; 
        $fee_title = $row["fee_title"];
        $amount = $row["amount"];
        $date_created = $row["date_created"];
?>
      <tr>
        <td><?php echo  $id ; ?></td>
        <td><?php echo  ucfirst($fee_title); ?></td>
        <td><?php echo $amount; ?></td>
        <td>&nbsp;&nbsp;&nbsp;<a href="delete_record.php?id=<?php echo $id;?>" onclick="return confirm('ARE YOU SURE YOU WANT TO DELETE THIS RECORD?');" style="cursor: pointer; color: red; text-decoration: none;">  Delete</a></td>
      </tr>
<?php        
    }
} else {
    echo "0 results";
  }
?>
  </tr>
</table>
</div>
</body>
</html>