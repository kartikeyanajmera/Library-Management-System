<?php 
require('db.php');
require('nav.php');
$query="SELECT student.enrollment_id,student.username , issue_book.book_id, issue_book.Active, student.email, issue_book.issue_status , issue_book.issue_date,issue_book.receive_date
        from student inner join issue_book
        ON student.enrollment_id=issue_book.registration_no";

$result = mysqli_query($conn,$query);

// if(isset($_GET['delete']))
// {   
   
//     $id = $_GET['delete'];
//     $queryy = "DELETE FROM users WHERE Registration_No=".$id;
//     $result=mysqli_query($conn,$queryy);
//     header("location:LMS.php");
// }

?> 
<html>
    <head>
        <title> LMS report</title>
    </head>
    <style>
        body{
            background-color:grey;
        }
    </style>
    <body>
    <div class="container">
            <div class="row mt-4">
                <div class="column">
                    <div class="card mt-4">
                        <div class="card-header">
                            <h2 style="text-align: center;">book issued data</h2>
                        </div>
                        <div class="card-body">
                            <form method="get">
                            <table class="table table-bordered text-center">
                                <tr class="bg-dark text-white">
                                    <td id="same">Registration_No</td>
                                    <td id="same">Student Name</td>
                                    <td id="same">book</td>
                                    <td id="same">Email</td>
                                    <td id="same">status</td>
                                    <td id="same">issue_date</td>
                                    <td id="same">Receive_date</td>
                                    <td id="same">Active status</td>
                                    <!-- <td id="same">Operation</td>                                         -->
                                </tr>
                                <tr>
                                    <?php                                    
                                    while($row=mysqli_fetch_assoc($result))
                                    {
                                    ?>
                                    <td><?php echo $row['enrollment_id']?></td>
                                    <td><?php echo $row['username']?></td>
                                    <td><?php echo $row['book_id'] ?></td>
                                    <td><?php echo $row['email'] ?></td>                                                                        
                                    <td><?php 
                                    if($row['issue_status']==1)
                                    {
                                        echo "Currently Issued";
                                    } 
                                    else{
                                        echo "book received";
                                    }
                                    ?></td>
                                    <td><?php echo $row['issue_date'] ?></td>   
                                    <td><?php echo $row['receive_date'] ?></td> 
                                    <td><?php echo $row['Active'] ?></td>                                
                                    <!-- <td ><a href="update.php?id=<?php echo $row['ID']?>">Edit</td> --> 
                                    <!-- <td><a class='btn btn-danger' href="LMS.php?delete=<?php echo $row['Registration_No']?> ">Delete</a></td>                    -->
                                    </td>                                   
                                    </tr>
                                      <?php   
                                    }
                                    ?>                                
                            </table>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>