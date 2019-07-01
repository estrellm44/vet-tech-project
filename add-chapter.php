<html lang="en-us">

<head>
	<title>Add Chapter</title>
	
	<?php
		include('nav.php');
	?>
	
</head>
<body>
	
<div class="body-container">

	<h2>Add Chapter</h2>
	
	<div class = "form">
	<form id="addChapter" method="POST">
          
		Chapter Number:<br>
		<input type="number" name="chapterNumber" size="5" required>
		<br>
	  
		Chapter Name:<br>
		<input type="text" name="chapterName" maxlength="100" required>
		<br>
	    
	    <button type="submit" name="add-chapter">Submit</button>
	</form>
	</div>
	
	<?php
        
        //If User has submitted the form, add the Student
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
        	
            $submit = new SkillChapterViewer();
            $submit->addChapter();
        }
            
	?>	

</div>

</body>
</html>