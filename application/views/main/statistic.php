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


<style>
a:hover,a:focus{
 outline: none;
 text-decoration: none;
}
.tab{
 background: #200122;
 background: -webkit-linear-gradient(to bottom, #6f0000, #200122);
 background: linear-gradient(to bottom, #6f0000, #200122);
 padding: 40px 50px;
 position: relative;
}
.tab:before{
 content: "";
 width: 100%;
 height: 100%;
 display: block;
 position: absolute;
 top: 0;
 left: 0;
 background: linear-gradient(#2e3a6a,#2f0b45);
 opacity: 0.85;
}
.tab .nav-tabs{
 border-bottom: none;
 padding: 0 20px;
 position: relative;
}
.tab .nav-tabs li{ margin: 0 30px 0 0; }
.tab .nav-tabs li a{
 font-size: 18px;
 color: #fff;
 border-radius: 0;
 text-transform: uppercase;
 background: transparent;
 padding: 0;
 margin-right: 0;
 border: none;
 border-bottom: 2px solid transparent;
 opacity: 0.5;
 position: relative;
 transition: all 0.5s ease 0s;
}
.tab .nav-tabs li a:hover{ background: transparent; }
.tab .nav-tabs li.active a,
.tab .nav-tabs li.active a:focus,
.tab .nav-tabs li.active a:hover{
 border: none;
 background: transparent;
 opacity: 1;
 border-bottom: 2px solid #eec111;
 color: #fff;
}
.tab .tab-content{
 padding: 20px 0 0 0;
 margin-top: 40px;
 background: transparent;
 z-index: 1;
 position: relative;
}
.form-bg{ background: #ddd; }
.form-horizontal .form-group{
 margin: 0 0 15px 0;
 position: relative;
}
.form-horizontal .form-control{
 height: 40px;
 background: rgba(255,255,255,0.2);
 border: none;
 border-radius: 20px;
 box-shadow: none;
 padding: 0 20px;
 font-size: 14px;
 font-weight: bold;
 color: #fff;
 transition: all 0.3s ease 0s;
}
.form-horizontal .form-control:focus{
 box-shadow: none;
 outline: 0 none;
}
.form-horizontal .form-group label{
 padding: 0 20px;
 color: #7f8291;
 text-transform: capitalize;
 margin-bottom: 10px;
}
.form-horizontal .main-checkbox{
 width: 20px;
 height: 20px;
 background: #eec111;
 float: left;
 margin: 5px 0 0 20px;
 border: 1px solid #eec111;
 position: relative;
}
.form-horizontal .main-checkbox label{
 width: 20px;
 height: 20px;
 position: absolute;
 top: 0;
 left: 0;
 cursor: pointer;
}
.form-horizontal .main-checkbox label:after{
 content: "";
 width: 10px;
 height: 5px;
 position: absolute;
 top: 5px;
 left: 4px;
 border: 3px solid #fff;
 border-top: none;
 border-right: none;
 background: transparent;
 opacity: 0;
 -webkit-transform: rotate(-45deg);
 transform: rotate(-45deg);
}
.form-horizontal .main-checkbox input[type=checkbox]{ visibility: hidden; }
.form-horizontal .main-checkbox input[type=checkbox]:checked + label:after{ opacity: 1; }
.form-horizontal .text{
 float: left;
 font-size: 14px;
 font-weight: bold;
 color: #fff;
 margin-left: 7px;
 line-height: 20px;
 padding-top: 5px;
 text-transform: capitalize;
}
.form-horizontal .btn{
 width: 100%;
 background: #eec111;
 padding: 10px 20px;
 border: none;
 font-size: 14px;
 font-weight: bold;
 color: #fff;
 border-radius: 20px;
 text-transform: uppercase;
 margin: 20px 0 30px 0;
}
.form-horizontal .btn:focus{
 background: #eec111;
 color: #fff;
 outline: none;
 box-shadow: none;
}
.form-horizontal .forgot-pass{
 border-top: 1px solid #615f6c;
 margin: 0;
 text-align: center;
}
.form-horizontal .forgot-pass .btn{
 width: auto;
 background: transparent;
 margin: 30px 0 0 0;
 color: #615f6c;
 text-transform: capitalize;
 transition: all 0.3s ease 0s;
}
.form-horizontal .forgot-pass .btn:hover{ color: #eec111; }
@media only screen and (max-width: 479px){
 .tab{ padding: 40px 20px; }
}
</style>

<div class="container">
 <div class="row">
 <div class="col-md-12">

 <div class="tab" role="tabpanel">
 <!-- Nav tabs -->
 <ul class="nav nav-tabs" role="tablist">
 <li role="presentation" class="active"><a href="#Section1" aria-controls="home" role="tab" data-toggle="tab">sign in</a></li>
 <li role="presentation"><a href="#Section2" aria-controls="profile" role="tab" data-toggle="tab">sign up</a></li>
 </ul>
 <!-- Tab panes -->
 <div class="tab-content tabs">
 <div role="tabpanel" class="tab-pane fade in active" id="Section1">
 <form class="form-horizontal">
 <div class="form-group">
 <label for="exampleInputEmail1">username</label>
 <input type="email" class="form-control" id="exampleInputEmail1">
 </div>
 <div class="form-group">
 <label for="exampleInputPassword1">Password</label>
 <input type="password" class="form-control" id="exampleInputPassword1">
 </div>
 <div class="form-group">
 <div class="main-checkbox">
 <input value="None" id="checkbox1" name="check" type="checkbox">
 <label for="checkbox1"></label>
 </div>
 <span class="text">Keep me Signed in</span>
 </div>
 <div class="form-group">
 <button type="submit" class="btn btn-default">Sign in</button>
 </div>
 <div class="form-group forgot-pass">
 <button type="submit" class="btn btn-default">forgot password</button>
 </div>
 </form>
 </div>
 <div role="tabpanel" class="tab-pane fade" id="Section2">
 <form class="form-horizontal">
 <div class="form-group">
 <label for="exampleInputEmail1">First Name</label>
 <input type="text" class="form-control" id="exampleInputEmail1">
 </div>
 <div class="form-group">
 <label for="exampleInputEmail1">Last Name</label>
 <input type="text" class="form-control" id="exampleInputEmail1">
 </div>
 <div class="form-group">
 <label for="exampleInputEmail1">Email address</label>
 <input type="email" class="form-control" id="exampleInputEmail1">
 </div>
 <div class="form-group">
 <label for="exampleInputPassword1">Password</label>
 <input type="password" class="form-control" id="exampleInputPassword1">
 </div>
 <div class="form-group">
 <button type="submit" class="btn btn-default">Sign up</button>
 </div>
 </form>
 </div>
 </div>
 </div>

</div><!-- /.col-md-offset-3 col-md-6 -->
</div><!-- /.row -->
</div><!-- /.container -->