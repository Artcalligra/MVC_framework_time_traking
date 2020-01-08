<!DOCTYPE html>
<!-- <html lang="en"> -->
<head>
    <title><?php echo $title; ?></title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/public/styles/style.css"/>
    <link rel="stylesheet" type="text/css" href="/public/styles/default.css"/>
    <link rel="stylesheet" type="text/css" href="/public/styles/news.css"/>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script type="text/javascript" src="/public/scripts/jquery.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="/public/scripts/script.js"></script>
</head>

<body>
    <header>
        <div class = "container">
            <div class = "row header-items">
                <!-- <div class = "header-items"> -->
                    <div class = "header-item header-items__logo col-md-6">
                        <a href="/"><img src="/public/images/logo.png" alt="logo"></a>
                    </div>
                    <div class= "header-item header-items__times col-md-3 dropdown open">
                        <div class = "header-items__show dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <!-- id = "openPopupTime" -->
                            <div class = "header-items__time" id="headerTime"><?php echo $current_time; ?></div>
                            <div class = "header-items__status" id = "headerStatus"><?php echo $status; ?></div>
                        </div>               
                        <div class = "header-items__time-popup dropdown-menu" id = "itemPopupTime">
                            <div class = "header-items__time-popup__work-time dropdown-item">
                                <span>Длительность рабочего дня: </span>
                                <div id="timer_work"><?php date_default_timezone_set("UTC"); echo $date = date("H:i:s", $work_time); ?></div>
                            </div>
                            <div class = "header-items__time-popup__pause-time dropdown-item <?php 
                            switch ($status) {
                                case "не работаю":
                                    break;
                                case "работаю":                                    
                                    break;
                                case "перерыв":
                                    echo 'active';                                        
                                    break;
                                case "день завершён":
                                    break;
                                }
                                ?>">
                                <span>Длительность перерыва: </span>
                                <div id="timer_pause"><?php echo $date = date("H:i:s", $pause_time); ?></div>
                            </div>   
                            <div class = "header-items__time-popup__button dropdown-item" >                    
                            <input id="button_start" class = "disable <?php 
                            switch ($status) {
                                case "не работаю":
                                    echo 'active';
                                    break;
                                case "работаю":                                    
                                    break;
                                case "перерыв":                                        
                                    break;
                                case "день завершён":
                                    echo 'active';
                                    break;
                                }
                                ?>" type="button" value="Начать рабочий день" onclick="get_time()" />
                            <input id="button_pause" class = "disable <?php 
                            switch ($status) {
                                case "не работаю":
                                    break;
                                case "работаю":
                                    echo 'active';                                    
                                    break;
                                case "перерыв":                                        
                                    break;
                                case "день завершён":
                                    break;
                                }
                                ?>" type="button" value="Перерыв" onclick="pause_time()" />
                            <input id="button_end_pause" class = "disable <?php 
                            switch ($status) {
                                case "не работаю":
                                    break;
                                case "работаю":                                    
                                    break;
                                case "перерыв": 
                                    echo 'active';                                       
                                    break;
                                case "день завершён":
                                    break;
                                }
                                ?>" type="button" value="Закончить перерыв" onclick="end_pause_time()" />
                            <input id="button_stop" class ="disable <?php 
                            switch ($status) {
                                case "не работаю":
                                    break;
                                case "работаю":   
                                    echo 'active';                                 
                                    break;
                                case "перерыв":  
                                    echo 'active';                                                                     
                                    break;
                                case "день завершён":
                                    break;
                                }
                                ?>" type="button" value="Завершить рабочий день" onclick="stop_time()" />
                                </div>
                        </div>
                    </div>
                    <div class = "header-item header-items__user col-md-3 ">
                        <!-- <div class = "header-items__user-img"></div> -->
                        <div class = "row header-items__user dropdown open">
                            <div class= "header-items__user-img"><img src="<?php echo $user_img ?>" alt="user img"></div>
                            <div class ="header-items__user-name dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" ><?php echo $user_name; ?></div>
                            <div class = "header-items__user-popup dropdown-menu" id = "itemPopupSettings"><a href = "/profile?id=<?php echo $_SESSION['user_id']; ?>" class="dropdown-item">Моя страница</a><br><a href = "/account/login" class="dropdown-item">Выход</a> </div>
                        </div>
                        
                    </div>
                </div>
            <!-- </div> -->
        </div>
    </header>
    <main>
        <div class = "container">
            <div class = "row main-content">
                <!-- <div class = ""> -->
                    <div class = "main-content__navigation col-md-3">
                        <a href = "/">Новости</a>
                        <a href = "/time_tracking">Учёт рабочего времени</a>
                        <a href = "/statistic" class = "disable <?php 
                            switch ($rang) {
                                case "admin":
                                    echo 'active';
                                    break;
                                case "user":   
                                    break;
                                }
                                ?>">Статистика</a>
                        <a href = "/users" class = "disable <?php 
                                switch ($rang) {
                                    case "admin":
                                        echo 'active';
                                        break;
                                    case "user":   
                                        break;
                                    }
                                    ?>">Пользователи</a>
                        <a href = "/month_hours" class = "disable <?php 
                                switch ($rang) {
                                    case "admin":
                                        echo 'active';
                                        break;
                                    case "user":   
                                        break;
                                    }
                                    ?>">Нормы часов</a>
                    </div>
                    <div class = "main-content__content col-md-9">
                        <?php echo $content; ?>
                    </div> 
                <!-- </div>  -->
            </div>
        </div>
    </main>
    <footer>
        <div class = "container">

        </div>
    </footer>
</body>
</html>
