<?php 
require('db.php');
require('nav.php');
$query="select * FROM books";
// $query="update book set ";
$result=mysqli_query($conn,$query);
?>
<html>
    <head>
        <title>
            show books
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
                            <h2 style="text-align: center;">Booksdata</h2>
                        </div>
                        <div class="card-body">
                            <form method="POST">
                            <table class="table table-bordered text-center">
                                <tr class="bg-dark text-white">
                                    <td id="same">sno</td>
                                    <td id="same">book</td>
                                    <td id="same">book_id</td>
                                    <td id="same">Quantity</td> 
                                    <td id="same">issue</td>  
                                    <td id="same">remain</td>                                  
                                </tr>
                                <tr>
                                    <?php 
                                    
                                    while($row=mysqli_fetch_assoc($result))
                                    {
                                    ?>
                                    <td><?php echo $row['sno']?></td>
                                    <td><?php echo $row['book'] ?></td>
                                    <td><?php echo $row['book_id'] ?></td>
                                    <td><?php echo $row['Quantity'] ?></td>
                                    <td><?php echo $row['issue'] ?></td>
                                    <td><?php echo $row['remain_books'] ?></td>
                                    <!-- <td ><a href="update.php?id=<?php echo $row['ID']?>">Edit</td> -->
                                    <!-- <td><a href="show.php?delete=<?php echo $row['sno']?>">Delete</a></td>                          -->
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