<?php
// Include your database connection file
include 'conn.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the delete button is clicked
    if (isset($_POST['delete_pet'])) {
        // Get the ID of the pet to be deleted
        $pet_id = $_POST['pet_id'];

        // Delete the pet from the database
        $sql = "DELETE FROM pets WHERE p_id = '$pet_id'";
        $result = mysqli_query($conn, $sql);

        // Check if the deletion was successful
        if ($result) {
            echo "<script>alert('Pet deleted successfully!')</script>";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Delete Pets</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Admin Panel - Delete Pets</h1>
    
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Action</th>
        </tr>
        <?php
        // Fetch all pets from the database
        $sql = "SELECT * FROM pets";
        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['p_id'] . "</td>";
                echo "<td>" . $row['p_name'] . "</td>";
                echo "<td>" . $row['p_description'] . "</td>";
                echo "<td>";
                echo "<form method='post' action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "'>";
                echo "<input type='hidden' name='pet_id' value='" . $row['p_id'] . "'>";
                echo "<button type='submit' name='delete_pet'>Delete</button>";
                echo "</form>";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No pets found</td></tr>";
        }
        ?>
    </table>
</body>
</html>
