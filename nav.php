<?php
    session_start();

    include('_scripts/DBCONN.php');
    include('_scripts/CRUD.php');
    include('_scripts/User.php');
    
    foreach (glob('_scripts/tables/*.php') as $table) {
        include $table;
    }
    
    //Check If _SESSION exists... 
    //If it doesn't exist, send user to login page and end the script
    if(!isset($_SESSION['uNumber']) or !isset($_SESSION['password'])){
        header("Location: ../index.php");
        exit();
    }

?>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="vet-style.css">

<div class="header">
<h1>
	SUNY Ulster Veterinary Technology Essential Skills List
</h1>
</div>

<div class="topnav">
  
  <div class="search-container">
    
    <form action="search.php" method="GET">
      <select name="searchby">
        <option selected>Search By</option>
        <option value="firstName">First Name</option>
        <option value="lastName">Last Name</option>
        <option value="uNumber">U-Number</option>
      </select> 
      <input type="text" placeholder="Search.." name="value">
      <button type="submit" value"student-search">Go</button>
    </form>
    
    <!-- <form action="search.php" method ="GET">
      <input type="text" placeholder="Search By Name or UNumber" name="search" maxlength="50">
      <button type="submit">Go</button>
    </form> -->
    
  </div>

<div class="dropdown">
    <button class="dropbtn"><?php echo $_SESSION['firstName']." ".$_SESSION['lastName']; ?></button>
		<div class="dropdown-content">
			<a href="logout.php">Log Out</a>
		</div>
	</div> 
	
	<a href="help.php">Help</a>
	
	<a href="manage-skills.php">Manage Skills</a>
	
  <!-- <div class="dropdown">
    <button class="dropbtn">Manage Skills </button>
    <div class="dropdown-content">
      <a href="add-skill.php">Add Skill</a>
      <a href="modify-skills.php">Modify Skills</a>
    </div>
  </div> -->
   <div class="dropdown">
    <button class="dropbtn">View</button>
    <div class="dropdown-content">
      <a href="all-students.php">Students</a>
      <a href="all-instructors.php">Instructors</a>
    </div>
  </div> 
  
  <a href="home.php">Home</a>
  
  <!-- <div class="dropdown">
    <button class="dropbtn">Manage Users </button>
    <div class="dropdown-content">
      <a href="add-student.php">Add Student</a>
      <a href="add-instructor.php">Add Instructor</a>
    </div>
  </div> -->
  
 </div>