<?php
	$bcat = " ";
    $btitle =  " ";
    $author = " ";
    $copies =  " ";

	if(isset($_POST['submit'])){

//Main errors array
    $errors = array();
   //get values & sanitize them
    $bcat = filter_input(INPUT_POST, 'bcat', FILTER_SANITIZE_STRING);
    $btitle= filter_input(INPUT_POST, 'btitle', FILTER_SANITIZE_STRING);
    $author = filter_input(INPUT_POST, 'author', FILTER_SANITIZE_STRING);
    $copies = filter_input(INPUT_POST, 'copies', FILTER_SANITIZE_STRING);


     if(!count($errors)){
//Store them into database

        $stmt = $objDB->prepare(
        'INSERT INTO books(category, title, author,t_copies) 
         VALUES(?, ?, ?, ?)'
    );

    
   $stmt->bind_param('sssi',  $bcat, $btitle, $author, $copies);

    if($stmt->execute()){
            setMsg('booksuccess', 'Book saved successfully', 'success');
    }else{  $error = $objDB->errno . ' ' . $objDB->error;
    echo $error;
    exit();
}

} else{

    $data = [
        'title' => $title,
        'amount' => $amount,
    ];
    setMsg('form_data', $data);
    setMsg('errors', $errors);
 } 
}
?>


<div class="register">
<div class="heading">
	<h4>Add New Book</h4>
	<div class="container" style="width: inherit;"> 
	<?php   
	    echo getMsg('booksuccess');
	 	echo getMsg('errors'); 
	 ?>
	</div>
	</div>
<div class="register" style="padding: 3%;">
<form action="library.php?id=2" method="post">
      <p id="subHeading">Enter book details to update book directory<span style="font-size: 11px; color: blue;"> (All fields are required)</span></p>
             <!-- Display Error Message-->
             <?php //require_once 'includes/error_display.php'; ?>
            <div class="select">
		      <span class="invalid-feedback"><?php if (isset($err['country_err'])) { echo($err['country_err']); } ?></span> 
				<select name="bcat">
							<option>Select Book Category</option>
							<option>Arts</option>
							<option>Science</option>
				</select>
		   </div>

            <span class="invalid-feedback"><?php if (isset($err['firstname_err'])) { echo($err['firstname_err']); } ?></span>
		    <input type="text" placeholder="Book Title" name="btitle" required>
           

		     <span class="invalid-feedback"><?php if (isset($err['lastname_err'])) { echo($err['lastname_err']); } ?></span>
		    <input type="text" placeholder="Author" name="author" required>
		    
		    <span class="invalid-feedback"><?php if (isset($err['confirm_password_err'])) { echo($err['confirm_password_err']); } ?></span>
		    <input type="number" placeholder="Total Copies" name="copies" required>
		    
		    <button type="submit" name="submit">Save</button>
</form>

</div>
</div>
</div>
</body>
</html>