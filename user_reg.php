<?php
session_start();
require('db.php');
?>
<html>

<head>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    </head>
<body >
    <?php require('nav.php');
    ?>
    <div class="container my-4">

        <h1 class="text-center">Signup Here</h1>
        <form method="POST">

            <div class="form-group">
                <label for="name">Username</label>
                <input type="text" class="form-control" id="user_name" name="user_name" aria-describedby="emailHelp">
            </div><br>

            <div class="form-group">
                <label for="mobile">Mobile</label>
                <input type="text" class="form-control" id="user_mobile" name="user_mobile">
            </div><br>
            <div class="form-group">
                <label for="mobile">Enter Max. Number of books</label>
                <input type="number" class="form-control" id="max_books" name="max_books">
            </div><br>

            <button type="submit" class="btn btn-primary" name="submit">
                SignUp
            </button>
        </form>
        <?php
        if(isset($_POST['submit']))
        {
            
        $user_mobile = $_POST['user_mobile'];
        $username = $_POST['user_name'];
        $registration_number = rand(1111,9999);
        $query_mobile="select * FROM users where mobile=$user_mobile;";
        $result_mobile=mysqli_query($conn,$query_mobile);
        $max_books=$_POST['max_books'];
            if(mysqli_num_rows($result_mobile)>0)
            {
                echo "Mobile number is already registered";

            }
            else
            {
                $sql="INSERT INTO users (username,mobile,registration_no, max_books) VALUES('$username','$user_mobile','$registration_number','$max_books');";
                if(mysqli_query($conn,$sql))
                {                               
                echo "<script>alert('new record inserted $registration_number')</script>";
                }
                else
                {
                    echo "unable to insert";
                }
            }

        }

        ?>

    </div>
</body>

</html>