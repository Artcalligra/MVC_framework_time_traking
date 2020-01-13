<h2>Восстановление пароля</h2>
<form action = "/account/recovery" method = "POST">
    <div class="form-group">
        <label for="emailRecovery">Email</label>
        <input type="email" name = "email" class="form-control item-size" id="emailRecovery" placeholder="Введите email" required>
    </div>
<!--     <div class="form-group">
        <label for="loginUserName">Пароль</label>
        <input type="password" name = "password" class="form-control item-size" id="loginUserName" placeholder="Введите пароль" required>
    </div> -->
    <button type = "submit" class = "btn item-size" >Отправить</button>
</form>
<div class = "block-form__sign">
    <a href = "/account/login">Войти</a>
</div>
<!-- <div class = "block-form__sign">
    <span>Создать аккаунт? <a href = "/account/register">Создать</a></span>
</div> -->
<p><?php if (isset($message)) {
    echo ($message);}?></p>