<div class="table_student">
<h2>All Classes</h2>
<table>
  <tr id="th">
    <td>class Id</td>
    <td>Class Name</td>
    <td>Class Population</td>
    <td>Options</td>
  </tr>
  <?php   
  $sql = "SELECT * FROM classes";
  $result = $objDB->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row

    while($row = $result->fetch_assoc()) {
        $class_id = $row["class_id"]; 
        $class_name = $row["class_name"];
        $class_population = $row["class_population"];
?>
      <tr>
        <td><?php echo $class_id; ?></td>
        <td><?php echo ucfirst($class_name); ?></td>
        <td><?php echo $class_population; ?></td>
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
</div>
</body>
</html> 