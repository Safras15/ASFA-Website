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
  <link rel="stylesheet" href="../CSS/Style.css" />
  <title>ASFA - Hardware</title>
</head>
<body>
    <!--Header-->
    <header id="home" class="header">
      <!--Navigation-->
      <nav class="nav">
        <div class="navigation container">
          <div class="logo">
            <h1>ASFA - Hardware</h1>
          </div>
  
          <div class="menu">
            <div class="top-nav">
              <div class="logo">
                <h1>ASFA - Hardware</h1>
              </div>
              <div class="close">
                <i class='bx bx-x'></i>
              </div>
            </div>
  
            <ul class="nav-list">
              <li class="nav-item">
                <a href="Index.php" class="nav-link">Home</a>
              </li>
  
              <li class="nav-item">
                <a href="Products.php" class="nav-link">Products</a>
              </li>
  
              <li class="nav-item">
                <a href="About.php" class="nav-link">About</a>
              </li>

              <?php 
              error_reporting(0);
              if(strlen($_SESSION['customer'])==0){
                ?>
              
                <?php  }else{?>
              <li class="nav-item">
                <a href="Show_Wishlist.php" class="nav-link icon"><i class='bx bx-heart' ></i></a>
              </li>
              <?php }?>
  
              <li class="nav-item">
                <a href="Cart.php" class="nav-link icon"><i class="bx bx-shopping-bag"></i></a>
              </li>

              <li class="nav-item">
                <a href="ContactUs.php" class="nav-link icon"><i class='bx bxs-phone'></i></a>
              </li>

              
              <?php 
              error_reporting(0);
              if(strlen($_SESSION['customer'])==0){
                ?>
              
                <?php  }else{?>
                  <li class="nav-item">
                <a href="myaccount.php" class="nav-link">Account</a>
                </li>
              <?php }?>
              
              
              <li class="nav-item">
              <?php 
              error_reporting(0);
              if(strlen($_SESSION['customer'])==0){
                
                ?> <a href="Login.php" class="nav-link">Login</a>
            <?php  }else{?>
                
              <div class="right">
              <ul>
              <li>
                <a href="#" class="nav-link"><?php echo $_SESSION['customer'];?><i style="color: black;" class='bx bx-caret-down'></i></a>
                <div class="dropdown">
                <ul>
                      <li>
                        <a style="color: white;" href="Profile.php"><i style="color: white;" class='bx bxs-user-account'></i>  Profile</a></li>
                  </ul>
                  
                    <ul>
                    <li><a style="color: white;" href="logout.php"><i style="color: white;" class='bx bx-log-out'></i>  Logout</a></li>
                    </ul>
                </div>
                </li>
          </ul>
        </div>
                <?php }?>
              </li>

            </ul>
          </div>
      
          <a href="Cart.html" class="cart-icon">
            <i class="bx bx-shopping-bag"></i></a>
          <a href="Contact.html" class="contact-icon">
            <i class='bx bxs-phone'></i></a>

            <div class="hamburger">
              <i class="bx bx-menu"></i>
            </div>
        </div>
      </nav>

      <!--GSAP-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.6.1/gsap.min.js"></script>
    <!--Custom Script-->
    <script src="./JS/Index.js"></script>
    <script src="./JS/Script.js"></script>

    <script>
	document.querySelector(".right ul li").addEventListener("click", function(){
		  this.classList.toggle("active");
	});
</script>
</body>
</html>