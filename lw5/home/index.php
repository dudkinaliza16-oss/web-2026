<?php
require_once '../data/data_base.php';
$connection = connectDatabase();
$posts = getFormattedPosts($connection);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Home page</title>
    <link href="../css/style_home.css" rel="stylesheet">
    <script src="slider.js" defer></script>
    <script src="switch.js" defer></script>
    <script src="modalWindow.js" defer></script>
</head>
<body>
<div class="main">
    <div class="sidebar">
        <nav class="menu-bar">
            <a href="#" class="menu-bar__button home" title="Home Active">
                <img src="../item/mi_home_active.png" alt="Home Active">
            </a>
            <a href="#" class="menu-bar__button person" title="Person">
                <img src="../item/menu_item_person.png" alt="Person">
            </a>
            <a href="../add-post/index.php" class="menu-bar__button add" title="Add Post">
                <img src="../item/menu_item_add.png" alt="Add Post">
            </a>
        </nav>
    </div>
    <div class="main-feed">
        <?php
        foreach ($posts as $post) {
            include 'post_preview.php';
        }
        ?>
    </div>

</div>
<div class="image-viewer"></div>
</body>

</html>