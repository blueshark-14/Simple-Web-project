<?php 
                  $connection = mysqli_connect('localhost', 'root', '', 'login_db');
				    
			    	$sql = "SELECT city,count(*) as cnt FROM requirements group by city";
					
				  $result = mysqli_query($connection, $sql);
  ?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <title>Division</title>
    <link rel="stylesheet" href="style4.css">
	<link rel="stylesheet" href="style5ForBack.css">

</head>
<body>
  
<a class="btn2" href="HOME.php">Back</a><br><br>
         
       <div>
           
				<table class="table table-bordered">
					<tr>
						<th>City Name</th>
						<th>Total Job</th>
					</tr>
					<?php while($row =  mysqli_fetch_object($result) ) { ?>
					<tr>
						<td>  <?php echo $row->city  ?> </td>
						<td> <?php echo $row->cnt  ?>   </td>
						
					</tr>
					<?php } ?>
				</table>
		</div>

</body>
</html>