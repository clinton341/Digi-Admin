<?php
include '../process/config.php';
if (isset($_GET['id'])) {
	$id = $_GET['id'];

      //update database
     $sql= "UPDATE fee_payment
         SET status = 'Deleted'
         WHERE payment_id = '$id'";

         $stmt = $objDB->prepare($sql);
         if($stmt->execute()){
           setMsg('delete', 'Record deleted successfully ', 'success');
            redirect('fees/fees.php?id=3');
         } else{  $error = $objDB->errno . ' ' . $objDB->error;
              echo $error;
              exit();
          }
}
?>