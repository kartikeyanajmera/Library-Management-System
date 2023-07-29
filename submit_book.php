
<?php 
require('db.php');
require('nav.php');
$query_books="SELECT * FROM books";
$result_books = mysqli_query($conn,$query_books);
$row_books = mysqli_fetch_assoc($result_books);
?>
<html>
    <head>
        <title> submit book</title>       
        <link href="submit.css" rel="stylesheet">
</head>
   <body>
   
     <h1 class="text-center">Submit Your Book Here</h1>
        <form method="POST">

        <div class="form-group">
                <?php
                echo '<p style="color: white; font-weight: bold;">Enter Enrollement ID: ' ."" . '</p>';
                ?>
                <input type="number"  id="user_reg_no" name="user_reg_no" aria-describedby="emailHelp">
            </div><br>

            <div class="form-group">
              <?php 
                echo '<p style="color: white; font-weight: bold;">Book Name : ' . "" . '</p>';
              ?>

                <?php
        echo"<select name='book_issued'> ";
        while($row_books=$result_books->fetch_assoc())
        {
            echo "<option value ='" . $row_books['book_id']."'>".$row_books['book']."</option>";

        }
        echo"</select>";
        ?><br><br>

            <button type="submit" class="btn btn-primary" name="submit">
                Submit
            </button>
            <?php

        if(isset($_POST['submit']))
        {   $user_reg_number = $_POST['user_reg_no'];
            $book_id = $_POST['book_issued'];
            $query_issue_check ="Select ID from issue_book where registration_no =$user_reg_number && book_id = $book_id && issue_status=1 limit 1;";
            $result_issue_check = mysqli_query($conn,$query_issue_check);
            $row_issue_check = mysqli_fetch_assoc($result_issue_check);
            
            if($row_issue_check['ID']>0)
            {
                $ID = $row_issue_check['ID'];
                $date = date('Y-m-d H:i:s');                
                $query_update_issue_book="UPDATE issue_book SET issue_status=0,receive_date='$date' WHERE ID=$ID;";
               
                $result_update_issue_book = mysqli_query($conn,$query_update_issue_book);

                $query_book_available = "Select remain_books,issue from books where book_id = $book_id;";
                $result = mysqli_query($conn,$query_book_available);
                $row = mysqli_fetch_assoc($result);
                $issue_book_current = $row['issue'];
                $remain_books_current = $row['remain_books'];
                $issue_book_updated = $issue_book_current - 1;
                $remain_books_updated = $remain_books_current + 1;
                $query_update_books="UPDATE books SET issue=$issue_book_updated ,remain_books=$remain_books_updated WHERE book_id=$book_id";
                $result_update_books=mysqli_query($conn,$query_update_books);
                echo "books received";
            }
            
            
        }
            ?>
        </form>            
   </body>
</html>