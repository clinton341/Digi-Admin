<?php
	$name = " ";
	if(isset($_POST['submit'])){

//Main errors array
    $errors = array();
   //get values & sanitize them
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);

     if(!count($errors)){
        $date =time();
        $time = date('M jS Y', $date);
        $population = 0;
//Store them into database
        $stmt = $objDB->prepare(
        'INSERT INTO classes(class_name, class_population, date_created) 
         VALUES(?, ?, ?)'
    );

    
   $stmt->bind_param('sis',  $name, $population, $time);

    if($stmt->execute()){
            setMsg('class_success', 'Class created successfully', 'success');
    }else{  $error = $objDB->errno . ' ' . $objDB->error;
    echo $error;
    exit();
}

} else{

    $data = [
        'name' => $name,
    ];
    setMsg('form_data', $data);
    setMsg('errors', $errors);
 } 
}
?>
<div class="register">
<div class="heading">
		<h3>Create Class</h3>
	</div>
<div class="register">
	<div class="container" style="width: inherit;"> 
		<?php   
		    echo getMsg('class_success');
		 	echo getMsg('errors'); 
		 ?>
	</div>
<form action="#" method="post">
      <p id="subHeading">Submit the form to create new class</p>

		    <input type="text" placeholder="Classname" name="name" required>
		    
		    <button type="submit" name="submit" id="new_submit">Submit</button>
</form>
</div>
</div>
</body>
</html>
