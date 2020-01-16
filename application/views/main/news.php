<div class = "main-content__content__all-news">
    <div class = "main-content__content__back">
        <a href = "/">Назад</a>
    </div>      

    <?php foreach ($news as $val): ?>

        <?php if($val['user_id']==$_SESSION['user_id'] || $_SESSION['rang']=='admin'){?>
            <div class = "main-content__content__all-news__edit">
                <a href = "/news_edit?id=<?php echo $val['id']; ?>">Редактировать</a>
            </div>
        <?php } ?>

    <div class = "main-content__content__all-news-item">
        <div class ="main-content__content__news-item_title">
            <h3><?php echo $val['title'] ?></h3>
        </div>
        <?php if (!empty($val['image'])) {?>
        <div class ="main-content__content__all-news-item_image">
            <img src="<?php echo $val['image']; ?>" alt="img news">
        </div>
            <?php }?>
        
        <div class ="main-content__content__all-news-item_description">
            <p><?php echo $val['description']; ?></p>
        </div>
        <!-- <div class ="main-content__news-item_button align-end">
            <a href = "news?id= <?php echo $val['id']; ?> ">Read more</a>
        </div> -->

    </div>
    <?php endforeach;?>

</div>