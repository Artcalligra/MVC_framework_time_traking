<div class = "main-content__content__users">
    <div class = "main-content__content__users__back">
        <a href = "/">Назад</a>
    </div>
    <h2>Пользователи</h2>
    <div class="row">
        <div class="col-md-4">Имя</div>
    </div>
    <?php foreach($all_users as $val): ?>
        <div class = "row">
            <div class="col-md-4">
            <a href = "/profile?id=<?php echo $val['id']; ?>" ><?php echo $val['user_name'];?></a>
            <!-- <option value="<?php echo $val['id']; ?>"><?php echo $val['user_name'];?></option> -->
            </div>
        </div>
    <?php endforeach; ?>

   <!--  <iframe src="/profile?id=<?php echo $val['id']; ?>" name="bannerFrame" width="468" height="60" align="left">
    Ваш браузер не поддерживает встроенные фреймы!
    </iframe> -->

</div>