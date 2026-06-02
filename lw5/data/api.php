<?php
function connectDatabase(): PDO
{
    $dsn = 'mysql:host=127.0.0.1;dbname=blog;charset=utf8mb4';
    $user = 'php-course-app';
    $password = 'gX5t2UUbBn';
    return new PDO($dsn, $user, $password);
}

$method = $_SERVER['REQUEST_METHOD'];
if ($method == 'POST') {
    $connection = connectDatabase();
    processPostRequest($connection);
} else {
    http_response_code(405);
}
function processPostRequest(PDO $connection): void
{
    if (!isset($_POST['data'])) {
        http_response_code(400);
        echo 'Ошибка: Отсутствуют данные запроса (не передан параметр data).';
        return;
    }
    $json = $_POST['data'];
    $data = json_decode($json, true);
    if ($data === null) {
        http_response_code(400);
        echo 'Ошибка: Некорректный формат JSON.';
        return;
    }
    if (empty($data['user_id']) || empty($data['description'])) {
        http_response_code(400);
        echo 'Ошибка: Некорректные данные. Обязательные поля user_id или description  пусты.';
        return;
    }
    if (!isset($_FILES['images']) || empty($_FILES['images']['name'])) {
        http_response_code(400);
        echo 'Ошибка: Нельзя создать пост без фотографий.';
        return;
    }
    $imagePaths = saveUploadedImages($_FILES['images']);
    if (empty($imagePaths)) {
        http_response_code(400);
        echo 'Ошибка: Ни одно изображение не было загружено. Пост не создан.';
        return;
    }
    $postId = savePostToDatabase($connection, $data);
    foreach ($imagePaths as $position => $path) {
        saveImageToDatabase($connection, $postId, $path, $position + 1);
    }
    http_response_code(200);
    echo 'Успешно! ID нового поста: ' . $postId;
}

function saveUploadedImages(array $files): array
{
    $pathsForDatabase = [];
    $uploadDir = __DIR__ . '/../images/';

    if (is_array($files['name'])) {
        $names = $files['name'];
    } else {
        $names = [$files['name']];
    }

    if (is_array($files['tmp_name'])) {
        $tmpNames = $files['tmp_name'];
    } else {
        $tmpNames = [$files['tmp_name']];
    }

    foreach ($names as $index => $name) {
        if (($name != '') && ($name != null) && ($name != [])) {
            $fileName = time() . '_' . $index . '_' . basename($name);
            $fullPathOnDisk = $uploadDir . $fileName;
            if (move_uploaded_file($tmpNames[$index], $fullPathOnDisk)) {
                $pathsForDatabase[] = '/images/' . $fileName;
            }
        }
    }
    return $pathsForDatabase;
}

function savePostToDatabase(PDO $connection, array $postParams): int
{
    $query = <<<SQL
        INSERT INTO posts (user_id, description)
        VALUES (:user_id, :description)
    SQL;
    $statement = $connection->prepare($query);
    $statement->execute([
        ':user_id' => $postParams['user_id'],
        ':description' => $postParams['description']// проверить наличие и корректносьт
    ]);
    return (int)$connection->lastInsertId();
}

function saveImageToDatabase(PDO $connection, int $postId, string $imagePath, int $position): void
{
    $query = <<<SQL
        INSERT INTO post_images (post_id, image_path, position)
        VALUES (:post_id, :image_path, :position)
    SQL;
    $statement = $connection->prepare($query);
    $statement->execute([
        ':post_id' => $postId,
        ':image_path' => $imagePath,
        ':position' => $position
    ]);
}