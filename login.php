<?php
// INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `password`, `number`) VALUES (NULL, 'fname', 'lname', 'email@email.com', MD5('1234'), '1234567');
$loggedin = false;

if(isset($_POST['email']) && isset($_POST['password'])){
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "phplogin";
$conn = new mysqli($servername, $username, $password,$dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


$sql = "SELECT * FROM `phploginlist` WHERE `email` LIKE '".$_POST['email']."'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        if($row['password']==md5($_POST['password'])) $loggedin = true;
    }
}
if($loggedin){
	header("location: users.php");
} else {
echo 'Invalid login';
}
}


?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
<form method="post">
	Email: <input type="text" name="email"><br>
	Password: <input type="password" name="password"><br>
	<input type="submit" value="Login">
</form>
<script>
</script>

</body>
</html>