<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="regstyle.css">
    <title>Registration</title>
</head>
<body>
    <form class="form-container" action="regprofile.html" method="get" onsubmit="return validateForm()">
        <label for="email"><b>Email</b></label>
        <input type="text" id="email" placeholder="Enter Email Address" name="email" required>
        <label for="password"><b>Password</b></label>
        <input type="password" id="password" placeholder="Enter Password" name="password" required>
        <button type="submit">Sign Up</button>
    </form>
    <script>
        function validateForm() {
            var email = document.getElementById('email').value;
            var password = document.getElementById('password').value;

            // Check if email and password are filled
            if (email.trim() === '' || password.trim() === '') {
                alert("Please fill in all the details.");
                return false; // Prevent form submission
            } else {
                return true; // Allow form submission
            }
        }
    </script>
</body>
</html>