<?php 
                  $connection = mysqli_connect('localhost', 'root', '', 'login_db');
				  
                  if(isset($_POST['search'])){
					  $search_key = $_POST['search'];
				      $sql = "SELECT * FROM requirements WHERE job_title LIKE '%$search_key%' ";
					} else 
					{
						$sql = "SELECT * FROM requirements";
						$search_key="";
					}
				
				  //setcookie('searchKey', $search_key, time()+3);
				  //echo $_COOKIE['searchKey'];
				  $result = mysqli_query($connection, $sql);
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="style3.css">
	<meta charset="UTF-8">
	<title>PHP Search</title>
</head>
<body>
<a align="right" href="newHOME.php">Back</a><br><br>
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2" style="margin-top: 5%;">
				<div class="row">

              

				<form action="" method="POST"> 
					<div class="col-md-6">
						<input type="text" name="search" class='form-control' placeholder="Search By Job" value=" <?php echo $search_key; ?> " > 
					</div>
					<div class="col-md-6 text-left">
						<button class="btn">Search</button>
					</div>
				</form>

				<br>
				<br>
				</div>
				<table class="table table-bordered">
					<tr>
						<th>Company Name</th>
						<th>Job title</th>
						<th>City</th>
					</tr>
					<?php while($row =  mysqli_fetch_object($result) ) { ?>
					<tr>
						<td>  <?php echo $row->company_name  ?> </td>
						<td> <?php echo $row->job_title  ?>   </td>
						<td> <?php echo $row->city  ?></td>
					</tr>
					<?php } ?>
				</table>
			</div>
		</div>
	</div>
</body>
</html>