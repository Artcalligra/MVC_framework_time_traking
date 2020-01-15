<link rel="stylesheet" type="text/css" href="/public/styles/profile.css"/>
<div class = "main-content__content__profile">
    <div class = "main-content__content__profile__back">
        <a href = "/">На главную</a>
    </div>
    <div class = "main-content__content__profile-item">
        <div class = "main-content__content__profile-item__name">
            <h2><?php echo $user['user_name']; ?></h2>
        </div>
        <?php if (isset($message)) {?><p>
    <?php echo ($message);?></p><?php }?>
        <div class = "main-content__content__profile-img"><img src="<?php echo $user['image'];?>" alt="user img"></div>
        <form action = "/profile?id=<?php echo $_GET['id']; ?>" method = "POST">
        <?php if ($_SESSION['rang'] == 'admin') {?>
                <div class = "row">
                    <div class = "main-content__content__profile-item__salary">
                        <p>Оклад: <input type="number" name="salary" value="<?php echo $user['salary']; ?>"></p>
                    </div>
                    <div class = "main-content__content__profile-item__id disable">
                        <input type="text"  id= "userId">
                    </div>
                
                    <div class = "main-content__content__profile-item__change">
                        <button type = "submit" >Изменить</button>
                    </div>
                </div>
            <?php }?>
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

        </form>

        <?php if ($user['id'] == $_SESSION['user_id']/*  || $_SESSION['rang'] == 'admin' */) {?>
            <div class = "main-content__content__profile-item__edit">
                <a href = "/profile_edit?id=<?php echo $user['id']; ?>">Редактировать</a>
            </div>
        <?php }?>



        <!-- <div class = "main-content__content__profile-item__edit">
            <a href = "/profile_edit?id=<?php echo $user['id']; ?>">Редактировать</a>
        </div> -->
    </div>
</div>

<script>
var strGET = window.location.search.replace( '?', '').split('='); 
document.querySelector("#userId").value = strGET[1];
document.querySelector("#userId").name = strGET[0];
//console.log(strGET);
</script>