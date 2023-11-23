<?php
session_start();
require("../includes/database_connect.php");

$email=$_POST['email'];
$password=$_POST['password'];
$password=sha1($password);

$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
$result = mysqli_query($conn, $sql);
if (!$result) {
	echo "Something went wrong!";
	exit;
}

$row_count = mysqli_num_rows($result);
if ($row_count == 0) {
	echo "Login failed! Invalid id or password";
	exit;
}

$sql = "INSERT INTO users (email, password) VALUES ('$email', '$password')";
$result = mysqli_query($conn, $sql);
if (!$result) {
	echo "Something went wrong!";
	exit;
}

echo "You Logged in seccessfully!";
?>

Click <a href="../index.php">here</a> to continue.
<?php
mysqli_close($conn);