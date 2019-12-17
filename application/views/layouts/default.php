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
                <div class= "header-items__times">
                    <div class = "header-item" id = "openPopupTime"> 
                        <div class = "header-items__time" id="headerTime"><p><?php echo $current_time; ?></p></div>
                        <div class = "header-items__status" id = "headerStatus"><p><?php echo $userTime[0]['status']; ?></p></div>
                    </div>               
                    <div class = "header-items__time-popup" id = "itemPopupTime">
                        <span>Длительность рабочего дня: </span>
                        <div id="timer"></div><br>
                        <input id="button_start" class = "disable <?php 
                        switch ($userTime[0]['status']) {
                            case "dont work":
                                echo 'active';
                                break;
                            case "work":                                    
                                break;
                            case "pause":                                        
                                break;
                            case "end day":
                                    echo 'active';
                                break;
                            }
                            ?>" type="button" value="Start" onclick="get_time()" />
                        <input id="button_pause" class = "disable <?php 
                        switch ($userTime[0]['status']) {
                            case "dont work":
                                break;
                            case "work":
                                echo 'active';                                    
                                break;
                            case "pause":                                        
                                break;
                            case "end day":
                                break;
                            }
                            ?>" type="button" value="Pause" onclick="pause_time()" />
                        <input id="button_end_pause" class = "disable <?php 
                        switch ($userTime[0]['status']) {
                            case "dont work":
                                break;
                            case "work":                                    
                                break;
                            case "pause": 
                                echo 'active';                                       
                                break;
                            case "end day":
                                break;
                            }
                            ?>" type="button" value="End pause" onclick="end_pause_time()" />
                        <input id="button_stop" class ="disable <?php 
                        switch ($userTime[0]['status']) {
                            case "dont work":
                                break;
                            case "work":   
                                echo 'active';                                 
                                break;
                            case "pause":  
                                echo 'active';                                                                     
                                break;
                            case "end day":
                                break;
                            }
                            ?>" type="button" value="Stop" onclick="stop_time()" />

                    </div>
                </div>
                <div class = "header-item header-items__user" id = "openPopupSettings">
                    <div class = "header-items__user-name"><p><?php echo ($user['user_name']); ?></p></div>
                    <div class = "header-items__user-popup" id = "itemPopupSettings"><p>моя страница</p><p>выйти</p></div>
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
