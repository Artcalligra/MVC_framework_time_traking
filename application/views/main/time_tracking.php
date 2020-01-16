<link rel="stylesheet" type="text/css" href="/public/styles/tracking.css"/>
<!-- <script type="text/javascript" src="/public/scripts/calendar.js"></script> -->
<div class = "main-content__content__tracking">
  <div class = "main-content__content__back">
      <a href = "/">Назад</a>
  </div>
  <h2>Отчет по рабочему времени <!-- <?php echo $user_name; ?> --></h2>
    <?php if ($_SESSION['rang'] == 'admin') {?>
        <div class = "main-content__content__tracking-users">
          <p>Выбор пользователя:
          <select id="selectUser">
            <!-- <option selected>Не выбрано</option> -->
            <?php foreach ($all_users as $val): ?>
              <option value="<?php echo $val['id']; ?>"   ><?php echo $val['user_name']; ?></option>
              <?php endforeach;?><!-- data-rang ="<?php echo $val['rang']; ?>" -->
            </select></p>
        </div>
    <?php }?>
  <select id="selectYear"> </select>
  <select id="selectMonth"> </select>
  <div id = "calendar"></div>
  <div class = "main-content__content__tracking-hours row">
    <div class = "col-md-6 main-content__content__tracking-worked__hours"><p>Отработано часов: <b class = "workedHours"></b></p></div>
    <div class = "col-md-6 main-content__content__tracking-worked__norm"><p>Норма часов: <b class = "normdHours"></b></p></div>
    <!-- <div class = "col-md-3 main-content__content__tracking-worked__percent"><p>Процент: <b class = "workedPercent"></b></p></div>
    <div class = "col-md-3 main-content__content__tracking-worked__salary"><p>ЗП: <b class = "workedSalary"></b></p></div> -->
  </div>
  <div class = "main-content__content__tracking-salary row">
    <!-- <div class = "col-md-3 main-content__content__tracking-worked__hours"><p>Отработано часов: <b class = "workedHours"></b></p></div>
    <div class = "col-md-3 main-content__content__tracking-worked__norm"><p>Норма часов: <b class = "normdHours"></b></p></div> -->
    <div class = "col-md-6 main-content__content__tracking-worked__percent"><p>Процент: <b class = "workedPercent"></b></p></div>
    <div class = "col-md-6 main-content__content__tracking-worked__salary"><p>ЗП: <b class = "workedSalary"></b></p></div>
  </div>

  <div class="modal fade" id="dayModal" tabindex="-1" role="dialog" aria-labelledby="dayModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="dayModalLabel" class = "modal-title">Отчёт за день</h4>
          <p class="selectedDay"></p>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class = "row">
            <div class = "col-md-6 modal-body__time-start"> Время начала: <p class="timeStart"></p>
            </div>
            <div class = "col-md-6 modal-body__time-end"> Время окончания: <p class="timeEnd"></p>
            </div>
          </div>
          <div class = "row">
            <div class = "col-md-6 modal-body__time-pause"> Перерыв: <p class="timePause"></p>
            </div>
            <div class = "col-md-6 modal-body__time-all"> Всего отработано: <p class="timeAll"></p>
            </div>
          </div>

          <form class = "disable" id = "editForm">
            <div class = "form-group row">
              <label for="start-time" class="col-5 col-form-label">Время начала: </label>
              <div class="col-4">
                <input class="form-control" type="time" min="09:00" max="22:00" id="start-time">
              </div>
            </div>
            <div class = "form-group row">
              <label for="end-time" class="col-5 col-form-label">Время окончания:</label>
              <div class="col-4">
                <input class="form-control" type="time" min="09:00" max="23:00" id="end-time">
              </div>
            </div>
            <div class = "form-group row">
              <label for="pause-time" class="col-5 col-form-label">Перерыв:</label>
              <div class="col-4">
                <input class="form-control" type="time" min="00:00" max="03:00" id="pause-time">
              </div>
            </div>
            <div class = "form-group row">
              <label for="reason" class="col-5 col-form-label">Причина изменения:</label>
              <div class="col-7">
                <textarea class="form-control" id="reason" required ></textarea>
              </div>
            </div>
            <button type="submit" id = "saveEditTime" class="btn btn-primary">Сохранить</button>
          </form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="showEditModal">Редактировать</button>
        </div>
      </div>
    </div>
  </div>




</div>
<script>

var current_date = new Date();

const monthNames = ["Январь", "Февраль", "Март", "Апрель", "Май", "Июнь",
  "Июль", "Август", "Сентябрь", "Октябрь", "Ноябрь", "Декабрь"];

const getMonth = document.getElementById('selectMonth');
const getYear = document.getElementById("selectYear");
const calendar = document.getElementById('calendar');
const selectUser = document.getElementById('selectUser');
var year, month, userTime, idDivClick, selectedUser,allUsers;
let selectYear = current_date.getFullYear();
let dbDate;

window.addEventListener("load",function(event) {


  for (var i = 0; i < monthNames.length; i++)
    {
      let option = document.createElement('option');
      option.innerHTML = monthNames[i];
      //option.value = "myvalue";
      getMonth.appendChild(option);
   }

   for (var i = 0; i < 5; i++)
    {
      let option = document.createElement('option');
      option.innerHTML = selectYear-1;
      selectYear+=1;
      document.getElementById('selectYear').appendChild(option);
   }

  month = current_date.getMonth();
  year = current_date.getFullYear();

  let inserSelectMonth = document.querySelector('#selectMonth').getElementsByTagName('option');
  for (let i = 0; i < inserSelectMonth.length; i++) {
    if (inserSelectMonth[i].value == monthNames[month]) inserSelectMonth[i].selected = true;
  }

  let inserSelectYear = document.querySelector('#selectYear').getElementsByTagName('option');
  for (let i = 0; i < inserSelectYear.length; i++) {
    if (inserSelectYear[i].value == year) inserSelectYear[i].selected = true;
  }
  if ($("#selectUser").length){
   
    let inserSelectUser = selectUser.getElementsByTagName('option');
    
      for (let i = 0; i < inserSelectUser.length; i++) {
        if (selectUser.options[i].value == <?php echo $_SESSION['user_id']?>) {
          // if (selectUser.options[i].dataset.rang == 'admin') {
          inserSelectUser[i].selected = true;
          selectedUser = inserSelectUser[i].value;
        }
      }
  }


   createCalendar(calendar, year, month+1);

   getTime();

});


function cellClick(){
    document.getElementById('tableCalendar').onclick = function(event) {
    idDivClick = event.target.closest('td').querySelector('div').id;
    let divValue = event.target.closest('td').querySelector('div').innerHTML;
    createModal(idDivClick,divValue);
    };
}

function convertDateWithDots(date){
  dot='.';
  let stringDay=date.substring(0, 2) + dot;
  let stringMonth = date.substring(2, 4) + dot;
  let stringYear = date.substring(4, 8);
  let dateDots = stringDay + stringMonth + stringYear;
  return dateDots;
}

function createModal(id,val){
  if(val){
    getTime();
    const selectedDay = document.querySelector('.selectedDay').innerHTML = convertDateWithDots(id);
    const timeStart = document.querySelector('.timeStart');
    const timeEnd = document.querySelector('.timeEnd');
    const timePause = document.querySelector('.timePause');
    const timeAll = document.querySelector('.timeAll');

    /* console.log(selectedDay);
    console.log(userTime); */
    userTime.forEach((item)=>{

      if(item.date == id){
        let timeStartConvert = convertTime(item.start);
        timeStart.innerHTML = timeStartConvert;
        // console.log(item.end);
        if(item.end>0){
          let timeEndConvert = convertTime(item.end);
          timeEnd.innerHTML = timeEndConvert;
          document.getElementById('saveEditTime').disabled = false;
        }else{
          timeEndConvert = convertTimeUTC(item.end);
          timeEnd.innerHTML = timeEndConvert;
          document.getElementById('saveEditTime').disabled = true;
        }
        let timePauseConvert = convertTimeUTC(item.total_pause);
        timePause.innerHTML = timePauseConvert;
        let timeAllConvert = convertTimeUTC(item.total_worked);
        timeAll.innerHTML = timeAllConvert;
      }
    });
    $('#dayModal').modal('show');
  }

  document.getElementById('showEditModal').onclick = function(event) {
    $("#editForm").removeClass("disable");
    $("#showEditModal").addClass("disable");
    }
}

document.getElementById('saveEditTime').addEventListener("click", function(event ) {
  let startTime = document.querySelector('#start-time').value;
  let endTime = document.querySelector('#end-time').value;
  let pauseTime = document.querySelector('#pause-time').value;
  let reason = document.querySelector('#reason').value;
  let selectedEditDay = document.querySelector('.selectedDay').innerHTML;
  let stringDay=selectedEditDay.substring(0, 2);
  let stringMonth = selectedEditDay.substring(3, 5);
  let stringYear = selectedEditDay.substring(6, 10);
  let daty = new Date(stringYear, stringMonth-1, stringDay);
  let dateWothoutDots=selectedEditDay.replace(/\./g, "");
//  console.log(selectedUser);
    $.ajax({
          type: "POST",
          url: "time_tracking",
          data: {
          'user': 'editTime',
          'selectedUser': selectedUser,
          'date' : dateWothoutDots,
          'editStart': startTime,
          'editEnd': endTime,
          'editPause': pauseTime,
          'reason': reason,
          },
          success: function (msg) {
          //  console.log(msg);
          }
        });
        //  event.preventDefault();
    });


function convertTime(checkDate){
  let date = new Date(checkDate * 1000 );
  let hours = date.getHours();
  let minutes = date.getMinutes();
  let time = hours + ' часов ' + minutes + ' минут';
  return time;
}

function convertTimeUTC(checkDate){
  let date = new Date(checkDate * 1000 );
  let hours = date.getUTCHours();
  let minutes = date.getUTCMinutes();
  let time = hours + ' часов ' + minutes + ' минут';
  return time;
}

  function checkTime(i) {
    if (i < 10) {
        i = "0" + i;
    }
    return i;
  }

function getTime(){
  let countWorkedHours = 0;
  let dateShow = checkTime(month+1)+ String(year);
  let normdHours = 0, percent = 0, wageWithTax, rate, wageWithoutTax = 0;
  let dbSalary = <?php echo $user_salary ?>;
  $.ajax({
        type: "GET",
        url: "time_tracking",
        data: {
          'user': 'getUserTime',
          'selectedUser' : selectedUser,
          },
        success: function (msg) {
        userDate = JSON.parse(msg);
        userTime = userDate[1];
        userTime.forEach((item)=>{
          $('#'+item.date).html((item.total_worked/3600).toFixed(2)>=0?(item.total_worked/3600).toFixed(2):($().css('color','green')));
          dbDate = item.date;
          if(!$.isEmptyObject($('#'+item.date).html())){
            // console.log('--');
            $('#'+item.date).parent().addClass("hover-block");
          }
           if(dbDate.substring(2, 8) == dateShow){
            countWorkedHours += parseInt(item.total_worked);

           }

          });
          countWorkedHoursConvert = (countWorkedHours/3600).toFixed(2);
          $('.workedHours').html(countWorkedHoursConvert);


        userDate[2].forEach((item)=>{
          if (item.date == dateShow){
            normdHours = item.hours;
            percent= (countWorkedHoursConvert*100)/normdHours;
            rate = dbSalary/normdHours;
            if(countWorkedHoursConvert<=0){
              wageWithoutTax =0;
            }else{
              wageWithTax = (rate.toFixed(2))*countWorkedHoursConvert;
            if (wageWithTax>665){
              wageWithoutTax = wageWithTax.toFixed(2) -((wageWithTax*0.01)+(wageWithTax*0.13));
            }else{
              wageWithoutTax = wageWithTax.toFixed(2) -(((wageWithTax-110)*0.13)+(wageWithTax*0.01));
            }
            }

          }
          $('.normdHours').html(normdHours);
          $('.workedPercent').html(percent.toFixed(2));
          $('.workedSalary').html(wageWithoutTax.toFixed(2));

        });

        }
      });
}


  document.getElementById('selectMonth').addEventListener('change', function() {

    month = getMonth.selectedIndex;
    year = getYear.options[getYear.selectedIndex].innerHTML;
    createCalendar(calendar, year, month+1);
    getTime();

  });

  document.getElementById('selectYear').addEventListener('change', function() {

    year = getYear.options[getYear.selectedIndex].innerHTML;
    month = getMonth.selectedIndex;
    createCalendar(calendar, year, month+1);
    getTime();

  });

  if ($("#selectUser").length){
    selectUser.addEventListener('change', function(event) {
      selectedUser = selectUser.value;
      // console.log(selectedUser); 
      createCalendar(calendar, year, month+1);
      getTime();
    });
  }
    function createCalendar(elem, year, month) {

      let mon = month - 1; // месяцы в JS идут от 0 до 11, а не от 1 до 12
      let d = new Date(year, mon);

      let table = '<table id="tableCalendar"><tr><th>пн</th><th>вт</th><th>ср</th><th>чт</th><th>пт</th><th>сб</th><th>вс</th></tr><tr>';

      // пробелы для первого ряда
      // с понедельника до первого дня месяца
      // * * * 1  2  3  4
      for (let i = 0; i < getDay(d); i++) {
          table += '<td></td>';
      }

      // <td> ячейки календаря с датами
      while (d.getMonth() == mon) {
          //table += '<td>' + d.getDate() +'<div class =day_'+d.getDate()+'></div>'+'</td>';
          table += `<td>${d.getDate()}<div id="${
          (d.getDate()<10?'0'+d.getDate():d.getDate())+''+
          ((d.getMonth()+1)<10?'0'+(d.getMonth()+1):(d.getMonth()+1))+''+
          d.getFullYear()}"></div></td>`;
          if (getDay(d) % 7 == 6) { // вс, последний день - перевод строки
              table += '</tr><tr>';
          }

          d.setDate(d.getDate() + 1);
          }

          // добить таблицу пустыми ячейками, если нужно
          // 29 30 31 * * * *
          if (getDay(d) != 0) {
              for (let i = getDay(d); i < 7; i++) {
                  table += '<td></td>';
              }
          }

          // закрыть таблицу
          table += '</tr></table>';

          elem.innerHTML = table;
          cellClick();
}

function getDay(date) { // получить номер дня недели, от 0 (пн) до 6 (вс)
  let day = date.getDay();
  if (day == 0) day = 7; // сделать воскресенье (0) последним днем
  return day - 1;
}

  </script>
