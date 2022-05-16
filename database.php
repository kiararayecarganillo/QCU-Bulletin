<?php
  $host = 'localhost';
  $user = 'root';
  $password = '';
  $database = 'php-login-qcu-bulletin';


  $connection = mysqli_connect($host, $user, $password, $database);

  if (mysqli_connect_error()) {
    echo 'error';
  }
?>