<div class = "main-content__content__add-news">
    <div class = "main-content__content__back">
        <a href = "/">Назад</a>
    </div>
    <h2>Создание новости</h2>
    <?php if (isset($message)) {?><p>
    <?php echo ($message);?></p><?php }?>
    <form enctype="multipart/form-data" action = "/news_create" method = "POST">
        <div class = "main-content__content__add-news__title form-group row">
            <label for="news-title" class="col-2 col-form-label">Заголовок</label>
                <div class="col-10">
                    <input type="text" class = "form-control" name="news-title" required>
                </div>
        </div>
        <div class = "main-content__content__add-news__description form-group row">
            <label for="news-description" class="col-2 col-form-label">Описание</label>
                <div class="col-10">
                    <textarea rows="10" class = "form-control" name="news-description" ></textarea>
                </div>
        </div>
        <div class = "main-content__content__add-news__image form-group row">
            <!-- <label for="news-image" class="col-2 col-form-label">Изображение</label> -->
                <div class="col-7 offset-2">
                    <input type="file" name="news-image" accept=".jpg, .jpeg, .png">
                </div>
        </div>
        <div class = "main-content__content__add-news__button">
            <button type = "submit" class = "btn btn-primary" >Создать</button>
        </div>
    </form>
</div>
