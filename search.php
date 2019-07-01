<html lang="en-us">

<head>
	<title>Search Results</title>
	
	<?php
		include('nav.php');
	?>
	
</head>
<body>
    
    <div class="body-container">
        
    <?php
    
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            
            if(isset($_GET['searchby']) && isset($_GET['value'])){
                
                echo "<h1>Results</h1>";
                
                echo '<div class="form">
                    <form method="POST">
                        <select name="orderby">
                            <option value="" selected>Order By</option>
                            <option value="firstName">First Name</option>
                            <option value="lastName">Last Name</option>
                            <option value="uNumber">U-Number</option>
                        </select>
                        <input type="radio" name="gradYear" value="both" checked>Both
                        <input type="radio" name="gradYear" value="IS NULL" checked>Only Current Students
                        <input type="radio" name="gradYear" value="IS NOT NULL">Only Graduated Students
                      <button type="submit" value"order-by">Apply</button>
                    </form>
                    </div>';
                    
                    $search = new StudentViewer();
                    $search->showStudentsBy($_GET['searchby'],$_GET['value']);
                    
            }
        
        }
        elseif($_SERVER['REQUEST_METHOD'] == 'POST') {
                    
                    echo "<h1>Results</h1>";
                    
                    echo '<div class="form">
                    <form method="POST">
                        <select name="orderby">
                            <option value="" selected>Order By</option>
                            <option value="firstName">First Name</option>
                            <option value="lastName">Last Name</option>
                            <option value="uNumber">U-Number</option>
                        </select>
                        <input type="radio" name="gradYear" value="both" checked>Both
                        <input type="radio" name="gradYear" value="IS NULL" checked>Only Current Students
                        <input type="radio" name="gradYear" value="IS NOT NULL">Only Graduated Students
                      <button type="submit" value"order-by">Apply</button>
                    </form>
                    </div>';
                    
                    $search = new StudentViewer();
                    $search->showStudentsByOrder($_GET['searchby'],$_GET['value']);
                    
        }
        else {
            
            echo "<h1>Search Not Found</h1>";
            echo "<p>Please try to search again.</p>";
            
        }
    
    ?>
    

    
    </div>
	



</body>
</html>