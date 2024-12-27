<?php
include('db.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Kullanıcıyı veritabanından sorgula
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        // Giriş başarılıysa kullanıcı bilgilerini oturuma kaydet
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        header("Location: add_solution.php"); // Giriş başarılıysa çözüm ekleme sayfasına yönlendir
    } else {
        echo "E-posta veya şifre hatalı!";
    }
}
?>

<form method="POST">
    E-posta: <input type="email" name="email" required><br>
    Şifre: <input type="password" name="password" required><br>
    <button type="submit">Giriş Yap</button>
</form>
