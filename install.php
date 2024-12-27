<?php
include('db.php');

$sql = "
CREATE DATABASE IF NOT EXISTS ctf_solutions;
USE ctf_solutions;

-- Kullanıcılar tablosu
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Çözümler tablosu
CREATE TABLE IF NOT EXISTS solutions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    user_id INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
);
";

try {
    // Veritabanı ve tabloları oluştur
    $pdo->exec($sql);
    echo "Veritabanı ve tablolar başarıyla oluşturuldu!";
} catch (PDOException $e) {
    echo "Veritabanı oluşturulurken hata oluştu: " . $e->getMessage();
}
?>
