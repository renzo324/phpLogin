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

$sql = "UPDATE `phploginlist` SET `fname` = '".$fname."', `lname` = '".$lname."', `email` = '".$email."', `number` = '".$number."' WHERE `phploginlist`.`id` = ".$_GET['id'];
$conn->query($sql);

if (isset($_POST['submit'])) header("location: view.php?id=".$_GET['id']);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
UPDATE DETAILS
<form method="post">
First Name: <input type="text" name="fname"><br>
Last Name: <input type="text" name="lname"><br>
Email: <input type="text" name="email"><br>
Password: <input type="password" name="password"><br>
Number: <input type="text" name="number"><br>
<input type="submit" value="Update User" name="submit">
</form>
<script>
</script>

</body>
</html>