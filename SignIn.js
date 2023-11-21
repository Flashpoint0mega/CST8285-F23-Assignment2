document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('Login').addEventListener('submit', function (event) {

        event.preventDefault();

        var username = document.getElementById("username").value;
        var password = document.getElementById("password").value;

        if (username === "") {
            alert("Username or Email must be filled out");
            event.preventDefault(); 
            return false;
        }

        if (password === "") {
            alert("Password must be not be empty");
            event.preventDefault();
            return false;
        }

        return true;
    });
});