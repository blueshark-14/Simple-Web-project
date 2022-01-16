<?php 
                  $connection = mysqli_connect('localhost', 'root', '', 'login_db');
				  
					  $search_key = $_GET['job_id'];
				      $sql = "SELECT * FROM application WHERE job_id = '$search_key' ";
					
				  $result = mysqli_query($connection, $sql);
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="style3.css">
	<link rel="stylesheet" href="style5ForBack.css">
	<meta charset="UTF-8">
	<title>Citywise Job</title>
</head>
<body>
<a class="btn2"  href="ShowMyJob.php">Back</a><br><br>
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2" style="margin-top: 5%;">
				
				<table class="table table-bordered">
					<tr>
						
						<th>Name</th>
						<th>Age</th>
						<th>Address</th>
						<th>City</th>
						<th>Education</th>
						<th>Email</th>

					</tr>
					<?php while($row =  mysqli_fetch_object($result) ) { ?>
					<tr>
						
						<td> <?php echo $row->name  ?>   </td>
						<td>  <?php echo $row->age  ?> </td>
						<td> <?php echo $row->address  ?></td>
						<td>  <?php echo $row->city  ?> </td>
						<td>  <?php echo $row->education  ?> </td>
						<td>  <?php echo $row->email ?> </td>
					</tr>
					<?php } ?>
				</table>
			</div>
		</div>
	</div>
</body>
</html>