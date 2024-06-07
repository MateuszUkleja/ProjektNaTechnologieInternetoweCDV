<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('location: login.php');
    exit;
}
require_once 'includes/db.php';
include 'includes/header.php';

$title = $content = "";
$title_err = $content_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty(trim($_POST["title"]))) {
        $title_err = "Please enter a title.";
    } else {
        $title = trim($_POST["title"]);
    }

    if (empty(trim($_POST["content"]))) {
        $content_err = "Please enter the content.";
    } else {
        $content = trim($_POST["content"]);
    }

    if (empty($title_err) && empty($content_err)) {
        $sql = "INSERT INTO posts (title, content, user_id) VALUES (?, ?, ?)";
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("ssi", $param_title, $param_content, $param_user_id);

            $param_title = $title;
            $param_content = $content;
            $param_user_id = $_SESSION["id"];

            if ($stmt->execute()) {
                header("location: index.php");
            } else {
                echo "Something went wrong. Please try again later.";
            }
        }

        $stmt->close();
    }

    $conn->close();
}
?>

<div class="wrapper">
    <h2 class="form-title">Nowy Post</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="form-group <?php echo (!empty($title_err)) ? 'has-error' : ''; ?>">
            <label class="form-label">Tytuł</label>
            <input type="text" name="title" class="form-control" value="<?php echo $title; ?>">
            <span class="help-block"><?php echo $title_err; ?></span>
        </div>
        <div class="form-group <?php echo (!empty($content_err)) ? 'has-error' : ''; ?>">
            <label class="form-label">Content</label>
            <textarea name="content" class="form-control"><?php echo $content; ?></textarea>
            <span class="help-block"><?php echo $content_err; ?></span>
        </div>
        <div class="form-group">
            <input type="submit" class="login-btn" value="Submit">
        </div>
    </form>
</div>

<?php include 'includes/footer.php'; ?>
