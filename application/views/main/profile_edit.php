<link rel="stylesheet" type="text/css" href="/public/styles/profile.css"/>
<script type="text/javascript" src="/public/scripts/jquery.maskedinput.js"></script>
<div class = "main-content__content__profile-edit">
    <div class = "main-content__content__back">
        <a href = "/profile?id=<?php echo $_SESSION['user_id']; ?>">Назад</a>
    </div>
    <div class = "main-content__content__profile-edit-item">

    <?php if (isset($message)) {?><p>
    <?php echo ($message);?></p><?php }?>
        <div class = "main-content__content__profile-img"><img src="<?php echo $user['image']; ?>" alt="user img"></div>
        <form enctype="multipart/form-data" action = "/profile_edit?id=<?php echo $_SESSION['user_id']; ?>" method = "POST">
            
            <div class = "main-content__content__profile-edit-item__image form-group row pt-2">
                <div class="col-7">
                    <input type="file" name="image" accept=".jpg, .jpeg, .png">
                </div>
            </div>
            <div class = "main-content__content__profile-edit-item__name form-group row">
                <label for="user-name" class="col-2 col-form-label">Имя:</label>
                <div class="col-5">
                    <input type="text" class = "form-control" id = "user-name" name="user_name" value="<?php echo $user['user_name']; ?>">
                </div>
            </div>
            <fieldset class="form-group">
                <legend>Контактная информация</legend>
                    <div class = "main-content__content__profile-edit-item__email row mb-2">
                        <label for="user-email" class="col-2 col-form-label">E-mail:</label>
                        <div class="col-5">
                            <input type="email" class = "form-control" id = "user-email" name="email" value="<?php echo $user['email']; ?>">
                        </div>
                    </div>
                    <div class = "main-content__content__profile-edit-item__phone row">
                        <label for="user-phone" class="col-2 col-form-label">Phone:</label>
                        <div class="col-5">
                            <input type="tel" name="phone" class = "form-control" id = "user-phone" value="<?php echo $user['phone']; ?>" pattern="^\+375(\s+)?\(?(17|25|29|33|44)\)?(\s+)?[0-9]{3}-?[0-9]{2}-?[0-9]{2}$">
                        </div>
                    </div>
            </fieldset>

            <fieldset class="form-group">
                <legend>Смена пароля</legend>
                    <div class = "main-content__content__profile-edit-item__old-password row mb-2">
                        <label for="user-old-password" class="col-5 col-form-label">Старый пароль:</label>
                        <div class="col-5">
                            <input type="password" class = "form-control" id = "user-old-password" name="old_password">
                        </div>
                    </div>
                    <div class = "main-content__content__profile-edit-item__new-password row mb-2">
                        <label for="user-new-password" class="col-5 col-form-label">Старый пароль:</label>
                        <div class="col-5">
                            <input type="password" class = "form-control" id = "user-new-password" name="new_password">
                        </div>
                    </div>
                    <div class = "main-content__content__profile-edit-item__confirm-password row">
                        <label for="user-confirm-password" class="col-5 col-form-label">Подтверждение пароля:</label>
                        <div class="col-5">
                            <input type="password" class = "form-control" id = "user-confirm-password" name="confirm_password">
                        </div>
                    </div>
            </fieldset>

                <div class = "main-content__content__profile-edit__button">
                    <button type = "submit" class = "btn btn-primary" >Сохранить</button>
                </div>
        </form>
    </div>
</div>

<script>
$("#user-phone").mask("+375(99)999-99-99");
</script>