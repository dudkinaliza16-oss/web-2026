<?php
if (isset($post)): ?>
    <div class="post-user">
        <div class="post-user__header">
            <div class="header__name-avatar">
                <img src="<?= $post['author_avatar'] ?>" alt="Avatar user">
                <span class="header__name"><?= $post['author_name'] ?> <?= $post['author_surname'] ?></span>
            </div>
        </div>
        <div class="post-user__photo-area">
            <?php if (count($post['photos']) > 1): ?>
                <div class="post-user__count-photo">
                    <span class="post-user__count-photo-text"> 1/<?= count($post['photos']) ?> </span>
                </div>
                <button class="post-user__button-photo left">
                    <img src="../item/button_left.png" width="10" height="10" alt="Arrow left">
                </button>
                <button class="post-user__button-photo right">
                    <img src="../item/button_right.png" width="10" height="10" alt="Arrow right">
                </button>
            <?php endif; ?>
            <?php foreach ($post['photos'] as $photo): ?>
                <img class='post-user__photo' src="<?= htmlentities($photo) ?>"
                     alt="Photo"
                >
            <?php endforeach; ?>
        </div>
        <button class="post-user__like">
            <img src="../item/like.png" class="post-user__like-photo" alt="Like"> <?= $post['likes_count'] ?>
        </button>
        <div class="post-user__container">
            <p class="post-user__text">
                <?= $post['description'] ?>
            </p>
            <button class="post-user__toggle">
                Ещё
            </button>
        </div>
        <p class="post-user__time"> <?= $post['posted_at'] ?> </p>
    </div>
<?php endif; ?>