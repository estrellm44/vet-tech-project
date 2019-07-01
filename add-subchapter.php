<html lang="en-us">

<head>
	<title>Add Chapter</title>
	
	<?php
		include('nav.php');
	?>
	
</head>
<body>
    
<?php
    $chapters = new SkillChapterViewer();
    $chapters = $chapters->grabAllChapters();
?>
	
<div class="body-container">

	<h2>Add Chapter</h2>
	
	<div class = "form">
	<form id="addChapter" method="POST">
          
		Chapter:<br>
        <select name="chapter_id" size="<?php echo count($chapters);?>"><br>
            <?php
                foreach($chapters as $chapter){
                    echo "<option value=".$chapter['chapter_id'].">".$chapter['chapterNumber']." ".$chapter['chapterName']."</option>";
                }
            ?>
        </select>
      <br><br>
	  
		Sub-Chapter Name:<br>
		<input type="text" name="subChapterName" maxlength="100" required>
		<br>
	    
	    <button type="submit" name="add-chapter">Submit</button>
	</form>
	</div>
	
	<?php
        
        //If User has submitted the form, add the Student
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
        	
            $submit = new SkillSubChapterViewer();
            $submit->addSubChapter();
        }
            
	?>	

</div>

</body>
</html>