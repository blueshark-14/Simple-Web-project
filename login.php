<?php 
  session_start();

  include("connection.php");
  include("functions.php");
 
  if($_SERVER['REQUEST_METHOD'] == "POST")
  {
      //something was posted
     $email_id = $_POST['email_id'];
     $password = $_POST['password'];
     
     if(!empty($email_id) && !empty($password) && !is_numeric($email_id))
     {
       //read from database

       $query = "select * from  users where email_id = '$email_id' limit 1";  
       
       $result = mysqli_query($con , $query);

       if($result)
       {
           if($result && mysqli_num_rows($result)>0)
           {
                $user_data = mysqli_fetch_assoc($result);
               // echo "index e jabe!" . "<br>";
                if($user_data['password'] === $password)
                {
                    $_SESSION['user_id'] = $user_data['user_id'];
                    //redirect the user to index page
                   
                    header("Location: Requirements.php");
                    die;
                } 
           } 
       }
         echo "Wrong email id or password!";

   }else { echo "Please enter some valid information!";} 
   
}

?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="style2.css">
  </head>
  <body>

 <!-- form start -->
 <form method="post">
            <div class="login-box">
                <h1>Login</h1>
                <div class="textbox">
                    <i class="fas fa-user"></i>
                    <input id="text" type = "text" name = "email_id" placeholder="Email Id">
                </div>

                <div class="textbox">
                    <i class="fas fa-lock"></i>
                    <input id="text" type = "password" name = "password" placeholder="Password">
                </div>

                <input id="button" type="submit" class="btn" value="Sign in">
            
                <a class="btn2" href="signup.php">Click to Signup</a><br><br>
                <a class="btn2" href="HOME.php">Back</a><br><br>
            </div>
                   
      </form>



  </body>
</html>
