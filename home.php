<?php 
  require('./session.php');
  require('./database.php');

  // if (isset($_POST["edit"])) {
  //   $editId = $_POST['editId'];
  //   $editUsername = $_POST['editUsername'];
  //   $editPassword = $_POST['editPassword'];
  // }
  if (isset($_POST['update'])) {
    // $updateId = $_POST['updateId'];
    // $updateUsername = $_POST['updateUsername'];
    $updatePassword = $_POST['updatePassword'];
    $updateId = $_SESSION['userid'];
    $oldpassword = $_POST['oldpassword'];
    $confirmpassword = $_POST['confirmpassword'];

    if($_SESSION['password'] == md5($_POST['oldpassword'])){
      if($confirmpassword != $updatePassword){
        echo '<script>alert("Passwords do not match.!")</script>';
        echo '<script>window.location.href = "/qcu_bulletin/home.php"</script>';
      }else{
        $queryUpdate = "UPDATE accounts SET password = md5('$updatePassword') WHERE id = $updateId";
        $sqlUpdate = mysqli_query($connection, $queryUpdate);
    
        echo '<script>alert("Password successfully updated!")</script>';
        echo '<script>window.location.href = "/qcu_bulletin/home.php"</script>';
      }

    }else{
      echo '<script>alert("Wrong Password")</script>';

    }
 
  }
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <link rel="stylesheet" href="./css/home.css">
  <!-- fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
   
   <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css">

    <style>

      body{
        background: rgb(240, 240, 240);
      }
      .main{
    margin-top: 90px;
    /* height: 100vh; */
    width: 100%;
    /* background: rgb(240, 240, 240); */
    background:none;
}

.main .bulletin .tab-content .about .about_wrapper {


    width: 100%;
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
}
.main .bulletin .tab-content .about .about_wrapper .history_container{
  background:#fff;
  padding: 20px;
  margin-bottom:50px;
}
.main .bulletin .tab-content .about .about_wrapper .history_container .qcu_wrapper{
    display: flex;
    margin-bottom:40px;
}
.main .bulletin .tab-content .about .about_wrapper .history_container .qcu_wrapper img{
    height: auto;
    width: 330px;
    border-radius:5px;
    margin-right:20px;

}
.main .bulletin .tab-content .about .about_wrapper .history_container .qcu_wrapper{
  font-size:15px;
}
.main .bulletin .tab-content .about .about_wrapper .history_container h3{
    font-weight: 600;
    font-size: 24px;
    text-align: center;
    color: #000;
    padding-top: 0rem;
    padding-bottom: 0rem;
    padding: 20px;
}
.main .bulletin .tab-content .about .about_wrapper .mission_container{
    padding:20px;
    display: grid;
    grid-template-columns: repeat(4,1fr);
    grid-gap:20px;
    background:#fff;
}
.main .bulletin .tab-content .about .about_wrapper .mission_container .card{
  background: rgb(240, 240, 240);
  padding:15px;
  border-radius:8px;
  height:100%;
  text-align:center;
}
.main .bulletin .tab-content .about .about_wrapper .mission_container .card p,
.main .bulletin .tab-content .about .about_wrapper .mission_container .card .stategic,
.main .bulletin .tab-content .about .about_wrapper .mission_container .card .values{
  font-size:15px;
  margin-top:15px;
}

.main .bulletin .tab-content .about .campuses{ 
    width: 100%;
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
    margin-bottom:20px;
}
.main .bulletin .tab-content .about .campuses h3{ 
  font-weight: 600;
    font-size: 24px;
    text-align: center;
    color: #000;
    padding-top: 0rem;
    padding-bottom: 0rem;
    padding: 20px;
}

.main .bulletin .tab-content .about .campuses .campuses_card_wrapper{
  display:flex;
  justify-content:space-between;
  align-items:center;
  height :400px;
}
.main .bulletin .tab-content .about .campuses .campuses_card_wrapper .campuses_card {
  border-radius:8px;

  width: 370px;
  background:#fff;
}
.main .bulletin .tab-content .about .campuses .campuses_card_wrapper .campuses_card:nth-child(2){
  transform:scale(1.0);
}
.main .bulletin .tab-content .about .campuses .campuses_card_wrapper .campuses_card img{
  height:auto;
  width: 100%;
  border-top-left-radius:8px;
  border-top-right-radius:8px;
}
.main .bulletin .tab-content .about .campuses .campuses_card_wrapper .campuses_card .campuses_content{
  padding:15px;
  text-align:center;
  display:grid;
}
.main .bulletin .tab-content .about .campuses .campuses_card_wrapper .campuses_card .campuses_content span:nth-child(1){
  font-weight:bold;
  margin-bottom:15px;
}
/* executive */
.main .bulletin .tab-content .about .executive{ 
    width: 100%;
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
    height:800px;
}
.main .bulletin .tab-content .about .executive h3{ 
  font-weight: 600;
    font-size: 24px;
    text-align: center;
    color: #000;
    padding-top: 0rem;
    padding-bottom: 0rem;
    padding: 20px;
}

.main .bulletin .tab-content .about .executive .executive_card_wrapper{
  display:flex;
  justify-content:space-between;
  align-items:center;
}
.main .bulletin .tab-content .about .executive .executive_card_wrapper .executive_card {
  border-radius:8px;
  height:640px;
  width: 370px;
  background:#fff;
}
.main .bulletin .tab-content .about .executive .executive_card_wrapper .executive_card:nth-child(2){
  height:660px;
}
/* .main .bulletin .tab-content .about .executive .executive_card_wrapper .executive_card:nth-child(2){
  transform:scale(1.0);
} */
.main .bulletin .tab-content .about .executive .executive_card_wrapper .executive_card img{
  height:500px;
  width: 100%;
  border-top-left-radius:8px;
  border-top-right-radius:8px;
}
.main .bulletin .tab-content .about .executive .executive_card_wrapper .executive_card:nth-child(2) img{
  /* height:500px; */
}
.main .bulletin .tab-content .about .executive .executive_card_wrapper .executive_card .executive_content{
  padding:15px;
  text-align:center;
  display:grid;
}
.main .bulletin .tab-content .about .executive .executive_card_wrapper .executive_card .executive_content span:nth-child(1){
  font-weight:bold;
  margin-bottom:15px;
}

/* contact */
.main .bulletin .tab-content .contact .contact_wrapper{
  display: grid;
    grid-template-columns:1fr 40% ;
    width: 100%;
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
    margin: 0 auto;
    grid-gap: 30px;
    /* background:pink; */
}
.main .bulletin .tab-content .contact .contact_wrapper .contact_form{
  background:#fff;
  padding:30px;
  display:grid;
}
.main .bulletin .tab-content .contact .contact_wrapper .contact_form label{
  /* margin-bottom:10px; */
}

.main .bulletin .tab-content .contact .contact_wrapper .contact_form input{
  height:40px;
  margin-bottom:15px;
  border:1px solid gray;
}
.main .bulletin .tab-content .contact .contact_wrapper .contact_form textarea{
  padding-bottom:100px;
  border:1px solid gray;
}
.main .bulletin .tab-content .contact .contact_wrapper .contact_form button{
  width:140px;
  height:40px;
  background:#1cA72F;
  outline:none;
  border:none;
  color:#fff;
  border-radius:8px;
  justify-self:end;
  font-family: 'Poppins', sans-serif;
  font-size:14px;
  cursor:pointer;
  margin-top:15px;
}
.main .bulletin .tab-content .contact .contact_wrapper .help{

}
.main .bulletin .tab-content .contact .contact_wrapper .help .divone{
  background:#fff;
  padding:20px;
  margin-bottom:20px;
}
.main .bulletin .tab-content .contact .contact_wrapper .help .divone h3{
  padding:0;
  font-size:20px;
  color:#000;
  font-weight:700;
  text-align:left;
  margin-bottom:15px;
  color:#002347;
}
.main .bulletin .tab-content .contact .contact_wrapper .help .divone p{
  color:#002347;
}

.main .bulletin .tab-content .contact .contact_wrapper .help .divone.divtwo span{
  font-weight:600;
  color:#002347;
  font-size:14px;
}
.main .bulletin .tab-content .contact .contact_wrapper .help .divone.divtwo{
  display:grid;
}
.main .bulletin .tab-content .contact .contact_wrapper .help .divone.divtwo span:nth-child(2),
.main .bulletin .tab-content .contact .contact_wrapper .help .divone.divtwo span:nth-child(6){
  margin-bottom:10px;
}
.main .bulletin .tab-content .contact .contact_wrapper .help .divone.divtwo span:nth-child(4),
.main .bulletin .tab-content .contact .contact_wrapper .help .divone.divtwo span:nth-child(8){
  margin-bottom:4px;
}
.main .bulletin .tab-content .contact .contact_wrapper .help .divone.divtwo .cont{
  font-size:13px;
  color:gray;
} 
/* change password */
.main .bulletin .tab-content .changepass{
  /* display: grid; */
    grid-template-columns:1fr 40% ;
    width: 100%;
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
    margin: 0 auto;
    grid-gap: 30px;
  
}
.main .bulletin .tab-content .changepass .changepass_form{
  /* margin:0 auto; */
  background:#fff;
  padding:25px;
  width:100%;
  max-width:500px;
  margin:0 auto;
  height:450px;
  display:flex;
  flex-direction:column;
}
.main .bulletin .tab-content .changepass .changepass_form h4{
  font-size:20px;
  text-align: center;
  margin-bottom:30px;
}
.main .bulletin .tab-content .changepass .changepass_form label{
  color:#002347;
  font-size:16px;
  font-weight:600;
}
.main .bulletin .tab-content .changepass .changepass_form input{
  height:40px;
  border:1px solid gray;
  margin:5px;
  margin-bottom:15px;
}
.main .bulletin .tab-content .changepass .changepass_form input.submit{
  width:160px;
  background:#1cA72F;
  outline:none;
  border:none;
  color:#fff;
  border-radius:8px;
  align-self:flex-end;
  font-family: 'Poppins', sans-serif;
  font-size:14px;
  cursor:pointer;
}


body.dark {
	background: #292c35;
}
.main .bulletin .wrapper .logout .btn_logout{
  font-size:18px;
  font-weight:700 ;
}
body.dark .main .bulletin .wrapper .logout .btn_logout{
    color:#fff;
}

body.dark .tabs li{
      margin: 0 1rem;
      font-size: 18px;
      color: #fff;
      transition: 0.3s;
      font-weight: 700;
}
body.dark .tab.active{
  border-bottom: 2px solid #fff;
}
.checkbox {
	opacity: 0;
	position: absolute;
}

.label {
	background-color: #111;
	border-radius: 50px;
	cursor: pointer;
	display: flex;
	align-items: center;
	justify-content: space-between;
	padding: 5px;
	position: relative;
	height: 26px;
	width: 50px;
	transform: scale(1.5);
}

.label .ball {
	background-color: #fff;
	border-radius: 50%;
	position: absolute;
	top: 2px;
	left: 2px;
	height: 22px;
	width: 22px;
	transform: translateX(0px);
	transition: transform 0.2s linear;
}

.checkbox:checked + .label .ball {
	transform: translateX(24px);
}

.fa-moon {
	color: #f1c40f;
}

.fa-sun {
	color: #f39c12;
}
.nav-container nav .right_wrapper{
  display:flex;
}
.nav-container nav .right_wrapper .time{
  margin-right:27px;
}

.main .bulletin .tab-content .home .home_wrapper .announcement_left,
.main .bulletin .tab-content .events .event_wrapper .event,
.main .bulletin .tab-content .about .about_wrapper .history_container,
.main .bulletin .tab-content .contact .contact_wrapper .contact_form,
.main .bulletin .tab-content .contact .contact_wrapper .help,
.main .bulletin .tab-content .changepass .changepass_form{
  box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px;
}

</style>
</head>

<body>

<div class="nav-container">
    <nav>
      <div class="logo">
        <img src="./img/QCU_Logo_2019 (1).png" alt="">
        <h3>QUEZON CITY UNIVERSITY BULLETIN BOARD</h3>
      </div>

      <div class="right_wrapper">
        <div class="time">
          <span>May 12(Thurs)</span>
          <span></span>
          <span>7:00 AM</span>
        </div>
        <div class="toggle">
          <input type="checkbox" class="checkbox" id="chk" />
          <label class="label" for="chk">
            <i class="fas fa-moon"></i>
            <i class="fas fa-sun"></i>
            <div class="ball"></div>
          </label>
        </div>
      </div>
    </nav>
  </div>

  <div class="main">
    <section class="bulletin">
          <div class="wrapper">
             <ul class="tabs">
                    <li data-tab-target="#home" class="active tab">Home</li>
                    <li data-tab-target="#events" class="tab">Events</li>
                    <li data-tab-target="#about" class="tab">About</li>
                    <li data-tab-target="#contact" class="tab">Contact Us</li>
                  
                    <!-- <li data-tab-target="#bts" class="tab">Bts</li> -->
              </ul>
              <div class="logout">
                <div class="btn_logout">
                   <?php
                          echo ''.$_SESSION['StudentName'].'';
                     
                  ?>
                  <i class='fas'>&#xf0d7;</i>
                </div>
               
                <div class="dropdown">
                  <div data-tab-target="#changepass" class="changepass">
                    Change password
                  </div>
                  <form class="logout_btn" action="/qcu_bulletin/logout.php" method="post">
                    <input class="log_btn" type="submit" value="Logout" />
                  </form>
                </div>
              </div>
          </div>
          

            <div class="tab-content">
                <div id="home" data-tab-content class="home active">
                    <div class="home_wrapper">
                      <div class="announcement_left">
                        <h3>Announcement from BSIT Department</h3>
                        <div class="announce">
                          <p>Dr Isagani Tano</p>
                          <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Esse, quae error inventore repellendus perspiciatis deserunt accusamus, aliquam iure aperiam quo libero quam quidem? Corrupti dolorum, inventore reiciendis blanditiis et sequi.</p>
                        </div>
                        <div class="announce">
                          <p>Dr Isagani Tano</p>
                          <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Esse, quae error inventore repellendus perspiciatis deserunt accusamus, aliquam iure aperiam quo libero quam quidem? Corrupti dolorum, inventore reiciendis blanditiis et sequi.</p>
                        </div>
                        <div class="announce">
                          <p>Dr Isagani Tano</p>
                          <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Esse, quae error inventore repellendus perspiciatis deserunt accusamus, aliquam iure aperiam quo libero quam quidem? Corrupti dolorum, inventore reiciendis blanditiis et sequi.</p>
                        </div>
                       
                      </div>
                      <div class="announcement_left">
                        <div class="header_wrap">
                          <img src="./img/announcement (1).png" alt="">
                          <h3>Quezon City University Announcement</h3>
                        </div>
                  
                        <div class="announce">
                          <p>Quezon City University</p>
                          <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Esse, quae error inventore repellendus perspiciatis deserunt accusamus, aliquam iure aperiam quo libero quam quidem? Corrupti dolorum, inventore reiciendis blanditiis et sequi.</p>
                        </div>
                        <div class="announce">
                          <p>Quezon City University</p>
                          <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Esse, quae error inventore repellendus perspiciatis deserunt accusamus, aliquam iure aperiam quo libero quam quidem? Corrupti dolorum, inventore reiciendis blanditiis et sequi.</p>
                        </div>
                        <div class="announce">
                          <p>Quezon City University</p>
                          <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Esse, quae error inventore repellendus perspiciatis deserunt accusamus, aliquam iure aperiam quo libero quam quidem? Corrupti dolorum, inventore reiciendis blanditiis et sequi.
                          Lorem ipsum, dolor sit amet consectetur adipisicing elit. Esse, quae error inventore repellendus perspiciatis deserunt accusamus, aliquam iure aperiam quo libero quam quidem? Corrupti dolorum, inventore reiciendis blanditiis et sequi.
                          </p>
                        </div>
                      </div>
                    </div>
                </div>
                <div id="events" data-tab-content class="events">
                    <div class="event_wrapper">
          
                      <div class="event">
                        <div class="title_wrapper">
                          <img src="./img/event.png" alt="">
                          <h3 class="title">Upcoming Events</h3>  
                        </div>

                          <div class="activities">
                            <h3>University Week Activities</h3>
                            <div class="card_wrapper">
                              <div class="card">
                                <img src="./img/1.png" alt="">
                                <div class="card_body">
                                  <p>February 28, 2022</p>
                                  <p>Thanks for giving mass online class kamustahan quiz bee(all program) tiktok competition</p>
                                </div>
                              </div>
                              <div class="card">
                                <img src="./img/1.png" alt="">
                                <div class="card_body">
                                  <p>February 28, 2022</p>
                                  <p>Thanks for giving mass online class kamustahan quiz bee(all program) tiktok competition</p>
                                </div>
                              </div>
                              <div class="card">
                                <img src="./img/1.png" alt="">
                                <div class="card_body">
                                  <p>February 28, 2022</p>
                                  <p>Thanks for giving mass online class kamustahan quiz bee(all program) tiktok competition</p>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="event">
                              <h2 id="asd" class="qcu">Quezon City University Calendar</h2>
                              <div class="title_list" style="display:flex; justify-content:space-between; padding:20px 0; font-weight:bold;" >
                                <p>Date</p>
                                <p>Activities</p>
                              </div>
                              <ul class="list_date">
                                <li class="list" style="list-style:none; display:flex;">
                                  <span style="flex:1;">January 3 - 14</span>
                                  <span>Enrollment Period</span>
                                </li>
                                <li class="list" style="list-style:none; display:flex;">
                                  <span style="flex:1;">January 3 - 14</span>
                                  <span>Enrollment Period</span>
                                </li>
                                <li class="list" style="list-style:none; display:flex;">
                                  <span style="flex:1;">January 3 - 14</span>
                                  <span>Enrollment Period</span>
                                </li>
                                <li class="list" style="list-style:none; display:flex;">
                                  <span style="flex:1;">January 3 - 14</span>
                                  <span>Enrollment Period</span>
                                </li>
                              </ul>
                        </div>
                    </div> 
                
                </div>
                <div id="about" data-tab-content class="about">
                  <div class="about_wrapper">
                    <div class="history_container">
                      <h3>HISTORY</h3>
                      <div class="qcu_wrapper">
                        <img src="./img/about1.jpg" alt="sad">
                        <p>The Quezon City University, formerly known as the Quezon City Polytechnic University, came into existence on March 1, 1994, by virtue of the City Council Ordinance No. SP-171. The institution was created to undertake skilled workers’ training in response to the manpower requirement by industry and business establishments within the city. The organization of the Polytechnic as a local government educational institution included the old Skills and Training Center. The QCP established its reputation among local government units as a show window and model technology-based institution, paving the way for its recognition by the Technical Education Skills and Development Authority (TESDA) and developing a strong alliance with the Japanese International Cooperation Agency (JICA).</p>
                      </div>
                      <div class="qcu_wrapper">
                        <img src="./img/about2.jpg" alt="sad">
                        <p>On August 20, 1997, the Polytechnic was enhanced into a University through City Council Ordinance No. SP-544, S-97. The leadership of former Quezon City Mayor Feliciano “Sonny” Belmonte saw meaningful access to higher education. Starting 2005-2006, the University has started offering degree programs. Initially, the courses are BS in Entrepreneurial Management, BS in Information Technology, and BS in Industrial Engineering. SP-1945, s. 2009, otherwise known as “An Ordinance Amending Ordinance No. SP1030, s. 2001 (or the QCPU Charter)”, passed by the Quezon City Council, grants the Quezon City Polytechnic University semi-autonomy as to its fiscal management and control over its operations, budgeting and reporting requirements. Under the Ordinance SP-2308 s. 2014, the QC Council authorizes the University to offer the Senior High School Program as mandated by the Department of Education. In July 2019, the SP-2812 s.2019 or the “Ordinance converting the Quezon City Polytechnic University to Quezon City University and enhancing its charter” was fully implemented, with Dr. Victor B. Endriga being named as the OIC President of the University.</p>
                      </div>
                    </div>    
                    <div class="mission_container">
                        <div class="card">
                          <h4>Mission</h4>
                          <p>To provide a comprehensive education that enhances the lives of QCU students for nation-building and as world citizens.</p>
                        </div>
                        <div class="card">
                          <h4>VISION</h4>
                          <p>To be recognized as the #1 local university of employable graduates.</p>
                        </div>
                   
                        <div class="card">
                          <h4>STRATEGIC DIRECTIONS</h4>
                          <div class="stategic">
                            <span>Excellence in Curricular Innovation</span>
                            <span>Faculty Excellence</span>
                            <span>Student Excellence</span>
                            <span>Excellence in Community Engagement</span>
                            <span>Excellence in Institutional Governance</span>
                            <span>Excellent Campus Environment</span>
                          </div>
                        </div>
                        <div class="card">
                          <h4>SHARED VALUES
                          </h4>
                            <div class="values">
                            <span>Jointness of undertakings and</span>
                            <span>Organizational adaptability with </span>
                            <span>Organizational adaptability with </span>
                            </div>
                        </div>
                    </div>
                  </div>
                  <div class="campuses">
                    <h3>CAMPUSES</h3>
                    <div class="campuses_card_wrapper">
                        <div class="campuses_card">
                          <img src="./img/school.jpg" alt="">
                          <div class="campuses_content">
                            <span>Batasan Satellite Campus</span>
                            <span>Batasan Rd. Quezon City, Metro Manila</span>
                          </div>
                        </div>
                        <div class="campuses_card">
                          <img src="./img/school.jpg" alt="">
                          <div class="campuses_content">
                            <span>San Bartolome Campus (Main)</span>
                            <span>673 Quirino Highway San Bartolome Novaliches, Quezon City</span>
                          </div>
                        </div>
                        <div class="campuses_card">
                          <img src="./img/school.jpg" alt="">
                          <div class="campuses_content">
                            <span>San Francisco Campus</span>
                            <span>Bago Bantay, Quezon City, Metro Manila</span>
                          </div>
                        </div>
                    </div>
                  </div>

                  <!-- EXECUTIVE OFFICIALS -->
                  <div class="executive">
                    <h3>EXECUTIVE OFFICIALS</h3>
                    <div class="executive_card_wrapper">
                        <div class="executive_card">
                          <img src="./img/vp.png" alt="">
                          <div class="executive_content">
                            <span>Dr. Brandford Antonio C. Martinez</span>
                            <span>Vice President For Academic Affairs</span>
                          </div>
                        </div>
                        <div class="executive_card">
                          <img src="./img/pres.png" alt="">
                          <div class="executive_content">
                            <span>Dr. Theresita V. Atienza</span>
                            <span>University President</span>
                          </div>
                        </div>
                        <div class="executive_card">
                          <img src="./img/Vice.png" alt="">
                          <div class="executive_content">
                            <span>Ms. Pia Angelina Tan</span>
                            <span>OIC, Vice President for Administrator and Finance</span>
                          </div>
                        </div>
                    </div>
                  </div>
      
                </div>
                <div id="contact" data-tab-content class="contact">
                    <div class="contact_wrapper">
                        <form action="https://formsubmit.co/contactus.qcu@gmail.com" method="POST" class="contact_form">
                          <label for="">Email Address</label>
                          <input type="email" name="email" required>
                          <label for="">Subject</label>
                          <input type="text" name="_subject" required>
                          <label for="">Message</label>
                          <textarea type="text" name="message" required></textarea>
                          <button type="submit" class="sendEmail">Send</button>

     
                        </form>
                        <div class="help">
                          <div class="divone">
                              <h3>Let us know on how can we help you!</h3>
                              <p>Send us a message and we'll get back to you as soon as possible</p>
                          </div>
                          <div class="divone divtwo">
                              <span>Office of the president</span>
                              <span>DR. THERESITA V. ATIENZA</span>
                              <span>Office of VP for Academic Affairs </span>
                              <span>DR. BRADFORD ANTONIO C. MARTINEZ</span>
                              <span class="cont">Contact Number:8806 - 3324</span>
                              <span class="cont">Email:ovpaa2020@gmail.com</span>
                              <span>Office of VP for Administration and finance</span>
                              <span>MS. PIA ANGELINA C. TAN</span>
                              <span class="cont">Contact Number:8806 - 3324</span>
                              <span class="cont">Email: admin@qcu.edu.ph</span>
                          </div>
                        </div>
                    </div>
                </div>
                <div id="changepass" data-tab-content class="changepass">
                    <div class="changepass_wrapper">
                      <form class="changepass_form" action="/qcu_bulletin/home.php" method="post">
                        <h4>Change Password</h4>
                        <label for="old">Old Password</label>
                        <input id="old" name="oldpassword" type="password" required>
                  
                        <label for="new">New Password</label>
                        <input id="new" name="updatePassword" type="password" minlength="6" required>
                        <label for="confirm">Confirm</label>
                        <input id="confirm" type="password" name="confirmpassword">
                        <input class="submit" type="submit" name="update" value="Change" />
                      </form>
                    </div>
                </div>
            </div>
        </section>




  </div>



  <script>
    const tabs = document.querySelectorAll('[data-tab-target]')
    const tabContents = document.querySelectorAll('[data-tab-content]')

    tabs.forEach(tab => {
      tab.addEventListener('click', () => {
        const target = document.querySelector(tab.dataset.tabTarget)
        tabContents.forEach(tabContent => {
          tabContent.classList.remove('active')
        })
        tabs.forEach(tab => {
          tab.classList.remove('active')
        })
        tab.classList.add('active')
        target.classList.add('active')
      })
    })

    const btn_logout = document.querySelector('.btn_logout')
    const dropdown = document.querySelector('.dropdown')
    btn_logout.addEventListener('click', () => {
        dropdown.classList.toggle('active')
    })


    // dark mode
    const chk = document.getElementById('chk');

chk.addEventListener('change', () => {
	document.body.classList.toggle('dark');
});

// SOCIAL PANEL JS
const floating_btn = document.querySelector('.floating-btn');
const close_btn = document.querySelector('.close-btn');
const social_panel_container = document.querySelector('.social-panel-container');

floating_btn.addEventListener('click', () => {
	social_panel_container.classList.toggle('visible')
});

close_btn.addEventListener('click', () => {
	social_panel_container.classList.remove('visible')
});
  </script>
</body>
</html>
