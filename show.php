<?php 
require('db.php');
require('nav.php');
$query="select * FROM student";
$result=mysqli_query($conn,$query);

if(isset($_GET['delete']))
{   
   
    $del = $_GET['delete'];
    $query = "DELETE FROM student WHERE Sno=".$del;
    $result=mysqli_query($conn,$query);
    header("location:show.php");
}
?>
<html>
    <head>
        <title>
            show data
        </title>
        <link rel="stylesheet" a href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
        <style>
        body{
            background-color:grey;
        }
    </style>
    </head>
    <body>
        <div class="container">
            <div class="row mt-4">
                <div class="column">
                    <div class="card mt-4">
                        <div class="card-header">
                            <h2 style="text-align: center;">Registered Students</h2>
                        </div>
                        <div class="card-body">
                            <form method="get">
                            <table class="table table-bordered text-center">
                                <tr class="bg-dark text-white">
                                    <td id="same">Sno</td>
                                    <td id="same">Username</td>
                                    <td id="same">E-mail</td>
                                    <td id="same">ID</td>
                                    <td id="same">Max books</td>   
                                    <td id="same">Operation</td>                                    
                                </tr>
                                <tr>
                                    <?php                                     
                                    while($row=mysqli_fetch_assoc($result))
                                    {
                                    ?>
                                    <td><?php echo $row['Sno']?></td>
                                    <td><?php echo $row['username'] ?></td>
                                    <td><?php echo $row['email'] ?></td>
                                    <td><?php echo $row['enrollment_id'] ?></td>
                                    <td><?php echo $row['max_books'] ?></td>
                                    
                                    <!-- <td ><a href="update.php?id=<?php echo $row['ID']?>">Edit</td> -->
                                    <td><a class='btn btn-danger' href="show.php?delete=<?php echo $row['Sno']?> ">Delete</a></td>                         
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