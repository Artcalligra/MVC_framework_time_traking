<div class = "main-content__content__edit-news">
    <div class = "main-content__content__back">
        <a href = "/news?id=<?php echo $news['id']; ?>">Назад</a>
    </div>
    <h2>Редактирование новости</h2>
    <?php if (isset($message)) {?><p>
    <?php echo ($message);?></p><?php }?>
    <form enctype="multipart/form-data" action = "/news_edit?id=<?php echo $news['id'];?>" method = "POST">
        <div class = "main-content__content__edit-news__title form-group row">
            <label for="title" class="col-2 col-form-label">Заголовок</label>
                <div class="col-10">
                    <input type="text" name = "title" class = "form-control" value = "<?php echo $news['title'];?>" required>
                </div>            
        </div>
        <div class = "main-content__content__edit-news__description form-group row">
            <label for="description" class="col-2 col-form-label">Описание</label>
                <div class="col-10">
                    <textarea rows="10" name = "description" class = "form-control" ><?php echo $news['description'];?></textarea>
                </div>        
        </div>
        <div class = "main-content__content__edit-news__image form-group row">
            <label for="image" class="col-2 col-form-label">Изображение</label>
                <div class="col-10">
                    <input type="file" class = "form-control image-withot-border" name="image" accept=".jpg, .jpeg, .png">
                    <input type="checkbox" name = "delete_image">Удалить картинку
                </div> 
           
        </div>
        
        <div class = "main-content__content__edit-news__button">
            <button type = "submit" class = "btn btn-primary" >Сохранить</button>
        </div>
    </form>
</div>



