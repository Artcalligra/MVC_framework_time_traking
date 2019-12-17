var now_time;
var seconds = minutes = hours = 0;
//var minutes = 59, seconds=50, hours = 1;

window.onload = function () {
    //setInterval(, 1000);
    console.log(document.getElementById('headerTime').innerText);
};

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
    sendStatus('работаю');
}


function pause_time() {
    clearInterval(now_time);
    sendStatus('перерыв');
}

function end_pause_time() {
    now_time = setInterval(time, 1000);
    sendStatus('закончить перерыв');
}

function stop_time() {
    minutes = hours = 0;
    seconds = -1;
    time();
    clearInterval(now_time);
    sendStatus('день закончен');
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
                case 'dont work':
                    $("#button_start").addClass("active");
                    $("#button_stop").removeClass("active");
                    $("#button_pause").removeClass("active");
                    $("#button_end_pause").removeClass("active");
                    break;
                case 'work':
                    $("#button_stop").addClass("active");
                    $("#button_pause").addClass("active");
                    $("#button_start").removeClass("active");
                    $("#button_end_pause").removeClass("active");
                    break;
                case 'pause':
                    $("#button_stop").addClass("active");
                    $("#button_end_pause").addClass("active");
                    $("#button_pause").removeClass("active");
                    $("#button_start").removeClass("active");
                    break;
                case 'end day':
                    $("#button_start").addClass("active");
                    $("#button_end_pause").removeClass("active");
                    $("#button_stop").removeClass("active");
                    $("#button_pause").removeClass("active");
                    break;

            }
        }
    });
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