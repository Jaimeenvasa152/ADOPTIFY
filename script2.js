

document.querySelector('.form-container').addEventListener('submit', function(event) {
    event.preventDefault();

    var username = document.querySelector('input[name="uname"]').value;
    var password = document.querySelector('input[name="psw"]').value;

    var correctPassword = "12345"; 

    if(username === "" || password === "") {
        alert("Username and password fields cannot be empty");
        return;
    }

    if(password !== correctPassword) {
        alert("Wrong password");
        return;
    }
    alert("Login successful");
    window.location.href = "index.html";
});