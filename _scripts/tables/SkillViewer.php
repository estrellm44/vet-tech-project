<?php

class SkillViewer extends CRUD{
    
    protected $table = "SKILL";
    protected $idName = "skill_id";
    //protected $joinSkill = "INNER JOIN SKILL_COURSE ON SKILL.course_id = SKILL_COURSE.course_id";
    protected $joinAll = "INNER JOIN SKILL_COURSE ON SKILL.course_id = SKILL_COURSE.course_id
                        INNER JOIN SKILL_CHAPTER ON SKILL.chapter_id = SKILL_CHAPTER.chapter_id
                        INNER JOIN SKILL_SUBCHAPTER ON SKILL.subChapter_id = SKILL_SUBCHAPTER.subChapter_id";
    
    public function showAllSkillsSpecial($student){
        $orderCourse = [ "course_id", ];
        
        $courseValues = [ "status_id" => "'1'", ];
        
        $allCourses = $this->selectWhereOrder($this->table,$courseValues,$orderCourse);
                  
        if(is_array($allCourses) && count($allCourses)>0){
            
            $allCourses = array_column($allCourses, 'course_id');
            $courses = array_unique($allCourses, SORT_NUMERIC);
            
            //print_r($courses);
            
            foreach ($courses as $course){
            
            $skillValues = [ "SKILL_COURSE.course_id" => $course,
                                "status_id" => "'1'"];
            
            $orderSkill = [ "SKILL_COURSE.course_id", ];
            
            $skills = $this->selectJoinWhereOrder($this->table,$this->joinAll,$skillValues,$orderSkill);
            //print_r($skills);
            
            if(is_array($skills) && count($skills)>0){
            
            //echo "<h2>".$skills[0]['courseCode']."</h2>";
            echo "<h2 class=\"accordion\">".$skills[0]['courseCode']."</h2>";
            
            //echo "<button class=\"accordion\">".$skills[0]['courseCode']."</button>";
            //echo "<div class=\"panel\">";
            
            echo "<table style=\"max-width=100px\">";
            echo "<tr>";
            echo "<th>Chapter/ Sub Chapter</th>";
            echo "<th>Skill Number</th>";
            echo "<th>Essential Skills</th>";
            echo "<th>Hands On&#9995<br>Group&#9995&#9995<br>or Didactic&#9998</th>";
            echo "<th>Date Completed</th>";
            echo "<th>Full Name</th>";
            echo "<th>Assessment</th>";
            echo "<th>Notes</th>";
            echo "</tr>";
            
            foreach($skills as $skill){
            
                echo "<tr>";
            	echo "<td>".$skill['chapterNumber'].". ".$skill['chapterName']."<br>".$skill['subChapterName']."</td>";
                echo "<td>".$skill['skillNumber']."</td>";
                echo "<td>".$skill['description']."</td>";
                echo "<td>";
                if ($skill['skillType_id'] == 1){
                    echo "&#9998";
                }
                elseif ($skill['skillType_id'] == 2){
                    echo "&#9995";
                }
                elseif ($skill['skillType_id'] == 3){
                    echo "&#9995&#9995";
                }
                echo "</td>";
                echo "<form name=\"add-studentskill\" method=\"POST\">";
                echo "<td><input type=\"date\" name=\"assessmentDate\"></td>";
                echo "<td><input type=\"text\" name=\"signature\"></td>";
                echo "<td><select>";
                    echo "<option value=\"1\">1-Poor</option>";
                    echo "<option value=\"2\">2-Needs Improvement</option>";
                    echo "<option value=\"3\">3-Satisfactory</option>";
                    echo "<option value=\"4\">4-Proficient</option>";
                echo "</select></td>";
                echo "<td><input type=\"text\" name=\"notes\"></td>";
                //echo '<td><a href="add-studentskill.php?skill='.$skill['skill_id'].'">Submit</td>';
                
                $link = 'add-studentskill.php?skill='.$skill['skill_id'].'';
                
                
                echo "<td><button type\"submit\" onclick=\"window.location.href='$link'\" name=\"addStudentSkill-submit\">Submit</button></td>";
                echo "</tr>";
          
            }
            
        }
        else {
            echo '<h3>No Skills Found</h3>';
        }
        
        echo '</table>';
        //echo '</div>';
        
            }//END for each course
        }
        else {
          echo '<h3>No Completed Skills</h3>';
        }
    }
    
    public function showAllSkills(){
        
        $orderCourse = [ "course_id", ];
        
        $courseValues = [ "status_id" => "'1'", ];
        
        $allCourses = $this->selectWhereOrder($this->table,$courseValues,$orderCourse);
                  
        if(is_array($allCourses) && count($allCourses)>0){
            
            $allCourses = array_column($allCourses, 'course_id');
            $courses = array_unique($allCourses, SORT_NUMERIC);
            
            //print_r($courses);
            
            foreach ($courses as $course){
            
            $skillValues = [ "SKILL_COURSE.course_id" => $course,
                                "status_id" => "'1'"];
            
            $orderSkill = [ "SKILL_COURSE.course_id", ];
            
            $skills = $this->selectJoinWhereOrder($this->table,$this->joinAll,$skillValues,$orderSkill);
            //print_r($skills);
            
            if(is_array($skills) && count($skills)>0){
            
            echo "<button class=\"accordion\">".$skills[0]['courseCode']."</button>";
            echo "<div class=\"panel\">";
            echo "<table style=\"max-width=100px\">";
            echo "<tr>";
            echo "<th>Chapter/ Sub Chapter</th>";
            echo "<th>Skill Number</th>";
            echo "<th>Essential Skills</th>";
            echo "<th>Hands On&#9995<br>Group&#9995&#9995<br>or Didactic&#9998</th>";
            //echo "<th>Date</th>";
            //echo "<th>Instructor's Name</th>";
            //echo "<th>Instructor's Assessment</th>";
            //echo "<th>Signed On</th>";
            echo "</tr>";
            
            foreach($skills as $skill){
            
                echo "<tr>";
            	echo "<td>".$skill['chapterNumber'].". ".$skill['chapterName']."<br>".$skill['subChapterName']."</td>";
                echo "<td>".$skill['skillNumber']."</td>";
                echo "<td>".$skill['description']."</td>";
                echo "<td>";
                if ($skill['skillType_id'] == 1){
                    echo "&#9998";
                }
                elseif ($skill['skillType_id'] == 2){
                    echo "&#9995";
                }
                elseif ($skill['skillType_id'] == 3){
                    echo "&#9995&#9995";
                }
                echo "</td>";
                echo '<td><a href="manage-skills.php?skill='.$skill['skill_id'].'">Edit</td>';
                echo '<td><a href="delete.php?skill='.$skill['skill_id'].'">Delete</a></td>';
                /*echo "<td>".$skill['assessmentDate']."</td>";
            	echo "<td>".$skill['firstName']." ".$skill['lastName']."</td>";
                echo "<td>";
                if ($skill['assessment'] == 1){
                    echo "1: Poor";
                }
                elseif ($skill['assessment'] == 2){
                    echo "2: Needs Improvement";
                }
                elseif ($skill['assessment'] == 3){
                    echo "3: Satisfactory";
                }
                elseif ($skill['assessment'] == 4){
                    echo "4: Proficient";
                }
                echo "</td>";
                echo "<td>".$skill['signedOn']."</td>";*/
                echo "</tr>";
          
            }
            
        }
        else {
            echo '<h3>No Skills Found</h3>';
        }
        
        echo '</table>';
        echo '</div>';
        
            }//END for each course
        }
        else {
          echo '<h3>No Completed Skills</h3>';
        }
    }
    
    public function showAllStudentSkills($student){
        
        $orderCourse = [ "course_id", ];
        
        $courseValues = [ "status_id" => "'1'", ];
        
        $allCourses = $this->selectWhereOrder($this->table,$courseValues,$orderCourse);
                  
        if(is_array($allCourses) && count($allCourses)>0){
            
            $allCourses = array_column($allCourses, 'course_id');
            $courses = array_unique($allCourses, SORT_NUMERIC);
            
            //print_r($courses);
            
            foreach ($courses as $course){
            
            $skillValues = [ "SKILL_COURSE.course_id" => $course,
                                "status_id" => "'1'"];
            
            $orderSkill = [ "SKILL_COURSE.course_id", ];
            
            $skills = $this->selectJoinWhereOrder($this->table,$this->joinAll,$skillValues,$orderSkill);
            //print_r($skills);
            
            if(is_array($skills) && count($skills)>0){
            
            echo "<button class=\"accordion\">".$skills[0]['courseCode']."</button>";
            echo "<div class=\"panel\">";
            echo "<table style=\"max-width=100px\">";
            echo "<tr>";
            echo "<th>Chapter/ Sub Chapter</th>";
            echo "<th>Skill Number</th>";
            echo "<th>Essential Skills</th>";
            echo "<th>Hands On&#9995<br>Group&#9995&#9995<br>or Didactic&#9998</th>";
            //echo "<th>Date</th>";
            //echo "<th>Instructor's Name</th>";
            //echo "<th>Instructor's Assessment</th>";
            //echo "<th>Signed On</th>";
            echo "</tr>";
            
            foreach($skills as $skill){
            
                echo "<tr>";
            	echo "<td>".$skill['chapterNumber'].". ".$skill['chapterName']."<br>".$skill['subChapterName']."</td>";
                echo "<td>".$skill['skillNumber']."</td>";
                echo "<td>".$skill['description']."</td>";
                echo "<td>";
                if ($skill['skillType_id'] == 1){
                    echo "&#9998";
                }
                elseif ($skill['skillType_id'] == 2){
                    echo "&#9995";
                }
                elseif ($skill['skillType_id'] == 3){
                    echo "&#9995&#9995";
                }
                echo "</td>";
                echo '<td><a href="add-studentskill.php?student='.$student.'&skill='.$skill['skill_id'].'">Add</td>';
                //echo '<td><a href="manage-skills.php?skill='.$skill['skill_id'].'">Edit</td>';
                //echo '<td><a href="delete.php?skill='.$skill['skill_id'].'">Delete</a></td>';
                /*echo "<td>".$skill['assessmentDate']."</td>";
            	echo "<td>".$skill['firstName']." ".$skill['lastName']."</td>";
                echo "<td>";
                if ($skill['assessment'] == 1){
                    echo "1: Poor";
                }
                elseif ($skill['assessment'] == 2){
                    echo "2: Needs Improvement";
                }
                elseif ($skill['assessment'] == 3){
                    echo "3: Satisfactory";
                }
                elseif ($skill['assessment'] == 4){
                    echo "4: Proficient";
                }
                echo "</td>";
                echo "<td>".$skill['signedOn']."</td>";*/
                echo "</tr>";
          
            }
            
        }
        else {
            echo '<h3>No Skills Found</h3>';
        }
        
        echo '</table>';
        echo '</div>';
        
            }//END for each course
        }
        else {
          echo '<h3>No Completed Skills</h3>';
        }
    }
    public function addSkill(){
        
    }
    
    public function grabSkill($id){
      
      $values = [
          $this->idName => "'".$id."'",
        ];
      
        $skills = $this->selectWhere($this->table, $values);

        //Grab first result with keys intact
        $skill = $skills[0];

        return $skill;
        
    }
    
    public function deleteSkill($id){
      
      $values = [
          "status_id" => "'2'",
        ];
      
      $result = $this->update($this->table, $values, $this->idName, $id);
      
      if ($result){
        echo "<h1>Success!</h1>";
        echo "<p>The Skill was deleted successfully.</p>";
        echo '<a href="home.php">Return to Home</a>';
      }
      else{
        echo "<h1>Oh no!</h1>";
        echo "<p>There was an issue deleting the Skill.</p>";
        echo "<p>Please Try Again</p>";
        echo '<a href="home.php">Return to Home</a>';
      }
      
    }
    
}