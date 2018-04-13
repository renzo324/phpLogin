<!DOCTYPE html>
<html>
<head>
	<title>Users</title>
</head>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "phplogin";
$conn = new mysqli($servername, $username, $password,$dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


$sql = "SELECT * FROM `phploginlist`";
$result = $conn->query($sql);

if ($result->user_number > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<a href='view.php?id=".$row['id']."'>view</a> | <a href='edit.php?id=".$row['id']."'>edit</a> |  ".$row['fname']." ".$row['lname']."<br>";
    }
}	
?>
<br>
<a href="register.php">Add user</a>


<script>
</script>

</body>
</html>