<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo 'Разрешён только POST';
    exit;
}
function saveImage(string $imageBase64)
{
    $imageBase64Array = explode(';base64,', $imageBase64);
    if (count($imageBase64Array) !== 2) {
        echo 'Неверный формат base64';
        return;
    }
    $imgExtension = str_replace('data:image/', '', $imageBase64Array[0]);
    $imageDecoded = base64_decode($imageBase64Array[1]);
    if (!$imageDecoded) {
        return null;
    }
    $output_file = __DIR__ . '/../static' . '/' . "image.{$imgExtension}";
    if (file_put_contents($output_file, $imageDecoded)) {
        echo 'Image successfully saved to: ' . $output_file;
    } else {
        echo 'Failed to save image.';
    }
}

$raw = file_get_contents('php://input');
if (!$raw) {
    echo 'Ошибка считывания JSON';
    exit;
}

$data = json_decode($raw, true);
if (!$data) {
    echo 'Ошибка преобразования JSON';
    exit;
}

if (!isset($data['content'])) {
    echo 'Нет поля content';
    return;
} else {
    saveImage($data['content']);
}
