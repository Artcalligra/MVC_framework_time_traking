<link rel="stylesheet" type="text/css" href="/public/styles/profile.css"/>
<div class = "main-content__content__profile">
    <div class = "main-content__content__profile__back">
        <a href = "/profile?id=<?php echo $_SESSION['user_id']; ?>">Назад</a>
    </div>
    <div class = "main-content__content__profile-item">
        <div class = "main-content__content__profile-item__name">
            <h2><?php echo $user['user_name']; ?></h2>
        </div>
            <p><?php if (isset($message)) {
    echo ($message);}?></p>
        <div class = "main-content__content__profile-img"><img src="<?php echo $user_img ?>" alt="user img"></div>
        <form enctype="multipart/form-data" action = "/profile?id=<?php echo $_SESSION['user_id']; ?>" method = "POST">
            <input type="file" name="image" accept=".jpg, .jpeg, .png">
            <fieldset>
                <legend>Контактная информация</legend>
                    <p>E-mail: <input type="email" name="email"></p>
                    <p>Phone: <input type="tel" id="phone" name="phone" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}-[0-9]{2}-[0-9]{2}" value = "375"></p>
            </fieldset>

            <fieldset>
                <legend>Смена пароля</legend>
                    <p>Старый пароль: <input type="password" name="old_password"></p>
                    <p>Новый пароля: <input type="password" name="new_password"></p>
                    <p>Подтверждение пароля: <input type="password" name="confirm _password"></p>                 
            </fieldset>

                <div class = "main-content__content__profile__button">
                    <button type = "submit" class = "" >Сохранить</button>
                </div>
        </form>
    </div>
</div>