/* var now_time;
var seconds = minutes = hours = 0; */
var work_time, break_time;
//var minutes = 59, seconds=50, hours = 1;

/* window.onload = function () {

    let main_time = setInterval(intervalMainTime, 1000);

};

function intervalMainTime() {
    let time = document.getElementById('headerTime').innerHTML;
    let date = new Date(new Date().toDateString() + ' ' + time);
    let main_time = Timer(date);
    // console.log(main_time);
    document.getElementById('headerTime').innerHTML = main_time;
}

function Timer(date) {

    date.setSeconds(date.getSeconds() + 1);
    let hour = date.getHours();
    let minute = date.getMinutes();
    let second = date.getSeconds();

    buffer = checkTime(hour) + ":" + checkTime(minute) + ":" + checkTime(second);

    return buffer;
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
    //now_time = setInterval(time, 1000);
    sendStatus('работаю');
}


function pause_time() {
    //clearInterval(now_time);
    sendStatus('перерыв');
}

function end_pause_time() {
    //now_time = setInterval(time, 1000);
    sendStatus('закончить перерыв');
}

function stop_time() {
    /* minutes = hours = 0;
    seconds = -1;
    time();
    clearInterval(now_time); */
    sendStatus('день завершён');
}

function sendStatus(status) {
    $.ajax({
        type: "POST",
        url: "api/time",
        data: 'status=' + status,
        success: function (msg) {
            //console.log("Прибыли данные: " + msg);
            person = JSON.parse(msg);
            switch (person["status"]) {
                case 'не работаю':
                    $("#button_start").addClass("active");
                    $("#button_stop").removeClass("active");
                    $("#button_pause").removeClass("active");
                    $("#button_end_pause").removeClass("active");
                    $(".header-items__time-popup__pause-time").removeClass("active");
                    break;
                case 'работаю':
                    $("#button_stop").addClass("active");
                    $("#button_pause").addClass("active");
                    $("#button_start").removeClass("active");
                    $("#button_end_pause").removeClass("active");
                    $("#headerStatus").text("работаю");
                    $(".header-items__time-popup__pause-time").removeClass("active");
                    clearInterval(break_time);
                    work_time = setInterval(workTime, 1000);
                    break;
                case 'перерыв':
                    $("#button_stop").addClass("active");
                    $("#button_end_pause").addClass("active");
                    $("#button_pause").removeClass("active");
                    $("#button_start").removeClass("active");
                    $("#headerStatus").text("перерыв");
                    $(".header-items__time-popup__pause-time").addClass("active");
                    clearInterval(work_time);
                    break_time = setInterval(pauseTime, 1000);
                    break;
                case 'день завершён':
                    $("#button_start").addClass("active");
                    $("#button_end_pause").removeClass("active");
                    $("#button_stop").removeClass("active");
                    $("#button_pause").removeClass("active");
                    $("#headerStatus").text("день завершён");
                    $(".header-items__time-popup__pause-time").removeClass("active");
                    clearInterval(work_time);
                    clearInterval(break_time);
                    break;

            }
        }
    });
}


function mainTime() {
    let nowdate = new Date();
    let date = new Date(nowdate.toISOString().split('T')[0] + 'T' + $('#headerTime').html());
    date.setSeconds(date.getSeconds() + 1);
    $('#headerTime').html(date.toTimeString().split(' ')[0]);
}

function workTime() {
    let nowdate = new Date();
    let date = new Date(nowdate.toISOString().split('T')[0] + 'T' + $('#timer_work').html());
    date.setSeconds(date.getSeconds() + 1);
    $('#timer_work').html(date.toTimeString().split(' ')[0]);
    //console.log('work' + date.toTimeString().split(' ')[0]);
}

function pauseTime() {
    let nowdate = new Date();
    let date = new Date(nowdate.toISOString().split('T')[0] + 'T' + $('#timer_pause').html());
    date.setSeconds(date.getSeconds() + 1);
    $('#timer_pause').html(date.toTimeString().split(' ')[0]);
    //console.log('pause' + date.toTimeString().split(' ')[0]);
}



setInterval(mainTime, 1000);


window.onload = function () {
    onloadStatus = $('#headerStatus').html();

    switch (onloadStatus) {
        case 'работаю':
            clearInterval(break_time);
            work_time = setInterval(workTime, 1000);
            break;
        case 'перерыв':
            clearInterval(work_time);
            break_time = setInterval(pauseTime, 1000);
            break;
        case 'день завершён':
            clearInterval(work_time);
            clearInterval(break_time);
            break;
    }

    //sendStatus(onloadStatus);
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