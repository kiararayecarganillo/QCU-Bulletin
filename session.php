<?php 
  session_start();

  function pathTo($destination) {
    echo "<script>window.location.href = '/qcu_bulletin/$destination.php'</script>";
  }

  if ($_SESSION['status'] == 'invalid' || empty($_SESSION['status'])) {
    /* Set status to invalid */
    $_SESSION['status'] = 'invalid';

    /* Unset user data */
    unset($_SESSION['username']);
    unset($_SESSION['StudentName']);
    unset($_SESSION['userid']);
    unset($_SESSION['password']);

    /* Redirect to login page */
    pathTo('login');
  }
?>