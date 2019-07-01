<html lang="en-us">
<head>
	<title>Add Student Skill</title>
	
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
                    
                    echo "<h2>Add Completed Skill</h2>";
                    
                    $skills = new SkillViewer();
                    $skills->showAllStudentSkills($id);
                }
                if (isset($_GET['student']) and is_numeric($_GET['student'])
                and isset($_GET['skill']) and is_numeric($_GET['skill'])){
                    $student = $_GET['student'];
                    $skill = $_GET['skill'];
                    
                    $fullName = $_SESSION['firstName']." ".$_SESSION['lastName'];
                    $date = date('Y-m-d');
                    
                    echo "<h2>Add Completed Skill</h2>";
                    
                    echo "<div class=\"form\">";
                    echo "<form name=\"add-studentskill\" method=\"POST\">";
                    echo "Date of Assessment: <br><input type=\"date\" name=\"assessmentDate\" value=\"".$date."\" required><br>";
                    echo "Signature: <br><input type=\"text\" name=\"signature\" value=\"".$fullName."\" required><br>";
                    echo "Assessment: <br><select name=\"assessment\" required>";
                        echo "<option value=\"1\">1-Poor</option>";
                        echo "<option value=\"2\">2-Needs Improvement</option>";
                        echo "<option value=\"3\">3-Satisfactory</option>";
                        echo "<option value=\"4\">4-Proficient</option>";
                    echo "</select><br>";
                    //echo "Notes: <br><input type=\"text\" name=\"notes\" required><br>";
                    echo "Notes:<br><textarea name=\"notes\" rows=\"5\" cols=\"20\" required></textarea><br>";
                    //echo '<button><a href="add-studentskill.php?student='.$student.'&skill='.$skill['skill_id'].'">Add</button>';
                    echo "<button type=\"submit\" name=\"add-studentskill\">Submit</button>";
                    echo "</form>";
                    echo "</div>";
                }
                
            }
            elseif ($_SERVER['REQUEST_METHOD'] == 'POST'){
                if (isset($_GET['student']) and is_numeric($_GET['student'])
                and isset($_GET['skill']) and is_numeric($_GET['skill'])){
                    
                    $skill = new StudentSkillViewer();
                    $skill->addStudentSkill($_GET['student'], $_GET['skill']);
                }
            }
            else{
                
                echo "<h1>There was an issue</h1>";
                echo "<p>Please try to search again.</p>";
                echo '<a href="home.php">Return to Home</a>';
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