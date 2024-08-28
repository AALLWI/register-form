<?php
session_start();
include '../koneksi.php';

$user = $_POST['user'];
$pass = $_POST['password'];


$stmt = $conn->prepare("SELECT * FROM login WHERE username=? AND password=?");
$stmt->bind_param("ss", $user, $pass);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();
    if ($data['level'] == "Admin") {
        $_SESSION['username'] = $user;
        $_SESSION['level'] = "admin";
        header("Location: admin.php");
    } 
} else {
    header("Location: login.php?pesan=gagal");
}
exit();
?>
