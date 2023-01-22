let username = document.getElementById("username");
let email = document.getElementById("email");
let password = document.getElementById("password");
let confirmPassword = document.getElementById("cpassword");


username.addEventListener("blur",()=>{
    let usernameData = username.value;
    let mssg = username.nextElementSibling;
    let regex = /\w{4,}/;
    if(usernameData == ""){
      mssg.innerHTML = "Username cannot be Empty";
      mssg.style.display = "block";
    }
    else if(!regex.test(usernameData)){
      mssg.innerHTML = "Username cannot be less than 4";
      mssg.style.display = "block";
    }
    else{
      mssg.style.display = "none";
   }
  
  })

  email.addEventListener("blur",()=>{  
    let emailData = email.value;
    let mssg = email.nextElementSibling;
    let atpos = emailData.indexOf("@");
    let domain = emailData.split("@")[1]; 
  
    if(emailData == ""){
      mssg.innerHTML= "Email cannot be Empty";
      mssg.style.display = "block";
      
    }
    else if(atpos < 1 || domain != "myamu.ac.in"){
      mssg.innerHTML = "Please Enter a valid Email address that contains @myamu.ac.in";
      mssg.style.display = "block";
    }
    else{
      mssg.style.display = "none";
    }
  })

  confirmPassword.addEventListener("blur",()=>{
    let PasswordData = confirmPassword.value;
    let mssg = confirmPassword.nextElementSibling;
  
    if(PasswordData != password.value){
      mssg.innerHTML = "Passwords doesn't Match";
      mssg.style.display = "block";
    }
    else{
      mssg.style.display = "none";
  
    }
  })
  
  