
<h2>Авторизация</h2>
<form action = "/account/login" method = "POST">
    <div class="form-group">
        <label for="loginUserName">Имя</label>
        <input type="text" name = "user_name" class="form-control item-size" id="loginUserName" placeholder="Введите имя" required>
    </div>
    <div class="form-group">
        <label for="loginUserName">Пароль</label>
        <input type="password" name = "password" class="form-control item-size" id="loginUserName" placeholder="Введите пароль" required>
    </div>
    <!-- <p>Имя</p>
    <p><input type="text" name = "user_name" class = "item-size" required></p> 
    <p>Пароль</p>
    <p><input type="password" name = "password" class = "item-size" required></p>-->
    <button type = "submit" class = "btn item-size" >Войти</button>
</form>
<div class = "block-form__sign">
    <span>Создать аккаунт? <a href = "/account/register">Создать</a></span>
</div>
<p><?php if (isset($message)) {
    echo ($message);}?></p>
