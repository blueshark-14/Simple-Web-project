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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
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
            background-color: lightblue;
            border: none ;
        }
        #box{
            background-color: grey;
            margin: auto;
            width: 300px;
            padding: 20px;
        }

    </style>

  <div id="box">
      <form method="post">
          <div style = "font-size: 20px ; margin : 10px; color: white;">Login</div><br>
          
         <div>
             <label>Email Id</label>
             <input id="text" type = "text" name = "email_id"><br><br>
         </div>
          
          <div>
             <label>Password</label>
             <input id="text" type = "password" name = "password"><br><br>
          </div>
               
          
          <input id="button" type = "submit" value = "login"><br><br>
          <a href="signup.php">Click to Signup</a><br><br>
      </form>
  </div>

</body>
</html>