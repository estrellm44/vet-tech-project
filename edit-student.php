<html lang="en-us">

<head>
	<title>Edit Student</title>
	
	<?php
		include('nav.php');
	?>
	
</head>
<body>
    
<?php
    
    //Grab the current Student's information
    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        
        if (isset($_GET['id']) and is_numeric($_GET['id'])){
            $id = $_GET['id'];
            
            $students = new StudentViewer();
            $student = $students->grabStudent($id);
            
        }
        
    }
    
?>

<h2> Edit Student </h2>
	<br><br>
	
	<div class = "form">
	<form id="editStudent" method="POST">
          
		First name:<br>
		<input type="text" name="firstName" value="<?php echo $student['firstName']; ?>" maxlength="20" required>
		<br>
	  
		Last name:<br>
		<input type="text" name="lastName" value="<?php echo $student['lastName']; ?>" maxlength="20" required>
		<br>
	  
		UNumber:<br>
		<input type ="text" name="uNumber" value="<?php echo $student['uNumber']; ?>" minlength="9" maxlength="9" required>
		<br>
	  
		Entry Year:<br>
		<input type ="number" name="entryYear" value="<?php echo $student['entryYear']; ?>" minlength="4" maxlength="4" size="5" required>
		<br>
		
		Grad Year:<br>
		<input type ="number" name="gradYear" value="<?php echo $student['gradYear']; ?>" minlength="4" maxlength="4" size="5">
		<br><br><br>
	    
	    <button type="submit" onclick="" name="edit-student">Submit</button>
	</form>
	</div>
	
<?php
    
    //If the User has submitted the form, edit the Student
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if (isset($_GET['id']) and is_numeric($_GET['id'])){
            $id = $_GET['id'];
            $submit = new StudentViewer();
            $submit->updateStudent($id);
        }
    }
        
?>


</body>
</html>