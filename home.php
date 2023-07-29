     <?php 
        require('db.php');
        require('nav.php');     
     ?>     
     <html>
    <head>
        <title>

        </title>
        <link href="homes.css" rel="stylesheet">
        <style>
        
    </style>
    </head>
    <body>
        <div class="centered">
    <?php    
        $username = $_SESSION['username'];
        $name = $_SESSION['name'];
        echo "Welcome $name";
        ?> 
    </div>
    </body>
    </html>

