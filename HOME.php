<?php 
                  $connection = mysqli_connect('localhost', 'root', '', 'login_db');
				    
			    	$sql = "SELECT city,count(*) as cnt FROM requirements group by city";
					
				  $result = mysqli_query($connection, $sql);
  ?>




<!DOCTYPE html>
<!--Code by Divinector (www.divinectorweb.com)-->
<html lang="en">
    <!-- bootstrap link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">


<head>
    <meta charset="UTF-8">
    <title>JOB HUNT</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">    
</head>
<body>
    <header>

 <div class="wrapper">
        <div class="logo">
            <img src="https://i.postimg.cc/mg4rWBmv/logo.png" alt="">
        </div>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

        <!-- nav bar -->
        <ul class="nav-area">
        <li><a href="#">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="SEARCH.php">Job Find</a></li>
        <li><a href="checkLogin.php">Employer</a></li>
        <li><a href="city.php">City Job</a></li>
        </ul>

</div> 

    
 <div class="welcome-text">
        <h1> Many <span>Job</span> is here</h1>
 
        <a href="#">Contact US</a>
 </div>
</header>

</body>
</html>
