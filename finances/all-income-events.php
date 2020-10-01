<div class="table_student">
<h4>All Income Events 		
</h4>
<table>
  <tr id="th">
  	<td>Event Id</td>
    <td>Event Name</td>
    <td>Date</td>
    <td>Amount</td>
    <td>Additional Info</td>
    <td>Options</td>
  </tr>

  <?php   
  $sql = "SELECT * FROM income_event";
  $result = $objDB->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $title = $row["title"]; 
        $date_created = $row["date_created"];
        $amount = $row["amount"];
        $comments = $row["comments"];
        $event_id = $row["event_id"];
?>
  <tr>
    <td><?php echo $event_id; ?></td>
    <td><?php echo $title; ?></td>
    <td><?php echo $date_created; ?></td>
    <td><?php echo $amount; ?></td>
    <td><?php echo $comments; ?></td> 
    <td><a href="#" style="color: blue;">View </a>&nbsp;&nbsp;&nbsp; |&nbsp;&nbsp;&nbsp; <a href="#" style="color: green">Edit</a>  &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a href="#" style="color: red;"> Delete</a></td>
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