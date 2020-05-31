<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fb-cookie";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT c_user, xs, status FROM facebook_test_accounts ORDER BY status ASC LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo "c_user=".$row["c_user"]. ";xs=" . $row["xs"].";";
    $c_user = $row["c_user"];
    $status = $row["status"] + 1;
    $sql = "update facebook_test_accounts set status = $status where c_user = '$c_user'";
    $conn->query($sql);
  }
} else {
  echo "0 results";
}
$conn->close();
?>