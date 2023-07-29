<?php
session_start();
if($_SESSION['name']==NULL){
  // Haven't log in
  header("location:user_login.php");
}
$Role_id=$_SESSION['Role_id'];
?>
<head>
<title > 

</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<style>
  .nav-item{
    text-align: center;
  }
</style>
</head>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark" text-align:center>

  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
      
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="user_signup.php">Student Registration</a>
        </li>
        

        <li class="nav-item">
          <a class="nav-link" href="book.php">Books Detail</a>
        
        <li class="nav-item">
          <a class="nav-link" href="show.php">Student Data</a>
        </li>
       
        <li class="nav-item">
          <a class="nav-link" href="issue_book.php">Issue Books</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="submit_book.php">Submit Books</a>
        </li>
        <li class="nav-item"> 
          <a class="nav-link " href="LMS.php" tabindex="-1" >LMS Report</a>
        </li>
        <li class="nav-item"> 
          <a class="nav-link " href="logout.php" tabindex="-1" >Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>