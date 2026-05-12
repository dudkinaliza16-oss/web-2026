USE blog;

INSERT INTO posts (
    user_id,
    likes_count,
    description,
    posted_at
)
VALUES
    (
        1,
        100,
        'Сейчас зима, всех с новым годом',
        FROM_UNIXTIME(1774030320)
    ),
    (
        2,
        320,
        'А совсем скоро будет лето',
        FROM_UNIXTIME(1774036320)
    ),
    (
        1,
        270,
        'Ещё один пост про время года, какая классная весна',
        FROM_UNIXTIME(1775096320)
    );