<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>
    login system
  </title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

  <link href="header_style.css" rel="stylesheet" type="text/css" />
</head>

<body>
  <nav class="navbar navbar-expand-xl fixed-top navbar-light bg-light">
    <span class="nav-item navbar-brand"><b><a style="color:black;" href="index.php">Hi!</a></b></span>
    <span class="navbar-text abs-center-x"><b>This is an example of a basic login system</b></span>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon my-toggler"></span>
    </button>

    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="nav ml-auto">
        <?php
        if(isset($_SESSION['userId'])){
          echo '<li class="nav-item"><form action="includes/logout.php" method="get">
          <button class="btn btn-outline-dark btn-sm" href="#" type="submit">LogOut</a></form>
          </li>';
        } else{
          echo '<li class="nav-item">
          <a class="nav-link text-dark" href="login_page.php">Login</a>
          </li>
          <li class="nav-item">
          <a class="nav-link text-dark" href="signUp_page.php">SignUp</a>
          </li>';
        }
        ?>
      </ul>
    </div>
  </nav>
</body>

</html>
