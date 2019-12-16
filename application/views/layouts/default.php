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
                        <div class = "header-items__time" ><p><?php echo $current_time; ?></p></div>
                        <div class = "header-items__status"><p><?php echo $status; ?></p></div>
                    </div>               
                    <div class = "header-items__time-popup" id = "itemPopupTime">
                        <span>Длительность рабочего дня: </span>
                        <div id="timer"></div><br>
                        <input id="button_start"  type="button" value="Start" onclick="get_time()" />
                        <input id="button_pause" class = "disable" type="button" value="Pause" onclick="pause_time()" />
                        <input id="button_end_pause" class = "disable" type="button" value="End pause" onclick="end_pause_time()" />
                        <input id="button_stop" class ="disable" type="button" value="Stop" onclick="stop_time()" />

                    </div>
                </div>
                <div class = "header-item header-items__user" id = "openPopupSettings"><p><?php echo ($user['user_name']); ?><p></div>
                <div class = "header-items__user-popup" id = "itemPopupSettings"><p>моя страница, выйти</p></div>
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