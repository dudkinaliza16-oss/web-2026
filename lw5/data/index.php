<?php
require_once './data_base.php';
$connection = connectDatabase();
$posts = getFormattedPosts($connection);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="RU">
    <title>Posts</title>
    <link href="style_home.css" rel="stylesheet">
</head>
<body>
<div class="main">
    <div class="sidebar">
        <nav class="menu-bar">
            <a href="#" class="menu-bar__button home" title="Home Active">
                <img src="item/mi_home_active.png" alt="Home Active">
            </a>
            <a href="#" class="menu-bar__button person" title="Person">
                <img src="item/menu_item_person.png" alt="Person">
            </a>
            <a href="#" class="menu-bar__button add" title="Add Post">
                <img src="item/menu_item_add.png" alt="Add Post">
            </a>
        </nav>
    </div>
    <div class="main-feed">
        <?php foreach ($posts as $post): ?>
            <div class="post-user">
                <div class="post-user__header">
                    <div class="header__name-avatar">
                        <img src="<?= $post['author_avatar'] ?>" alt="Avatar user">
                        <span class="header__name"><?= $post['author_name']?> <?=$post['author_surname'] ?></span>
                    </div>
                </div>
                <div class="post-user__photo-area">
                    <?php if (count($post['photos']) > 1): ?>
                        <div class="post-user__count-photo">
                            <p class="post-user__count-photo-text"> 1/<?= count($post['photos']) ?> </p>
                        </div>
                        <button class="post-user__button-photo left">
                            <img src="item/button_left.png" width="10" height="10" alt="Arrow left">
                        </button>
                        <button class="post-user__button-photo right">
                            <img src="item/button_right.png" width="10" height="10" alt="Arrow right">
                        </button>
                    <?php endif; ?>
                        <?php foreach ($post['photos'] as $photo): ?>
                            <img class = 'post-user__photo' src="<?= htmlentities($photo) ?>"
                                 alt="Photo"
                                 >
                        <?php endforeach; ?>
                </div>
                <button class="post-user__like">
                    <img src="item/like.png" class="post-user__like-photo" alt="Like"> <?= $post['likes_count'] ?>
                </button>
                <p class="post-user__text">
                    <?= $post['description'] ?>
                </p>
                <p class="post-user__time"> <?= $post['posted_at'] ?> </p>
            </div>
        <?php endforeach; ?>
    </div>
</div>
</body>
</html>
