<div class="table_student">
<h4>Teaching Staff </h4>
<table>
  <tr id="th">
  <td>Staff ID</td>
    <td>First Name</td>
    <td>Middle Name</td>
    <td>Last Name</td>
    <td>Gender</td>
    <td>Age</td>
    <td>Job Description</td>
    <td>Option</td>
  </tr>

<?php   
  $sql = "SELECT * FROM staff WHERE job_status = 'Teaching Staff' AND status ='Active'";
  $result = $objDB->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $staff_id = $row["staff_id"]; 
        $first_name = $row["first_name"];
        $mid_name = $row["mid_name"];
        $last_name = $row["last_name"];
        $gender = $row["gender"];
        $age = $row["age"];
        $job_desc = $row["job_desc"];
?>

  <tr>
        <td><?php echo $staff_id; ?></td>
        <td><?php echo ucfirst($first_name); ?></td>
        <td><?php echo ucfirst($mid_name); ?></td>
        <td><?php echo ucfirst($last_name); ?></td>
        <td><?php echo ucfirst($gender); ?></td>
        <td><?php echo $age; ?></td>
        <td><?php echo ucfirst($job_desc); ?></td>
        <td><a href="<?php echo(URLROOT) ?>/staff/staff_portal.php?id=8&staff_id=<?php echo $staff_id; ?>" style="color: #1E90FF;">View </a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a data-toggle="modal" data-target="#myModal" style="cursor: pointer; color: red;"> Delete</a></td> 
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
         <a href="delete_staff.php?id=<?php echo $staff_id;?>" type="button" class="btn btn-danger">Yes</a> <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
        </div>
      </div>
      
    </div>
  </div>

  <script src="../js/jquery-3.5.1.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>

</body>
</html>