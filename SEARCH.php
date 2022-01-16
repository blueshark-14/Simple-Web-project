<?php 
               session_start();

			     $connection = mysqli_connect('localhost', 'root', '', 'login_db');
				  
                  if(isset($_POST['search'])){
					  $search_key = $_POST['search'];
				      $sql = "SELECT * FROM requirements WHERE job_title LIKE '%$search_key%' ";
					  setcookie('searchKey', $search_key, time()+(60) );
					} else 
					{
						$sql = "SELECT * FROM requirements";
						$search_key="";
					}			 
				  
				  $result = mysqli_query($connection, $sql);
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
<a class="btn2"  href="HOME.php">Back</a><br><br>
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2" style="margin-top: 5%;">
				<div class="row">

              

				<form action="" method="POST"> 
					<div class="col-md-6">
						<input type="text" name="search" class='form-control' placeholder="Search By Job" value="<?php echo $search_key; ?>" > 
					</div>
					<div class="col-md-6 text-left">
						<button class="btn">Search</button>
					</div>
				</form>

				<br>
				<br>
				</div>

               <!-- cookies here -->
                <div style="color:white" >
                <?php 
				   
				   if(isset($_COOKIE['searchKey'])){
					   echo "Your last searched is " .  $_COOKIE['searchKey'] . ".";
				    }
				  
				?>
				</div>

			   <!-- table here -->

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
                        <th>Application</th>   
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
						<?php	
						   $today = date("Y-m-d");
						  if($row->publish_date <= $today and $row->deadline >= $today )
						  { ?>
							<a href="apply.php?id=<?php echo $row->id ?>">apply</a>
						 <?php }else {echo "apply";} ?>
						   
					
					    </td>
					</tr>
					<?php } ?>
				</table>
			</div>
		</div>
	</div>
</body>
</html>