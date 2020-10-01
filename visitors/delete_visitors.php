<?php
include '../process/config.php';
if (isset($_GET['id'])) {
	$id = $_GET['id'];

      //update database
     $sql= "UPDATE visitors
         SET status = 'Deleted'
         WHERE visitor_id = '$id'";

         $stmt = $objDB->prepare($sql);
         if($stmt->execute()){
           setMsg('delete', 'Record deleted successfully ', 'success');
            redirect('visitors/visitors.php?id=2');
         } else{  $error = $objDB->errno . ' ' . $objDB->error;
              echo $error;
              exit();
          }
}
?>