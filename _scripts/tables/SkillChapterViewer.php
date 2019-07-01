<?php

  class SkillChapterViewer extends CRUD{
    
    protected $table = "SKILL_CHAPTER";
    protected $idName = "chapter_id";
    
    public function showAllChapters(){
        
        $values = [
          "active" => "'1'",
        ];
        
        $orders = [
          "chapterNumber",
        ];
        
        $chapters = $this->selectWhereOrder($this->table, $values, $orders);
        
        //print_r($chapters);
         if(is_array($chapters) && count($chapters)>0){
        
        echo '<table>
          <tr>
            <th>No.</th>
            <th>Chapter Name</th> 
          </tr>';
        
        foreach ($chapters as $chapter){
            echo "<tr>";
            echo "<td>".$chapter['chapterNumber']."</td>";
            echo "<td>".$chapter['chapterName']."</td>";
            echo '<td><a href="edit-chapter.php?id='.$chapter['chapter_id'].'">Edit</a></td>';
            echo '<td><a href="delete.php?skillChapter='.$chapter['chapter_id'].'">Delete</a></td>';
            echo "</tr>";
        }
        
        echo "</table>";
        
        }
        else {
          echo '<p>No Results Found</p>';
        }
        
    }
    
    public function grabChapter($id){
      
      $values = [
          $this->idName => "'".$id."'",
        ];
      
      $chapters = $this->selectWhere($this->table, $values);
      
      //Grab first result with keys intact
      $chapter = $chapters[0];
      
      return $chapter;
       
        
    }
    
    public function grabAllChapters(){
      
      $values = [
          "active" => "'1'",
        ];
      
      $chapters = $this->selectWhere($this->table, $values);
      
      return $chapters;
       
        
    }
    
    public function addChapter(){
      
        $values = [
          "chapter_id" => 'NULL',
          "chapterNumber" => "'".$_POST['chapterNumber']."'",
          "chapterName" => "'".$_POST['chapterName']."'",
          "active" => "'1'",
          "createdOn" => CURRENT_TIMESTAMP,
          "updatedOn" => 'NULL',
        ];
      
        $result = $this->insertInto($this->table, $values);
         
        if ($result){
            echo "<p>The Chapter Was Added Successfully!</p>";
            
        }
        else{
            echo "<p>There Was An Issue Adding The Chapter</p>";
        }
        
    }
    
    public function updateChapter($id){
      
      $values = [
          "active" => "'0'",
        ];
      
      $result1 = $this->update($this->table, $values, $this->idName, $id);
      
      $values = [
          "chapter_id" => 'NULL',
          "chapterNumber" => "'".$_POST['chapterNumber']."'",
          "chapterName" => "'".$_POST['chapterName']."'",
          "active" => "'1'",
          "createdOn" => CURRENT_TIMESTAMP,
          "updatedOn" => 'NULL',
        ];
      
        $result2 = $this->insertInto($this->table, $values);
      
      if ($result1 && $result2){
            echo "<p>The Chapter Was Updated Successfully!</p>";
            
        }
        else{
            echo "<p>There Was An Issue Updating The Chapter</p>";
        }
      
    }
    
    public function deleteChapter($id){
      
      $values = [
          "active" => "'0'",
        ];
      
      $result = $this->update($this->table, $values, $this->idName, $id);
      
      if ($result){
        echo "<h1>Success!</h1>";
        echo "<p>The Chapter was deleted successfully.</p>";
        echo '<a href="home.php">Return to Home</a>';
      }
      else{
        echo "<h1>Oh no!</h1>";
        echo "<p>There was an issue deleting the Chapter.</p>";
        echo "<p>Please Try Again</p>";
        echo '<a href="home.php">Return to Home</a>';
      }
      
    }
      
      
  }
  
  //$this->db->last_query();
  //GRABS LAST QUERY