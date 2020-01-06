<div class = "main-content__content__satistic">
    <div class = "main-content__content__satistic__back">
        <a href = "/">Назад</a>
    </div>
    <h2>Статистика</h2>
</div>


<!-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
<a href="/"><img src="/public/images/logo.png" alt="logo"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item dropdown">
        <div class= "header-item header-items__times col-md-3 dropdown open">
            <div class = "header-items__show dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
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
      </li>
      <li class="nav-item dropdown">
      <div class = "row header-items__user dropdown open">
                            <div class= "header-items__user-img"><img src="<?php echo $user_img ?>" alt="user img"></div>
                            
                        </div>
      </li>
      <li class = "nav-item">
      <div class ="header-items__user-name dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" ><p><?php echo $user_name; ?></p></div>
                            <div class = "header-items__user-popup dropdown-menu" id = "itemPopupSettings"><a href = "/profile?id=<?php echo $_SESSION['user_id']; ?>" class="dropdown-item">Моя страница</a><br><a href = "/account/login" class="dropdown-item">Выход</a> </div>
      </li>

    </ul>
  </div>
</nav> -->