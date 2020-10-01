<div class="register" style="width: 100%; background: #fff;">
<h4 style="color: green;">Payments</h4>
<table>
  <tr id="th">
    <td>ID </td>
    <td>Date</td>
    <td>Fee Record</td>
    <td>Student ID</td>
    <td>Payment Type</td>
    <td>*Bank Teller No.</td>
    <td>Payment Category</td>
    <td>Amount</td>
    <td>Options</td>
  </tr>
 <?php   
  $sql = "SELECT * FROM fee_payment WHERE status = 'Active'";
  $result = $objDB->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $payment_id = $row["payment_id"]; 
        $payment_date = $row["payment_date"];
        $fee_record = $row["fee_record"];
        $student_id = $row["student_id"];
        $payment_type = $row["payment_type"];
        $teller_no = $row["teller_no"];
        $pay_category = $row["pay_category"];
        $amount = $row["amount"];
?>
      <tr>
        <td><?php echo  $payment_id; ?></td>
        <td><?php echo  $payment_date; ?></td>
        <td><?php echo ucfirst($fee_record); ?></td>
        <td><?php echo $student_id; ?></td>
        <td><?php echo ucfirst($payment_type); ?></td>
         <td><?php echo  $teller_no; ?></td>
        <td><?php echo ucfirst($pay_category); ?></td>
        <td><?php echo $amount; ?></td>
        <td><a href="<?php echo(URLROOT) ?>/fees/fees.php?id=5&payment_id=<?php echo $payment_id; ?>" style="color: blue;">View</a>  &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a href="delete_fee.php?id=<?php echo $payment_id;?>" onclick="return confirm('ARE YOU SURE YOU WANT TO DELETE THIS RECORD?');" style="cursor: pointer; color: red; text-decoration: none;">  Delete</a></td>
      </tr>
<?php        
    }
} else {
    echo "0 results";
  }
?>
</table>
</div>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h3>Delete Record</h3>
        </div>
        <div class="modal-body">
           <P>ARE YOU SURE YOU WANT TO DELETE THIS RECORD?</P>
        </div>
        <div class="modal-footer">
         <a href="delete_fee.php?id=<?php echo $payment_id;?>" type="button" class="btn btn-danger">Yes</a> <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
        </div>
      </div>
      
    </div>
  </div>

  <script src="../js/jquery-3.5.1.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
</body>
</html>