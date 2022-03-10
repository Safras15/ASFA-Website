<html>
<head>

<!-- Custom StyleSheet -->
<link rel="stylesheet" href="../Admin/CSS/Login.css" />
</head>

<?php

//Start the Session
session_start();
	
//including the database connection file.
include_once("Includes/connect.php");

//Check if the submit button is clicked.
if(isset($_POST['sub'])) {  

	$admin_name = $_POST['admin_name'];
	$mobile_number = $_POST['mobile_number'];
    $email = $_POST['email'];
    $password = $_POST['password'];

      if(isset($_FILES) & !empty($_FILES)){
        $name = $_FILES['admin_image']['name'];
        $size = $_FILES['admin_image']['size'];
        $type = $_FILES['admin_image']['type'];
        $tmp_name = $_FILES['admin_image']['tmp_name'];
  
        $max_size = 10000000;
        $extension = substr($name, strpos($name, '.') + 1);
  
        if(isset($name) && !empty($name)){
      if(($extension == "jpg" || $extension == "jpeg" || $extension == "png") && $type == "image/jpeg" || $type == "image/png" && $size<=$max_size){
                $location = "Uploads/";
               
            if(move_uploaded_file($tmp_name, $location.$name)){
              //$smsg = "Uploaded Successfully";  
              
              $result = mysqli_query($conn, "INSERT INTO admin (admin_name, email, mobile_number, password, admin_image)
              VALUES ('$admin_name', '$email', '$mobile_number', '$password', '$location$name'");
   
           
              if($result){
                //echo "Product Created";
                echo "<script>alert('Updated Successfully..')</script>";
                        echo "<script type='text/javascript'> document.location ='AdminLogin.php'; </script>";
              }
            }else{
              $message = "Failed to Upload File";
            }
          }else{
            $message = "Only JPG files are allowed and should be less that 1MB";
          }
        }else{
          $message = "Please Select a File";
        }
      } 
    
        $sql_update = mysqli_query($conn, "INSERT INTO admin (admin_name, email, mobile_number, password)
        VALUES ('$admin_name', '$email', '$mobile_number', '$password'");

      if ($sql_update) {
         
        echo "<script>alert('Updated Successfully..')</script>";
      } 
  
  }
?>

  


<body>

<div class="logo">
<img src="../Images/logo.jpg" alt="">
      </div>
<!--Login Form-->
<div class="Logincontainer">
    <form method="post" enctype="multipart/form-data" action='' class="login-email">
        <p class="login-text">Register</p>
        <div class="input-group">
            <input type="text" placeholder="Full Name" name="admin_name" value="" required>
        </div>
        <div class="input-group">
            <input type="email" placeholder="Email" name="email" value="" required>
        </div>
        <div class="input-group">
            <input type="text" placeholder="Mobile Number" name="mobile_number" value="" required>
        </div>
        <div class="input-group">
            <input type="password" placeholder="Password" name="password" value="" required>
        </div>
        <div class="form-group">
			    <label for="adminimage">Admin Image</label>
			    <input type="file" name="admin_image" id="admin_image">
			    <p class="help-block">Only jpg/png are allowed.</p>
			  </div>
              <br>
        <div class="input-group">
            <button type="submit" name="sub" class="btn">Register</button>
        </div>
        <p class="login-register-text">Have an account? <a href="AdminLogin.php">Login Here</a>.</p>
    </form>
</div>


 

</body>
</html>