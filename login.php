<?php
   include("config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      
      $sql = "SELECT id FROM admin WHERE username = '$myusername' and passcode = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         session_register("myusername");
         $_SESSION['login_user'] = $myusername;
         
         header("location: welcome.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
/* Full-width input fields */
input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}
/* Set a style for all buttons */
button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}
button:hover {
    opacity: 0.8;
}
/* Center the image and position the close button */
.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
    position: relative;
}
img.avatar {
    width: 40%;
    border-radius: 50%;
}
.container {
    padding: 16px;
    width : 70%;
    display : block;
   	margin : auto;
}
/* The Modal (background) */
.modal {
    position: fixed; /* Stay in place */
    left: 0;
    top: 0;
    border: 2px;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
}
/* Modal Content/Box */
.modal-content {
    background-color: #fefefe;
    margin: 5% auto 5% auto; /* 5% from the top, 15% from the bottom and centered */
    width: 80%; /* Could be more or less, depending on screen size */
}
</style>
</head>
<body>

<div class="modal">

  <form class="modal-content" action="" method="post">
    <div class="imgcontainer">
      <img src="https://image.shutterstock.com/display_pic_with_logo/173070080/1158817969/stock-vector-indian-railway-station-illustration-1158817969.jpg" alt="Avatar" class="avatar">
    </div>

    <div class="container">
      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="uname" required class="input1">

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required class="input1">

      <button type="submit">Login</button>

      <div class="psw">New user?<a href="register.html"> Register Here</a></div>
    </div>

  </form>
</div>

</body>
</html>
