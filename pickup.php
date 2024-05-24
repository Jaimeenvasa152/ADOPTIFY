<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schedule Meeting</title>
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
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            font-weight: bold;
        }
        input[type="date"],
        input[type="time"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        button {
            padding: 10px 20px;
            background-color: #4CAF50;
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <form action= "reqSent.php" method = "POST">
    <div class="container">
        <h1>Schedule Meeting</h1>
        <div class="form-group">
            <label for="meetingDate">Select Date:</label>
            <input type="date" id="meetingDate" name="date" required>
        </div>
        <div class="form-group">
            <label for="meetingTime">Select Time:</label>
            <input type="time" id="meetingTime" name="time" required>
        </div>
        <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
        <input type="submit" value="Schedule Meeting"  name="submit">
        <!-- <button onclick="scheduleMeeting()">Schedule Meeting</button> -->
        <p id="meetingInfo"></p>
    </div>

    <script>
        function scheduleMeeting() {
            var date = document.getElementById("meetingDate").value;
            var time = document.getElementById("meetingTime").value;

            var meetingInfo = "Meeting scheduled for " + date + " at " + time;
            document.getElementById("meetingInfo").innerText = meetingInfo;

            // Redirect to reqSent.html
            location.href = "reqSent.php?id=<?php echo $_GET['id'] ?>&date="+date+"&time="+time;     
        }
    </script>
    </form>
</body>
</html>
<?php
?>