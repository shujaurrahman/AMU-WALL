<?php
$boolALoggedIn = false;
session_start();
if(isset($_SESSION) and isset($_SESSION["email"])){  
	 $email=$_SESSION["email"];
    $boolLoggedIn = true;  
    	header("location: ../index.php"); 
}
require_once '../partial/db.php';
$boolUserFound = false;
$boolUserPasswordMatch = false;

   if($_SERVER["REQUEST_METHOD"]=="POST"){
    $email = $_POST["email"];
    $userPassword = $_POST["password"];
    $sql = "SELECT * FROM `alluser` where `email` = '$email';";
    $result = mysqli_query($conn,$sql);
    $aff = mysqli_affected_rows($conn);

    if($aff<1){
        $boolUserFound = false;
        $alerMssg="Username Not Found";
    }
    else{
        $boolUserFound = true;
    }


    if($boolUserFound){
        $data = mysqli_fetch_object($result);
        $passwordInDatabase = $data->{"password"};
        if(password_verify($userPassword,$passwordInDatabase)){
            $boolUserPasswordMatch = true;   
            echo var_dump($boolUserPasswordMatch);
            session_start();
            $_SESSION["email"] = $email; 
            $_SESSION['id']=$id;   
            header("location: ../index.php");
        }
        else{
            $boolUserPasswordMatch == false;
        }
    }

 
}


?>
  <link rel="stylesheet" href="./signin.css">

<body>

  <div class="wrapper">
    <section class="form login">
      <header> Login</header>
      <form action="signin.php" method="POST">
        <div class="error-text"></div>
        <div class="field input">
          <label>Email</label>
          <input type="text" name="email"  id="email" placeholder="Enter your Email" required>
          <small></small>
        </div>
        <div class="field input">
          <label>Password</label>
          <input type="password" name="password" placeholder="Enter your password" required>
        </div>
        <div class="field button">
          <input type="submit" name="submit" value="Login">
        </div>
        <p>Not Registered Yet! <a href="../signup/signup.php" style="text-decoration: none;">Sign up</a></p>
      </form>
    </section>
  </div>
  <script src="./signin.js"></script>
</body>
</html>
