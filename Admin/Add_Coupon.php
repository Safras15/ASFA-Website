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
	$coupon_code = $_POST['coupon'];
		$discount = $_POST['discount'];
		$status = "Valid";
	
    $sql = "INSERT INTO coupon (coupon_code, discount, status)
    VALUES ('$coupon_code', '$discount', '$status')";

    if (mysqli_query($conn, $sql)) {
    	echo "<script>alert('Coupon Saved!')</script>";
			echo "<script>window.location = 'Coupon.php'</script>";

} elseif($row > 0) {
	echo "<script>alert('Coupon Already Use')</script>";
  echo "<script>window.location = 'Add_Coupon.php'</script>";
}else{
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

    <form action="Add_Coupon.php" method='post'>
    <div class="form-group">
								<label>Coupon Code</label>
								<input type="text" class="form-control" name="coupon" id="coupon" readonly="readonly" required="required"/>
								<br />
								<button id="generate" class="btn btn-success" type="button"><span class="glyphicon glyphicon-random"></span> Generate</button>
							</div>
							<div class="form-group">
								<label>Discount</label>
								<input type="number" class="form-control" name="discount" min="10" required="required"/>
							</div>
           
            <br>
			  <button style="font-size: 2rem; width: 24%;" type="submit" name='submit' class="btn btn-primary">Add Coupon</button>
			<br>
			</br>
    </form>

    </div>
</div>



</div>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/bootstrap.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#generate').on('click', function(){
			$.get("get_coupon.php", function(data){
				$('#coupon').val(data);
			});
		});
	});
</script>

</body>
</html>  