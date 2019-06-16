<?php
use Doctrine\DBAL\Connection;

if (!\defined('RUNNER')) {
    die("Direct execution not allowed");
}
$reqField = ['name', 'email'];
foreach($reqField as $value) {
    if(!isset($_POST[$value]) || \strlen($_POST[$value]) == 0) {
        die("Missing Parameter");
    }
}
$name = $_POST['name'];
$email = $_POST['email'];

if(!\filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Invalid email address");
}

/**
 * @var Connection $conn
 */
$conn = $conn;

$stmt = $conn->prepare("INSERT INTO dbo.guestbook (name, email) VALUES (?, ?)");
$stmt->bindValue(1, $name);
$stmt->bindValue(2, $email);
if(!$stmt->execute()) {
    die("Internal Server Error");
}
