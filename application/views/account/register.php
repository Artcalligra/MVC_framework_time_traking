<h2>Регистрация</h2>
<?php if (isset($message)) {?><p>
    <?php echo ($message);?></p><?php }?>
<form action = "/account/register" method = "POST">
    <div class="form-group">
        <label for="registerUserName">Имя</label>
        <input type="text" name = "user_name" class="form-control item-size" id="registerUserName" placeholder="Введите имя" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{1,20}$" title="до 20 символов (буквы, цифры), первый симлов обязательно буква" required>
    </div>
    <div class="form-group">
        <label for="registerUserEmail">Email</label>
        <input type="email" name = "email" class="form-control item-size" id="registerUserEmail" aria-describedby="emailHelp" placeholder="Введите email" required>
    </div>
    <div class="form-group">
        <label for="registerUserName">Пароль</label>
        <input type="password" name = "password" class="form-control item-size" id="registerUserName" placeholder="Введите пароль" pattern="^(?=.*\d)(?=.*[a-zA-Z])(?!.*\s).{5,}$" title="от 5 символов (буквы + цифры), обязательно одна заглавная буква" required>
    </div>
    <div class="form-group">
        <label for="registerUserName">Подтверждение пароля</label>
        <input type="password" name = "password_confirm" class="form-control item-size" id="registerUserName" placeholder="Повторите пароль" pattern="^(?=.*\d)(?=.*[a-zA-Z])(?!.*\s).{5,}$"  title="от 5 символов (буквы + цифры), обязательно одна заглавная буква" required>
    </div><!-- "^(?=.*\d)(?=.*[a-zA-Z])(?=.*[A-Z])(?!.*\s).{5,}$" -->

    <button type = "submit" class = "item-size">Зарегистрироваться</button>
</form>
<div class = "block-form__sign">
    <span>У вас есть аккаунт? <a href = "/account/login">Войти</a></span>
</div>

