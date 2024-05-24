<?php
  session_start();
  include 'conn.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Requests</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <style>
    /* Additional styles */
    .navbar-brand {
      font-size: 24px;
    }

    .request-photo {
      width: 100px; /* Adjust size as needed */
      height: 100px; /* Adjust size as needed */
      object-fit: cover;
      border-radius: 50%;
      margin-right: 20px;
    }

    /* Add style for back arrow */
    .back-arrow {
      font-size: 24px;
      color: #fff;
      margin-right: 20px;
      cursor: pointer;
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
<nav class="navbar navbar-dark bg-dark">
  <div class="container-fluid">
    <!-- Add back arrow with onclick event to go back -->
    <span class="back-arrow" onclick="goBack()">&#8249;</span>
    <a class="navbar-brand" href="#">My Requests</a>
  </div>
</nav>

<div class="container mt-4">
  <div class="card w-100 mb-3">
    <div class="card-body">
      <div class="row">
        <div class="col-md-2">
          <img class="request-photo" src="Assests/3.jpg" alt="Pet Photo ">
        </div>
        <div class="col-md-10">
          <h5 class="card-title">Cat For Adoption in <?php echo $locc?></h5>
          <p class="card-text">Pickup Time:</p>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container mt-4">
  <div class="card w-100 mb-3">
    <div class="card-body">
      <div class="row">
        <div class="col-md-2">
          <img class="request-photo" src="Assests/3.jpg" alt="Pet Photo">
        </div>
        <div class="col-md-10">
          <h5 class="card-title">Cat For Adoption in Surat</h5>
          <p class="card-text">Pickup Time:</p>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container mt-4">
  <div class="card w-100 mb-3">
    <div class="card-body">
      <div class="row">
        <div class="col-md-2">
          <img class="request-photo" src="Assests/3.jpg" alt="Pet Photo">
        </div>
        <div class="col-md-10">
          <h5 class="card-title">Cat For Adoption in Surat</h5>
          <p class="card-text">Pickup Time:</p>
        </div>
      </div>
    </div>
  </div>
</div>

  <!-- Repeat this card structure for other requests -->
</div>

<script>
  function goBack() {
    window.history.back();
  }
</script>

</body>
</html>
