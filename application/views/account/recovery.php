<h2 class="card-title text-center">Восстановление пароля</h2>
<form action = "/account/recovery" method = "POST">
    <div class="form-group">
        <label for="emailRecovery">Email</label>
        <input type="email" name = "email" class="form-control" id="emailRecovery" placeholder="Введите email" required>
    </div>
    <div class=" text-center">
        <button type = "submit" class = "btn btn btn-primary" >Отправить</button>
    </div>
</form>
<div class = "block-form__sign">
    <a href = "/account/login">Войти</a>
</div>
<!-- <div class = "block-form__sign">
    <span>Создать аккаунт? <a href = "/account/register">Создать</a></span>
</div> -->
<?php if (isset($message)) {?><p>
    <?php echo ($message);?></p><?php }?>