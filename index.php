<?php
  session_start();
  include 'conn.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Adoptify</title>
    <style>
      * {
        color: black;
        font-weight: 900;
      }
    </style>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"
    />
  </head>
  <body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
        <a class="navbar-brand d-flex" href="profile.html"
          ></span>Hey <?php echo $_SESSION['u_name']?> </a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active d-flex" aria-current="page" href="index.html"
                >Home</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link d-flex" href="adoption.php"
                >Adoption</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link d-flex" href="favv.php"
                >Favourites</a
              >
            </li>
           
            <li class="nav-item">
              <a class="nav-link d-flex" href="aboutus.php"
                >About us</a>
          </ul>
         
        </div>
      </div>
    </nav>

    <div class="d-flex gap-3 flex-wrap justify-content-center p-3">

        <?php
          $sql = "SELECT * FROM shelters";
          $fire = mysqli_query($conn, $sql);
         while ($row = mysqli_fetch_assoc($fire)) {
            // print_r($row);
        ?>
      <div class="card" style="width: 18rem">
        <img
          src="Assests/istockphoto-1217408094-2048x2048.jpg"
          class="card-img-top"
          alt="..."
        />
        <div class="card-body">
          <h5 class="card-title d-flex">
            <span class="material-symbols-outlined">pets</span><?php echo $row['s_name']; ?>
          <h6 class="card-title d-flex">
            <span class="material-symbols-outlined">location_on</span><?php echo $row['s_location']; ?>
          </h6>
          <h6 class="card-title d-flex">
            <span class="material-symbols-outlined">pace</span><?php echo $row['s_time']; ?>
          </h6>
          <p class="card-text">
           <?php echo $row['s_description']; ?>
          </p>
          <a href="pets.php?id=<?php echo $row['s_id'];?>" class="btn btn-dark">View Pets</a>
        </div>
  <?php
         }
  ?>
       
    
  </body>
</html>
