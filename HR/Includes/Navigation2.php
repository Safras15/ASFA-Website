<?php 

//including the database connection file.
include_once("Includes/connect.php");

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- Favicon -->
  <link rel="shortcut icon" href="./images/favicon.ico" type="image/x-icon">
  <!-- Box icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" />
  <!--Google Fonts-->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,600;0,700;1,400;1,500;1,700&display=swap" rel="stylesheet">

  <!-- Custom StyleSheet -->
  <link rel="stylesheet" href="../HR/CSS/Style.css" />
  <title>ASFA - Hardware</title>
</head>
<body>

      <!--Navigation-->
      <nav class="nav">
        <div class="navigation container">
          <div class="logo">
            <h1>ASFA - Hardware (HR)</h1>
          </div>
  
          <div class="menu">
            <div class="top-nav">
              <div class="logo">
                <h1>ASFA - Hardware (HR)</h1>
              </div>
              <div class="close">
                <i class='bx bx-x'></i>
              </div>
            </div>
  
            <ul class="nav-list">
            <li class="nav-item">
                <a href="../HR/Hr_Dashboard.php" class="nav-link icon"><i class='bx bxs-dashboard'></i></a>
              </li>

              <li class="nav-item">
                <a href="../HR/Orders.php" class="nav-link">Orders</a>
              </li>
  
  
              <li class="nav-item">
                <a href="../HR/Inquiries.php" class="nav-link">Inquiries</a>
              </li>

              <li class="nav-item">
                <a href="../HR/Hr_Profile.php" class="nav-link icon"><i class='bx bxs-user-account'></i></a>
              </li>

              <li class="nav-item">
                <a href="#" class="nav-link"></a>
              </li>
              
              <li class="nav-item">
              <?php 
              $hr_id = $_SESSION['hrid'];
               ?>
              </li>
              
              <div class="right"> 
              <ul>
              <li>
              <a href="#" class="nav-link" style="color:white;"><?php echo $_SESSION['hr'];?><i style="font-weight: bold;" class='bx bx-caret-down'></i></a>
             
                <div class="dropdown">       
                    <ul>
                    <span><a style="color: white;" href="../HR/logout.php"><i style="color: white;" class='bx bx-log-out'></i>Logout</a></span>
                    </ul>
                </div>             
            </ul>
          </div>

            <div class="hamburger">
              <i class="bx bx-menu"></i>
            </div>
        </div>
      </nav>

      <!--GSAP-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.6.1/gsap.min.js"></script>
    <!--Custom Script-->
    <script src="../Admin/JS/Index.js"></script>
    <script src="../Admin/JS/Script.js"></script>

    <script>
	document.querySelector(".right ul li").addEventListener("click", function(){
		  this.classList.toggle("active");
	});
</script>
</body>
</html>