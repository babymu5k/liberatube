<link rel="stylesheet" href="/styles/general.css">
<?php
session_start();

$n=8;
function getName($n) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
 
    for ($i = 0; $i < $n; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
    }
 
    return $randomString;
}

$usr = $_POST['name'];
$salt1 = getName($n);
$salt2 = getName($n);
$pw = hash('sha512', $salt1.$_POST['pass'].$salt2);
include('config.php');
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$select = mysqli_query($conn, "SELECT * FROM login WHERE username = '".$_POST['name']."'");
if(mysqli_num_rows($select)) {
    header( "refresh:2;url=signup.html" );
    exit('<h2>This username already exists</h2>');
}

$sql = "INSERT INTO login (username, password, salt1, salt2, videoshadow)
VALUES ('$usr', '$pw', '$salt1', '$salt2', 'on')";

if ($conn->query($sql) === TRUE) {
      echo "<h2>Welcome $usr. Redirecting Soon...</h2>";
    $_SESSION['logged_in_user'] = $usr;
    $_SESSION['hashed_pass'] = $pw;
} else {
  echo "Error: <br>" . $conn->error;
}

$conn->close();

header( "refresh:2;url=index.php" );
?>