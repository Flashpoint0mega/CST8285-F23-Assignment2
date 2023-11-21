function validate() {
    //let email = document.getElementById('email').value;
    //this is the regex for an email, that makes it so the email has to have a character before the @ symbol and must have text after it, and also have a period
    //let emailRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;  
    let Uname = document.getElementById('username').value;
    let pass1 = document.getElementById('password').value;

    /*if (emailRegex.test(email)) { //tests that the email inputed is in the format xyz@xyz.xyz
        document.getElementById('email').style.borderColor = 'black';
        document.getElementById('email').style.backgroundColor = 'white';
        document.getElementById('emailerror').innerHTML="";
    }else{
        //alert('invalid email format, please use format xyz@xyz.xyz');
        document.getElementById('emailerror').innerHTML="Email should not be non-empty with the format xyz@xyz.xyz";
        document.getElementById('email').style.borderColor = 'red';
        document.getElementById('email').style.backgroundColor = '#fff0f0';
        
        return false;
    }; */
    
    if (Uname.trim().length === 0 || Uname === null){ //make sure there is text in username input
        //alert("A username must be filled out");
        document.getElementById('unameerror').innerHTML="Username should be non-empty and less than 30 characters";
        document.getElementById('login').style.borderColor = 'red';
        document.getElementById('login').style.backgroundColor = '#fff0f0';
        return false;
    }
    else if(Uname.trim().length > 30){ //make sure username is less than 30 characters long
        //alert('Username must be less than 30 characters long.');
        document.getElementById('unameerror').innerHTML="Username should be non-empty and less than 30 characters";
        document.getElementById('login').style.borderColor = 'red';
        document.getElementById('login').style.backgroundColor = '#fff0f0';
        return false;
    }
    else{
        document.getElementById('unameerror').innerHTML=" ";
        document.getElementById('login').style.borderColor = 'black';
        document.getElementById('login').style.backgroundColor = 'white';
        Uname.toLowerCase(); //makes the username lowercase
    };

    if(pass1.trim().length < 8){ //make sure password is more than 8 characters long
        //alert('Password must be more than 8 characters long.');
        document.getElementById('pass1error').innerHTML="Password should be at least 8 characters long";
        document.getElementById('pass').style.borderColor = 'red';
        document.getElementById('pass').style.backgroundColor = '#fff0f0';
        /*
        document.getElementById('pass2error').innerHTML="this is invalid";
        document.getElementById('pass2').style.borderColor = 'red';
        document.getElementById('pass2').style.backgroundColor = '#fff0f0'; 
        */
        return false;
    }
    else{
        document.getElementById('pass1error').innerHTML=" ";
        document.getElementById('pass').style.borderColor = 'black';
        document.getElementById('pass').style.backgroundColor = 'white';
        };
    
    /*if(pass1 != pass2){ //check if both passwords entered are the same
        //alert('Passwords must the same.');
        document.getElementById('pass').style.borderColor = 'red';
        document.getElementById('pass').style.backgroundColor = '#fff0f0';
        document.getElementById('pass2').style.borderColor = 'red';
        document.getElementById('pass2').style.backgroundColor = '#fff0f0';
        document.getElementById('pass1error').innerHTML="Passwords should match";
        document.getElementById('pass2error').innerHTML="Passwords should match";
        return false;
    }
    else{
        document.getElementById('pass').style.borderColor = 'black';
        document.getElementById('pass').style.backgroundColor = 'white';
        document.getElementById('pass2').style.borderColor = 'black';
        document.getElementById('pass2').style.backgroundColor = 'white';
        document.getElementById('pass1error').innerHTML=" ";
        document.getElementById('pass2error').innerHTML=" ";
    }
    ; */
    if(pass1.trim().length === 0 || pass1 === null){ //makes sure both passwords are not empty
        //alert('Password must not be blank.');
        document.getElementById('pass1error').innerHTML="this is invalid";

        document.getElementById('pass').style.borderColor = 'red';
        document.getElementById('pass').style.backgroundColor = '#fff0f0';
        return false;
    }
    else{
        document.getElementById('pass1error').innerHTML=" ";
        document.getElementById('pass').style.borderColor = 'black';
        document.getElementById('pass').style.backgroundColor = 'white';
    
    
    
}
}