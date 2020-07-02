<?php

if(isset($_POST['signUp_submit'])){

  require 'dbh.php' ;

  $username = $_POST['username'];
  $email = $_POST['usermail'];
  $password = $_POST['password'];
  $passwordRepeat = $_POST['repeat_password'];

  if (empty($username) || empty($email) || empty($password) || empty($passwordRepeat)){
    header("Location: ../signUp_page.php?error=emptyfields&username=".$username."&mail=".$email);
    exit();
  }

  elseif (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username) ) {
    header("Location: ../signUp_page.php?error=invalidmailandusername");
    exit();
  }

  elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: ../signUp_page.php?error=invalidmail&username=".$username);
    exit();
  }

  elseif (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
    header("Location: ../signUp_page.php?error=invalidusername&mail=".$email);
    exit();
  }

  elseif ($password != $passwordRepeat) {
    header("Location: ../signUp_page.php?error=passwordcheck&username=".$username."&mail=".$email);
    exit();
  }
  else{
    $sql = "SELECT uidUsers FROM users WHERE uidUsers=? AND pwdUsers=?";
    $stmt = mysqli_stmt_init($connection);
    if(!mysqli_stmt_prepare($stmt, $sql)){
      header("Location: ../signUp_page.php?error=sqlerror");
      exit();
    }else {
      mysqli_stmt_bind_param($stmt, "s", $username);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_store_result($stmt);
      $resultCheck = mysqli_stmt_num_rows($stmt);
      if ($resultCheck > 0) {
        header("Location: ../signUp_page.php?error=usertaken&mail=".$email);
        exit();
      }else{
          $sql = "INSERT INTO users (uidUsers, emailUsers, pwdUsers) VALUES (?, ?, ?)" ;
          $stmt = mysqli_stmt_init($connection) ;
          if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../signUp_page.php?error=sqlerror");
            exit();
          }else{
            $hashPwd = password_hash($password, PASSWORD_DEFAULT);

            mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashPwd );
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);

            header("Location: ../signUp_page.php?signup=success");
            exit();
          }
      }
    }
  }
  mysqli_stmt_close($stmt);
  mysqli_close($connection);
}else{
  header("Location: ../signUp_page.php");
}
