<link rel="stylesheet" type="text/css" href="/public/styles/profile.css"/>
<script type="text/javascript" src="/public/scripts/jquery.maskedinput.js"></script>
<div class = "main-content__content__profile-edit">
    <div class = "main-content__content__profile-edit__back">
        <a href = "/profile?id=<?php echo $_SESSION['user_id']; ?>">Назад</a>
    </div>
    <div class = "main-content__content__profile-edit-item">

    <?php if (isset($message)) {?><p>
    <?php echo ($message);?></p><?php }?>
        <div class = "main-content__content__profile-img"><img src="<?php echo $user['image']; ?>" alt="user img"></div>
        <form enctype="multipart/form-data" action = "/profile_edit?id=<?php echo $_SESSION['user_id']; ?>" method = "POST">
            <input type="file" name="image" accept=".jpg, .jpeg, .png">
            <div class = "main-content__content__profile-edit-item__name">
                <p>Имя: <input type="text" name="user_name" value="<?php echo $user['user_name']; ?>"></p>
            </div>
            <fieldset>
                <legend>Контактная информация</legend>
                    <p>E-mail: <input type="email" name="email" value="<?php echo $user['email']; ?>"></p>
                    <p>Phone: <input type="tel" name="phone" id="phone" value="<?php echo $user['phone']; ?>" pattern="^\+375(\s+)?\(?(17|25|29|33|44)\)?(\s+)?[0-9]{3}-?[0-9]{2}-?[0-9]{2}$"></p>
            </fieldset>

            <fieldset>
                <legend>Смена пароля</legend>
                    <p>Старый пароль: <input type="password" name="old_password"></p>
                    <p>Новый пароля: <input type="password" name="new_password"></p>
                    <p>Подтверждение пароля: <input type="password" name="confirm_password"></p>
            </fieldset>

                <div class = "main-content__content__profile-edit__button">
                    <button type = "submit" class = "" >Сохранить</button>
                </div>
        </form>
    </div>
</div>

<script>
$("#phone").mask("+375(99)999-99-99");
</script>