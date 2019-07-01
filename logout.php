<html lang="en-us">

<head>
	<title>Log Out</title>
	
	<?php
		include('nav.php');
	?>
	
</head>
<body>
	
	<div class="body-container">
		
		<?php
		
			echo "<h1>Are You Sure?</h1>";
            echo "<p>Are you sure you would like to logout?</p><br>";
            echo '<a href="logout.php?confirmed=yes">Yes</a>';
            echo '&nbsp;&nbsp;&nbsp;';
            echo "<a href=\"javascript:history.go(-1)\">No, Take Me Back</a>";
            
        if (isset($_GET['confirmed'])) {
            $user = new User();
            $user->logout();
        }
		
		?>
		
	</div>
	
<!-- <h2> Manage Skills </h2>
	<br><br> -->
	
</body>
</html>