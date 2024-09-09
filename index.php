<?php

$boolLoggedIn = false;
session_start();
if(isset($_SESSION) and isset($_SESSION["email"])){  
	 $email=$_SESSION["email"];
   $id=$_SESSION['id'];
    $boolLoggedIn = true;  
    	
}
else{
  $email="";
  $id="";
}


// database connection 
require_once './partial/db.php';
$cardBlock="";
$Fetch=false;


 


  $sql="SELECT * FROM `usersfile`";
  $result = mysqli_query($conn,$sql);
  $aff = mysqli_affected_rows($conn);
  
                if($aff<1){
                    $Fetch = false;
                }
                else{
                    $Fetch = true;
            $path='./userimage/';
            while($data = mysqli_fetch_object($result)){
             $id = $data->{"id"};
            $userName=$data->{"name"};
            $email=$data->{"email"};
            $message=$data->{"messgae"};
            $userImage=$data->{"image"};
      


                $cardBlock.="<div class='card'>
                <div class='inner-card'>
                  <div class='img-wrapper'>
                    <img src='$path$userImage' alt=''>
                  </div>
                  <div class='content'>
                    <h1>$userName</h1>
                    <h1>$email</h1>
                    <p>$message</p>
                  </div>
                  <div class='btn-wrapper'>
                   <a href='#'> <button class='view-btn'>View Profile</button></a>
                  </div>
                </div>
              </div>";
            }
        }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=p, initial-scale=1.0">
        <title>Document</title>
        
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
         <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js">
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    
    
    <style>
  :root{
    --color1:#141E27;
    --color2:#203239;
    --color3:#769FCD;
    --color4: #B9D7EA;
}
h1{
    text-align: center;
    color: var(--color3);
    font-size: 3rem;
}
body {
    margin: 10px;
    padding: 0;
    text-decoration: none;
    font-family: 'Poppins', sans-serif;
    background-color: #ffff
}

h1 {
    text-align: center;
    color: var(--color3);
    font-size: 3.5rem;
}

.main{
    padding: 2% 6%;
}


/* new card css  */

.inner-wrapper {
    display: flex;
    width: 100%;
    margin: 20px;
    border: none;
    flex-wrap: wrap;
}
.card {
    border-radius: 15px;
    flex-basis: 28.33333%;
    /* padding: 15px; */
    border: none;
    margin: 10px; 
    background-color: var(--color4);
}
.inner-card  {
    border-radius: 15px;
  background-color: var(--color4);
  padding: 15px;
  /* box-shadow: 0 1px 2px rgba(0,0,0,.1) */
}
.img-wrapper {
  width: 90%;
  margin: auto;
  height: 300px;
  margin: 15px;
}
.img-wrapper img {
  width: 100%;
  height: 100%;
  border-radius: 15px;
  object-fit: cover;
  object-position: center;
}
.content {
  margin: 20px;
}
.content h1 {
  font-weight: 600;
  font-size: 13px;
  color: black;
  margin: 0;
}
p {
  font-size: 16px;
  margin-top: 10px;
}
.btn-wrapper {
  display: block;
  text-align: center;
}
.view-btn {
  width: 30%;
  height: 40px;
  border-radius: 10px;
  background-color:var(--color3);
  color: #fff;
  font-size: 16px;
  cursor: pointer;
}
.view-btn:hover{
    background-color: #ffff;
    color: var(--color1);
}

.light-box {
  position: fixed;
  left: 0;
  top: 0;
  background-color: rgba(0,0,0,.6);
  width: 100%;
  height: 100vh;
  z-index: 99;
  opacity: 0;
  visibility: hidden;
  transition: all 200ms ease-out;
}
.box {
  width: 600px;
  height: 400px;
  background-color: #fff;
  transform: scale(0);
  transition: all 200ms ease-in-out;
  padding: 10px;
  box-shadow: 0 3px 9px rgba(0,0,0,.1);
  position: relative;
}
.box-wrapper {
  display: flex;
  justify-content: center;
  align-items: center;
  width: 100%;
  height: 100vh;
  padding: 15px;
}
.box .light-img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  object-position: center;
}
.box .close-btn {
  position: absolute;
  z-index: 100;
  font-size: 30px;
  color: #ccc;
  left: 100%;
  top: 0;
  border: 2px solid #ccc;
  border-radius: 50%;
  display: block;
  width: 40px;
  height: 40px;
  text-align: center;
  line-height: 35px;
  margin-left: 10px;
  cursor: pointer;
  transition: all 200ms linear;
}
/* Effect */
.effect .light-box {
  opacity: 1;
  visibility: visible;
}
.effect .light-box .box {
  transform: scale(1);
}

@media (max-width: 780px) {
  .card {
    flex-basis: 50%;
  }
  .title {
    font-size: 30px;
  }
}

@media (max-width: 500px) {
  .card {
    flex-basis: 5100%;
  }
  .box .close-btn {
    margin-left: 0;
    left: 80%;
    top: -12%;
  }
}
.credit {
  font-size: 14px;
}

   </style>
</head>
<body>
    <?php
    
    require "./nav/nav.php";
    
    ?>
    <div class="heading">
      <h1>A.M.U STUDENTS</h1>
   </div>
    <section class="main">
        
         <h5>
        <?php
        if($boolLoggedIn){
        echo "<h5>Welcome,$email";
        }
        ?></h5>
        <div class="inner-wrapper">
        <?php
                
        if($Fetch){
            echo $cardBlock;
        }
        else{
          echo
           "<h3 style='Background-color:var(--color4); padding:20px;'>Looks Like Nobody has posted thier Cards yet.</h3>";
        }
        ?>
        </div>

    
    </section>
</body>
</html>



