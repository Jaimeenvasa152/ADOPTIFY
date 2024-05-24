<?php
session_start();
include 'conn.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adoption Request Sent</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .tick-icon {
            width: 100px;
            margin-bottom: 20px;
        }
        h1 {
            margin-bottom: 20px;
        }
        p {
            margin-bottom: 20px;
        }
        .continue-btn {
            padding: 10px 20px;
            background-color: #4CAF50;
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }
        .continue-btn:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <?php //print_r($_POST); ?>
    <div class="container">
        <img src="Assests/1.png" alt="Tick Icon" class="tick-icon">
        <h1>Adoption Request Sent Successfully</h1>
        <p>Your request for adoption has been successfully sent.</p>
        <!-- <button class="continue-btn" onclick="continueToNextPage()">Continue</button> -->
        <button class="continue-btn" onclick="location.href = 'summary.php?id=<?php echo $_POST['id']; ?>&date=<?php echo $_POST['date']; ?>&time=<?php echo $_POST['time'];?>'">Continue</button>
        
        <!-- <a href=""></a> -->
    </div>

    <script>
        function continueToNextPage() {
            // Redirect to the next page
            location.href = "summary.php?id=<?php echo $_GET['id']; ?>&date=<?php echo $_GET['date']; ?>&time=<?php echo $_GET['time'];?>&r_id=<?php echo uniqid(); ?>";
        }
    </script>
</body>
</html>