<?php 
                  $connection = mysqli_connect('localhost', 'root', '', 'login_db');
				  
					  $search_key = $_GET['cityName'];
				      $sql = "SELECT * FROM requirements WHERE city = '$search_key' ";
					
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
<a class="btn2"  href="city.php">Back</a><br><br>
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2" style="margin-top: 5%;">
				
				<table class="table table-bordered">
					<tr>
						
						<th>Job title</th>
						<th>Company Name</th>
						<th>City</th>
						<th>Address</th>
						<th>Country</th>
						<th>Education</th>
						<th>Publish Date</th>
						<th>Deadline</th>

					</tr>
					<?php while($row =  mysqli_fetch_object($result) ) { ?>
					<tr>
						
						<td> <?php echo $row->job_title  ?>   </td>
						<td>  <?php echo $row->company_name  ?> </td>
						<td> <?php echo $row->city  ?></td>
						<td>  <?php echo $row->address  ?> </td>
						<td>  <?php echo $row->country  ?> </td>
						<td>  <?php echo $row->education  ?> </td>
						<td>  <?php echo $row->publish_date ?> </td>
						<td>  <?php echo $row->deadline ?> </td>
					</tr>
					<?php } ?>
				</table>
			</div>
		</div>
	</div>
</body>
</html>