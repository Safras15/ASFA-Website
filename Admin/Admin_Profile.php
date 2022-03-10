<?php

//Start the Session
session_start();
	
//including the database connection file.
include_once("Includes/connect.php"); 

if(!isset($_SESSION['admin']) && empty($_SESSION['admin']) ){
  header('location:AdminLogin.php');
 }

//Check if the submit button is clicked.
if(isset($_POST['sub'])) {  

	$admin_name = $_POST['admin_name'];
	$mobile_number = $_POST['mobile_number'];

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
              
              $result = mysqli_query($conn, "UPDATE admin SET admin_name='$admin_name', mobile_number='$mobile_number', 
              admin_image='$location$name' WHERE admin_id='".$_SESSION['adminid']."'; ;");
   
           
              if($result){
                //echo "Product Created";
                echo "<script>alert('Updated Successfully..')</script>";
                        echo "<script type='text/javascript'> document.location ='Admin_Profile.php'; </script>";
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
    
        $sql_update = mysqli_query($conn, "UPDATE admin SET admin_name='$admin_name', mobile_number='$mobile_number' 
       WHERE admin_id='".$_SESSION['adminid']."'; ;");

      if ($sql_update) {
         
        echo "<script>alert('Updated Successfully..')</script>";
      } 
  
  }
?>

<html>
<head>
<?php include 'Includes/Navigation2.php'; ?>
</head>

<body>
<!--My Profile-->

<div class="profile-container">
  <div class="leftbox">
    <nav>
      <a onclick="tabs(0)" class="tab active">
        <i class='bx bxs-user'></i>
      </a>
    </nav>
  </div>

<?Php
$result=mysqli_query($conn,"SELECT * FROM admin where admin_id='$_SESSION[adminid]' ;");
  $row=mysqli_fetch_assoc($result);{

  ?>
  <form method="post" enctype="multipart/form-data">
				<input type="hidden" name='hiddenID' value='<?php echo $admin_id?>'>
  <div class="rightbox">
    <div class="profile tabshow">
      <h1>Admin Profile Details</h1>
      <h2>Full Name</h2>
      <input type="text" name="admin_name" class="input" pattern="[a-zA-Z][a-zA-Z ]{2,}" title="--Numbers Not Allowed--" value="<?php echo $row['admin_name'] ?>">
      <h2>Mobile Number</h2>
      <input type="text" name="mobile_number" class="input" maxlength="10" pattern="^[0-9]{10}$" title="-Only 10 Digit Mobile Numbers are Allowed-" value="<?php echo $row['mobile_number'];?>">
<br>
  </br>

      <?php if(isset($row['admin_image']) && !empty($row['admin_image'])){
				  ?>
	<img src="<?php echo $row['admin_image']; ?>" alt="" height='100' width='100' style="border-radius: 10px 10px 10px 10px;"><br>
	<a href="Delete_Admin_Image.php?id=<?php echo $row['admin_id'];?>">Delete Image</a><br>

				  <?php
			  }else{

 ?>
  <div class="form-group">
			    <label for="adminimage">Admin Image</label>
			    <input type="file" name="admin_image" id="admin_image">
			    <p class="help-block">Only jpg/png are allowed.</p>
			  </div>

				  <?php
			  } ?>

      <?php
      }
      ?>


      <button class="btn" type="submit" name="sub" value="UPDATE">Update</button>
     
      <a href="Admin_Change_Password.php" class="btn">Change Password</a>

    </div>
  </div>
</div>
</form>


<?php include 'Includes/Footer.php'; ?>

</body>
</html>



