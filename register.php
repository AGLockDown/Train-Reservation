<?php
session_start();
$conn = mysqli_connect("localhost","root","","railway");
if(!$conn){  
	echo "<script type='text/javascript'>alert('Database failed');</script>";
  	die('Could not connect: '.mysqli_connect_error());  
}
if (isset($_POST['submit']))
{
$Username=$_POST['Username'];
$psw=$_POST['psw'];
$aadhar=$_POST['aadhar'];
$ACNO=$_POST['Account'];
$Initial=$_POST['initialamo'];
$sql = "INSERT INTO passengers (user,psw, aadhar, ACNO, Initial) VALUES ('user','psw', 'aadhar', 'ACNO', 'Initial');";
	if(mysqli_query($conn, $sql))
{  
	$message = "You have been successfully registered";
}
else
{  
	$message = "Could not insert record"; 
}
	echo "<script type='text/javascript'>alert('$message');</script>";
}
?>
<!DOCTYPE html>
<html>
<link rel="stylesheet" href="CSS/register.css">
<body>


<class="modal">

  <form class="modal-content" action="register.php">
    <div class="container">
      <h1>Sign Up</h1>
      <p>Please fill in this form to create an account.</p>
      <hr>
      <label for="Username"><b>Username</b></label>
      <input type="text" placeholder="Username" name="Username" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>

      <label for="aadhar"><b>Aadhar Number </b></label>
      <input type="text" placeholder="aadhar" name="aadhar" required>

      <label for="ACNO"><b>Bank Account Number</b></label>
      <input type="text" placeholder="ACNO" name="Account" required>

      <label for="Initial-Amount"><b>Initial Amount</b></label>
      <input type="text" placeholder="Initial Amount" name="initialamo" required>

      <label>



      <div class="clearfix">

        <button type="submit"  class="signupbtn">Sign Up</button>
      </div>

      <div class="psw">Already Registered?<a href="login.php"> Login Here</a></div>

    </div>
  </form>
</div>

</body>
</html>
