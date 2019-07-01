<html lang="en-us">

<head>
	<title>List of Instructors</title>
	
	<?php
		include('nav.php');
	?>
	
</head>
<body>
	
	<div class="body-container">
		
			<?php
			
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
				
				echo "<h1>List of Instructors</h1>";
                    
                    echo '<a href="add-instructor.php">Add Instructor</a>';
                    
                    echo '<div class="form">
                    <form method="POST">
                        <select name="orderby">
                            <option value="" selected>Order By</option>
                            <option value="firstName">First Name</option>
                            <option value="lastName">Last Name</option>
                            <option value="uNumber">U-Number</option>
                        </select>
                      <button type="submit" value"order-by">Apply</button>
                    </form>
                    </div>';
                    
                    $instructors = new InstructorViewer();
                    $instructors->showAllInstructorsOrder();
				
			}
			else{
				
				echo "<h1>List of Instructors</h1>";
                    
                    echo '<a href="add-instructor.php">Add Instructor</a>';
                    
                    echo '<div class="form">
                    <form method="POST">
                        <select name="orderby">
                            <option value="" selected>Order By</option>
                            <option value="firstName">First Name</option>
                            <option value="lastName">Last Name</option>
                            <option value="uNumber">U-Number</option>
                        </select>
                      <button type="submit" value"order-by">Apply</button>
                    </form>
                    </div>';
                    
                    $instructors = new InstructorViewer();
                    $instructors->showAllInstructors();
				
			}
		
		?>
		
	</div>

</body>
</html>