<?php
// Include your database connection file
include 'conn.php';


// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the update button is clicked
    if (isset($_POST['update_pet'])) {
        // Get the ID of the pet to be updated and the new name and description
        $pet_id = $_POST['pet_id'];
        $pet_name = $_POST['pet_name'];
        $pet_description = $_POST['pet_description'];

        // Update the pet in the database
        $sql = "UPDATE pets SET p_name = '$pet_name', p_description = '$pet_description' WHERE p_id = '$pet_id'";
        $result = mysqli_query($conn, $sql);

        // Check if the update was successful
        if ($result) {
            echo "<script>alert('Pet updated successfully!')</script>";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
}
?>

<!-- Rest of your HTML code... -->

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
            echo "<td>";
            echo "<form method='post' action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "'>";
            echo "<input type='hidden' name='pet_id' value='" . $row['p_id'] . "'>";
            echo "<input type='text' name='pet_name' value='" . $row['p_name'] . "'>";
            echo "</td>";
            echo "<td>";
            echo "<input type='text' name='pet_description' value='" . $row['p_description'] . "'>";
            echo "</td>";
            echo "<td>";
            echo "<button type='submit' name='update_pet'>Update</button>";
            echo "</form>";
            echo "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='4'>No pets found</td></tr>";
    }
    ?>
</table>

<!-- Rest of your HTML code... -->