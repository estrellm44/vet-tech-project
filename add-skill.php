<html lang="en-us">

<head>
	<title>Add Skill</title>
	
	<?php
		include('nav.php');
	?>
	
</head>
<body>
    
    <?php
    
        $chapters = new SkillChapterViewer();
        $chapters = $chapters->grabAllChapters();
    
    ?>

<h2> Add Skill </h2>
	<br><br>
	
	<div class = "form">
    <form id="selectChapter" method="GET">
  
      Select Chapter:<br>
        <select name="chapter_id" size="<?php echo count($chapters);?>">
            <?php
                foreach($chapters as $chapter){
                    echo "<option value=".$chapter['chapter_id'].">".$chapter['chapterNumber']." ".$chapter['chapterName']."</option>";
                }
            ?>
        </select>
      <br><br>
      <button type="submit" id="selectChapter-submit">Submit</button>
      </form>
      
        <?php
        
            //If User has submitted the chapter, print the rest of the form
            if($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['chapter_id'])){
                //$chapter_id = $_GET['chapter_id'];
                $_POST['chapter_id'] = $_GET['chapter_id'];
                
                $subChapters = new SkillSubChapterViewer();
                $subChapters = $subChapters->grabAllSubChapters();
                
                echo "Sub-Chapter: <br>";
                echo "<select name=\"subChapter_id\" size=\"".count($subChapters)."\">";
                //SELECT * FROM SKILL_SUBCHAPTER WHERE chapter_id = $_POST['chapter_id'] AND active = '1';
                //grabSubChaptersWhere();
                
                foreach($subChapters as $subChapter){
                    echo "<option value=".$chapter['chapter_id'].">".$chapter['chapterNumber']." ".$chapter['chapterName']."</option>";
                }
                echo "</select>";
                
                echo 'Essential Skills:<br>
                <textarea rows="7" cols="45" maxlength="500" required></textarea>
                <br><br>';
                
                echo 'Skill Type:<br>
                <select name="skillType_id" required>
                    <option value="2">Hands On</option>
                    <option value="3">Group</option>
                    <option value="1">Didactic</option>
                </select> 
                <br><br>';
                
                echo 'Is a Simulation Accepted?<br>
                <input type="radio" name="isSimulationAccepted" value="1">Yes<br> 
                <input type="radio" name="isSimulationAccepted" value="0">No<br>';
                
                echo "<br><br>";
                
                echo '<button type="submit" id="addSkill-submit">Submit</button>
                </div>';
            }
            
        ?>
  
      <!-- Sub-Chapter:<br>
      <input type="text" name="sub-chapter" maxlength="5">
      <br>
  
      Essential Skills:<br>
      <textarea rows="7" cols="45" maxlength="500" required></textarea>
      <br><br>
  
      Skill Type:<br>
      <select name="Skill Type" required>
          <option value="Hands On">Hands On</option>
          <option value="Group">Group</option>
          <option value="Didactic">Didactic</option>
      </select> 
      <br><br>
      
      Is a Simulation Accepted?<br>
      <input type="checkbox" name="simulation" value="SimulationAccepted">Yes 
      <input type="checkbox" name="simulation" value="SimulationNotAccepted">No
      
      <br><br><br>
  
      <button type="submit" id="addSkill-submit">Submit</button>
	</div> -->

</body>
</html>