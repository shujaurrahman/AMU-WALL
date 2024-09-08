<?php


$boolALoggedIn = false;
session_start();
if(isset($_SESSION) and isset($_SESSION["email"])){  
  $boolLoggedIn = true;  
  $email=$_SESSION["email"];
}

require_once '../partial/db.php';
$boolUserFound = false;
$boolUserPasswordMatch = false;

   if($_SERVER["REQUEST_METHOD"]=="POST"){
    $userName = $_POST["name"];
    $message = $_POST["message"];

	$userImage = $_FILES["userimage"]["name"]; //img name
  
	$tmpName = $_FILES["userimage"]["tmp_name"]; //temp server

	$path='../userimage/'; //path to which image is uploaded



    $sql = "INSERT INTO `usersfile`(`name`, `email`, `messgae`, `image`) 
    VALUES ('$userName','$email','$message','$userImage')";
    $result = mysqli_query($conn,$sql);
    if($result){
      move_uploaded_file($tmpName,$path.$userImage);
    }
    echo "
    <script>
    setInterval(() => {
      window.location = '../signin/signin.php';
    }, 2000);
    </script>
    ";
   }


?>
  <link rel="stylesheet" href="./signin.css">

<body>

  <div class="wrapper">
  <?php
   require "../nav/nav.php";
   
   ?>
    <section class="form login">
      <header> Upload your Photo </header>
      <form action="uploaduser.php" method="POST" enctype='multipart/form-data'>
        <div class="error-text"></div>
        <div class="field input">
          <label>Name</label>
          <input type="name" name="name"   placeholder="Enter Your Name" required>
          <small></small>
        </div>
        <div class="field input">
          <label>Your Message</label>
          <input type="text" name="message" placeholder="Enter Message" required>
        </div>
        <div class="field input">
        <label>Your Image</label>
				 <input type='file' name='userimage'  style="border:none;" accept='image/*' required>
        </div>
        <div class="field button">
          <input type="submit" name="submit" value="Upload">
        </div>
      </form>
    </section>
  </div>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    text-decoration: none;
    font-family: 'Poppins', sans-serif;
  }
  :root{
    --color1:#141E27;
    --color2:#203239;
    --color3:#769FCD;
    --color4: #B9D7EA;
  }

  body{
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 100vh;

    padding: 0 10px;
  }
  /* .wrapper{
    background-color: #ffff;
     
    max-width: 450px;
    width: 100%;
    border-radius: 16px;
    box-shadow: 0 0 128px 0 rgba(0,0,0,0.1),
  } */
  

  .form header{
    font-size: 25px;
    font-weight: 600;
    padding-bottom: 10px;
    border-bottom: 1px solid #e6e6e6;
  }
  .form form{
    margin: 30px 0;
  }
  .form form .name-details{
    display: flex;
  }
  .form .name-details .field:first-child{
    margin-right: 20px;
  }
  .form .name-details .field:last-child{
    margin-left: 20px;
  }
  .form form .field{
    display: flex;
    margin-bottom: 20px;
    flex-direction: column;
    position: relative;
  }
  .form form .field label{
    margin-bottom: 4px;
  }
  .form form .input input{
    height: 40px;
    width: 100%;
    font-size: 16px;
    padding: 0 10px;
    border-radius: 5px;
    border: 1px solid #ccc;
  }
  .form form .field input{
    outline: none;
  }

  .form form .button input{
    height: 45px;
    border: none;
    color: #fff;
    font-size: 17px;
    background: var(--color2);
    border-radius: 5px;
    cursor: pointer;
    margin-top: 13px;
    width: 25%;
  }
.form form .button input:hover{
    background-color: var(--color3);

}


  a {
    text-decoration: none;
  }
.nav-login-admin {
  display:flex;
  margin-bottom: 10px;
}
  .links a {
    color: var(--main-color);
    font-size: 1.3rem;
    line-height: 1;
    font-weight: 500;
    transition: 0.3s;
    margin: 10px 0 0 12px;
  }


  </style>
</body>
</html>
