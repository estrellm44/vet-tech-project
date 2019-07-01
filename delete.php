<html lang="en-us">
<head>
	<title>Delete Page</title>
	
	<?php
		include('nav.php');
	?>
	
</head>
<body>
    
    <div class="body_container">

        <?php

        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            
            if(isset($_GET['student']) and is_numeric($_GET['student'])){
                $id = $_GET['student'];
                
                echo "<h2>Are You Sure?</h2>";
                echo "<p>Are you sure you would like to delete this Student?</p><br>";
                echo '<p><a href="delete.php?studentConfirmed='.$id.'">Yes</a>';
                echo '&nbsp;&nbsp;&nbsp;';
                echo "<a href=\"javascript:history.go(-1)\">No</a></p>";
                
            }
            if (isset($_GET['studentConfirmed']) and is_numeric($_GET['studentConfirmed'])) {
                $id = $_GET['studentConfirmed'];
                $student = new StudentViewer();
                $student->deleteStudent($id);
            }
            
            if(isset($_GET['instructor']) and is_numeric($_GET['instructor'])){
                $id = $_GET['instructor'];
                
                echo "<h2>Are You Sure?</h2>";
                echo "<p>Are you sure you would like to delete this Instructor?</p><br>";
                echo '<p><a href="delete.php?instructorConfirmed='.$id.'">Yes</a>';
                echo '&nbsp;&nbsp;&nbsp;';
                echo "<a href=\"javascript:history.go(-1)\">No</a></p>";
                
            }
            if (isset($_GET['instructorConfirmed']) and is_numeric($_GET['instructorConfirmed'])) {
                $id = $_GET['instructorConfirmed'];
                $student = new InstructorViewer();
                $student->deleteInstructor($id);
            }
            if(isset($_GET['skill']) and is_numeric($_GET['skill'])){
                $id = $_GET['skill'];
                
                echo "<h2>Are You Sure?</h2>";
                echo "<p>Are you sure you would like to delete this Skill?</p><br>";
                echo '<p><a href="delete.php?skillConfirmed='.$id.'">Yes</a>';
                echo '&nbsp;&nbsp;&nbsp;';
                echo "<a href=\"javascript:history.go(-1)\">No</a></p>";
                
            }
            if (isset($_GET['skillConfirmed']) and is_numeric($_GET['skillConfirmed'])) {
                $id = $_GET['skillConfirmed'];
                $skill = new SkillViewer();
                $skill->deleteSkill($id);
            }
            if(isset($_GET['skillChapter']) and is_numeric($_GET['skillChapter'])){
                $id = $_GET['skillChapter'];
                
                echo "<h2>Are You Sure?</h2>";
                echo "<p>Are you sure you would like to delete this Chapter?</p><br>";
                echo '<p><a href="delete.php?skillChapterConfirmed='.$id.'">Yes</a>';
                echo '&nbsp;&nbsp;&nbsp;';
                echo "<a href=\"javascript:history.go(-1)\">No</a></p>";
                
            }
            if (isset($_GET['skillChapterConfirmed']) and is_numeric($_GET['skillChapterConfirmed'])) {
                $id = $_GET['skillChapterConfirmed'];
                $chapter = new SkillChapterViewer();
                $chapter->deleteChapter($id);
            }
            if(isset($_GET['skillSubChapter']) and is_numeric($_GET['skillSubChapter'])){
                $id = $_GET['skillSubChapter'];
                
                echo "<h2>Are You Sure?</h2>";
                echo "<p>Are you sure you would like to delete this Sub-Chapter?</p><br>";
                echo '<p><a href="delete.php?skillSubChapterConfirmed='.$id.'">Yes</a>';
                echo '&nbsp;&nbsp;&nbsp;';
                echo "<a href=\"javascript:history.go(-1)\">No</a></p>";
                
            }
            if (isset($_GET['skillSubChapterConfirmed']) and is_numeric($_GET['skillSubChapterConfirmed'])) {
                $id = $_GET['skillSubChapterConfirmed'];
                $subChapter = new SkillSubChapterViewer();
                $subChapter->deleteSubChapter($id);
            }
            
        }
        else {
            
            echo "<h1>Page Not Found</h1>";
            echo "<p>Please Try Again</p>";
            echo '<a href="home.php">Return to Home</a>';
            
        }
            
        ?>
        
    </div>
    
</body>

</html>