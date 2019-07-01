<html lang="en-us">

<head>
	<title>Manage Skills</title>
	
	<?php
		include('nav.php');
	?>
	
</head>
<body>
	
	<div class="body-container">
		
		<?php
		    
		    echo "<h2>Skills</h2>";
		    echo "<p><a href=\"add-skill.php\">Add Skill</a></p>";
			$skills = new SkillViewer();
			$skills->showAllSkills();
			
			echo "<h2>Chapters</h2>";
			echo "<p><a href=\"add-chapter.php\">Add Chapter</a></p>";
			$chapters = new SkillChapterViewer();
			$chapters->showAllChapters();
			
			echo "<h2>Sub-Chapters</h2>";
			echo "<p><a href=\"add-subchapter.php\">Add Sub-Chapter</a></p>";
			$chapters = new SkillSubChapterViewer();
			$chapters->showAllSubChapters();
		
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
	
<!-- <h2> Manage Skills </h2>
	<br><br> -->
	
</body>
</html>