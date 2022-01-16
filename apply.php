<?php 
   session_start();

   include("connection.php");
   include("functions.php");
  
   if($_SERVER['REQUEST_METHOD'] == "POST")
   {
       //something was posted
      //$user_name = $_POST['user_name'];
      //$password = $_POST['password'];
      

      $name = $_POST['name'];
      $age = $_POST['age'];
      $address = $_POST['address'];
      $city = $_POST['city'];

      $email = $_POST['email'];
      $education = $_POST['education'];
      $id = $_GET['id'];


      if(!empty($name) && !empty($age) && !empty($address) && !empty($city) && !empty($email) && !empty($education) )
      {
        //save to database
       // $id = random_num(20);
        $query = "insert into application( name, age, address , city , email, education, job_id ) values( '$name' , '$age' , '$address', '$city', '$email', '$education' , $id); ";  
        
        mysqli_query($con , $query);

        //redirect the user to login page
        // header("Location: successful.php");
       // die;
       
       $alert = "<script>alert('Successfully Submitted!');</script>";
       echo $alert;

    }else { 
        $alert = "<script>alert('Please enter some valid information!');</script>";
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
    <title>application</title>
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
          <div style = "font-size: 20px ; margin : 10px; color: white;">Employee Details</div><br>
          
          
          <div>
               <label>Name</label>
               <input id="text" type = "text" name = "name" autocomplete="off" class="form-control"><br><br>
           </div> 

           <div>
               <label>Age</label>
               <input id="text" type = "text" name = "age" autocomplete="off" class="form-control"><br><br>
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
               <label>Education</label>
               <input id="text" type = "text" name = "education" autocomplete="off" class="form-control"><br><br>
           </div> 
           
           <div>
               <label>Email</label>
               <input id="text" type = "email" name = "email" autocomplete="off" class="form-control"><br><br>
           </div> 
           
          
          
          <input id="button" type = "submit" value = "Submit"><br><br>
          
      </form>

      <a  href="SEARCH.php">Back</a><br><br>

  </div>

</body>
</html>