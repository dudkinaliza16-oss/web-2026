<?php
require_once  './data_base.php';
$connection = connectDatabase();
$rawPosts = findPostsInDatabase($connection);
$posts = [];
foreach ($rawPosts as $row) {
    $id = $row['post_id'];
    if (isset($posts[$id]) === false) {
        $posts[$id] = [
              "user_id" => $id,
              "likes_count" => $row['likes_count'],
              "description" => $row['description'],
              "posted_at" => $row['posted_at'],
              "photos" => $row['image_path'],
        ];
    }
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="RU">
    <title>Posts</title>
</head>
<body>
<?php foreach ($posts as $post): ?>
    <div class="post">

        <div class="post-images">
            <img src="<?= htmlentities($post['photos']) ?>"
                 alt="Photo"
                 style="max-width: 200px; margin-right: 10px; display: inline-block;">
        </div>

        <p><?= htmlentities($post['description']) ?></p>

        <p>❤️ <?= (int)$post['likes_count'] ?></p>

        <span>User ID: <?= (int)$post['user_id'] ?></span><br>

        <span><?= htmlentities($post['posted_at']) ?></span>
    </div>
<?php endforeach; ?>

</body>
</html>