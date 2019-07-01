<html lang="en-us">

<head>
	<title>Edit Chapter</title>
	
	<?php
		include('nav.php');
	?>
	
</head>
<body>
    
<?php
    
    //Grab the current Chapter's information
    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        
        if (isset($_GET['id']) and is_numeric($_GET['id'])){
            $id = $_GET['id'];
            
            $chapters = new SkillChapterViewer();
            $chapter = $chapters->grabChapter($id);
            
        }
        
    }
    
?>
	
<div class="body-container">

	<h2>Edit Chapter</h2>
	
	<div class = "form">
	<form id="editChapter" method="POST">
          
		Chapter Number:<br>
		<input type="number" name="chapterNumber" value="<?php echo $chapter['chapterNumber']; ?>" size="5" required>
		<br>
	  
		Chapter Name:<br>
		<input type="text" name="chapterName" value="<?php echo $chapter['chapterName']; ?>" maxlength="100" required>
		<br>
	    
	    <button type="submit" name="edit-chapter">Submit</button>
	</form>
	</div>
	
	<?php
        
        //If User has submitted the form, add the Student
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
        	if (isset($_GET['id']) and is_numeric($_GET['id'])){
                $id = $_GET['id'];
                $submit = new SkillChapterViewer();
                $submit->updateChapter($id);
            }
        }
            
	?>	

</div>

</body>
</html>