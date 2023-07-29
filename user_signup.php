<?php 
require('db.php');
require('nav.php');
?>
<html>
    <head>
        <title>
            
        </title>
       <link href="stylesheet.css" rel="stylesheet">
    </head>
    <body>


    
    
    <div class="wrapper">
        <div class="form-left">
            <h2 class="text-uppercase">information</h2>
            <p>
            Dear Students,

            We are thrilled to introduce our new library management system, making your book borrowing experience easier and more efficient than ever before. Happy reading!

            Sincerely,
            Library Management Team   
            </p>
            <p class="text">
                <span>Sub Head:</span>
            Kartikeyan            
            </p>
            <h1>Welcome</h1>
        </div>
        
        <form method="POST" class="form-right">
            <h2 class="text-uppercase">Registration form</h2>
            <div class="row">
                <div class="mb-3">
                    <label>Name</label>
                    <input type="text" name="user_name" class="input-field">
                </div><br><br>
               
            </div>
            <div class="mb-3">
                <label>Your Email</label>
                <input type="email" class="input-field" name="user_email" required>
            </div><br><br>
           
            <div class="mb-3">
                <label>Your Enrollement id</label>
                <input type="number" class="input-field" name="user_id" required>
            </div><br><br>

            <div class="form-field">
                <input type="submit" value="Register" class="register" name="register">
            </div>    
        </form>        
    </div>  
    <?php 
   
    if(isset($_POST['register'])){
        $name=$_POST['user_name'];
        $email=$_POST['user_email'];
        $id=$_POST['user_id'];
        // $hash = md5($email);
        $query="INSERT INTO student(username, email, enrollment_id,max_books) VALUES ('$name','$email','$id','3')";
        echo $query;    
        $result=mysqli_query($conn,$query);
        header("location:home.php");
    }    
    ?>
    </body>
</html>