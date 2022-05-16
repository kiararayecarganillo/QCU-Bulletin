<?php 
  require('./database.php');

  session_start();

  /* Functions */
  function pathTo($destination) {
    echo "<script>window.location.href = '/qcu_bulletin/$destination.php'</script>";
  }

  if ($_SESSION['status'] == 'invalid' || empty($_SESSION['status'])) {
    /* Set Default Invalid */
    $_SESSION['status'] = 'invalid';
  }

  if ($_SESSION['status'] == 'valid') {
    pathTo('home');
  }
  
  if (isset($_POST['login'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (empty($username) || empty($password)) {
      // echo "Please fill up all fields";
    } else {
      $queryValidate = "SELECT * FROM accounts WHERE studentId = '$username' AND password = md5('$password')";
      $sqlValidate = mysqli_query($connection, $queryValidate);
      $rowValidate = mysqli_fetch_array($sqlValidate);

      if (mysqli_num_rows($sqlValidate) > 0) {
        $_SESSION['status'] = 'valid';
        $_SESSION['userid'] = $rowValidate['id'];
        $_SESSION['password'] = $rowValidate['password'];
        $_SESSION['username'] = $rowValidate['studentId'];
        $_SESSION['StudentName'] = $rowValidate['StudentName'];

        pathTo('home');
      } else {
        $_SESSION['status'] = 'invalid';

        echo '<script>alert("Invalid Credential!")</script>';
      }
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LOGIN</title>
  <link rel="stylesheet" href="./css/login.css">
  <!-- fonts -->
      <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
</head>
<body>

  <div class="nav-container">
    <nav>
      <div class="logo">
        <img src="./img/QCU_Logo_2019 (1).png" alt="">
        <h3>Quezon City University <span>Bulletin Board</span></h3>
      </div>
    </nav>
  </div>

  <div class="main">
    <div class="qcu_pic">
      <img src="./img/ASFASFASFAFASF.png" alt="">
    </div>

  <div class="form_container">
    <div class="form_login_wrapper">
        <div class="welcome">
          <img src="./img/student.png" alt="">
          <p>Welcome to QCU Bulletin board</p>
        </div>
        <div class="my_form">
     
          <form action="/qcu_bulletin/login.php" method="post">
            <img src="./img/user.png" alt="">
            <h3>Login As Student</h3>
            <div class="input_wrapper">
              <label for="username">Student Number</label>
              <input id="username" type="text" name="username" required/>
            </div>
            <div class="input_wrapper">
              <label for="password">Password</label>
              <input id="password" type="password" name="password" required/>
            </div>
            <input id="btn" type="submit" name="login" value="LOGIN"/>
            <span class="register">Don't have an account? <a href="./register.php">Register here</a></span>
          </form>
        </div>  
      </div>
  </div>


  </div>



</body>
</html>