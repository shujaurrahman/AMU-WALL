<?php


$boolLoggedIn = false;
if(isset($_SESSION) and isset($_SESSION["email"])){  
	 $email=$_SESSION["email"];
    $boolLoggedIn = true;  
    	
}


$signin="/AMU-WALL/signin/signin.php";
$signup="/AMU-WALL/signup/signup.php";
$Home="/AMU-WALL/index.php";
$logout="/AMU-WALL/logout.php";
$post="/AMU-WALL/main/uploaduser.php";

// Blocks condition for login logout


$homeBlock="<a href='$Home'>Home</a> ";
$signinBlock=" <a href='$signin'>Sign In</a>";
$signupBlock="<a href='$signup'>Sign Up</a>";
$logoutBlock="<a href='$logout'>Logout</a>";
$postBlock=" <a href='$post'>Upload</a>";

?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Navbar </title>
    <link rel="stylesheet" href="style.css">
	<style>


@import url('https://fonts.googleapis.com/css?family=Open+Sans&display=swap');
:root{
    --color1:#141E27;
    --color2:#203239;
    --color3:#769FCD;
    --color4: #B9D7EA;
  }


body {
	font-family: 'Open Sans', sans-serif;
	background: #fff;
}
nav{
	position: relative;
	float: right;
	margin-left: 10px;
	width: 350px;
	height: 50px;
	background: var();
	border-radius: 8px;
	font-size: 0;
	background-color: var(--color3);
	box-shadow: 0 2px 3px 0 rgba(0,0,0,.1);
}
nav a{
	font-size: 15px;
	text-transform: uppercase;
	margin-right: 5px;
	color: white;
	text-decoration: none;
	line-height: 50px;
	position: relative;
	z-index: 1;
	display: inline-block;
	text-align: center;
}
nav .animation{
	position: absolute;
	height: 90%;
	margin: 3px;
	top: 0;
	z-index: 0;
	background: var(--color4);
	border-radius: 8px;
	transition: all .5s ease 0s;
}
nav a:nth-child(1){
	width: 100px;
}
nav .start-home, a:nth-child(1):hover~.animation{
	width: 100px;
	left: 0;
}
nav a:nth-child(2){
	width: 110px;
}
nav a:nth-child(2):hover~.animation{
	width: 110px;
	left: 100px;
}
nav a:nth-child(3){
	width: 100px;
}
nav a:nth-child(3):hover~.animation{
	width: 100px;
	left: 210px;
}
nav a:nth-child(4){
	width: 160px;
}
nav a:nth-child(4):hover~.animation{
	width: 160px;
	left: 310px;
}
nav a:nth-child(5){
	width: 120px;
}
nav a:nth-child(5):hover~.animation{
	width: 120px;
	left: 470px;
}
a {
	text-decoration: none !important;
}
  </style>
  </head>
  <body>
    <nav>
     <?php
	 if(!$boolLoggedIn){
		 echo "
		 $homeBlock
		 $signupBlock
		 $signinBlock
		 <div class='animation start-home'>
		 </div>";
		 
	 }
	 else{
		 echo "
		 $homeBlock
		 $postBlock
		 $logoutBlock
		 <div class='animation start-home'>
		 </div>";
		 
	 }
	 
	 ?>
      <div class="animation start-home">
      </div>

    </nav>
  </body>

</html>
