<?php
  session_start();
  include 'conn.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Requested Pet Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .pet-details {
            margin-bottom: 20px;
        }
        .pet-details img {
            max-width: 100%;
            border-radius: 5px;
            margin-bottom: 10px;
        }
        .pet-name {
            font-weight: bold;
            font-size: 20px;
            margin-bottom: 5px;
        }
        .meeting-time {
            font-style: italic;
            margin-bottom: 10px;
        }
        .shelter-location {
            font-size: 16px;
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
        .team-member-photo {
        width:100px ;
        height:100px;
    }
    </style>
</head>
<body>
    <?php
    $idd = $_GET['id'];
    $stmt = "select * from pets where p_id='$idd'";
    $fire=mysqli_query($conn,$stmt);
    $row = mysqli_fetch_assoc($fire);
    $loc = "SELECT s_location FROM shelters JOIN pets ON shelters.s_id = pets.s_id";
    $fire1 = mysqli_query($conn, $loc);
    
    if ($fire1 && mysqli_num_rows($fire1) > 0) {
        while ($row1 = mysqli_fetch_assoc($fire1)) {
            // Echo the value of the 's_location' column for each row
            $locc= $row1['s_location'];
        }
    } else {
        // Handle the case where no result is found
        echo "No shelters found.";
    }
    
 

    ?>
    <div class="container">
        <div class="pet-details">   
            <h2 class="pet-name"><?php echo $row['p_name']?></h2>
            <img src="uploads/<?php echo $row['p_img']?>" alt="Fluffy" class="team-member-photo">
            <p class="pet-description"><?php echo $row['p_description']?></p>
            <p class="meeting-time"><?php echo $_GET['time']?>,<?php echo $_GET['date']?></p>
            <p class="shelter-location">Shelter Location:<?php echo $locc?> </p>
        </div>
        <button class="continue-btn" onclick="continueToNextPage()">Continue</button>
    </div>

    <script>
        function continueToNextPage() {
            // Redirect to the next page
            window.location.href = "index.php";
            
        }
    </script>
    
</body>
</html>
