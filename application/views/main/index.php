<p>Главная страница</p>
<!-- <p>Имя : <b><?php echo $name; ?></b></p>
<p>Возраст : <b><?php echo $age; ?></b></p> -->


<?php foreach ($news as $val): ?>
<h3><?php echo $val['title'] ?></h3>
<p><?php echo $val['description'] ?></p>
<?php endforeach; ?>