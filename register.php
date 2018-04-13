<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "phplogin";
$conn = new mysqli($servername, $username, $password,$dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$fname='';
$lname='';
$email='';
$password='';
$number='';

if(isset($_POST['fname'], $_POST['lname'], $_POST['email'], $_POST['password'])) {
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$number=$_POST['number'];
};
//if(isset($_POST['lname'])) $lname=$_POST['lname'];
//if(isset($_POST['email'])) $email=$_POST['email'];
//if(isset($_POST['password'])) $password=$_POST['password'];
//if(isset($_POST['number'])) $number=$_POST['number'];

$sql = "INSERT INTO `phploginlist` (`id`, `fname`, `lname`, `email`, `password`, `number`) VALUES (NULL, '".$fname."', '".$lname."', '".$email."', MD5('".$password."'), '".$number."');";


if (isset($_POST['submit'])) {
	header("location: users.php");
	$conn->query($sql);
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>

<form method="post">
First Name: <input type="text" name="fname"><br>
Last Name: <input type="text" name="lname"><br>
Email: <input type="text" name="email"><br>
Password: <input type="password" name="password"><br>
Number: <input type="text" name="number"><br>
<input type="submit" value="Add User" name="submit">
</form>
<script>
</script>

</body>
</html>