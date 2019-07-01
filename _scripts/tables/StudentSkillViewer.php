<?php

class StudentSkillViewer extends CRUD{
    
    protected $table = "STUDENT_SKILL";
    protected $idName = "studentSkill_id";
    protected $joinSkill = "INNER JOIN SKILL ON STUDENT_SKILL.skill_id = SKILL.skill_id";
    protected $joinAll = "INNER JOIN SKILL ON STUDENT_SKILL.skill_id = SKILL.skill_id
                        INNER JOIN INSTRUCTOR ON STUDENT_SKILL.instructor_id = INSTRUCTOR.instructor_id
                        INNER JOIN SKILL_COURSE ON SKILL.course_id = SKILL_COURSE.course_id
                        INNER JOIN SKILL_CHAPTER ON SKILL.chapter_id = SKILL_CHAPTER.chapter_id
                        INNER JOIN SKILL_SUBCHAPTER ON SKILL.subChapter_id = SKILL_SUBCHAPTER.subChapter_id";
    
    public function showAllStudentSkills($id){
        
        $orderCourse = [ "course_id", ];
        
        $courseValues = [ "$this->table.student_id" => "'$id'", ];
        
        $allCourses = $this->selectSpecialJoinWhereOrder($this->table,"course_id",$this->joinSkill,$courseValues,$orderCourse);
                  
        if(is_array($allCourses) && count($allCourses)>0){
            
            $allCourses = array_column($allCourses, 'course_id');
            $courses = array_unique($allCourses, SORT_NUMERIC);
            
            foreach ($courses as $course){
            
            $skillValues = [ "$this->table.student_id" => "'$id'",
                        "SKILL_COURSE.course_id" => $course,];
            
            $orderSkill = [ "SKILL_COURSE.course_id", ];
            
            $skills = $this->selectJoinWhereOrder($this->table,$this->joinAll,$skillValues,$orderSkill);
            //print_r($skills);
            
            if(is_array($skills) && count($skills)>0){
            
            echo "<button class=\"accordion\">".$skills[0]['courseCode']."</button>";
            echo "<div class=\"panel\">";
            echo "<table style=\"max-width=100px\">";
            echo "<tr>";
            echo "<th></th>";
            echo "<th>Chapter/ Sub Chapter</th>";
            echo "<th>Skill Number</th>";
            echo "<th>Essential Skills</th>";
            echo "<th>Hands On&#9995<br>Group&#9995&#9995<br>or Didactic&#9998</th>";
            echo "<th>Date</th>";
            echo "<th>Instructor's Name</th>";
            echo "<th>Instructor's Assessment</th>";
            echo "<th>Notes</th>";
            echo "<th>Signed On</th>";
            echo "</tr>";
            
            foreach($skills as $skill){
            
                echo "<tr>";
                echo "<td>&#128274</td>";
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
                echo "<td>".$skill['assessmentDate']."</td>";
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
                echo "<td>".$skill['notes']."</td>";
                echo "<td>".$skill['signedOn']."</td>";
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
    
    public function addStudentSkill($student, $skill){
        
        $values = [
          "studentSkill_id" => 'NULL',
          "skill_id" => "'".$skill."'",
          "instructor_id" => "'".$_SESSION['instructor_id']."'",
          "student_id" => "'".$student."'",
          "assessment" => "'".$_POST['assessment']."'",
          "assessmentDate" => "'".$_POST['assessmentDate']."'",
          "notes" => "'".$_POST['notes']."'",
          "signedOn" => CURRENT_TIMESTAMP,
        ];
      
        $result = $this->insertInto($this->table, $values);
         
        if ($result){
            echo "<p>The Completed Skill Was Added Successfully!</p>";
            
        }
        else{
            echo "<p>There Was An Issue Adding The Completed Skill</p>";
        }
        
    }
    
    
}