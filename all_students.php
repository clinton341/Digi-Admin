<div class="table_student">
<h4>All Students</h4>
<table>
  <tr id="th">
    <td><?php echo "Reg Id";?></td>
    <td>First Name</td>
    <td>Last Name</td>
    <td>Middle Name</td>
    <td>Gender</td>
    <td>Birthday</td>
    <td>Options</td>
  </tr>
 
 <?php   
  $sql = "SELECT * FROM students WHERE status = 'active'";
  $result = $objDB->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $student_id = $row["student_id"]; 
        $first_name = $row["first_name"];
        $mid_name = $row["mid_name"];
        $last_name = $row["last_name"];
        $gender = $row["gender"];
        $gender_db = ucfirst($row["gender"]);
        $country_db= ucfirst($row["country"]);
        $age = $row["age"];
        $med_con = $row["med_con"];
        $medcon_det = $row["medcon_det"];
        $guardian_name = $row["guardian_name"];
        $guardian_phone = $row["guardian_phone"];
        $guardian_email = $row["guardian_email"];
        $address = $row["res_address"];
        $student_class= ucfirst($row["student_class"]);
        $db_id = $row['student_id'];
?>
      <tr>
        <td><?php echo $student_id; ?></td>
        <td><?php echo ucfirst($first_name); ?></td>
        <td><?php echo ucfirst($mid_name); ?></td>
        <td><?php echo ucfirst($last_name); ?></td>
        <td><?php echo ucfirst($gender); ?></td>
        <td><?php echo $age; ?></td>
          <td><a href="<?php echo(URLROOT) ?>/student_portal.php?id=8&student_id=<?php echo $student_id; ?>" style="color: blue;cursor: pointer;">View</a>  &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a href="delete_student.php?id=<?php echo $db_id;?>" onclick="return confirm('ARE YOU SURE YOU WANT TO DELETE THIS RECORD?');" style="cursor: pointer; color: red;"> Delete</a></td>
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
         <a href="delete_student.php?id=<?php echo $db_id;?>" type="button" class="btn btn-danger">Yes</a> <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
        </div>
      </div>
      
    </div>
  </div>

  <script src="js/jquery-3.5.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>