<?php
//Start the Session
session_start();
	
//including the database connection file.
include_once("Includes/connect.php");

if(!isset($_SESSION['supplier']) && empty($_SESSION['supplier']) ){
	header('location:../Admin/AdminLogin.php');
   }
?>


<html>
<head>
<?php include 'Includes/Navigation2.php'; ?>

<script src="https://kit.fontawesome.com/39d1910945.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css" integrity="sha384-wESLQ85D6gbsF459vf1CiZ2+rr+CsxRY0RpiF1tLlQpDnAgg6rwdsUF1+Ics2bni" crossorigin="anonymous">

<!-- Custom StyleSheet -->
<link rel="stylesheet" href="./css/Style.css" />
</head>
<body>


<section class="contact-us">
        <div class="ccontent">
          <h1>Shop Details</h1>
        </div>

        <div class="container">
          <div class="contactInfo">
            <div class="box">
              <div class="icon"><i class='bx bxs-map' ></i></div>
              <div class="text">
                <h3>Address</h3>
                <p>No.45, Messenger Street, Colombo – 12,<br> Sri Lanka.</p>
              </div>
            </div>

            <div class="box">
              <div class="icon"><i class='bx bxs-phone' ></i></div>
              <div class="text">
                <h3>Phone</h3>
                <p>Tel: 0114332153<br> Mob: 0777349991</p>
              </div>
            </div>

            <div class="box">
              <div class="icon"><i class='bx bxs-message-rounded-detail'></i></div>
              <div class="text">
                <h3>Email</h3>
                <p>asfahardware45@gmail.com</p>
              </div>
            </div>

            <div class="box">
              <div class="icon"><i class='bx bxs-time-five'></i></div>
              <div class="text">
                <h3>Open Hours</h3>
                <p>Mon-Sat 8:00 AM to 5:00 PM</p>
              </div>
            </div>
          </div>

          <div class="contactform">
          <img src="../Images/NewLogo.png" alt="" />
        </div>
          </section>




<br>
    </br>
    <br>
    </br>
    <br>
    </br>
    <br>
    </br>
    <br>
    </br>

<?php include 'Includes/Footer.php'; ?>
</body>
</html>  