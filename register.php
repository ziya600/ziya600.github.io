<?php
include('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Şifreyi hash'liyoruz

    // Kullanıcıyı veritabanına ekle
    $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $stmt->execute([$username, $email, $password]);

    echo "Kullanıcı başarıyla kaydedildi!";
}
?>

<form method="POST">
    Kullanıcı Adı: <input type="text" name="username" required><br>
    E-posta: <input type="email" name="email" required><br>
    Şifre: <input type="password" name="password" required><br>
    <button type="submit">Kaydol</button>
</form>
