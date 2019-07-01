<html lang="en-us">

<head>
	<title>Password Reset</title>
	
	<?php
		include('nav.php');
	?>
</head>
<body>
    
    <!-- If there's time.. Link Generation Here -->

    <div class="body-container">
        
        <h2>Password Reset</h2>
	
	    <div class = "form">
	    <form id="resetPassword" method="POST">
        	
        	Password:<br>
        	<input type="password" name="password" minlength="8" maxlength="20">
        	<br><br>
        	
        	Confirm Password:<br>
        	<input type="password" name="c_password" minlength="8" maxlength="20">
        	<br><br>
            
            <button type="submit" name="reset-password">Submit</button>
    	    </form>
	    </div>
        
    </div>

    
	
	<?php
        
        //If User has submitted the form, Reset the Password
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            
            if (isset($_GET['id']) and is_numeric($_GET['id'])){
                $id = $_GET['id'];
            
                if (strcmp($_POST['password'],$_POST['c_password']) == 0){
                    $submit = new InstructorViewer();
                    $submit->updatePassword($id);
                }
                else {
                    //NEED THE PASSWORDS TO MATCH
                    echo "<p>Passwords do not match</p>";
                }
                
            }
            else {
                echo "<p>There was an issue reseting the password.</p>";
            }
            
        }
            
    ?>


</body>
</html>