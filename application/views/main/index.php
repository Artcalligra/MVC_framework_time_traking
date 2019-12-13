<p>Главная страница</p>
<!-- <p>Id : <b><?php echo $id; ?></b></p>
<p>Возраст : <b><?php echo $user_name; ?></b></p> -->


<?php foreach ($news as $val): ?>
<h3><?php echo $val['title'] ?></h3>
<p><?php echo $val['description'] ?></p>
<?php endforeach; ?>