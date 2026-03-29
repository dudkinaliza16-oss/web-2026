<!DOCTYPE html>
<html lang="ru">
    <head>
        <title>Login page</title>
        <meta charset="UTF-8">
        <link href="../css/style_login.css" rel="stylesheet">
    </head>
    <body>
        <h1 class="text-entry">Войти</h1>
        <img src="../images/smile_man.png" width="462" height="501" alt="Welcome photo">
        <div class="author-field">
            <form action="#">
                <label class="author-field__text">Электропочта
                    <input type="email" name="user_email" class="author-field__input">
                </label>
                <p class="author-field__help-block">
                    Введите электропочту в формате *****@***.**</p>
                <label class="author-field__text">Пароль
                    <input type="password" name="user_password" class="author-field__input" placeholder="">
                </label>
                <button class="author-field__password-show">
                    <img src="../item/item-eye-off.png" width="24" height="24" alt="Show password">
                </button>
                <button type="submit" name="submit" class="author-field__but-cont">
                    Продолжить</button>
            </form>
        </div>
    </body>
</html>