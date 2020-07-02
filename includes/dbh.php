<?php

  $server = "localhost" ;
  $dBUsername = "root" ;
  $dBPassword = "" ;
  $dBName = "loginSystem";

  $connection = mysqli_connect($server, $dBUsername, $dBPassword, $dBName);

  if(!connection){
    die("Connection failed: ".mysqli_connect_error());
  }
