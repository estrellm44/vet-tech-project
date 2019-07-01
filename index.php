<?php
    session_start();

    include('_scripts/DBCONN.php');
    include('_scripts/CRUD.php');
    include('_scripts/User.php');
    
    foreach (glob('_scripts/tables/*.php') as $table) {
        include $table;
    }

?>

<html lang="en-us">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Vet Tech Login</title>
<style>
body {font-family: Arial, Helvetica, sans-serif;}
form {border: 3px solid #f1f1f1;}

h1 {
    text-align: center;
    background-color: white;
    color: #0A4FA4;
    margin: auto;
    font-family: impact,arial;
    
}


input[type=text], input[type=password] {
    width: 50%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
    
}

button {
    background-color: #00abff;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 50%;
    text-align: center;
}

button:hover {
    opacity: 0.8;
}



.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
}

img.avatar {
    width: 20%;
    border-radius: 50%;
}

.container {
    padding: 16px;
}

span.psw {
    float: right;
    padding-top: 16px;
}

/* Change styles for span  on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
}
</style>
</head>

<body>

<div class = "header">
<h1>SUNY Ulster Veterinary Technology Skills Tracking System</h1>
</div>

<div class="login" align="center">
<form id="login" method="POST">
  
   
    <img src="_images/Ellie.png" alt="Ellie" class="avatar">
  
    <br>Username</br>
    <input type="text" placeholder="Enter UNumber" name="uNumber" required>
    <br>
    <br>Password</br>
    <input type="password" placeholder="Enter Password" name="password" required>
    <br>   
    <button type="submit" name="loginButton">Login</button>
    
</form>

    <p>Test account for login:</p>
    <p>testadmin</p>
    <p>password</p>
    
</div>


   <?php
        
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            
            $attempt = new User();
            $attempt->login();
            
        }
        
        if (isset($_SESSION['uNumber']) and isset($_SESSION['password'])){
            
            header("Location: ../home.php");
            
        }
        
    ?>

</body>
</html>