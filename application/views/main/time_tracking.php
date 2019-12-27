<link rel="stylesheet" type="text/css" href="/public/styles/tracking.css"/>
<!-- <script type="text/javascript" src="/public/scripts/calendar.js"></script> -->
<div class = "main-content__content__tracking">
    <div class = "main-content__content__tracking__back">
        <a href = "/">Назад</a>
    </div>
    <h2>Отчет по рабочему времени</h2>
    <select id="selectYear"> </select>
    <select id="selectMonth"> </select>
    <div id = "calendar"></div>

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Отчёт за день</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>

      </div>
      <div class="modal-body">
      <!-- <p class="selectedDay"></p> -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>

<div class="selectedDay">вввв</div>

</div>
<script>

var current_date = new Date();

const monthNames = ["Январь", "Февраль", "Март", "Апрель", "Май", "Июнь",
  "Июль", "Август", "Сентябрь", "Октябрь", "Ноябрь", "Декабрь"];

var getMonth = document.getElementById('selectMonth');
var getYear = document.getElementById("selectYear");
var calendar = document.getElementById('calendar');
var year, month, userTime, idDivClick;
var selectYear = current_date.getFullYear();

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

  inserSelectMonth = document.querySelector('#selectMonth').getElementsByTagName('option');
  for (let i = 0; i < inserSelectMonth.length; i++) {
    if (inserSelectMonth[i].value == monthNames[month]) inserSelectMonth[i].selected = true;
  }

  inserSelectYear = document.querySelector('#selectYear').getElementsByTagName('option');
  for (let i = 0; i < inserSelectYear.length; i++) {
    if (inserSelectYear[i].value == year) inserSelectYear[i].selected = true;
  }
   createCalendar(calendar, year, month+1);

   getTime();

   document.getElementById('tableCalendar').onclick = function(event) {
    idDivClick = event.target.closest('td').querySelector('div').id;
    let divValue = event.target.closest('td').querySelector('div').innerHTML;
    createModal(idDivClick,divValue);
    };

    

});

function createModal(id,val){
     // if(val){
    const selectedDay = document.querySelector('.selectedDay').innerHTML = id;
    console.log(selectedDay)
    //$('#selectedDay').html(id);
    console.log(id);
    //$('#myModal').modal('show');
    //}
    }




/* $(document).ready(function() {
    $("#myModal").modal('show');
  }); */


function getTime(){
  $.ajax({
        type: "GET",
        url: "time_tracking",
        data: 'user=getUserTime',
        success: function (msg) {
        userTime = JSON.parse(msg);
        // console.log(userTime);
         userTime.forEach((item)=>{
           //console.log(item);
          $('#'+item.date).html((item.total_worked/3600).toFixed(2)>=0?(item.total_worked/3600).toFixed(2):($().css('color','green')));
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
}

function getDay(date) { // получить номер дня недели, от 0 (пн) до 6 (вс)
  let day = date.getDay();
  if (day == 0) day = 7; // сделать воскресенье (0) последним днем
  return day - 1;
}

  </script>
