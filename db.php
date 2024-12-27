<?php
$host = 'localhost'; // veya sunucunuzun adresi
$dbname = 'ctf_solutions';
$username = 'root'; // MySQL kullanıcı adı
$password = ''; // MySQL şifreniz

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
