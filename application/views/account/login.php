
<h2>Авторизация</h2>
<form action = "/account/login" method = "POST">
    <p>Логин</p>
    <p><input type="text" name = "user_name" class = "item-size"></p>
    <p>Пароль</p>
    <p><input type="password" name = "password" class = "item-size"></p>
    <button type = "submit" class = "item-size" >Sign in</button>
</form>
<div class = "block-form__sign">
    <span>Create an account? <a href = "/account/register">Sign up</a></span>
</div>
<p><?php if (isset($message)) {
    echo ($message);}?></p>
