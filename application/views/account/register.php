<h2>Регистрация</h2>
<form action = "/account/register" method = "POST">
    <p>Логин</p>
    <p><input type="text" name = "user_name" class = "item-size"></p>
    <p>Пароль</p>
    <p><input type="password" name = "password" class = "item-size"></p>
    <p>Подтверждение пароля</p>
    <p><input type="password" name = "password_confirm" class = "item-size"></p>
    <button type = "submit" class = "item-size">Sign up</button>
</form>
<div class = "block-form__sign">
    <span>Already have an account? <a href = "/account/login">Sign in</a></span>
</div>


<p><?php if(isset($message)){
    echo($message);} ?></p>
