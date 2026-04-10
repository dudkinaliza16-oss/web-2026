<?php
if (isset($post)): ?>
    <div class="post-user">
        <div class="post-user__header">
            <div class="header__name-avatar">
                <img src="<?= htmlspecialchars($post['avatar']) ?>" width="32" height="32" alt="Avatar user">
                <p class="header__name"><?= htmlspecialchars($post['authorName']) ?></p>
            </div>

            <button class='post-user__edit'>
                <?php if ($post['authorId'] == '@IvanDenisov'): ?>
                    <img src="../item/item_edit.png" width="24" height="24" alt="item_edit">
                <?php endif; ?>
            </button>
        </div>

        <div class="post-user__photo-area">
            <?php //if (count($post['postPhoto']) > 1): ?>
            <div class="post-user__count-photo">
                <p class="post-user__count-photo-text"> 1/<?= count($post['postPhoto']) ?> </p>
            </div>
            <button class="post-user__button-photo left">
                <img src="../item/button_left.png" width="10" height="10" alt="Arrow left">
            </button>
            <button class="post-user__button-photo right">
                <img src="../item/button_right.png" width="10" height="10" alt="Arrow right">
            </button>
            <!--        --><?php //endif; ?>
            <?php foreach ($post['postPhoto'] as $photo): ?>
                <a title="Post" href="../post/<?= htmlspecialchars($post['postId']) ?>">
                    <img src="<?= $photo ?>" class="post-user__photo" alt="User photo">
                </a>
            <?php endforeach; ?>
        </div>
        <button class="post-user__like">
            <img src="../item/like.png" class="post-user__like-photo" alt="Like"> <?= $post['countLike'] ?>
        </button>
        <?php if ($post['description']): ?>
            <p class="post-user__text">
                <?= htmlspecialchars($post['description']) ?>
            </p>
            <?php if (htmlspecialchars(strlen($post['description']) > 245)): ?>
            <a class="post-user__more"> ещё </a>
            <?php endif; ?>
        <?php endif; ?>
        <p class="post-user__time"> <?= date("Y-m-d H:i:s", $post['timeAgo']) ?> </p>
    </div>
<?php endif; ?>