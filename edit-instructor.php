<html lang="en-us">

<head>
	<title>Edit Instructor</title>
	
	<?php
		include('nav.php');
	?>
</head>
<body>
    
<?php
    
    //Grab the current Instructor's information
    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        
        if (isset($_GET['id']) and is_numeric($_GET['id'])){
            $id = $_GET['id'];
            
            $instructors = new InstructorViewer();
            $instructor = $instructors->grabInstructor($id);
            
        }
        
    }
    
?>

<h2> Edit Instructor </h2>
	<br><br>
	
	<div class = "form">
	<form id="editInstructor" method="POST">
          
        	First name<br>
        	<input type="text" name="firstName" value="<?php echo $instructor['firstName']; ?>" maxlength="20" required>
        	<br>
          
        	Last name<br>
        	<input type="text" name="lastName" value="<?php echo $instructor['lastName']; ?>" maxlength="20" required>
        	<br>
          
        	U-Number<br>
        	<input type ="text" name="uNumber" value="<?php echo $instructor['uNumber']; ?>" minlength="9" maxlength="9" required>
        	<br><br>
        	
        	Login Access<br>
        	<input type="radio" name="isUser" value="1" <?php if($instructor['isUser']== 1){echo "checked";} ?>> Yes<br>
            <input type="radio" name="isUser" value="0" <?php if($instructor['isUser']== 0){echo "checked";} ?>> No<br>
        	<br>
        	
        	Admin Access<br>
        	<input type="radio" name="isAdmin" value="1" <?php if($instructor['isAdmin']== 1){echo "checked";} ?>> Yes<br>
            <input type="radio" name="isAdmin" value="0" <?php if($instructor['isAdmin']== 0){echo "checked";} ?>> No<br>
        	<br><br><br>
            
            <button type="submit" onclick="" name="edit-instructor">Submit</button>
    	    </form>
	</div>
	
<?php
    
    //If the User has submitted the form, edit the Instructor
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        //IF PASSWORDS MATCH HERE
        
        if (isset($_GET['id']) and is_numeric($_GET['id'])){
            $id = $_GET['id'];
            $submit = new InstructorViewer();
            $submit->updateInstructor($id);
        }
    }
        
?>


</body>
</html>