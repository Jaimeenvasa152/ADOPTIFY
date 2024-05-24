<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "adoptify";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $username = $_POST['uname'];
    $password = $_POST['psw'];

    // Prepare and execute SQL query
    $stmt = $conn->prepare("SELECT u_name,u_pass FROM users WHERE u_name = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0)
    {
        $row = $result->fetch_assoc();
        $adm = $row['u_name'];
        $admps = $row['u_pass'];
        $adu = "admin";
        $adp = "admin";
        if($username == $adu && $password == $adp)
        {
            session_start();
            $_SESSION['u_name'] = $username;
            header("Location: admin/adminpanel.php");
            exit();
        }
        elseif ($password == $admps)
        {
            // Password is correct, authentication successful
            session_start();
            $_SESSION['u_name'] = $username;
            header("Location: index.php");
            exit(); 
        } 
        else 
        {
       
        header("Location: log.html");
          
        }
    } 
    else 
    {
        header("Location: log.html");
        echo "Invalid username or password";
      
    }
}

$conn->close();
?>
