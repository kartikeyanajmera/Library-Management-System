<?php 
require('db.php');
require('nav.php');
$query_books="SELECT * FROM books";
$result_books = mysqli_query($conn,$query_books);
?>
<html>
    <head>
        <title>
            Book Issue Page
        </title>
        <!-- <link rel="stylesheet" a href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"> -->

        <link rel="stylesheet" a href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">   
        <style> 
        form{
            background-color:grey;
            text-align: center;
            margin-top: 200px;
            font-size: large;
            
        }
        body{
            background-color:grey;
            /* background-image: url('mount.jpg'); */
        }
    </style>
    </head>
    <body>
        <center>
            <h1>
                Issue Book Here
            </h1>
        <form method="POST">
        <?php 
        // echo "Enter Enrollement No:";
        $registrationNumber = "";
        $bookname="";

        // Output the text with white color and bold style using inline CSS
        echo '<p style="color: white; font-weight: bold;">Enter Enrollement ID: ' . $registrationNumber . '</p>';
        ?>
        <input type="number" id="Registration" name="Registration" class="font" required ><br><br>
        <?php
        echo '<p style="color: white; font-weight: bold;">Choose Book ' . $bookname . '</p>';
        ?>
        <?php
        echo"<select name='book_issued'> ";
        while($row_books=$result_books->fetch_assoc())
        {
            echo "<option value ='" . $row_books['book_id']."'>".$row_books['book']."</option>";
        }
        echo"</select>"; 
        
        ?> 
        <br>        <br>
        <button type="submit" class="btn btn-primary" name="issue" value="issue"> 
            Issue
        </button>        
        </form>
        <?php
        if(isset($_POST['issue']))
        {   
        $Registration_id=$_POST['Registration'];
        $query_registration_check = "Select * from student where enrollment_id = $Registration_id;";
        $result_regiastration_check = mysqli_query($conn,$query_registration_check);            
        $row_reg_check= mysqli_fetch_assoc($result_regiastration_check);
       if(mysqli_num_rows($result_regiastration_check)>0)   //check if user is available //
        {
         $book_id = $_POST['book_issued'];
        $max_books= $row_reg_check['max_books'];              
        $query_book_available = "Select remain_books,issue from books where book_id = $book_id;";
        $result = mysqli_query($conn,$query_book_available);
        $row = mysqli_fetch_assoc($result);
        if($row['remain_books']>0)

        // if($row['Active']>0)
        // {

        {
            $query_book_issue_check ="SELECT COUNT(ID) as assignd_books FROM `issue_book` WHERE `registration_no`=$Registration_id && issue_status=1;";
            $result_book_issue_check = mysqli_query($conn,$query_book_issue_check);
            $row_book_issue_check= mysqli_fetch_assoc($result_book_issue_check);
            $already_assignd = $row_book_issue_check['assignd_books'];
            if($already_assignd<$max_books)
            {
            
            $issue_book_current = $row['issue'];
            $remain_books_current = $row['remain_books'];
            $query_issue_book = "INSERT INTO issue_book(registration_no, book_id,issue_status) 
                                 VALUES ('$Registration_id','$book_id',1)";
            $result_issue_book=mysqli_query($conn,$query_issue_book);

            $issue_book_updated = $issue_book_current + 1;
            $remain_books_updated = $remain_books_current - 1;
            $query_update_books="UPDATE books SET issue=$issue_book_updated ,remain_books=$remain_books_updated WHERE book_id=$book_id";
            $result_update_books=mysqli_query($conn,$query_update_books);
            echo "Book issued"; 
            }
            else
            {
                echo "Book can not assign as maximum number is already assigned";
            } 
        }
        
    //    }
        else
        {
            echo "Book Not Availaible";
        }

        }
        else{
            echo "no user found with registration number $Registration_id";
        }       
    } 
    ?>
    </center>
    </body>
    </html>  

