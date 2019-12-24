<link rel="stylesheet" type="text/css" href="/public/styles/tracking.css"/>
<script type="text/javascript" src="/public/scripts/calendar.js"></script>
<div class = "main-content__content__tracking">
    <div class = "main-content__content__tracking__back">
        <a href = "/">Назад</a>
    </div>
    <h2>Отчет по рабочему времени</h2>
    <select id="selectMonth"> </select>
    <div id = "calendar"></div>

</div>
<script>

const monthNames = ["Январь", "Февраль", "Март", "Апрель", "Май", "Июнь",
  "Июль", "Август", "Сентябрь", "Октябрь", "Ноябрь", "Декабрь"];
var list = document.getElementById('selectMonth');

window.onload = function () {

  for (var i = 0; i < monthNames.length; i++)
    {
      var option = document.createElement('option');
      option.innerHTML = monthNames[i];
      //option.value = "myvalue";
      list.appendChild(option);
   }

   current_date = new Date();
   year = current_date.getFullYear();
   month = current_date.getMonth();

   select = document.querySelector('#selectMonth').getElementsByTagName('option');
   for (let i = 0; i < select.length; i++) {
    if (select[i].value == monthNames[month]) select[i].selected = true;
}
   console.log(month);
   createCalendar(calendar, year, month);

};

  document.getElementById('selectMonth').addEventListener('change', function() {

    let num = list.selectedIndex;
    current_date = new Date()
    year = current_date.getFullYear();
    month = monthNames[current_date.getMonth()];
    console.log(num+1);
    let calendar = document.getElementById('calendar');
  createCalendar(calendar, year, num+1);

  });

    function createCalendar(elem, year, month) {

      let mon = month - 1; // месяцы в JS идут от 0 до 11, а не от 1 до 12
      let d = new Date(year, mon);

      let table = '<table><tr><th>пн</th><th>вт</th><th>ср</th><th>чт</th><th>пт</th><th>сб</th><th>вс</th></tr><tr>';

      // пробелы для первого ряда
      // с понедельника до первого дня месяца
      // * * * 1  2  3  4
      for (let i = 0; i < getDay(d); i++) {
          table += '<td></td>';
      }

      // <td> ячейки календаря с датами
      while (d.getMonth() == mon) {
          table += '<td>' + d.getDate() +'<div class =day_'+d.getDate()+'></div>'+'</td>';

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
