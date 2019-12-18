<!DOCTYPE html>
<!-- <html lang="en"> -->
<head>
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" type="text/css" href="/public/styles/style.css"/>
    <link rel="stylesheet" type="text/css" href="/public/styles/default.css"/>
    <script type="text/javascript" src="/public/scripts/jquery.js"></script>
	<script type="text/javascript" src="/public/scripts/script.js"></script>
</head>

<body>
    <header>
        <div class = "container">
            <div class = "header-items">
                <div class = "header-item header-items__logo">
                    <a href="/"><img src="/public/images/logo.png" alt="logo"></a>
                </div>
                <div class= "header-item header-items__times">
                    <div class = "header-items__show" id = "openPopupTime"> 
                        <div class = "header-items__time" id="headerTime"><?php echo $current_time; ?></div>
                        <div class = "header-items__status" id = "headerStatus"><?php echo $status; ?></div>
                    </div>               
                    <div class = "header-items__time-popup" id = "itemPopupTime">
                        <div class = "header-items__time-popup__work-time">
                            <span>Длительность рабочего дня: </span>
                             <div id="timer_work"><?php echo $date = date("H:i:s", $work_time); ?></div>
                        </div>
                        <div class = "header-items__time-popup__pause-time <?php 
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
                            ?>" type="button" value="Start" onclick="get_time()" />
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
                            ?>" type="button" value="Pause" onclick="pause_time()" />
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
                            ?>" type="button" value="End pause" onclick="end_pause_time()" />
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
                            ?>" type="button" value="Stop" onclick="stop_time()" />

                    </div>
                </div>
                <div class = "header-item header-items__user" id = "openPopupSettings">
                    <div class = "header-items__user-name"><p><?php echo ($user['user_name']); ?></p></div>
                    <div class = "header-items__user-popup" id = "itemPopupSettings">моя страница<br>выйти</div>
                </div>
            </div>
        </div>
    </header>
    <main>
        <div class = "container">
            <?php echo $content; ?>
        </div>
    </main>
    <footer>
        <div class = "container">

        </div>
    </footer>
</body>
</html>
