<?php
include '../process/config.php';
if (isset($_GET['id'])) {
	$id = $_GET['id'];

      //update database
     $sql= "UPDATE fee_records
         SET status = 'Deleted'
         WHERE id = '$id'";

         $stmt = $objDB->prepare($sql);
         if($stmt->execute()){
           setMsg('delete', 'Record deleted successfully ', 'success');
            redirect('fees/fees.php?id=4');
         } else{  $error = $objDB->errno . ' ' . $objDB->error;
              echo $error;
              exit();
          }
}
?>