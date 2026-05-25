USE blog;
INSERT INTO users(
        name,
        surname,
        username,
        email,
        password,
        avatar_url)
VALUES (
        'Ivan',
        'Ivanov',
        '@ivan123',
        'ivan@test.com',
        '123',
        '../images/avatar/avatar_vanya.png'
       ),
       (
        'Лиза',
        'Дёминова',
        '@liza123',
        'liza@test.com',
        '123',
        '../images/avatar/avatar_liza.png'
       );