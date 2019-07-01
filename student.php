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
                    
                    $student = new StudentViewer();
                    $student->showStudent($id);
                    
                    echo "<p><a href=\"add-studentskill.php?id=$id\">Add Skill</a></p>";
                    
                    $skills = new StudentSkillViewer();
                    $skills->showAllStudentSkills($id);
                }
                
            }
            else{
                
                echo "<h1>Student Not Found</h1>";
                echo "<p>Please try to search again.</p>";
                
            }
            
        ?>
        
    </div>
    
    <script>
        var acc = document.getElementsByClassName("accordion");
        var i;
        
        for (i = 0; i < acc.length; i++) {
            acc[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var panel = this.nextElementSibling;
                if (panel.style.display === "block") {
                    panel.style.display = "none";
                } else {
                    panel.style.display = "block";
                }
            });
        }
    </script>
    
</body>

</html>