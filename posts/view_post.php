<?php
session_start();
require_once '../includes/db.php';
include '../includes/header.php';

if (!isset($_GET['id'])) {
    header("location: index.php");
    exit;
}

$post_id = $_GET['id'];
$sql_post = "SELECT posts.*, users.username FROM posts JOIN users ON posts.user_id = users.id WHERE posts.id = ?";
$stmt_post = $conn->prepare($sql_post);
$stmt_post->bind_param("i", $post_id);
$stmt_post->execute();
$result_post = $stmt_post->get_result();
$row_post = $result_post->fetch_assoc();
$stmt_post->close();

if ($result_post->num_rows === 0) {
    echo "Post not found.";
} else {
    echo "<div class='post'>";
    echo "<h2 class='comend-title'>" . $row_post['title'] . "</h2>";
    echo "<p class='post-content'>" . $row_post['content'] . "</p>";
    echo "<p class='post-username'>Posted by: " . $row_post['username'] . " at " . $row_post['created_at'] . "</p>";
    echo "</div>";

    
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
        $comment_content = $_POST["comment_content"];
        $user_id = $_SESSION["id"];

        $sql_insert_comment = "INSERT INTO comments (post_id, user_id, content) VALUES (?, ?, ?)";
        $stmt_insert_comment = $conn->prepare($sql_insert_comment);
        $stmt_insert_comment->bind_param("iis", $post_id, $user_id, $comment_content);

        if ($stmt_insert_comment->execute()) {
            
        } else {
            
        }

        $stmt_insert_comment->close();
    }

    echo "<h3 class='comments-title'>Komentarze</h3>";
    $sql_comments = "SELECT comments.*, users.username FROM comments JOIN users ON comments.user_id = users.id WHERE post_id = ?";
    $stmt_comments = $conn->prepare($sql_comments);
    $stmt_comments->bind_param("i", $post_id);
    $stmt_comments->execute();
    $result_comments = $stmt_comments->get_result();
    $stmt_comments->close();

    if ($result_comments->num_rows > 0) {
        while ($row_comment = $result_comments->fetch_assoc()) {
            echo "<div class='comment'>";
            echo "<p class='comment-content'>" . $row_comment['content'] . "</p>";
            echo "<p class='post-username'>Skomentowany przez: " . $row_comment['username'] . " w dniu " . $row_comment['created_at'] . "</p>";
            echo "</div>";
        }
    } else {
        echo "<p class='comment-null'>Brak komentarzy</p>";
    }

    
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
        echo "<div class='comment-form'>";
        echo "<h3>Dodaj komentarz:</h3>";
        echo "<form action='' method='post'>";
        echo "<textarea name='comment_content' placeholder='Wpisz swój komentarz...' rows='4' cols='50'></textarea><br>";
        echo "<input type='submit' value='Dodaj' class='add-commend'>";
        echo "</form>";
        echo "</div>";
    } else {
        echo "<p>Please <a href='login.php'>login</a> to add a comment.</p>";
    }
}

include '../includes/footer.php';
?>
