let email = document.getElementById("email");
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
