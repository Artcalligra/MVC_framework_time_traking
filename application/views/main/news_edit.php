<div class = "main-content__content__edit-news">
    <div class = "main-content__content__edit-news__back">
        <a href = "/news?id=<?php echo $news['id']; ?>">Назад</a>
    </div>
    <h2>Редактирование новости</h2>
    <p><?php if (isset($message)) {
    echo ($message);}?></p>
    <form enctype="multipart/form-data" action = "/news_edit?id=<?php echo $news['id'];?>" method = "POST">
        <div class = "main-content__content__edit-news__title">
            <h3>Заголовок</h3>
            <input type="text" name = "title" class = "item-size" value = "<?php echo $news['title'];?>" required>
        </div>
        <div class = "main-content__content__edit-news__description">
            <h3>Описание</h3>
            <textarea rows="10" name = "description" class = "item-size"><?php echo $news['description'];?></textarea>
        </div>
        <div class = "main-content__content__edit-news__image">
            <h3>Изображение</h3>
            <input type="file" name="image" accept=".jpg, .jpeg, .png">
        </div>
        <input type="checkbox" name = "delete_image">Удалить картинку
        <div class = "main-content__content__edit-news__button">
            <button type = "submit" class = "" >Сохранить</button>
        </div>
    </form>
</div>



