<?php 
//Database Main Object
function objDB(){
    $objDB = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    
    if($objDB->connect_error){
      die("Connection not established");
    }
    
    return $objDB;
}

function FetchStudents(){
	$objDB = objDB();
	global $row;
	global $result;

	$sql = "SELECT * FROM students";
	$result = $objDB->query($sql);
}

// Get student by id
function getStudentById($student_id){
    $objDB = objDB();
    global $stmt;
    global $row;
   
     $stmt = $objDB->prepare(
            'SELECT * FROM students WHERE student_id=?'
     );
    
     $stmt->bind_param('i', $student_id);
    
     $stmt->execute();
    
     $result = $stmt->get_result();

     $row = $result->fetch_array(MYSQLI_ASSOC);
}

// Get student by id
function getPaymentById($payment_id){
    $objDB = objDB();
    global $stmt;
    global $row;
   
     $stmt = $objDB->prepare(
            'SELECT * FROM fee_payment WHERE payment_id=?'
     );
    
     $stmt->bind_param('i', $payment_id);
    
     $stmt->execute();
    
     $result = $stmt->get_result();

     $row = $result->fetch_array(MYSQLI_ASSOC);
}

// Get product by seller id
function getStaffById($staff_id){
    $objDB = objDB();
    global $stmt;
    global $row;
   
     $stmt = $objDB->prepare(
            'SELECT * FROM staff WHERE staff_id=?'
     );
    
     $stmt->bind_param('i', $staff_id);
    
     $stmt->execute();
    
     $result = $stmt->get_result();

     $row = $result->fetch_array(MYSQLI_ASSOC);
}

//setting a msg
function setMsg($name, $value, $class = 'success'){
    if(is_array($value)){
        $_SESSION[$name] = $value;
    }else{
        $_SESSION[$name] = "<div class='alert alert-$class text-center'>$value</div>";
    }
}
//getting a msg
function getMsg($name){
    if(isset($_SESSION[$name])){
        $session=$_SESSION[$name];
        unset($_SESSION[$name]);
        return $session;
    }
}

//redirection reuseable function
function redirect($file){
    header("Location:".URLROOT.'/'.$file); 
}
?>