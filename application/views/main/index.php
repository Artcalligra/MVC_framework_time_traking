<div class = "main-content__content__news">
    <div class = "main-content__content__news-title__text">
        <h2>Новости</h2>
    </div>
    <div class = "main-content__content__news-title__button align-end">
        <a href = "/news_create">Добавить новость</a>
    </div>
    <?php foreach ($news as $val): ?>
    <div class = "main-content__content__news-item card bg-light">

        <?php if (!empty($val['image'])) {?>
        <div class ="main-content__content__news-item_image ">
            <img class = "card-img-top" src="<?php echo $val['image']; ?>" alt="img news">
        </div>
            <?php }?>
        <div class ="main-content__content__news-item_description card-body">
            <div class ="card-title">
                <h3><a href = "news?id=<?php echo $val['id']; ?> "><?php echo $val['title'] ?></a></h3>
            </div>
            <p><?php echo mb_strimwidth($val['description'], 0, 250) ?></p>
        </div>
        <div class ="main-content__content__news-item_button align-end">
            <a href = "/news?id=<?php echo $val['id']; ?>">Read more</a>
        </div>

    </div>
    <?php endforeach;?>

</div>