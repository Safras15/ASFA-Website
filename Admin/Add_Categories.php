<?php
//Start the Session
session_start();
	
//including the database connection file.
include_once("Includes/connect.php");

if(!isset($_SESSION['admin']) && empty($_SESSION['admin']) ){
  header('location:AdminLogin.php');
 }
?>


<html>
<head>
<?php include 'Includes/Navigation2.php'; ?>

<script src="https://kit.fontawesome.com/39d1910945.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css" integrity="sha384-wESLQ85D6gbsF459vf1CiZ2+rr+CsxRY0RpiF1tLlQpDnAgg6rwdsUF1+Ics2bni" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

<!-- Custom StyleSheet -->
<link rel="stylesheet" href="./css/Style.css" />
</head>
<body>

<?php

if(isset($_POST['submit'])){
$catName = $_POST['catName'];

$sql = "INSERT INTO category (cat_name) VALUES ('$catName')";

if (mysqli_query($conn, $sql)) {
  echo "New category created successfully";
  header('location:Categories.php');
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

}


?> 

<br>
</br>
<br>
<div class="container">

<div class="card">
    <div class="card-header">
       <h1> Add Category</h1>
    </div>
    <div class="card-body">

    <form action="Add_Categories.php" method='post'>
             <div class="form-group">
            <label for="catName"> Category Name:</label>
            <input style="font-size:1.4rem;" type="text" class="form-control" id="catName" pattern="[a-zA-Z][a-zA-Z ]{2,}" title="--Numbers Not Allowed--" name='catName'>
            </div> 
           
            <br>
			  <button style="font-size: 2rem; width: 24%;" type="submit" name='submit' class="btn btn-primary">Add Category</button>
			<br>
			</br>
    </form>

    </div>
</div>



</div>


</body>
</html>  