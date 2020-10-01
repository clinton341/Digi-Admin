<?php
include '../process/config.php';
if (isset($_GET['id'])) {
	$id = $_GET['id'];
      //update database
         $sql= "UPDATE staff
         SET status = 'Deleted'
         WHERE staff_id = '$id'";

         $stmt = $objDB->prepare($sql);
         if($stmt->execute()){
           setMsg('delete', 'Record deleted successfully ', 'success');
            redirect('staff/staff_portal.php?id=2');
         } else{  $error = $objDB->errno . ' ' . $objDB->error;
              echo $error;
              exit();
          }
}
?>