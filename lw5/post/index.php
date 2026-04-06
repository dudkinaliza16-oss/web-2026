<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home page</title>
    <link href="../css/style_home.css" rel="stylesheet">
</head>
<body>
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

if (isset($_GET['postId'])) {
    $id = $_GET['postId'];
} else {
    $id = null;
}
$post = null;
foreach ($posts as $p) {
    if ($p['postId'] == $id) {
        $post = $p;
        break;
    }
}
?>
<?php if ($post): ?>
    <div class="post-user">
        <div class="post-user__header">
            <img src="<?= $post['avatar'] ?>" width="32" height="32" alt="Avatar user">
            <p class="header__name"><?= $post['authorName'] ?></p>
        </div>
        <?php if (count($post['postPhoto']) > 1): ?>
            <div class="post-user__count-photo">
                <p class="post-user__count-photo-text"> 1/<?= count($post['postPhoto']) ?> </p>
            </div>
            <button class="post-user__button-photo left">
                <img src="../item/button_left.png" width="10" height="10" alt="Arrow left">
            </button>
            <button class="post-user__button-photo right">
                <img src="../item/button_right.png" width="10" height="10" alt="Arrow right">
            </button>
        <?php endif; ?>
        <?php foreach ($post['postPhoto'] as $photo): ?>
            <img src="<?= $photo ?>" class="post-user__photo" alt="User photo">
        <?php endforeach; ?>
        <button class="post-user__like">
            <img src="../item/like.png" class="post-user__like-photo" alt="Like"> <?= $post['countLike'] ?>
        </button>
        <p class="post-user__text">
            <?= $post['description'] ?>
        </p>
        <p class="post-user__time"> <?= date("Y-m-d H:i:s", $post['timeAgo']) ?> </p>
    </div>
<?php endif;
if ($post === null) {
    header("HTTP/1.1 404 NotFound");
    print ("Error: Пост не найден");
} ?>

</body>
</html>