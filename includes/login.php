<?php

if (isset($_POST['login_submit'])) {

  require 'dbh.php';

  $mailUser = $_POST['username'];
  $password = $_POST['password'];

  if(empty($mailUser) || empty($password)){
      header("Location: ../login_page.php?error=emptyfields");
      exit();
  } else{
      $sql = "SELECT * FROM users WHERE uidUsers=? OR emailUsers=?;";
      $stmt = mysqli_stmt_init($connection);
      if(!mysqli_stmt_prepare($stmt, $sql)){
        header("Location: ../login_page.php?error=sqlerror");
        exit();
      } else{
        mysqli_stmt_bind_param($stmt, "ss", $mailUser, $mailUser);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if($row = mysqli_fetch_assoc($result)){
          $pwdCheck = password_verify($password, $row['pwdUsers']);
          if($pwdCheck == false){
            header("Location: ../login_page.php?error=wrongpassword");
            exit();
          }
          elseif ($pwdCheck == true) {
            session_start();
            $_SESSION['userId'] = $row['idUsers'];
            $_SESSION['userUid'] = $row['uidUsers'];

            header("Location: ../index.php?login=success");
            exit();
          } else{
            header("Location: ../login_page.php?error=somethingwentwrong");
            exit();
          }
        } else{
          header("Location: ../login_page.php?error=nouser");
          exit();
        }
      }
  }

} else {
    header("Location: ../index.php");
    exit();
}
