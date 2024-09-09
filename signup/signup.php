<?php

require_once '../partial/db.php';


$userMssg="";
$userDisplay="none";
$emailDisplay="none";
$emailMssg="";
$confirmPasswordMssg="";
$confirmPasswordDisplay="none";
$boolUserError=true;
$boolConfirmPasswordError=true;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $fullname = $_POST["name"];
  $username = $_POST["username"];
  $email = $_POST["email"];
  $facultyno = $_POST["facultyno"];
  $password = $_POST["password"];
  $confirmPassword = $_POST["cpassword"];

  $sql = "SELECT * FROM $tableName WHERE `username` = '$username'";
  $result = mysqli_query($conn, $sql);
  $aff = mysqli_affected_rows($conn);
  if ($aff < 1) {
    $boolUserError = false;
  } else {
    $userMssg = "Username Already Exist";
    $userDisplay = "block";
  }

  if ($password == $confirmPassword) {
    $boolConfirmPasswordError = false;
  } else {
    $confirmPasswordMssg = "Password Doesnt Match";
    $confirmPasswordDisplay = "block";
  }}
  if(!$boolConfirmPasswordError and !$boolUserError){
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
    $sql="INSERT INTO `alluser`( `name`, `email`, `username`, `facultyno`, `password`) 
    VALUES ('$fullname','$email','$username','$facultyno','$passwordHash')";
    $result = mysqli_query($conn, $sql);
    echo "
    <script>
    setInterval(() => {
      window.location = '../signin/signin.php';
    }, 3000);
    </script>
    ";
  }
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Sign-up</title>
    <!------Favicon-->
    <link rel="icon" href="images/favicon.ico">
     <!--stylesheet-->
    <link rel="stylesheet" href="./style.css">
     
     
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="container">
    <div class="title">Sign up</div>
    <div class="content">
      <form action="#" method="POST">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Full Name</span>
            <input type="text" name="name" placeholder="Enter your name" required>
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="text" name="email" id="email" placeholder="Enter your Email" required>
            <?php
          echo "
          <small style='display: $emailDisplay;'>$emailMssg</small>
          
          ";
          
          ?> 
          </div>
          <div class="input-box">
            <span class="details">username</span>
            <input type="text" name="username" id="username" placeholder="Enter your Username" required>
          <?php
          echo "
          <small style='display: $userDisplay;'>$userMssg</small>
          
          ";
          
          ?> 

          </div>
          <div class="input-box">
            <span class="details">Faculty Number</span>
            <input type="text" name="facultyno" placeholder="Enter your number" required>
          </div>
          <div class="input-box">
            <span class="details">Password</span>
            <input type="password" name="password" id="password" placeholder="Enter your password" required>
          </div>
          <div class="input-box">
            <span class="details">Confirm Password</span>
            <input type="password" name="cpassword" id="cpassword" placeholder="Confirm your password" required>
            <?php
          echo "
          <small style='display: $confirmPasswordDisplay;'>$confirmPasswordMssg</small>
          
          ";
          
          ?> 
          </div>
        <div class="button">
          <input type="submit" value="Sign up">
        </div>
        <p>Already Registered <a href="../signin/signin.php" style="text-decoration: none;">Sign in</a></p>
      </form>
    </div>
  </div>
 <script src="./signup.js"></script>
</body>
</html>
