
<h2>Авторизация</h2>
<form action = "/account/login" method = "POST">
    <p>Имя</p>
    <p><input type="text" name = "user_name" class = "item-size" required></p>
    <p>Пароль</p>
    <p><input type="password" name = "password" class = "item-size" required></p>
    <button type = "submit" class = "item-size" >Войти</button>
</form>
<div class = "block-form__sign">
    <span>Создать аккаунт? <a href = "/account/register">Создать</a></span>
</div>
<p><?php if (isset($message)) {
    echo ($message);}?></p>
