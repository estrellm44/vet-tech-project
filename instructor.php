<html lang="en-us">
<head>
	<title>Search Result</title>
	
	<?php
		include('nav.php');
	?>
	
</head>
<body>
    
    <div class="body_container">

        <?php

            if($_SERVER['REQUEST_METHOD'] == 'GET'){
                
                if (isset($_GET['id']) and is_numeric($_GET['id'])){
                    $id = $_GET['id'];
                    
                    $instructor = new InstructorViewer();
                    $instructor->showInstructor($id);
                }
                
            }
            else{
                
                echo "<h1>Instructor Not Found</h1>";
                echo "<p>Please try again.</p>";
                
            }
            
        ?>
        
    </div>
    
</body>
                          
</html>