
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aniket";

$con = mysqli_connect($servername, $username, $password, $dbname);


if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    echo "Connected";
}

$name = $_POST['name'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$description = $_POST['description'];
$dateofbirth = $_POST['dateofbirth'];
$gender = $_POST['gender'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$education = $_POST['education'];


$sql = "INSERT INTO best (name, email, username, password, description, dateofbirth, gender, address, phone, education) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($con, $sql);

if ($stmt === false) {
    die("Prepare failed: " . mysqli_error($con));
}

mysqli_stmt_bind_param($stmt, "ssssssssss", $name, $email, $username, $password, $description, $dateofbirth, $gender, $address, $phone, $education);


if (mysqli_stmt_execute($stmt)) {
    echo "Submitted";
} else {
    echo "Query failed: " . mysqli_stmt_error($stmt);
}

mysqli_stmt_close($stmt);
mysqli_close($con);

?>