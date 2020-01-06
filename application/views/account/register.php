<h2>Регистрация</h2>
<form action = "/account/register" method = "POST">
    <p>Имя</p>
    <p><input type="text" name = "user_name" class = "item-size" required></p>
    <p>E-mail</p>
    <p><input type="email" name = "email" class = "item-size" required></p>
    <p>Пароль</p>
    <p><input type="password" name = "password" class = "item-size" required></p>
    <p>Подтверждение пароля</p>
    <p><input type="password" name = "password_confirm" class = "item-size" required></p>
    <button type = "submit" class = "item-size">Зарегистрироваться</button>
</form>
<div class = "block-form__sign">
    <span>У вас есть аккаунт? <a href = "/account/login">Войти</a></span>
</div>


<p><?php if(isset($message)){
    echo($message);} ?></p>
