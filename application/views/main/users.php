<div class = "main-content__content__users">
    <div class = "main-content__content__users__back">
        <a href = "/">Назад</a>
    </div>
    <h2>Пользователи</h2>
    <div class="row">
        <div class="col-md-4">Имя</div>
        <div class="col-md-4">Отработано за день</div>
        <div class="col-md-4">Отработано за месяц</div>
    </div>
    <?php foreach($all_users as $val): ?>
        <div class = "row">
            <div class="col-md-4">
            <a href = "/profile?id=<?php echo $val['id']; ?>" ><?php echo $val['user_name'];?></a>
            <!-- <option value="<?php echo $val['id']; ?>"><?php echo $val['user_name'];?></option> -->
            </div>
            <div class="col-md-4">
                <?php foreach($all_time as $time): ?>
                    <p><?php $date = str_replace(":", "", date("d:m:Y", time()));
                    if($val['id']==$time['user_id'] && $date == $time['date']){
                        echo round($time['total_worked']/3600, 2);
                        } 
                        ?></p>
                <?php endforeach; ?>            
            </div>
            <div class="col-md-4">
            <?php $time_month = 0; ?>
                <?php foreach($all_time as $time): ?>
                    <p><?php $date = substr(str_replace(":", "", date("d:m:Y", time())),2,8);
                    
                    if($val['id']==$time['user_id'] && $date == substr($time['date'],2,8)){
                        if(!empty($time['date'])){
                        $time_month +=  $time['total_worked'];} }?>
                        
                <?php endforeach; ?> 
                <?php if($time_month>0){echo round($time_month/3600,2);} ?></p>           
            </div>
        </div>
    <?php endforeach; ?>

</div>