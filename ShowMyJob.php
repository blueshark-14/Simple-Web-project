<?php 

session_start();

if(isset($_SESSION['user_id']))
{
    $connection = mysqli_connect('localhost', 'root', '', 'login_db');
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT * FROM requirements WHERE user_id = '$user_id' ";
 
    $result = mysqli_query($connection, $sql);
    
   
}
else echo "No user id found!";

?>



<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="style3.css">
	<link rel="stylesheet" href="style5ForBack.css">
	<meta charset="UTF-8">
	<title>PHP Search</title>
</head>
<body>
<a class="btn2"  href="PROFILE.php">Back</a><br><br>
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
                        <th>Total Applications</th>
                          
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
						<td>  
							<a href="showApplication.php?job_id=<?php echo $row->id?>"><?php
						
									$sql2 = "SELECT count(*) as cnt FROM application WHERE job_id = '$row->id' ";
									$res  = mysqli_query($connection, $sql2); 
									$row2 =  mysqli_fetch_object($res);
									echo $row2->cnt;
						
						     ?> </a>
					        
					
					    </td>
					</tr>
					<?php } ?>
				</table>
			</div>
		</div>
	</div>
</body>
</html>