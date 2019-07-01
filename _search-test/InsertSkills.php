<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Vet Tech Skills Tracking System</title>
	<style>
table, th , td  {
  border: 1px solid grey;
  border-collapse: collapse;
  padding: 5px;
}
table tr:nth-child(odd) {
  background-color: #b1f1f1;
}
table tr:nth-child(even) {
  background-color: #ffffff;
}
</style>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
       <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/jquery.validate.min.js"></script>
        
</head>    
 
<body>
    <h1 Style='color:Orange';>Vet Tech Skills Table</h1>
<div id= "NewEntry" style="background-color:LightSteelBlue;">
<br>
<h3 Style='color:Crimson';>Enter data for a NEW entry and click "Save New Entry" button</h3>

<form id="NewSkillsEntryForm" action='' method="post">
 
<b> Course ID(1-4, 15-23)</b>
<input type="text" name="CourseID" size="4" required/>
<br>
<b> Skill Type ID(1=D, 2=H, 3=HG)</b>
<input type="text" name="SkillTypeID" size="4" required/>
<br>
<b> Skill Book Type ID (Null, 1=Clinical,2=Delhi, 3= RATS)</b>
<input type="text" name="SkillBookTypeID" size="4" />   
<br>
<b> Chapter ID(1-9)</b>
<input type="text" name="ChapterID" size="4" required/>
<br>
<b> Sub Chapter ID(1-16)</b>
<input type="text" name="SubChapterID" size="4" />
<br>
<b> Skill Number(1,4, 16A, 16B)</b>
<input type="text" name="skillNumber" size="4" required/>
<br>
<b> Skill Description</b>
<br>
<input type="text" name="SkillDescription" size="150" required/>
<br>
<b> Status ID (1= Active, 2= Inactive) </b>
<input type="text" name="StatusID" size="4" required/>
<br>
<b> Simulation (0 or 1)</b>
<input type="text" name="IsSimulation" size="1" />



<br>
<br>

<input type="submit" name="save_button" value="Save New Entry"/>
</form>
</div>
<br>

<?php
// A simple web site in Cloud9 that runs through Apache
// Press the 'Run' button on the top to start the web server,
// then click the URL that is emitted to the Output tab of the console

//echo 'New Entry added to the database successfully!';

$host = "127.0.0.1";
    $user = "sheehanj";                     //Your Cloud 9 username
    $pass = "";                                  //Remember, there is NO password by default!
    $db = "vet-tech-db";                                  //Your database name you want to connect to
    $port = 3306;                                //The port #. It is always 3306
    
    $connection = mysqli_connect($host, $user, $pass, $db, $port)or die(mysql_error());


// runs this code if add_button is clicked
if(isset($_POST['save_button']))
{
    //echo "hey";3
    echo nl2br ("\n");
    echo nl2br ("\n");
    //echo "<h3 Style='color:Black';>Saved the following data </h3>";
    //echo nl2br ("\n");
   // echo "<table><tr><th>SkillChapter</th><th>SubChapter</th><th>SkillNumber  </th><th>SkillDescription  </th><th>SkillType  </th><th>SkillCourse  </th><th> SkillStatus </th></tr>";
//    echo "<tr><td>" .$_POST["Chapter"]. "</td><td>" .$_POST["Subchapter"]. "</td><td>" .$_POST["SkillNumber"]. "</td><td>" .$_POST["SkillDescription"]. "</td>
      //   <td>" .$_POST["SkillType"]. "</td><td>" .$_POST["SkillCode"]. "</td><td>" .$_POST["SkillStatus"]. "</td>";
    
         
         
    //echo $_POST["sfname"], "  ",$_POST["slname"], "  ",$_POST["studentID"], "  ",$_POST["SkillNumber"], "  ",$_POST["SkillDescription"], "  ",$_POST["AssessDate"], "  ",$_POST["InstructorName"], "  ", $_POST["Assessment"], "  ", $_POST["Signature"];
    echo nl2br ("\n");
   
    
  
 // insert contact information in the database   
$sql = "INSERT INTO SKILL (course_id, skillType_id, skillBookType_id, chapter_id, subChapter_id, skillNumber, description, status_id, isSimulationAccepted)
VALUES ('".$_POST["CourseID"]."', '".$_POST["SkillTypeID"]."','".$_POST["SkillBookTypeID"]."', '".$_POST["ChapterID"]."', '".$_POST["SubChapterID"]."', '".$_POST["skillNumber"]."', '".$_POST["SkillDescription"]."', '".$_POST["StatusID"]."', '".$_POST["IsSimulation"]."')";

echo nl2br ("\n"); 

if (mysqli_query($connection, $sql)) {
    echo "<p Style='color:Green';><b>New record added to the database successfully</b></p>" . "<br>";
    
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($connection);
}

echo nl2br ("\n"); 

//echo "hey";
    //echo nl2br ("\n");
    //echo nl2br ("\n");
    //echo ('Saved the following data:');
    //echo nl2br ("\n");
    //echo $_POST["firstname"], "  ",$_POST["lastname"], "  ",$_POST["employeeID"], "  ",$_POST["email"], "  ",$_POST["salary"], "  ",$_POST["phone"], "  ",$_POST["birthdate"], "  ", $_POST["department"], "  ", $_POST["status"];
    //echo nl2br ("\n");
   
    
}// end if save_button   
//************************************** function for printing data ***********************************************

function PrintData($record){
    if (mysqli_num_rows($record) > 0) 
{
// outputs the table header
      
      echo "<table><tr><th>ID </th><th>Chapter, Subchapter</th><th>SkillNumber  </th><th>SkillDescription  </th><th>SkillType  </th><th>SkillCourse   </th><th> SkillStatus </th></tr>";
    
    // output data of each row
    while($row = mysqli_fetch_assoc($record)) 
    {
      
       // $valEdit = 'edit'.(string)$row["ID"]; // concatenates string 'edit' and string containing ID of a row. e.g. 'edit'.'4' for row 4
        // 
        //$valDelete = 'delete'.(string)$row["ID"]; // concatenates string 'delete' and string containing ID of a row. e.g. 'delete'.'4' for row 4
         
        //
         
         echo "<tr><td>" . $row["ID"]. "</td><td>" . $row["Chapter"]. ", " . $row["Subchapter"]. "</td><td>" .$row["SkillNumber"]. "</td><td>" .$row["SkillDescription"]. "</td>
         <td>" .$row["SkillType"]. "</td><td>" .$row["SkillCode"]. "</td><td>" .$row["SkillStatus"]. "</td>";
         
         //echo "<td>" .$row["Homepage"]. "</td>";
         
         
        // echo "<td> <a href='".$row["Homepage"]."'>link</a> </td>";
        //
         // creates an edit button for each row. The name of each button is edit. 
         //The value of the button is different for each row. For example, for row 2, $valEdit = 'edit2'
         
        // echo "<td> <form id='FindName' action='' method='post'> <input type='submit' name='edit' value=$valEdit />
       //  </td>";
        
         // creates a delete button for each row. The name of each button is delete. 
         //The value of the button is different for each row. For example, for row 2, $valDelete = 'delete2'
         
        // echo "<td> <input type='submit' name='delete' value=$valDelete />
        // </form></td></tr>";
        
     
     
    }//end while
     
     echo "</table>";
     
          
       
  } // end if mysqli row results > 0
else 
   {
    echo "No records found";
    echo nl2br ("\n");
    echo nl2br ("\n");
   } 
}// end function PrintData
//
// **************************  Show all results section **********************************
       echo nl2br ("\n");
       echo "<div id= 'SkillResult' style='background-color:PeachPuff';>";
        echo "<h3 Style='color:Maroon';>Find list of all Vet Tech skills </h3>";
        echo
        "<form id='ShowAllForm' action='' method='post'>
        <input type='submit' name= 'show_button' value='List All Skills' />
        </form>";
        echo "</div>";
        
        // run this code if show all results button is clicked
        
       if(isset($_POST['show_button']))
       {
          echo nl2br ("\n");
          
          $sql = "SELECT * FROM Skills WHERE SkillStatus = 'required' ORDER BY SkillNumber";
          $resultAll = mysqli_query($connection, $sql);
          //
          // calls the function PrintData to print all the student data where status is active
          PrintData($resultAll); 

       }//end if isset (Show button)
       //
?>
</body>
</html>