<?php
$posts = [
        [
                'postId' => 1,
                'avatar' => '../images/avatar/avatar_vanya.png',
                'authorName' => 'Ваня Денисов',
                'authorId' => '@IvanDenisov',
                'postPhoto' => ['../images/post_photo/snow_street_and_man.png',
                        ],
                'countLike' => 243,
                'description' => 'Так красиво сегодня на улице! Настоящая зима))
                 Вспоминается Бродский: «Поздно ночью, в уснувшей долине, на 
                 самом дне, в городке, занесенном снегом по ручку двери...» ',
                'timeAgo' => 1775123280
        ],
        [
                'postId' => 2,
                'avatar' => '../images/avatar/avatar_liza.png',
                'authorName' => 'Лиза Дёмина',
                'authorId' => '@LizaDemina',
                'postPhoto' => ['../images/post_photo/paper_and_flowers.jpg',],
                'countLike' => 534,
                'description' => '',
                'timeAgo' => 1775036320
        ]
];
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Home page</title>
    <link href="../css/style_home.css" rel="stylesheet">
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
            <a href="#" class="menu-bar__button add" title="Add Post">
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
</body>
</html>