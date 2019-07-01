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
  background-color: #ffbfaa;
}
table tr:nth-child(even) {
  background-color: #ffffff;
}
</style>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
       <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/jquery.validate.min.js"></script>
 <a href="https://vet-tech-sheehanj.c9users.io/search-test/SearchTest.html"><b>Go BACK TO SEARCH OPTION PAGE</b></a>    
</head>    
<body>
<?php
// A simple web site in Cloud9 that runs through Apache
// Press the 'Run' button on the top to start the web server,
// then click the URL that is emitted to the Output tab of the console

//echo 'Hello world from Cloud9!';

$host = "127.0.0.1";
    $user = "sheehanj";                     //Your Cloud 9 username
    $pass = "";                                  //Remember, there is NO password by default!
    $db = "vet-tech-test";                                  //Your database name you want to connect to
    $port = 3306;                                //The port #. It is always 3306
    
    $connection = mysqli_connect($host, $user, $pass, $db, $port)or die(mysql_error());
//************************************** function for printing data ***********************************************

function PrintData($record){
    if (mysqli_num_rows($record) > 0) 
{
// outputs the table header
      
      echo "<table><tr><th>ID </th><th>Last Name</th><th>First Name</th><th>uNumber</th><th>Entry Year</th><th>Graduation Year</th><th>Created On</th><th>Updated On</th></tr>";
    
    // output data of each row
    while($row = mysqli_fetch_assoc($record)) 
    {
      
       // $valEdit = 'edit'.(string)$row["ID"]; // concatenates string 'edit' and string containing ID of a row. e.g. 'edit'.'4' for row 4
        // 
        //$valDelete = 'delete'.(string)$row["ID"]; // concatenates string 'delete' and string containing ID of a row. e.g. 'delete'.'4' for row 4
         
        //
         
         echo "<tr><td>" . $row["student_id"]. "</td><td>" . $row["lastName"]. "</td><td>" .$row["firstName"]. "</td><td>" .$row["uNumber"]. "</td>
         <td>" .$row["entryYear"]. "</td><td>" .$row["gradYear"]. "</td><td>" .$row["createdOn"]. "</td><td>"  .$row["updatedOn"]. "</td>";
         
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
// **************************  Show current students section **********************************
       echo nl2br ("\n");
       echo "<div id= 'SkillResult' style='background-color:LightPink';>";
        echo "<h3 Style='color:Crimson';>Find list of current students (Not yet graduated)</h3>";
        echo "<h4>(Graduation Year of 0 means the student has not yet graduated) </h4>";
        echo
        "<form id='ShowAllForm' action='' method='post'>
        <input type='submit' name= 'show_Currentbutton' value='List Current Students' />
        </form>";
        echo "</div>";
        
        // run this code if show current button is clicked
        
       if(isset($_POST['show_Currentbutton']))
       {
          echo nl2br ("\n");
          
          $sql = "SELECT * FROM STUDENT WHERE gradYear = 0 ORDER BY lastName, firstName";
          
          $resultAll = mysqli_query($connection, $sql);
          //
          // calls the function PrintData to print all the student data where status is active
          PrintData($resultAll); 

       }//end if isset (Show button)
       //
// **************************  Show all students section **********************************
       echo nl2br ("\n");
       echo "<div id= 'SkillResult' style='background-color:Aqua';>";
        echo "<h3 Style='color:Crimson';>Find list of all Vet Tech students (past and current)</h3>";
        echo "<h4>(Graduation Year of 0 means the student has not yet graduated) </h4>";
        echo
        "<form id='ShowAllForm' action='' method='post'>
        <input type='submit' name= 'show_button' value='List All Students' />
        </form>";
        echo "</div>";
        
        // run this code if show all results button is clicked
        
       if(isset($_POST['show_button']))
       {
          echo nl2br ("\n");
          
          //$sql = "SELECT * FROM STUDENT WHERE gradYear = 0 ORDER BY lastName, firstName";
          $sql = "SELECT * FROM STUDENT ORDER BY lastName, firstName";
          $resultAll = mysqli_query($connection, $sql);
          //
          // calls the function PrintData to print all the student data where status is active
          PrintData($resultAll); 

       }//end if isset (Show button)
       //
       
?>

</body>
</html>