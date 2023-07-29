<?php 
session_start();
require('db.php');

?><html>
    <head>
        <title>
            Login page
        </title>
        <link href="login.css" rel="stylesheet">
    </head>
    <body>
    <form method="POST" class="form">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
      <p>Welcome</p>
    </div>

    <!-- Login Form -->
    
      <input type="text" id="login_mail" class="fadeIn second" name="login_mail" placeholder="login mail">
      <input type="text" id="login_password" class="fadeIn third" name="login_password" placeholder="password">
      <input type="submit" name="login" class="fadeIn fourth" value="Log In">
      <a href="">Forgot password?</a>
    </form>

    <!-- Remind Passowrd -->
    <!-- <div id="formFooter">
      <a class="underlineHover" href="#">Forgot Password?</a>
    </div> -->
  <?php 

if(isset($_POST['login'])) 
{      
  echo "hi";
  header("location:home.php"); 


    $email=$_POST['login_mail'];
    $password=$_POST['login_password'];
    $registration=rand(111,999);
    $sql = "Select * from users where Email ='$email' && Password = '$password';";
    $result_sql = mysqli_query($conn,$sql);
    $row_sql = mysqli_fetch_assoc($result_sql);
    $name = $row_sql['name'];
    $Role_id=$row_sql['Role_id'];
  
    if(mysqli_num_rows($result_sql)>0)
    {
        $_SESSION['username']=$email;
        $_SESSION['name']= $name;
        $_SESSION['Role_id']=$Role_id;
        header("location:home.php");

    }          


    else
    {
      echo "invalid user name or password";
    }
    }
    ?>

  

  </div>
</div>

    </body>
</html>


     