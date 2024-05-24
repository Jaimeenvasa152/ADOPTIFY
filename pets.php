<?php
  session_start();
  include 'conn.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Pet Details</title>
<style>
  

  body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
    margin: 0;
    padding: 0;
  }

  .navbar {
    background-color: #333;
    color: #fff;
    padding: 15px 30px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
  }

  .navbar-title {
    font-size: 24px;
    margin: 0;
  }

  .back-button {
    background: none;
    border: none;
    color: #fff;
    font-size: 24px;
    cursor: pointer;
  }

  .container {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: center;
    align-items: center;
    max-width: 1200px;
    margin: 20px auto;
  }

  .card {
    width: 300px;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    background-color: #fff;
    cursor: pointer;
    transition: transform 0.3s ease;
    position: relative; /* Added */
  }

  .card:hover {
    transform: translateY(-5px);
  }

  .card-content {
    padding: 20px;
  }

  .product-info {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 15px;
  }

  .product-info h2 {
    margin: 0;
    font-size: 20px;
    color: #333;
  }

  .product-info .like-icon {
    font-size: 24px;
    color: #ccc; /* Default color */
    cursor: pointer;
    transition: color 0.3s ease;
  }

  .product-info .like-icon.liked {
    color: red; /* Liked color */
  }

  .product-info p {
    margin: 0;
    font-size: 16px;
    color: #666;
  }

  .details {
    display: none;
    padding: 20px;
    background-color: #f9f9f9;
  }
  
  .product-image {
    width: 100%;
    height: auto;
    border-radius: 10px 10px 0 0;
  }

</style>
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

<div class="navbar">
  <button class="back-button" onclick="goBack()">&#8249;</button>
  <h1 class="navbar-title">Pet Details</h1>
</div>
<?php
$id = $_GET['id'];
  $stmt = "Select * from pets where s_id = '$id'";
  
  $fire = mysqli_query($conn, $stmt);
  while ($row = mysqli_fetch_assoc($fire)) {
?>
<form action="add_to_favorites.php" >
<div class="container">
  <div class="card" onclick="showDetails(1)">
    <img class="product-image" src="uploads/<?php echo $row['p_img']?>">
    <div class="card-content">
      <div class="product-info">
        <h2><?php echo $row['p_name']; 
        $link = "add_to_favorites.php?p_id=".$row['p_id'];
        //echo $link;
        ?></h2>
        <a href="<?php echo $link ?>" class="btn btn-dark">Add to Favourite</a>
      </div>
      <p><?php //echo $row['p_description']; ?></p>
    </div>
  </div>
  <!-- <input type=hidden name="product" value="Shiro"> -->
</form>  
<?php
  }?>

<script>
  function showDetails(productId) {
    var details = document.getElementById("details" + productId);
    if (details.style.display === "none") {
      details.style.display = "block";
    } else {
      details.style.display = "none";
    }
  }

  function goBack() {
    window.history.back();
  }
  function add_fov(petid) {
    location.href = "add_to_favorites.php?p_id=" + petid;
  }

  function addToFavorites(petid) {
    // Send AJAX request to PHP script
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "add_to_favorites.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.send("p_id = " + petid);
  }
</script>

</body>
</html>
