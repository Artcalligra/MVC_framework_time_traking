<h2>Новости</h2>
<!-- <p>Id : <b><?php echo $current_time; ?></b></p>
<p>Возраст : <b><?php echo $user_name; ?></b></p> -->


<?php foreach ($news as $val): ?>
<h3><?php echo $val['title'] ?></h3>
<p><?php echo $val['description'] ?></p>
<?php endforeach; ?>