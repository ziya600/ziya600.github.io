<?php
include('db.php');
session_start();

if (!isset($_SESSION['user_id'])) {
    echo "Lütfen giriş yapın!";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $user_id = $_SESSION['user_id'];

    // Çözümü veritabanına ekle
    $stmt = $pdo->prepare("INSERT INTO solutions (title, description, user_id) VALUES (?, ?, ?)");
    $stmt->execute([$title, $description, $user_id]);

    echo "Çözüm başarıyla eklendi!";
}
?>

<form method="POST">
    Başlık: <input type="text" name="title" required><br>
    Açıklama: <textarea name="description" required></textarea><br>
    <button type="submit">Çözüm Ekle</button>
</form>
