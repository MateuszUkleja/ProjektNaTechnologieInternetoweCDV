<?php
session_start();
require_once 'includes/db.php';
include 'includes/header.php';

$search = isset($_GET['search']) ? $_GET['search'] : '';
$sql = "SELECT posts.*, users.username FROM posts JOIN users ON posts.user_id = users.id";
if ($search) {
    $sql .= " WHERE title LIKE '%" . $conn->real_escape_string($search) . "%'";
}

$result = $conn->query($sql);

if ($result === false) {
    // Jeśli zapytanie SQL się nie powiodło, wyświetl komunikat o błędzie
    echo "Error: " . $conn->error;
} else {
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='post'>";
            echo "<h2 class='title-post'><a href='posts/view_post.php?id=" . $row['id'] . "'>" . $row['title'] . "</a></h2>";
            echo "<p class='post-content'>" . $row['content'] . "</p>";
            echo "<p class='post-username'>Post stworzony przez: " . $row['username'] . " w dniu " . $row['created_at'] . "</p>";
            echo "</div>";
        }
    } else {
        echo "No posts found.";
    }
}

include 'includes/footer.php';
?>
