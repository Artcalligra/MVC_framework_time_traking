<div class = "main-content__content__add-news">
    <div class = "main-content__content__add-news__back">
        <a href = "/">Назад</a>
    </div>
    <h2>Создание новости</h2>
    <?php if (isset($message)) {?><p>
    <?php echo ($message);?></p><?php }?>
    <form enctype="multipart/form-data" action = "/news_create" method = "POST">
        <div class = "main-content__content__add-news__title">
            <h3>Заголовок</h3>
            <input type="text" name = "title" class = "item-size" required>
        </div>
        <div class = "main-content__content__add-news__description">
            <h3>Описание</h3>
            <textarea rows="10" name = "description" class = "item-size"></textarea>
        </div>
        <div class = "main-content__content__add-news__image">
            <h3>Изображение</h3>
            <input type="file" id="" name="image" accept=".jpg, .jpeg, .png">
        </div>
        <div class = "main-content__content__add-news__button">
            <button type = "submit" class = "" >Создать</button>
        </div>
    </form>
</div>
