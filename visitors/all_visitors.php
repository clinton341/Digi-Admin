<div class="table_student">
<h2><span style="font-size: 12px;color: white;">Visitor Log </span><form action="#" method="post" style="float: right;">
                    <select name="">
                        <option>Sort by date</option>
                        <option>Today</option>
                        <option>Yesterday</option>
                        <option>This week</option>
                        <option>Last week</option>
                        <option>This month</option>
                        <option>Last month</option>
                    </select>
                <input type="submit" name="" value="Go">
                </form>
</h2>
<table >
  <tr id="th">
    <td>Date</td>
    <td>Visitor's Name</td>
    <td>Reason of visit</td>
    <td>Visitor's Phone</td>
    <td>Visitor's Email</td>
    <td>Options</td>
  </tr>
<?php   
  $sql = "SELECT * FROM visitors WHERE status = 'Active'";
  $result = $objDB->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $visitor_id = $row["visitor_id"];
        $visitor_name = $row["visitor_name"]; 
        $visitor_phone = $row["visitor_phone"];
        $visitor_email = $row["visitor_email"];
        $visit_date = $row["visit_date"];
        $visit_reason = $row["visit_reason"];
?>
      <tr>
        <td><?php echo  $visit_date; ?></td>
        <td><?php echo  $visitor_name; ?></td>
        <td><?php echo ucfirst($visit_reason); ?></td>
        <td><?php echo $visitor_phone; ?></td>
        <td><?php echo $visitor_email; ?></td>
        <td><a href="<?php echo(URLROOT) ?>/vistors.php?id=8&visitor_id=<?php echo $id; ?>" style="color: blue;">&nbsp;&nbsp;&nbsp;<a href="delete_visitors.php?id=<?php echo $visitor_id;?>" onclick="return confirm('ARE YOU SURE YOU WANT TO DELETE THIS RECORD?');" style="color: red;"> Delete</a></td>
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