<?php
function connectDatabase(): PDO {
    $dsn = 'mysql:host=127.0.0.1;dbname=blog;charset=utf8mb4';
    $user = 'php-course-app';
    $password = 'gX5t2UUbBn';

    return new PDO($dsn, $user, $password);
}
function findPostsInDatabase(PDO $connection): array {
    $query = <<<SQL
        SELECT
            posts.id AS post_id,
            posts.user_id,
            posts.likes_count,
            posts.description,
            posts.posted_at,
            post_images.image_path,    
            post_images.position
        FROM posts INNER JOIN post_images ON posts.id = post_images.post_id
    SQL;
    $statement = $connection->query($query);
    $statement = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $statement;
}

