<?php 
   session_start();

   include("connection.php");
   include("functions.php");
  
   if($_SERVER['REQUEST_METHOD'] == "POST")
   {
       //something was posted
      //$user_name = $_POST['user_name'];
      //$password = $_POST['password'];
      

      $company_name = $_POST['company_name'];
      $job_title = $_POST['job_title'];
      $address = $_POST['address'];
      $city = $_POST['city'];

      $country = $_POST['country'];
      $education = $_POST['education'];
      $publish_date = $_POST['publish_date'];
      $deadline = $_POST['deadline'];
       
      $user_id = $_SESSION['user_id'];


      if(!empty($company_name) && !empty($job_title) && !empty($address) && !empty($city) && !empty($country) && !empty($education) && !empty($publish_date) && !empty($deadline) )
      {
        //save to database
       // $id = random_num(20);
        $query = "insert into requirements( company_name, job_title, address , city , country, education , publish_date, deadline, user_id ) values( '$company_name' , '$job_title' , '$address', '$city', '$country', '$education', '$publish_date', '$deadline' , '$user_id'); ";  
        
        mysqli_query($con , $query);

        //redirect the user to login page
        // header("Location: successful.php");
        //die;
         
        $alert = "<script>alert('Successfully Submitted!');</script>";
        echo $alert;

    }else { $alert = "<script>alert('Please enter some valid information!');</script>";
        echo $alert;
    } 
    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Requirements</title>
</head>
<body>
    <style type = "text/css">
        #text{
            height : 25px;
            border-radius : 5px;
            padding : 4px;
            border : solid thin #aaa ;
            width: 100% ;
        }
        #button{
            padding: 10px;
            width:  100px;
            color: white;
            background-color: green;
            border: none ;
        }
        #box{
            background-color: grey;
            margin: auto;
            width: 900px;
            padding: 30px;
        }

    </style>

  <div id="box">
      <form method="post">
          <div style = "font-size: 20px ; margin : 10px; color: white;">Job Requirements</div><br>
          
          
          <div>
               <label>Company Name</label>
               <input id="text" type = "text" name = "company_name" autocomplete="off" class="form-control"><br><br>
           </div> 

           <div>
               <label>Job Title</label>
               <input id="text" type = "text" name = "job_title" autocomplete="off" class="form-control"><br><br>
           </div> 

           <div>
               <label>Address</label>
               <textarea id="text" name="address" class="form-control" ></textarea>
           </div> 

           <div>
               <label>City</label>
               <input id="text" type = "text" name = "city" autocomplete="off" class="form-control"><br><br>
           </div> 
           <div>
               <label>Country</label>
               <input id="text" type = "text" name = "country" autocomplete="off" class="form-control"><br><br>
           </div> 

           <div>
               <label>Education</label>
               <input id="text" type = "text" name = "education" autocomplete="off" class="form-control"><br><br>
           </div> 
           
           
           <div>
               <label>Publish Date</label>
               <input id="text" type = "date" name = "publish_date" autocomplete="off" class="form-control"><br><br>
           </div> 

 
           <div>
               <label>Deadline</label>
               <input id="text" type = "date" name = "deadline" autocomplete="off" class="form-control"><br><br>
           </div> 

          
          
          <input id="button" type = "submit" value = "Submit"><br><br>
          
      </form>

      <a  href="PROFILE.php">Back</a><br><br>

  </div>

</body>
</html>