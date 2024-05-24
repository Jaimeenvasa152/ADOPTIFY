<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About Us</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <style>
    .team-member-photo {
      max-width: 10%;
      max-height:auto;
      float: right;
    }
    .navbar-title {
    font-size: 24px;
    margin: 0;
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
  .navbar {
    background-color: #333;
    color: #fff;
    padding: 15px 30px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
  }

  </style>
</head>
<body>

<div class="navbar">
  <button class="back-button" onclick="goBack()">&#8249;</button>
  <h1 class="navbar-title">About us</h1>
</div>

<div class="container mt-4">
  <div class="card mb-3">
    <img src="Assests/krisha.jpg" class="card-img-top team-member-photo" alt="Team Member 3">
    <div class="card-body">
      <h5 class="card-title">Krisha Patel</h5>
      <p class="card-text">Job Title: Project Manager</p>
      <p class="card-text">Work: Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
    </div>
  </div>
  <div class="card mb-3">
    <img src="Assests/vishva.jpg" class="card-img-top team-member-photo" alt="Team Member 2">
    <div class="card-body">
      <h5 class="card-title">Vishva Brahmbhatt</h5>
      <p class="card-text">Job Title: Designer</p>
      <p class="card-text">Work: Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
    </div>
  </div>
  <div class="card mb-3">
    <img src="Assests/krish.HEIC" class="card-img-top team-member-photo" alt="Team Member 1">
    <div class="card-body">
      <h5 class="card-title">Krish Mevawala</h5>
      <p class="card-text">Job Title: Developer</p>
      <p class="card-text">Work: Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
    </div>
  </div>
  <div class="card mb-3">
    <img src="Assests/jaimeen.jpg" class="card-img-top team-member-photo" alt="Team Member 4">
    <div class="card-body">
      <h5 class="card-title">Jaimeen Vasa</h5>
      <p class="card-text">Job Title: Developer</p>
      <p class="card-text">Work: Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
    </div>
  </div>
</div>

<script>
   function goBack() {
    window.history.back();
  }
</script>
</body>
</html>
