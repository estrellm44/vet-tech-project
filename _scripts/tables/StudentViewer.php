<?php

  class StudentViewer extends CRUD{
    
    protected $table = "STUDENT";
    protected $idName = "student_id";
    
    public function showAllStudents(){
        
        $values = [
          "active" => "'1'",
        ];
      
        $students = $this->selectWhere($this->table, $values);
        
         if(is_array($students) && count($students)>0){
        
        echo '<table>
          <tr>
            <th>Firstname</th>
            <th>Lastname</th> 
            <th>U-Number</th>
            <th>Entry Year</th>
            <th>Grad Year</th>
          </tr>';
        
        foreach ($students as $student){
            echo "<tr>";
            echo "<td>".$student['firstName']."</td>";
            echo "<td>".$student['lastName']."</td>";
            echo "<td>".$student['uNumber']."</td>";
            echo "<td>".$student['entryYear']."</td>";
            if ($student['gradYear'] == NULL){
              echo "<td>n/a</td>";
            }
            else{
              echo "<td>".$student['gradYear']."</td>";
            }
            echo '<td><a href="student.php?id='.$student['student_id'].'">View</a></td>';
            echo '<td><a href="delete.php?student='.$student['student_id'].'">Delete</a></td>';
            echo "</tr>";
        }
        
        echo "</table>";
        
        }
        else {
          echo '<p>No Results Found</p>';
        }
        
    }
    
    public function showAllStudentsOrder(){
        
        if(strcmp($_POST['gradYear'], "both") == 0){
          
            $values = [
              "active" => "'1'",
            ];
        }
        else{
          
            $values = [
              "active" => "'1'",
              "gradYear" => $_POST['gradYear'],
            ];
          
        }
        
        if(strcmp($_POST['orderby'], "") == 0){
          
          $students = $this->selectWhere($this->table, $values);
          
        }
        else{
          
          $order = [
            $_POST['orderby'],
          ];
          
          $students = $this->selectWhereOrder($this->table, $values, $order);
          
        }
        
         if(is_array($students) && count($students)>0){
        
        echo '<table>
          <tr>
            <th>Firstname</th>
            <th>Lastname</th> 
            <th>U-Number</th>
            <th>Entry Year</th>
            <th>Grad Year</th>
          </tr>';
        
        foreach ($students as $student){
            echo "<tr>";
            echo "<td>".$student['firstName']."</td>";
            echo "<td>".$student['lastName']."</td>";
            echo "<td>".$student['uNumber']."</td>";
            echo "<td>".$student['entryYear']."</td>";
            if ($student['gradYear'] == NULL){
              echo "<td>n/a</td>";
            }
            else{
              echo "<td>".$student['gradYear']."</td>";
            }
            echo '<td><a href="student.php?id='.$student['student_id'].'">View</a></td>';
            echo '<td><a href="delete.php?student='.$student['student_id'].'">Delete</a></td>';
            echo "</tr>";
        }
        
        echo "</table>";
        
        }
        else {
          echo '<p>No Results Found</p>';
        }
        
    }
    
    public function showStudentsBy($column, $value){
      
        $values = [
          $column => "'".$value."'",
        ];
      
        $students = $this->selectWhere($this->table, $values);
        
         if(is_array($students) && count($students)>0){
        
        echo '<table>
          <tr>
            <th>Firstname</th>
            <th>Lastname</th> 
            <th>U-Number</th>
            <th>Entry Year</th>
            <th>Grad Year</th>
          </tr>';
        
        foreach ($students as $student){
            echo "<tr>";
            echo "<td>".$student['firstName']."</td>";
            echo "<td>".$student['lastName']."</td>";
            echo "<td>".$student['uNumber']."</td>";
            echo "<td>".$student['entryYear']."</td>";
            if ($student['gradYear'] == NULL){
              echo "<td>n/a</td>";
            }
            else{
              echo "<td>".$student['gradYear']."</td>";
            }
            echo '<td><a href="student.php?id='.$student['student_id'].'">View</a></td>';
            echo '<td><a href="delete.php?student='.$student['student_id'].'">Delete</a></td>';
            echo "</tr>";
        }
        
        echo "</table>";
        
         }
         else {
           echo '<p>No Results Found</p>';
         }
        
    }
    
    public function showStudentsByOrder($column, $value){
      
        if(strcmp($_POST['gradYear'], "both") == 0){
          
            $values = [
              $column => "'".$value."'",
            ];
        }
        else{
          
            $values = [
              $column => "'".$value."'",
              "gradYear" => $_POST['gradYear'],
            ];
          
        }
        
        if(strcmp($_POST['orderby'], "") == 0){
          
          $students = $this->selectWhere($this->table, $values);
          
        }
        else{
          
          $order = [
            $_POST['orderby'],
          ];
          
          $students = $this->selectWhereOrder($this->table, $values, $order);
          
        }
        
         if(is_array($students) && count($students)>0){
        
        echo '<table>
          <tr>
            <th>Firstname</th>
            <th>Lastname</th> 
            <th>U-Number</th>
            <th>Entry Year</th>
            <th>Grad Year</th>
          </tr>';
        
        foreach ($students as $student){
            echo "<tr>";
            echo "<td>".$student['firstName']."</td>";
            echo "<td>".$student['lastName']."</td>";
            echo "<td>".$student['uNumber']."</td>";
            echo "<td>".$student['entryYear']."</td>";
            if ($student['gradYear'] == NULL){
              echo "<td>n/a</td>";
            }
            else{
              echo "<td>".$student['gradYear']."</td>";
            }
            echo '<td><a href="student.php?id='.$student['student_id'].'">View</a></td>';
            echo '<td><a href="delete.php?student='.$student['student_id'].'">Delete</a></td>';
            echo "</tr>";
        }
        
        echo "</table>";
        
         }
         else {
           echo '<p>No Results Found</p>';
         }
        
    }
    
    public function showStudent($id){
      
      $values = [
          $this->idName => "'".$id."'",
        ];
      
      $students = $this->selectWhere($this->table, $values);
        
        if(is_array($students) && count($students)==1){
        
          $student = $students[0];
          
          echo "<a href=\"javascript:history.go(-1)\">GO BACK</a>";
          
          echo "<h2>".$student['lastName'].", ".$student['firstName']."</h2>";
          echo "<p>U-Number: ".$student['uNumber']."</p>";
          echo "<p>".$student['entryYear']." - ";
          if ($student['gradYear'] == NULL){
            echo "???</p>";
          }
          else{
            echo $student['gradYear']."</p>";
          }
          echo '<p><a href="edit-student.php?id='.$student['student_id'].'">Edit</a>';
          echo '&nbsp;&nbsp;&nbsp;';
          echo '<a href="delete.php?student='.$student['student_id'].'">Delete</a></p>';

        
        }
        else {
            echo '<h3>Student Not Found.</h3>';
        }
        
    }
    
    public function grabStudent($id){
      
      $values = [
          $this->idName => "'".$id."'",
        ];
      
      $students = $this->selectWhere($this->table, $values);
      
      //Grab first result with keys intact
      $student = $students[0];
      
      return $student;
       
        
    }
    
    public function addStudent(){
        
        if ($_POST['gradYear'] == 0 or $_POST['gradYear'] == NULL){
          $gradYear = 'NULL';
        }
        else{
          $gradYear = "'".$_POST['gradYear']."'";
        }
      
        $values = [
          "student_id" => 'NULL',
          "firstName" => "'".$_POST['firstName']."'",
          "lastName" => "'".$_POST['lastName']."'",
          "uNumber" => "'".$_POST['uNumber']."'",
          "entryYear" => "'".$_POST['entryYear']."'",
          "gradYear" => $gradYear,
          "active" => "'1'",
          "createdOn" => CURRENT_TIMESTAMP,
          "updatedOn" => 'NULL',
        ];
      
        $result = $this->insertInto($this->table, $values);
        
        
         
        if ($result){
            echo "<p>".$_POST['firstName']." ".$_POST['lastName']." Was Added Successfully!</p>";
            
        }
        else{
            echo "<p>There Was An Issue Adding The Student</p>";
        }
        
    }
    
    public function updateStudent($id){
      
      if ($_POST['gradYear'] == 0 or $_POST['gradYear'] == NULL){
          $gradYear = 'NULL';
      }
      else{
        $gradYear = "'".$_POST['gradYear']."'";
      }
      
      $values = [
          "firstName" => "'".$_POST['firstName']."'",
          "lastName" => "'".$_POST['lastName']."'",
          "uNumber" => "'".$_POST['uNumber']."'",
          "entryYear" => "'".$_POST['entryYear']."'",
          "gradYear" => $gradYear,
          "updatedOn" => CURRENT_TIMESTAMP,
        ];
      
      $result = $this->update($this->table, $values, $this->idName, $id);
      
      if($result){
          echo "<p>".$_POST['firstName']." ".$_POST['lastName']." Was Updated Successfully!</p>";
      }
      else{
          echo "<p>There Was An Issue Updating The Student</p>";
      }
      
    }
    
    public function deleteStudent($id){
      
      $values = [
          "active" => "'0'",
        ];
      
      $result = $this->update($this->table, $values, $this->idName, $id);
      
      if ($result){
        echo "<h1>Success!</h1>";
        echo "<p>The Student was deleted successfully.</p>";
        echo '<a href="home.php">Return to Home</a>';
      }
      else{
        echo "<h1>Oh no!</h1>";
        echo "<p>There was an issue deleting the Student.</p>";
        echo "<p>Please Try Again</p>";
        echo '<a href="home.php">Return to Home</a>';
      }
      
    }
      
      
  }
  
  //$this->db->last_query();
  //GRABS LAST QUERY