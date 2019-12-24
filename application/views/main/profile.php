<link rel="stylesheet" type="text/css" href="/public/styles/profile.css"/>
<div class = "main-content__content__profile">
    <div class = "main-content__content__profile__back">
        <a href = "/">На главную</a>
    </div>
    <div class = "main-content__content__profile-item">
        <div class = "main-content__content__profile-item__name">
            <h2><?php echo $user['user_name']; ?></h2>
        </div>
            <p><?php if (isset($message)) {
    echo ($message);}?></p>
        <div class = "main-content__content__profile-img"><img src="<?php echo $user['image'] ?>" alt="user img"></div>
        <form enctype="multipart/form-data" action = "/profile?id=<?php echo $_SESSION['user_id']; ?>" method = "POST">
            <fieldset>
                <legend>Контактная информация</legend>
                    <!-- <p>E-mail: <input type="email" ></p>
                    <p>Phone: <input type="tel" id="phone" name="phone" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}-[0-9]{2}-[0-9]{2}" value = "375"></p> -->
                    <div class = "main-content__content__profile-item__email">
                        <p>E-mail: <?php echo $user['email']; ?></p>
                    </div>
                    <div class = "main-content__content__profile-item__phone">
                        <p>Phone: <?php echo $user['phone']; ?></p>
                    </div>
            </fieldset>



            <!-- <div class = "main-content__content__profile__title">
                    <h3>Заголовок</h3>
                    <input type="text" name = "title" class = "item-size" value = "<?php echo $news['title']; ?>" required>
                </div>
                <div class = "main-content__content__profile__description">
                    <h3>Описание</h3>
                    <textarea rows="10" name = "description" class = "item-size"><?php echo $news['description']; ?></textarea>
                </div>
                <div class = "main-content__content__profile__image">
                    <h3>Изображение</h3>
                    <input type="file" name="image" accept=".jpg, .jpeg, .png">
                </div> -->
                <!-- <div class = "main-content__content__profile__button">
                    <button type = "submit" class = "" >Сохранить</button>
                </div> -->
        </form>

        <?php if($user['id']==$_SESSION['user_id'] || $_SESSION['rang']=='admin'){?>
            <div class = "main-content__content__profile-item__edi">
                <a href = "/profile_edit?id=<?php echo $user['id']; ?>">Редактировать</a>
            </div>
        <?php } ?>

        <!-- <div class = "main-content__content__profile-item__edit">
            <a href = "/profile_edit?id=<?php echo $user['id']; ?>">Редактировать</a>
        </div> -->
    </div>
</div>