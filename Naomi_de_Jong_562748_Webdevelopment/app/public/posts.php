

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Write something in our guestbook!</h1>
<form method="post">
    <div class = "form-field">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name">
    </div>
    <div class = "form-field">
        <label for="message">Message:</label>
        <textarea name="message" id="message"></textarea>
    </div>
    <div class = "form-field">
        <input type="submit" value="Send">
    </div>
</form>
<?php
require_once 'config.php';
try {
    $connection = new PDO("mysql:host=$db_host;dbname=$db_name", $db_username, $db_password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
$result = $connection->query('SELECT * FROM posts');

if($_SERVER ['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $message = htmlspecialchars($_POST['message']);
    $ip = $_SERVER['REMOTE_ADDR'];
    $stmt = $connection->prepare("INSERT INTO posts (name, message, ip_address, posted_at) VALUES (:name, :message, :ip_address, now())");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':message', $message);
    $stmt->bindParam(':ip_address', $ip);
    $stmt->execute();
}
?>
    <h1>Posts</h1>
<?php foreach ($result as $post){ ?>
        <div class="post">
            <h3><?= $post['name']; ?></h3>
            <p><?= $post['message']; ?>
            <p>Posted at: <?= $post['posted_at']; ?></p>
            <p>IP: <?= $post['ip_address']; ?></p>
            <p>Posted at: <?= $post['posted_at']; ?></p>
            <button type="button">Update</button>
        </div>
<?php } ?>
</body>
</html>
