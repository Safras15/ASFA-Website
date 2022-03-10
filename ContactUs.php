<?php

//Start the Session
session_start();
	
//including the database connection file.
include_once("Includes/connect.php");

//Check if the submit button is clicked.
if(isset($_POST['sub'])) {  
   
    //Inputs from the from	
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];	
	$message = $_POST['message'];
  $subject = $_POST['subject'];
	
	$result = mysqli_query($conn, "INSERT INTO contactus (full_name,email,message,subject)
	VALUES('$full_name','$email','$message','$subject')");
		
    if ($result) {
      echo "<script>alert('Thank You for you request, you will be contacted very soon!!')</script>";
    }
  }
?>

<html>
<head>
<?php include 'Includes/Navigation2.php'; ?>
</head>


<body>
      <!--Contact_Us-->
      <section class="contact-us">
        <div class="ccontent">
          <h1>Contact Us</h1>
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
          <form  method="post">
              <h2 style="font-weight:bold; color: #f60091;">Send Message</h2>

              <div class="inputbox">
              <label class="form-label" for="subject">Subject:</label>
           <select style="font-size: 1.6rem; width: 40%; color:black;" class="form-control" name="subject" required>
           <option value="Select Subject" selected disabled></option>
           <option value='Customer Service'>Customer Service</option>
           <option value='Technical Support'>Technical Support</option>
           </select>
           </div>
              
              <div class="inputbox">
              <label for="full_name" class="form-label">Name</label>
              <input style="font-size: 1.4rem; color: black;" type="name" name="full_name" placeholder="Full Name" pattern="[a-zA-Z][a-zA-Z ]{2,}" title="--Numbers Not Allowed--" required>
              </div>
              <div class="inputbox">
              <label for="email" class="form-label">Email Address</label>
              <input style="font-size: 1.4rem; color: black;" type="email" class="form-control" name="email" placeholder="your@gmail.com" required>
              </div>
              <div class="inputbox">
              <label for="message" class="form-label">Message</label>
                <textarea type="text" name="message" placeholder="How can we help?" required></textarea>
              </div>
              <div style="color:pink;" class="inputbox">
                <input type="submit" name="sub" value="Send">
              </div>
            </form>

          </div>
        </div>
      </section>


      <?php include 'Includes/Footer.php'; ?>

      </body>
      </html>