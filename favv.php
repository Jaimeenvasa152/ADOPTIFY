<?php
  session_start();
  include 'conn.php';
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Liked Pets</title>
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
    color: red; /* Liked color */
    cursor: pointer;
    transition: color 0.3s ease;
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

  /* Style for liked product count */
  #likedProductCount {
    background-color: #f0f0f0;
    color:  #333;
    padding: 10px 20px;
    border-radius: 20px;
    margin-bottom: 20px;
    text-align: center;
  }
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
</style>
</head>
<body>

<div class="navbar">
  <button class="back-button" onclick="goBack()">&#8249;</button>
  <h1 class="navbar-title">Liked Pets</h1>
</div>
<?php
  $stmt = "select * from users where u_name = '".$_SESSION['u_name']."'";
  $fire = mysqli_query($conn, $stmt);
  $row = mysqli_fetch_assoc($fire);
  $fovarr = explode(",",$row['fav_pets']);
  $stmt2 = "select * from pets where p_id = '".$fovarr[0]."'";
  $fire2 = mysqli_query($conn, $stmt2);
  $row2 = mysqli_fetch_assoc($fire2);
  $fovarr2 = explode(",",$row2['p_name']);
  $fovarr3 = explode(",",$row2['p_description']);
  ?>


<div class="container" id="likedProductsContainer">
 
<?php foreach ($fovarr2 as $index => $pet): ?>
  <div class="card">
    <div class="card-content">
      <div class="product-info">
        <h2><?php echo $pet; ?></h2>
      </div>
      <p><?php echo $fovarr3[$index]; ?> </p>
      <a href="pickup.php?id=<?php echo $fovarr[0]; ?>" class="btn btn-dark">Adopt</a>
    </div>
    <div class="details">
      <p>More details about <?php echo $pet; ?> go here.</p>
    </div>
  </div>
<?php endforeach; ?>
  </div>
</div>

<script>
  function goBack() {
    window.history.back();
  }

  // var likedProducts = JSON.parse(localStorage.getItem("likedProducts")) || [];
  // var container = document.getElementById("likedProductsContainer");
  // var productCountElement = document.getElementById("likedProductCount");

  // updateLikedProductCount();

  // function updateLikedProductCount() {
  //   productCountElement.textContent = likedProducts.length + " liked products";
  // }

  // likedProducts.forEach(function(productName) {
  //   var card = createCard(productName);
  //   container.appendChild(card);
  // });

  // function createCard(productName) {
  //   var card = document.createElement("div");
  //   card.classList.add("card");
  //   card.innerHTML = `
  //     <div class="card-content">
  //       <div class="product-info">
  //         <h2>${productName}</h2>
  //       </div>
  //       <p>Description of ${productName}. Click for more details.</p>
  //     </div>
  //     <div class="details">
  //       <p>More details about ${productName} go here.</p>
  //     </div>
  //   `;
  //   return card;
  // }

  // function toggleLike(icon, productName) {
  //   icon.classList.toggle("liked");
  //   var index = likedProducts.indexOf(productName);
  //   if (index === -1) {
  //     likedProducts.push(productName);
  //   } else {
  //     likedProducts.splice(index, 1);
  //   }
  //   localStorage.setItem("likedProducts", JSON.stringify(likedProducts));
  //   updateLikedProductCount();

  //   // Remove card if unliked
  //   if (index !== -1) {
  //     var cardToRemove = document.getElementById(productName);
  //     if (cardToRemove) {
  //       container.removeChild(cardToRemove);
  //     }
  //   }
  // }
</script> 
</body>
</html>
