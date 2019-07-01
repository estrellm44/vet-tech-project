<?php

class InstructorViewer extends CRUD{
    
    protected $table = "INSTRUCTOR";
    protected $idName = "instructor_id";
    
    public function showAllInstructors(){
        
        $values = [
          "active" => "'1'",
        ];
        
        $instructors = $this->selectWhere($this->table, $values);
        
         if(is_array($instructors) && count($instructors)>0){
        
        echo '<table>
          <tr>
            <th>Firstname</th>
            <th>Lastname</th> 
            <th>U-Number</th>
            <th>Login Access</th>
            <th>Admin Access</th>
          </tr>';
        
        foreach ($instructors as $instructor){
            echo "<tr>";
            echo "<td>".$instructor['firstName']."</td>";
            echo "<td>".$instructor['lastName']."</td>";
            echo "<td>".$instructor['uNumber']."</td>";
            if ($instructor['isUser'] == 0){
                echo "<td>No</td>";
            }
            else if ($instructor['isUser'] == 1){
                echo "<td>Yes</td>";
            }
            if ($instructor['isAdmin'] == 0){
                echo "<td>No</td>";
            }
            else if ($instructor['isAdmin'] == 1){
                echo "<td>Yes</td>";
            }
            echo '<td><a href="instructor.php?id='.$instructor['instructor_id'].'">View</a></td>';
            echo '<td><a href="delete.php?instructor='.$instructor['instructor_id'].'">Delete</a></td>';
            echo "</tr>";
        }
        
        echo "</table>";
        
        }
        else {
          echo '<p>No Results Found</p>';
        }
        
    }
    
    public function showAllInstructorsOrder(){
        
        $values = [
          "active" => "'1'",
        ];
        
        if(strcmp($_POST['orderby'], "") == 0){
          
          $instructors = $this->selectWhere($this->table, $values);
          
        }
        else{
          
          $order = [
            $_POST['orderby'],
          ];
          
          $instructors = $this->selectWhereOrder($this->table, $values, $order);
          
        }
        
         if(is_array($instructors) && count($instructors)>0){
        
        echo '<table>
          <tr>
            <th>Firstname</th>
            <th>Lastname</th> 
            <th>U-Number</th>
            <th>Login Access</th>
            <th>Admin Access</th>
          </tr>';
        
        foreach ($instructors as $instructor){
            echo "<tr>";
            echo "<td>".$instructor['firstName']."</td>";
            echo "<td>".$instructor['lastName']."</td>";
            echo "<td>".$instructor['uNumber']."</td>";
            if ($instructor['isUser'] == 0){
                echo "<td>No</td>";
            }
            else if ($instructor['isUser'] == 1){
                echo "<td>Yes</td>";
            }
            if ($instructor['isAdmin'] == 0){
                echo "<td>No</td>";
            }
            else if ($instructor['isAdmin'] == 1){
                echo "<td>Yes</td>";
            }
            echo '<td><a href="instructor.php?id='.$instructor['instructor_id'].'">View</a></td>';
            echo '<td><a href="delete.php?instructor='.$instructor['instructor_id'].'">Delete</a></td>';
            echo "</tr>";
        }
        
        echo "</table>";
        
        }
        else {
          echo '<p>No Results Found</p>';
        }
        
    }
    
    public function showInstructor($id){
        
        $values = [
          $this->idName => "'".$id."'",
        ];
      
      $instructors = $this->selectWhere($this->table, $values);
        
        if(is_array($instructors) && count($instructors)>0){
        
        foreach ($instructors as $instructor){
            echo "<p><a href=\"javascript:history.go(-1)\">GO BACK</a></p>";
            echo "<h2>".$instructor['firstName']." ".$instructor['lastName']."</h2>";
            echo "<h3>".$instructor['uNumber']."</h3>";
            echo '<p><a href="edit-instructor.php?id='.$instructor['instructor_id'].'">Edit</a>';
            echo '&nbsp;&nbsp;&nbsp;';
            echo '<a href="delete.php?instructor='.$instructor['instructor_id'].'">Delete</a></p>';
            echo '<p><a href="reset-password.php?id='.$instructor['instructor_id'].'">Reset Password</a></p>';
        }
        
         }
         else {
           echo '<h3>Instructor Not Found.</h3>';
         }
        
    }
    
    public function grabInstructor($id){
      
      $values = [
          $this->idName => "'".$id."'",
        ];
      
      $instructors = $this->selectWhere($this->table, $values);
      
      //Grab first result with keys intact
      $instructor = $instructors[0];
      
      return $instructor;
       
        
    }
    
    public function addInstructor(){
        
        $hashedPwd = password_hash($_POST['password'], PASSWORD_DEFAULT);
      
        $values = [
          "instructor_id" => 'NULL',
          "firstName" => "'".$_POST['firstName']."'",
          "lastName" => "'".$_POST['lastName']."'",
          "uNumber" => "'".$_POST['uNumber']."'",
          "password" => "'".$hashedPwd."'",
          "isUser" => "'".$_POST['isUser']."'",
          "isAdmin" => "'".$_POST['isAdmin']."'",
          "active" => "'1'",
          "createdOn" => CURRENT_TIMESTAMP,
          "updatedOn" => 'NULL',
        ];
      
        $result = $this->insertInto($this->table, $values);
        
        
         
        if ($result){
            echo "<p>".$_POST['firstName']." ".$_POST['lastName']." Was Added Successfully!</p>";
            
        }
        else{
            echo "<p>There Was An Issue Adding The Instructor</p>";
        }
        
    }
    
    public function updateInstructor($id){
      
      $values = [
          "firstName" => "'".$_POST['firstName']."'",
          "lastName" => "'".$_POST['lastName']."'",
          "uNumber" => "'".$_POST['uNumber']."'",
          "isUser" => "'".$_POST['isUser']."'",
          "isAdmin" => "'".$_POST['isAdmin']."'",
          "updatedOn" => CURRENT_TIMESTAMP,
        ];
      
      $result = $this->update($this->table, $values, $this->idName, $id);
      
      if($result){
          echo "<p>".$_POST['firstName']." ".$_POST['lastName']." Was Updated Successfully!</p>";
      }
      else{
          echo "<p>There Was An Issue Updating The Instructor</p>";
      }
      
    }
    
    public function updatePassword($id){
      
      $hashedPwd = password_hash($_POST['password'], PASSWORD_DEFAULT);
      
      $values = [
          "password" => "'".$hashedPwd."'",
          "updatedOn" => CURRENT_TIMESTAMP,
        ];
      
      $result = $this->update($this->table, $values, $this->idName, $id);
      
      if($result){
          echo "<p>Success! Password Has Been Reset</p>";
      }
      else{
          echo "<p>There Was An Issue Updating The Instructor's Password</p>";
      }
      
    }
    
    public function deleteInstructor($id){
        
        $values = [
          "active" => "'0'",
        ];
      
        $result = $this->update($this->table, $values, $this->idName, $id);
        
        if ($result){
          echo "<h1>Success!</h1>";
          echo "<p>The Instructor was deleted successfully.</p>";
          echo '<a href="index.php">Return to Home</a>';
        }
        else{
          echo "<h1>Oh no!</h1>";
          echo "<p>There was an issue deleting the Instructor.</p>";
          echo "<p>Please Try Again</p>";
          echo '<a href="index.php">Return to Home</a>';
        }
    }
      
      
  }
  