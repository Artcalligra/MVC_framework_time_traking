<div class = "main-content__content__news">
    <div class = "main-content__content__news-title__text">
        <h2>Новости</h2>
    </div>
    <div class = "main-content__content__news-title__button align-end">
        <a href = "/news_create">Добавить новость</a>
    </div>
    <?php foreach ($news as $val): ?>
    <div class = "main-content__content__news-item">

        <?php if (!empty($val['image'])) {?>
        <div class ="main-content__content__news-item_image">
            <img src="<?php echo $val['image']; ?>" alt="img news">
        </div>
            <?php }?>
        <div class ="main-content__content__news-item_title">
            <h3><?php echo $val['title'] ?></h3>
        </div>
        <div class ="main-content__content__news-item_description">
            <p><?php echo $val['description'] ?></p>
        </div>
        <div class ="main-content__content__news-item_button align-end">
            <a href = "#">Read more</a>
        </div>

    </div>
    <?php endforeach;?>

</div>