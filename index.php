<?php
// Veritabanı bağlantısını yapıyoruz
include('db.php');

// Çözümleri veritabanından çekiyoruz
$stmt = $pdo->query("SELECT solutions.title, solutions.description, users.username FROM solutions JOIN users ON solutions.user_id = users.id");
$solutions = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CTF Çözümleri</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>CTF Çözümleri</h1>

    <div>
        <h2>Kullanıcı Girişi</h2>
        <form action="login.php" method="POST">
            E-posta: <input type="email" name="email" required><br>
            Şifre: <input type="password" name="password" required><br>
            <button type="submit">Giriş Yap</button>
        </form>

        <p>Hesabınız yok mu? <a href="register.php">Kaydolun</a></p>
    </div>

    <div>
        <h2>Çözümler</h2>
        <?php
        if ($solutions) {
            foreach ($solutions as $solution) {
                echo "<div class='solution'>";
                echo "<h3>" . htmlspecialchars($solution['title']) . "</h3>";
                echo "<p>" . nl2br(htmlspecialchars($solution['description'])) . "</p>";
                echo "<small>Paylaşan: " . htmlspecialchars($solution['username']) . "</small>";
                echo "</div>";
            }
        } else {
            echo "<p>Henüz hiç çözüm paylaşılmamış.</p>";
        }
        ?>
    </div>

    <p><a href="add_solution.php">Yeni Çözüm Ekle</a></p>
</body>
</html>
