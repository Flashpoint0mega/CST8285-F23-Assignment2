document.addEventListener('DOMContentLoaded', function () {
    document.getElementById("SignUp").addEventListener("submit", function (event) {
        event.preventDefault();

        var email = document.getElementById('email').value;

        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            alert("Email is empty or not in the correct format")
            return  false;
        }

    var username = document.getElementById('username').value;

    //Check for empty input or excessively long login name
    if (username.length < 8 || username.length >= 30) {
        alert("Username has to be longer or equal to 8 and less than 30 characters")
        
        return false;
    }

    var pass = document.getElementById('password').value;

    //Check for a minimum password length
    if (pass.length < 8) {

        alert("Password should be at least 8 characters");
        return false;

    }

        return true;

    });
});