<html lang="en-us">

<head>
	<title>List of Students</title>
	
	<?php
		include('nav.php');
	?>
	
</head>
<body>
	
    <div class="body-container">
        
    <?php
    
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
                    
                    echo "<h1>List of Students</h1>";
                    
                    echo '<a href="add-student.php">Add Student</a>';
                    
                    echo '<div class="form">
                    <form method="POST">
                        <select name="orderby">
                            <option value="" selected>Order By</option>
                            <option value="firstName">First Name</option>
                            <option value="lastName">Last Name</option>
                            <option value="uNumber">U-Number</option>
                        </select>
                        <input type="radio" name="gradYear" value="both" checked>Both
                        <input type="radio" name="gradYear" value="IS NULL">Only Current Students
                        <input type="radio" name="gradYear" value="IS NOT NULL">Only Graduated Students
                      <button type="submit" value"order-by">Apply</button>
                    </form>
                    </div>';
                    
                    $students = new StudentViewer();
                    $students->showAllStudentsOrder();
                    
        }
        else {
                
                echo "<h1>List of Students</h1>";
                
                echo '<a href="add-student.php">Add Student</a>';
                
                echo '<div class="form">
                    <form method="POST">
                        <select name="orderby">
                            <option value="" selected>Order By</option>
                            <option value="firstName">First Name</option>
                            <option value="lastName">Last Name</option>
                            <option value="uNumber">U-Number</option>
                        </select>
                        <input type="radio" name="gradYear" value="both" checked>Both
                        <input type="radio" name="gradYear" value="IS NULL">Only Current Students
                        <input type="radio" name="gradYear" value="IS NOT NULL">Only Graduated Students
                      <button type="submit" value"order-by">Apply</button>
                    </form>
                    </div>';
                    
                    $search = new StudentViewer();
                    $search->showAllStudents();
            
        }
    
    ?>
    

    
    </div>	


</body>
</html>