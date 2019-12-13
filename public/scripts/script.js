var now_time;
var seconds = minutes = hours = 0;
//var minutes = 59, seconds=50, hours = 1;

window.onload = function () {
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
}

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
   // time();
    now_time = setInterval(time, 1000);
    console.log('start ' + get_now_time());
}


function pause_time() {
    clearInterval(now_time);
    console.log('pause ' + get_now_time());
}

function stop_time() {
    minutes = hours = 0;
    seconds = -1;
    time();
    clearInterval(now_time);
    console.log('stop ' + get_now_time());
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

    /*  $(document).click(function (e) {
         if ( ($(e.target.className == 'header-item header-items__time'))) {
             console.log(e.target.className);
             $("#itemPopupTime").addClass("active");

         }  else if ($("#itemPopupTime").hasClass("active")) {
             $("#itemPopupTime").removeClass('active');
             console.log('disable');
         }

     }); */

    /* $('#openPopupSettings').click(function (e) {
        clickItem($("#itemPopupSettings"), e);
    });

    function clickItem(div, e) {
        if (div.is(":hidden")) {
            div.show();
        }
    } */


    /*  $(document).click(function (e) {

                        if ($("#itemPopupTime").hasClass("active")) {
                            $("#itemPopupTime").removeClass("active")
                            $("#itemPopupTime").addClass("disable");
                        }
                    });
     */




    /*  $(document).click(function (e) {
         if ($("#itemPopupTime").hasClass("active")) {
             if ($(e.target).closest('#itemPopupTime').length) {
                 return;
             }
             $("#itemPopupTime").removeClass("active")
             $("#itemPopupTime").addClass("disable");
         }

     }); */

    /*  jQuery(document).on('click',function (e) {
         var el = '#itemPopupTime';
         if (jQuery(e.target).closest(el).length) return;
         el.removeClass("active");
         el.addClass("disable");
        }); */




    /* $(document).mouseup(function (e) {
        var div = $("#itemPopupTime");
        if (div.is(":visible")) {
            clickPage(div, e);
        } else {
            div = $("#itemPopupSettings");
            clickPage(div, e);
        }
    });


    function clickPage(div, e) {
        if (!div.is(e.target) &&
            div.has(e.target).length === 0) {
            div.hide();
        }
    } */

});