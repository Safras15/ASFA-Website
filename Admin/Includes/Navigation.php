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
  <link rel="stylesheet" href="../Admin/CSS/Style.css" />
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
                <a href="Dashboard.php" class="nav-link icon"><i class='bx bxs-dashboard'></i></a>
              </li>

              <li class="nav-item">
                <a href="Orders.php" class="nav-link">Orders</a>
              </li>
  
              <li class="nav-item">
                <a href="Customers.php" class="nav-link">Customers</a>
              </li>
  
              <li class="nav-item">
                <a href="Products.php" class="nav-link">Products</a>
              </li>

              <li class="nav-item">
                <a href="Reports.php" class="nav-link">Reports</a>
              </li>

              <li class="nav-item">
                <a href="Delivery_Details.php" class="nav-link">Details</a>
              </li>

              <li class="nav-item">
                <a href="Coupon.php" class="nav-link icon"><i style="font-size:3.5rem;" class='bx bxs-coupon'></i></a>
              </li>

              <li class="nav-item">
                <a href="Create_Accounts.php" class="nav-link icon"><i style="font-size:3.5rem;" class='bx bxs-user-plus'></i></a>
              </li>

              <li class="nav-item">
                <a href="Admin_Profile.php" class="nav-link icon"><i style="font-size:3.5rem;" class='bx bxs-user-account'></i></a>
              </li>

              <li class="nav-item">
                <a href="#" class="nav-link"></a>
              </li>
             
              
              <div class="right"> 
              <ul>
              <li>

              <?php 
              $a_id = $_SESSION['adminid'];

              $sql = "SELECT * FROM admin where admin_id='$a_id'";
              $result = mysqli_query($conn, $sql);
              while($row = mysqli_fetch_assoc($result)) {
              ?> 

              <img src="../Admin/<?php echo  $row['admin_image'] ?>" alt="" class="avatar">
              <?php } ?>
              <span class="nav-link"><?php echo $_SESSION['admin'];?></span>
             
                <div class="dropdown">       
                    <ul>
                    <span><a style="color: white;" href="../Admin/logout.php"><i style="color: white;" class='bx bx-log-out'></i>Logout</a></span>
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