<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title></title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

</head>
<body>

  <?php
  include "header.php";
  ?>

  <div class="jumbotron">
    <?php
       if(isset($_SESSION['userId'])){
         echo "<h1>You are logged in!</h1>";
       } else{
           echo "<h1>You are logged out!</h1>";
       }
     ?>
    

  </div>

</body>
</html>
