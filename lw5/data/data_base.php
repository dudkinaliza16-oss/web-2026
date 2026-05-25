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
            posts.description,
            posts.likes_count,
            posts.posted_at,
            users.name AS author_name,
            users.surname AS author_surname,          
            users.avatar_url AS author_avatar,
            post_images.image_path,    
            post_images.position      
        FROM posts INNER 
            JOIN post_images ON posts.id = post_images.post_id
            JOIN users ON posts.user_id = users.id
            ORDER BY posts.posted_at DESC, posts.id DESC
    SQL;
    $statement = $connection->query($query);
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

function getFormattedPosts(PDO $connection): array {
    $rawPosts = findPostsInDatabase($connection);
    $posts = [];
    foreach ($rawPosts as $row) {
        $id = $row['post_id'];
        if (!isset($posts[$id])) {
            $posts[$id] = [
                "author_name" => $row['author_name'],
                "author_surname" => $row['author_surname'],
                "author_avatar" => $row['author_avatar'],
                "user_id" => $id,
                "likes_count" => $row['likes_count'],
                "description" => $row['description'],
                "posted_at" => $row['posted_at'],
                "photos" => [],
            ];
        }
        $posts[$id]['photos'][] = $row['image_path'];
    }
   return $posts;
}