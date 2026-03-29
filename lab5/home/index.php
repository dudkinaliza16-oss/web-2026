<?php
$posts = [
        [
                'postId' => 1,
                'avatar' => '../images/avatar/avatar_vanya.png',
                'authorName' => 'Ваня Денисов',
                'postPhoto' => ['../images/post_photo/snow_street_and_man.png',
                        ],
                'countLike' => '243',
                'description' => 'Так красиво сегодня на улице! Настоящая зима))
                 Вспоминается Бродский: «Поздно ночью, в уснувшей долине, на 
                 самом дне, в городке, занесенном снегом по ручку двери...» ',
            'timeAgo' => '2 часа назад'

        ],
        [
                'postId' => 2,
                'avatar' => '../images/avatar/avatar_liza.png',
                'authorName' => 'Лиза Дёмина',
                'postPhoto' => ['../images/post_photo/paper_and_flowers.jpg',],
                'countLike' => '534',
                'description' => '',
                'timeAgo' => '1 день назад'

        ]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home page</title>
    <link href="../css/style_home.css" rel="stylesheet">
</head>
<body>
<div>
    <nav class="menu-bar">
        <a href="#" class="menu-bar__button" title="Home Active">
            <img src="../item/mi_home_active.png" width="40" height="40" alt="Home Active">
        </a>
        <a href="#" class="menu-bar__button" title="Person">
            <img src="../item/menu_item_person.png" width="40" height="40" alt="Person">
        </a>
        <a href="#" class="menu-bar__button" title="Add Post">
            <img src="../item/menu_item_add.png" width="40" height="40" alt="Add Post">
        </a>
    </nav>
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