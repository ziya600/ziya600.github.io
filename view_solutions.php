<?php
include('db.php');

$stmt = $pdo->query("SELECT solutions.title, solutions.description, users.username FROM solutions JOIN users ON solutions.user_id = users.id");
$solutions = $stmt->fetchAll();

foreach ($solutions as $solution) {
    echo "<h2>" . htmlspecialchars($solution['title']) . "</h2>";
    echo "<p>" . nl2br(htmlspecialchars($solution['description'])) . "</p>";
    echo "<small>Paylaşan: " . htmlspecialchars($solution['username']) . "</small><hr>";
}
?>
