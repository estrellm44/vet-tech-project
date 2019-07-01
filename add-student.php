<html lang="en-us">

<head>
	<title>Add Student</title>
	
	<?php
		include('nav.php');
	?>
	
</head>
<body>
	
<div class="body-container">

	<h2>Add Student</h2>
	
	<div class = "form">
	<form id="addStudent" method="POST">
          
		First name:<br>
		<input type="text" name="firstName" maxlength="20" required>
		<br>
	  
		Last name:<br>
		<input type="text" name="lastName" maxlength="20" required>
		<br>
	  
		UNumber:<br>
		<input type ="text" name="uNumber" minlength="9" maxlength="9" size="10" required>
		<br>
	  
		Entry Year:<br>
		<input type ="number" name="entryYear" minlength="4" maxlength="4" size="5" required>
		<br>
		
		Grad Year:<br>
		<input type ="number" name="gradYear" minlength="4" maxlength="4" size="5">
		<br><br>
	    
	    <button type="submit" name="add-student">Submit</button>
	</form>
	</div>
	
	<?php
        
        //If User has submitted the form, add the Student
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
        	
            $submit = new StudentViewer();
            $submit->addStudent();
        }
            
	?>	

</div>

</body>
</html>