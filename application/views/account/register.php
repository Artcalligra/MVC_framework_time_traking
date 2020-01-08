<h2>Регистрация</h2>
<form action = "/account/register" method = "POST">
    <div class="form-group">
        <label for="registerUserName">Имя</label>
        <input type="text" name = "user_name" class="form-control item-size" id="registerUserName" placeholder="Введите имя" required>
    </div>
    <div class="form-group">
        <label for="registerUserEmail">Email</label>
        <input type="email" name = "email" class="form-control item-size" id="registerUserEmail" aria-describedby="emailHelp" placeholder="Введите email" required>
    </div>
    <div class="form-group">
        <label for="registerUserName">Пароль</label>
        <input type="password" name = "password" class="form-control item-size" id="registerUserName" placeholder="Введите пароль" required>
    </div>
    <div class="form-group">
        <label for="registerUserName">Подтверждение пароля</label>
        <input type="password" name = "password_confirm" class="form-control item-size" id="registerUserName" placeholder="Повторите пароль" required>
    </div>

  <!--   <p>Имя</p>
    <p><input type="text" name = "user_name" class = "item-size" required></p>
    <p>E-mail</p>
    <p><input type="email" name = "email" class = "item-size" required></p>
    <p>Пароль</p>
    <p><input type="password" name = "password" class = "item-size" required></p>
    <p>Подтверждение пароля</p>
    <p><input type="password" name = "password_confirm" class = "item-size" required></p> -->
    <button type = "submit" class = "item-size">Зарегистрироваться</button>
</form>
<div class = "block-form__sign">
    <span>У вас есть аккаунт? <a href = "/account/login">Войти</a></span>
</div>


<p><?php if(isset($message)){
    echo($message);} ?></p>
