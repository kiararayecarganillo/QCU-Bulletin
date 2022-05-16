<?php 
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
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>QCU BULLETIN REGISTER</title>
  <link rel="stylesheet" href="./css/login.css">
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
<div class="main">
    <div class="qcu_pic">
      <img src="./img/ASFASFASFAFASF.png" alt="">
    </div>

  <div class="form_container">
    <div class="form_login_wrapper" style="height:550px;">
        <div class="welcome">
          <img src="./img/student.png" alt="">
          <p>Welcome to QCU Bulletin board</p>
        </div>
        <div class="my_form">
     
        <form class="create-main" action="/qcu_bulletin/create.php" method="post">
            <img src="./img/user.png" alt="">
            <h3 style="padding-bottom:20px;">Login As Student</h3>
            <div class="input_wrapper" style="height:50px; ">
              <label for="StudentName">Student Name</label>
              <input id="StudentName" type="text" name="StudentName" required/>
            </div>
            <div class="input_wrapper" style="height:50px; ">
              <label for="username">Student Number</label>
              <input id="username" type="text" name="username" required/>
            </div>
            <div class="input_wrapper" style="height:50px; ">
              <label for="course">Course</label>
              <input id="course" type="text" name="course" required/>
            </div>
            <div class="input_wrapper"  style="height:50px;">
              <label for="txtPassword">Password</label>
              <input id="txtPassword" type="password" name="password" minlength="6" required/>
            </div>
            <div class="input_wrapper"  style="height:50px; ">
              <label for="txtConfirmPassword">Confirm Password</label>
              <input id="txtConfirmPassword" type="password" name="confirmpassword"  required/>
            </div>
            <input id="btn" type="submit" name="create" value="Sign up">
            <span class="register">Already have an account? <a href="./login.php">Login Here</a></span>
          </form>
        </div>  
      </div>
  </div>


  </div>
</div>
  
<script type="text/javascript">


  
</script>
</body>
</html>