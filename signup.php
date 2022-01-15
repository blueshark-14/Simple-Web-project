<?php 
   session_start();

   include("connection.php");
   include("functions.php");
  
   if($_SERVER['REQUEST_METHOD'] == "POST")
   {
       //something was posted
      $employer_name = $_POST['employer_name'];
      $password = $_POST['password'];
      $email_id = $_POST['email'];
      $phone_no = $_POST['phone'];

      if(!empty($employer_name) && !empty($password) && !empty($email_id) && !empty($phone_no)  && !is_numeric($employer_name))
      {
        //save to database
        $user_id = random_num(20);
        $query = "insert into users(user_id, user_name, password , email_id , phone) values('$user_id', '$employer_name' , '$password', '$email_id' , '$phone_no'); ";  
        
        mysqli_query($con , $query);

        //redirect the user to login page
         header("Location: newLogin.php");
        die;

    }else { echo "Please enter some valid information!";} 
    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIGNUP</title>
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
            width: 900px;
            padding: 30px;
        }

    </style>

  <div id="box">
      <form method="post">
          <div style = "font-size: 20px ; margin : 10px; color: white;">Signup</div><br>
         
          <div>
               <label>Employer Name</label>
               <input id="text" type = "text" name = "employer_name" autocomplete="off" class="form-control"><br><br>
           </div> 
           <div>
               <label>Password</label>
               <input id="text" type = "password" name = "password" autocomplete="off" class="form-control"><br><br>
           </div> 
           
           <div>
               <label>Email Id</label>
               <input id="text" type = "email" name = "email" autocomplete="off" class="form-control"><br><br>
           </div> 

           <div>
               <label>Phone No</label>
               <input id="text" type = "text" name = "phone" autocomplete="off" class="form-control"><br><br>
           </div> 

        
          <input id="button" type = "submit" value = "Signup"><br><br>
          <a href="newLogin.php">Click to login</a><br><br>
      </form>
  </div>

   
 


</body>
</html>