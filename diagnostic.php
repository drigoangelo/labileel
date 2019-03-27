
<?php
//header('Location:./login/');
echo 'Versão Atual do PHP: ' . phpversion();

echo '<br>';

$servername = "lab-ileel-mysql";
$username = "app_lab";
$password = "espectograma";
$dbname = "dataset";
$dbport = 3306;


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname, $dbport);

// Check connection
if ($conn->connect_error) {
    die("<br>Connection failed: " . $conn->connect_error);
}
echo "<br> Connected successfully";
?>

</html>