<?php

  class SkillSubChapterViewer extends CRUD{
    
    protected $table = "SKILL_SUBCHAPTER";
    protected $idName = "subChapter_id";
    protected $joinChapter = "INNER JOIN SKILL_CHAPTER ON SKILL_SUBCHAPTER.chapter_id = SKILL_CHAPTER.chapter_id";
    
    public function showAllSubChapters(){
        
        $values = [
          "SKILL_SUBCHAPTER.active" => "'1'",
        ];
        
        $orders = [
          "SKILL_CHAPTER.chapterNumber",
          "SKILL_SUBCHAPTER.subChapterName"
        ];
      
        $subChapters = $this->selectJoinWhereOrder($this->table, $this->joinChapter,$values, $orders);
        
        //print_r($chapters);
         if(is_array($subChapters) && count($subChapters)>0){
        
        echo '<table>
          <tr>
            <th>Chapter</th>
            <th>Sub-Chapter</th> 
          </tr>';
        
        foreach ($subChapters as $subChapter){
            echo "<tr>";
            echo "<td>".$subChapter['chapterNumber'].". ".$subChapter['chapterName']."</td>";
            echo "<td>".$subChapter['subChapterName']."</td>";
            echo '<td><a href="edit-subchapter.php?id='.$subChapter['subChapter_id'].'">Edit</a></td>';
            echo '<td><a href="delete.php?skillSubChapter='.$subChapter['subChapter_id'].'">Delete</a></td>';
            echo "</tr>";
        }
        
        echo "</table>";
        
        }
        else {
          echo '<p>No Results Found</p>';
        }
        
    }
    
    public function grabSubChapter($id){
      
      $values = [
          $this->idName => "'".$id."'",
        ];
      
      $chapters = $this->selectWhere($this->table, $values);
      
      //Grab first result with keys intact
      $chapter = $chapters[0];
      
      return $chapter;
       
        
    }
    
    public function grabAllSubChapters(){
      
      $values = [
          "active" => "'1'",
        ];
      
      $subChapters = $this->selectWhere($this->table, $values);
      
      return $subChapters;
       
        
    }
    
    public function addSubChapter(){
      
        $values = [
          "subChapter_id" => 'NULL',
          "chapter_id" => "'".$_POST['chapter_id']."'",
          "subChapterName" => "'".$_POST['subChapterName']."'",
          "active" => "'1'",
          "createdOn" => CURRENT_TIMESTAMP,
          "updatedOn" => 'NULL',
        ];
      
        $result = $this->insertInto($this->table, $values);
         
        if ($result){
            echo "<p>The Sub-Chapter Was Added Successfully!</p>";
            
        }
        else{
            echo "<p>There Was An Issue Adding The Sub-Chapter</p>";
        }
        
    }
    
    public function updateSubChapter($id){
      $values = [
          "active" => "'0'",
        ];
      
      $result1 = $this->update($this->table, $values, $this->idName, $id);
      
      $values = [
          "subChapter_id" => 'NULL',
          "chapter_id" => "'".$_POST['chapter_id']."'",
          "subChapterName" => "'".$_POST['subChapterName']."'",
          "active" => "'1'",
          "createdOn" => CURRENT_TIMESTAMP,
          "updatedOn" => 'NULL',
        ];
      
        $result2 = $this->insertInto($this->table, $values);
      
      if ($result1 && $result2){
            echo "<p>The Sub-Chapter Was Updated Successfully!</p>";
            
        }
        else{
            echo "<p>There Was An Issue Updating The Sub-Chapter</p>";
        }
      
      
    }
    
    public function deleteSubChapter($id){
      
      $values = [
          "active" => "'0'",
        ];
      
      $result = $this->update($this->table, $values, $this->idName, $id);
      
      if ($result){
        echo "<h1>Success!</h1>";
        echo "<p>The Sub-Chapter was deleted successfully.</p>";
        echo '<a href="home.php">Return to Home</a>';
      }
      else{
        echo "<h1>Oh no!</h1>";
        echo "<p>There was an issue deleting the Sub-Chapter.</p>";
        echo "<p>Please Try Again</p>";
        echo '<a href="home.php">Return to Home</a>';
      }
      
    }
      
      
  }
  
  //$this->db->last_query();
  //GRABS LAST QUERY