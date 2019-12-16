var now_time;
var seconds = minutes = hours = 0;
//var minutes = 59, seconds=50, hours = 1;

/* window.onload = function () {
    setInterval(get_now_time, 1000);

};

function get_now_time() {
    Data = new Date();
    Hour = Data.getHours();
    Minutes = Data.getMinutes();
    Seconds = Data.getSeconds();
    let nowTime = checkTime(Hour) + ":" + checkTime(Minutes) + ":" + checkTime(Seconds);
    document.getElementById('openPopupTime').innerHTML = '<p>' + nowTime + '</p>';
    return nowTime;
} */

function checkTime(i) {
    if (i < 10) {
        i = "0" + i;
    }
    return i;
}

function time() {
    let timer = document.getElementById('timer');
    seconds++;
    if (seconds > 59) {
        minutes++;
        seconds = 0;
        if (minutes > 59) {
            hours++;
            minutes = 0;
            if (hours > 23) {
                seconds = minutes = hours = 0;
            }
        }
    }
    let buffer;
    buffer = checkTime(hours) + "." + checkTime(minutes) + "." + checkTime(seconds);
    timer.innerHTML = buffer;
}

function get_time() {
    now_time = setInterval(time, 1000);
    //start_time = get_now_time();
    $("#button_pause").addClass("active");
    $("#button_stop").addClass("active");
    $("#button_start").addClass("disable");

    //let current_date = new Date().toLocaleDateString();

    $.ajax({
        type: "POST",
        url: "api/time",
        data: 'status=' + 'работаю',
        success: function (msg) {
            alert("Прибыли данные: " + msg);
        }
    });
}


function pause_time() {
    clearInterval(now_time);
    //console.log('pause ' + get_now_time());
    $("#button_pause").removeClass("active");
    $("#button_end_pause").removeClass("disable");

    $.ajax({
        type: "POST",
        url: "api/time",
        data: 'status=' + 'перерыв',
        success: function (msg) {
            alert("Прибыли данные: " + msg);
        }
    });
}

function end_pause_time() {
    now_time = setInterval(time, 1000);
    //start_time = get_now_time();
    $("#button_pause").addClass("active");
    $("#button_stop").addClass("active");

    //let current_date = new Date().toLocaleDateString();

    $.ajax({
        type: "POST",
        url: "api/time",
        data: 'status=' + 'работаю',
        success: function (msg) {
            alert("Прибыли данные: " + msg);
        }
    });
}


function stop_time() {
    minutes = hours = 0;
    seconds = -1;
    time();
    clearInterval(now_time);
    // console.log('stop ' + get_now_time());
    $("#button_pause").removeClass("active");
    $("#button_stop").removeClass("active");
    $("#button_start").removeClass("disable");
}

jQuery(function ($) {

    $('#openPopupTime').click(function (e) {
        if ($("#itemPopupTime").hasClass("active")) {
            $("#itemPopupTime").removeClass("active");
        } else {
            $("#itemPopupTime").addClass("active");
        }
    });

    $('#openPopupSettings').click(function (e) {
        if ($("#itemPopupSettings").hasClass("active")) {
            $("#itemPopupSettings").removeClass("active");
        } else {
            $("#itemPopupSettings").addClass("active");
        }
    });

});