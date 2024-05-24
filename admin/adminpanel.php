<?php
include 'conn.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Panel - Add Pet</title>
  <style>
    .card-container {
      display: flex;
      justify-content: space-around;
      flex-wrap: wrap;
      padding: 20px;
    }
    .card {
      width: 300px;
      padding: 20px;
      margin: 20px;
      border: 1px solid #ccc;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
    }
    .card h1 {
      text-align: center;
      margin-bottom: 20px;
    }
    .card label {
      display: block;
      margin-bottom: 5px;
    }
    .card input[type="text"],
    .card textarea,
    .card input[type="file"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 10px;
      box-sizing: border-box;
    }
    .card input[type="submit"] {
      width: 100%;
      padding: 10px;
      border: none;
      background: #007BFF;
      color: white;
      border-radius: 5px;
      cursor: pointer;
      margin-top: 10px;
    }
    .card input[type="submit"]:hover {
      background: #0056b3;
    }

  </style>
</head>
<body>

        <form action="delete.php" method="post">
          <button type="submit" name="delete">DELETE</button>
        </form>
        <form action="manage.php" method="post">
          <button type="submit" name="manage">MANAGE</button>
        </form>
 
   <div class="card-container">

    <div class="card">
      <h1>Add a New Pet</h1>
      <form action="" method="post" enctype="multipart/form-data">
        <label for="name">Pet Name:</label>
        <input type="text" id="name" name="name" required>
        <label for="type">Pet Type:</label>
        <input type="text" id="type" name="type" required>
        <label for="description">Description:</label>
        <textarea id="description" name="description" required></textarea>
        <label for="file">Select file:</label>
        <input type="file" id="file" name="file" required>
        <select id="shelter" name="shelter" required>
            <option value="" disabled>Select Shelter</option>
            <?php
                $stmt = "SELECT s_name,s_id FROM shelters"; 
                $fire = mysqli_query($conn, $stmt);
                while ($row = mysqli_fetch_assoc($fire)) 
                { print_r($row);
                    echo "<option value='".$row['s_id']."'>".$row['s_name']."</option>";
                }
             ?>
        </select>
        <input type="submit" value="Add Pet" name="p_sub">
      </form>
    </div>

   
      

    <div class="card">
      <h1>Register a New Shelter</h1>
      <form action="" method="post">
        <label for="shelter_name">Shelter Name:</label>
        <input type="text" id="shelter_name" name="shelter_name" required>
        <label for="location">Location:</label>
        <input type="text" id="location" name="location" required>
        <label for="contact">Contact:</label>
        <input type="text" id="contact" name="contact" required>
        <label for="time">Time:</label>
        <input type="text" id="time" name="time" required>
        <label for="shelter_description">Description:</label>
        <textarea id="shelter_description" name="shelter_description" required></textarea>
        <input type="submit" value="Register Shelter" name="s_sub">
      </form>
    </div>
  </div>
</body>
<?php

if (isset($_POST['p_sub'])) 
{
    $id = uniqid();
    $name = $_POST['name'];
    $type = $_POST['type'];
    $description = $_POST['description'];
    $sid = $_POST['shelter'];
    $file = $_FILES['file'];
    $filename = $file['name'];
    $filetmp = $file['tmp_name'];
    $fileerror = $file['error'];
    $fileext = explode('.', $filename);
    $fileext = strtolower(end($fileext));
    $allowed = array('jpg', 'jpeg', 'png');
    if (in_array($fileext, $allowed)) 
    {
        if ($fileerror === 0) 
        {
            $newfilename = uniqid('', true) . "." . $fileext;
            $filedest = '../uploads/' . $newfilename;
            move_uploaded_file($filetmp, $filedest);
            $stmt="INSERT INTO pets (p_id, p_name,p_description, p_img, s_id) VALUES ('$id', '$name', '$description', '$newfilename','$sid')";
            $fire=mysqli_query($conn, $stmt);
            
            echo "<script>alert('Pet added successfully!')</script>";
        } 
        else 
        {
            echo "<script>alert('Pet cannot be added!')</script>";
        }
    } 
    else 
    {
        echo "<script>alert('Pet added successfully!')</script>";
    }
}

elseif (isset($_POST['s_sub'])) 
{
    $id = uniqid();
    $shelter_name = $_POST['shelter_name'];
    $location = $_POST['location'];
    $contact = $_POST['contact'];
    $shelter_description = $_POST['shelter_description'];
    $s_time = $_POST['time'];
    $stmt="INSERT INTO shelters (s_id, s_name, s_location, s_contact, s_description, s_time) VALUES ('$id', '$shelter_name', '$location', '$contact', '$shelter_description', '$s_time')";
    $fire=mysqli_query($conn, $stmt);
    echo "<script>alert('Shelter added successfully!')</script>";
}

?>
</html>