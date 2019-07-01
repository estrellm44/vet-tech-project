<html lang="en-us">

<head>
	<title>Add Instructor</title>
	
	<?php
		include('nav.php');
	?>
</head>
<body>

    <div class="body-container">
        
        <h2>Add Instructor</h2>
	
	    <div class = "form">
	    <form id="addInstructor" method="POST">
          
        	First name:<br>
        	<input type="text" name="firstName" maxlength="20" required>
        	<br>
          
        	Last name:<br>
        	<input type="text" name="lastName" maxlength="20" required>
        	<br>
          
        	U-Number:<br>
        	<input type ="text" name="uNumber" minlength="9" maxlength="9" required>
        	<br>
        	
        	Password:<br>
        	<input type="password" name="password" minlength="8" maxlength="20">
        	<br>
        	
        	Confirm Password:<br>
        	<input type="password" name="c_password" minlength="8" maxlength="20">
        	<br><br>
        	
        	Login Access:<br>
        	<input type="radio" name="isUser" value="1" checked> Yes<br>
            <input type="radio" name="isUser" value="0"> No<br>
        	<br>
        	
        	Admin Access:<br>
        	<input type="radio" name="isAdmin" value="1" checked> Yes<br>
            <input type="radio" name="isAdmin" value="0"> No<br>
        	<br><br>
            
            <button type="submit" name="add-instructor">Submit</button>
    	    </form>
	    </div>
        
    </div>

    
	
	<?php
        
        //If User has submitted the form, add the Instructor
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            
            if (strcmp($_POST['password'],$_POST['c_password']) == 0){
                $submit = new InstructorViewer();
                $submit->addInstructor();
            }
            else {
                //NEED THE PASSWORDS TO MATCH
                echo "<p>Passwords do not match</p>";
            }
        	
            
        }
            
    ?>


</body>
</html>