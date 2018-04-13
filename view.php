<!DOCTYPE html>
<html>
<head>
	<title>View</title>
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


$sql = "SELECT * FROM `phploginlist` WHERE `id` LIKE '".$_GET['id']."'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "ID: ".$_GET['id']."<br>FIRST NAME: ".$row['fname']."<br>LAST NAME: ".$row['lname']."<br>EMAIL: ".$row['email']."<br>NUMBER: ".$row['number']."<br><br><a href='delete.php?id=".$row['id']."'>Delete Account</a>";
    }
}



?>

</body>
</html>