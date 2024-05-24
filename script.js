document.querySelector('.form-container').addEventListener('submit', function(event) {
    event.preventDefault();

    var username = document.querySelector('input[name="uname"]').value;
    var password = document.querySelector('input[name="psw"]').value;

    if(username === "" || password === "") {
        alert("Username and password fields cannot be empty");
        return;
    }

    // Add more validation as needed

    // If validation passes, redirect to the login page
    window.location.href = "log.html";
});