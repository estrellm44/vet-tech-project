<?php

class User extends CRUD{
    
    public function login(){
        
        session_start();
        
        //Store login input with sql injection prevention
        $uNumber = $this->connect()->real_escape_string($_POST['uNumber']);
        $password = $this->connect()->real_escape_string($_POST['password']);
        
        //Creating the array for selectExact() function
        $values = [
          "uNumber" => "'".$uNumber."'",
          //"password" => "'".$password."'",
        ];
      
        //Run sql query from CRUD file
        $users = $this->selectWhere("INSTRUCTOR", $values);
      
        //If query was a success
        if($users){
          
          //Check if results returned as an array and if only one was returned
          if(is_array($users) && count($users)==1){
              
              //Since there's only one... Grab the first result from users and save as user
              $user = $users[0];
              
              //Now that we have the password from db.. we need to de-crypt
              $hashedPwdCheck = password_verify($password, $user['password']);
              
              //If password matched
              if ($hashedPwdCheck){
                    
                    //If Instructor has been given login access
                    if ($user['isUser'] = 1){
                        
                        //LOGGING IN USER
                        $_SESSION['instructor_id'] = $user['instructor_id'];
                        $_SESSION['firstName'] = $user['firstName'];
                        $_SESSION['lastName'] = $user['lastName'];
                        $_SESSION['uNumber'] = $user['uNumber'];
                        $_SESSION['password'] = $user['password'];
                        $_SESSION['isUser'] = $user['isUser'];
                        $_SESSION['isAdmin'] = $user['isAdmin'];
                    }
                    //Instructor was not given login access
                    else {
                        echo "<p>Login Failed: User Does Not Have Login Access</p>";
                    }
              }
              //Password did not match
              else {
                  echo "<p>Login Failed: Incorrect Password</p>";
              }
          
          }
          //Query did not return an array
          else {
              echo "<p>There was an issue logging in</p>";
          }
          
      }
      //Query Failed
      else{
          echo "<p>Login Failed</p>";
      }
        
    }
    
    public function logout(){
        
        //LOGOUT USER: Destroy the _SESSION
        session_start();
        session_start();
        session_unset();
        session_destroy();
        header("Location: ../index.php");
        exit();
        
    }
    
    
}