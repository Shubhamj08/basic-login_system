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
  <div class=" d-flex justify-content-center mt-5">
    <div class="jumbotron w-25">
      <h4 class="display 3">SignUp :</h4>
        <form class="form-group" action="" method="post">
          <label for="username">Username :</label>
          <input type="text" class="form-control" id="username" name="username"/>
          <label for="usermail">Email :</label>
          <input type="text" class="form-control" id="usermail" name="usermail"/>
          <label for="password">Password :</label>
          <input type="password" class="form-control" id="password" name="password"/>
          <label for="password-repeat">Re-enter Password :</label>
          <input type="password" class="form-control" id="password-repeat" name="repeat_password"/>
          <button class="btn btn-primary my-3 btn-sm" type="submit">Submit</button>
        </form>
    </div>
  </div>

</body>
</html>
