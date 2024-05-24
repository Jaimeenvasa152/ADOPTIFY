<?php
session_start();
include 'conn.php';

$stmt = "select * from users where u_name = '".$_SESSION['u_name']."'";
$fire = mysqli_query($conn,$stmt);
$row = mysqli_fetch_assoc($fire);
$fov = $row['fav_pets'];
$p_id = $_GET['p_id'];
if($fov == "0")
{
    $upd = "update users set fav_pets = '$p_id' where u_name = '".$_SESSION['u_name']."'";
    mysqli_query($conn,$upd);
}
else
{
    // $pidarr=explode(",",$fov);
    $n_pidarr=$fov.",".$p_id;
    $upd = "update users set fav_pets = '$n_pidarr' where u_name = '".$_SESSION['u_name']."'";
    mysqli_query($conn,$upd);
}
echo "<script>alert('Pet successfully added to Faourites!')</script>";
echo "<script>location.href = 'index.php'</script>";
?>