<?php
include 'process/config.php';
if (isset($_GET['id'])) {
	$id = $_GET['id'];

 /* $delete_product = "DELETE FROM students WHERE student_id ='$id'";
  $result = $objDB->query($delete_product);           
  setMsg('delete', 'Record deleted successfully ', 'success');
  redirect('student_portal.php?id=2'); */
 
      //update database
     $sql= "UPDATE students
         SET status = 'Deleted'
         WHERE student_id = '$id'";

         $stmt = $objDB->prepare($sql);
         if($stmt->execute()){
           setMsg('delete', 'Record deleted successfully ', 'success');
            redirect('student_portal.php?id=2');
         } else{  $error = $objDB->errno . ' ' . $objDB->error;
              echo $error;
              exit();
          }
}

?>