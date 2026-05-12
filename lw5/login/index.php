<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Login page</title>
    <meta charset="UTF-8">
    <link href="../css/style_login.css" rel="stylesheet">
</head>
    <body>
        <div class="main-area">
            <div class="main-area__block-photo">
                <h1 class="block-photo__text-entry">Войти</h1>
                <img class="block-photo__photo" src="../images/smile_man.png" alt="Welcome photo">
            </div>
            <form class="author-field" action="#">
                <label class="author-field__text">
                    Электропочта
                    <input type="email" name="user_email" class="author-field__input">
                </label>
                <p class="author-field__help-block">
                    Введите электропочту в формате *****@***.**
                </p>
                <div class="author-field__password-block">
                    <label class="author-field__text">
                        Пароль
                        <input type="password" name="user_password" class="author-field__input">
                    </label>
                    <button class="author-field__password-show">
                        <img src="../item/item-eye-off.png" alt="Show password">
                    </button>
                </div>
                <button type="submit" name="submit" class="author-field__but-cont">
                    Продолжить
                </button>
            </form>
        </div>
    </body>
</html>