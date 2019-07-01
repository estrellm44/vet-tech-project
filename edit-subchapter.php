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
    
    //Grab the current Sub-Chapter's information
    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        
        if (isset($_GET['id']) and is_numeric($_GET['id'])){
            $id = $_GET['id'];
            
            $subChapters = new SkillSubChapterViewer();
            $subChapter = $subChapters->grabSubChapter($id);
            
        }
        
    }
?>
	
<div class="body-container">

	<h2>Edit Sub-Chapter</h2>
	
	<div class = "form">
	<form id="editSubChapter" method="POST">
          
		Chapter:<br>
        <select name="chapter_id" size="<?php echo count($chapters);?>"><br>
            <?php
                foreach($chapters as $chapter){
                    echo "<option value=".$chapter['chapter_id'];
                    if ($subChapter['chapter_id'] == $chapter['chapter_id']){
                        echo " selected";
                    }
                    echo ">".$chapter['chapterNumber']." ".$chapter['chapterName'];"</option>";
                }
            ?>
        </select>
      <br><br>
	  
		Sub-Chapter Name:<br>
		<input type="text" name="subChapterName" value="<?php echo $subChapter['subChapterName']; ?>" maxlength="100" required>
		<br>
	    
	    <button type="submit" name="edit-subchapter">Submit</button>
	</form>
	</div>
	
	<?php
        
        //If User has submitted the form, add the Student
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
        	if (isset($_GET['id']) and is_numeric($_GET['id'])){
                $id = $_GET['id'];
                $submit = new SkillSubChapterViewer();
                $submit->updateSubChapter($id);
            }
        }
            
	?>	

</div>

</body>
</html>