<div class = "main-content__content__monthHours">
    <div class = "main-content__content__monthHours__back">
        <a href = "/">Назад</a>
    </div>
    <p><?php if (isset($message)) {
    echo ($message);}?></p>
    <h2>Нормы часов по месяцам</h2>
    <div class="row">
        <div class="col-4 col-md-3">Год</div>
        <div class="col-4 col-md-3">Месяц</div>
        <div class="col-4 col-md-3">Норма</div>
    </div>
    <form action = "/month_hours" method = "POST">
        <div class = "show_norm">
            <?php foreach ($month_hours as $val): ?>
                <div class = "row line-norm" onclick="clickNorm(this);">
                    <div class="col-4 col-md-3">
                        <p class ="year"><?php echo (substr($val['date'], 2, 4)); ?></p>
                    </div>
                    <div class="col-4 col-md-3">
                        <p><?php echo (substr($val['date'], 0, 2)); ?></p>
                    </div>
                    <div class="col-4 col-md-3">
                        <!-- <input type="number" class = "editNorm" data-id= "<?php echo ($val['date']); ?>" name="edit_norm" min="150" max="190"  value="<?php echo ($val['hours']); ?>" onclick="clickNorm(this);" required> -->
                        <p class = "editNorm" data-id= "<?php echo ($val['date']); ?>" name="edit_norm"><?php echo ($val['hours']); ?></p>
                    </div>
                    <!-- <div class="col-10 col-md-3 text-center">
                    <button type = "submit" class="btn btn-primary disable edit_norm">Изменить</button>
                </div> -->
                </div>
            <?php endforeach;?>
        </div>
            <div class = "row">
                <div class="col-4 col-md-3">
                    <input type="number" name="year" min="2020" max="2025" required>
                </div>
                <div class="col-4 col-md-3">
                    <input type="number" name="month" min="1" max="24" required>
                </div>
                <div class="col-4 col-md-3">
                    <input type="number" name="norm" min="150" max="190" required>
                </div>
                <div class="col-10 col-md-3 text-center">
                    <button type = "submit" class="btn btn-primary">Добавить</button>
                </div>
            </div>
    </form>
    <!-- <table>
        <tr>
            <th>Год</th>
            <th>Месяц</th>
            <th>Норма</th>
        </tr>
            <?php foreach ($month_hours as $val): ?>
                <tr><td><?php echo (substr($val['date'], 2, 4)); ?></td><td><?php echo (substr($val['date'], 0, 2)); ?></td><td><?php echo ($val['hours']); ?></td></tr>
            <?php endforeach;?>
    </table> -->


    <div class="modal fade" id="editNormModal" tabindex="-1" role="dialog" aria-labelledby="editNormModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="editNormModalLabel">Редактирование</h4>
          <p class="selectedEditMonth"></p>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form>
            <!-- <div class = "form-group row">
              <label for="edit_month" class="col-2 col-form-label">Месяц: </label>
              <div class="col-4">
                <input class="form-control" type="number" min="1" max="24" id="edit_month">
              </div>
            </div> -->
            <div class = "form-group row">
              <label for="edit_norm" class="col-2 col-form-label">Норма:</label>
              <div class="col-4">
                <input class="form-control" type="number" min="150" max="190" id="edit_norm">
              </div>
            </div>
<!--             <div class = "form-group row">
              <label for="pause-time" class="col-2 col-form-label">Перерыв:</label>
              <div class="col-4">
                <input class="form-control" type="time" min="00:00" max="03:00" id="pause-time">
              </div>
            </div> -->
            <button type="submit" id = "saveEditNorm" class="btn btn-primary">Сохранить</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
        </div>
      </div>
    </div>
  </div>



</div>

<style>
.show_norm input{
    border: hidden;
}

.line-norm:hover {
    border: 2px inset #515afd;
}
.selectedEditMonth{
    margin-bottom: 0;
    line-height: 1.5;
    font-size: 1.5rem;
    margin-top: 0;
}

</style>

<script>

function clickNorm(rrr) {
     $('#editNormModal').modal('show');
    // console.log(rrr.querySelector(".editNorm").getAttribute("data-id"));
    //   console.log($('.editNorm').data('id'));
    // console.log(rrr.getAttribute("data-id"));
    let selectedEditMonth = document.querySelector('.selectedEditMonth');
    let date = rrr.querySelector(".editNorm").getAttribute("data-id");
    let convertDate = date.substring(0, 2) + '.' + date.substring(2, 6);
    selectedEditMonth.innerHTML = convertDate;
}


document.getElementById('saveEditNorm').addEventListener("click", function(event ) {
  let date = document.querySelector('.selectedEditMonth').innerHTML;
  let editNorm = document.querySelector('#edit_norm').value;
  let dateWithoutDots = date.replace(/\./g, "");
//   console.log(dateWithoutDots);

    $.ajax({
          type: "GET",
          url: "month_hours",
          data: {
          'norm': 'editNorm',
          'date' : dateWithoutDots,
          'newNorm': editNorm,

          },
          success: function (msg) {
        //   console.log(msg);
          }
        });

        // event.preventDefault();
    });

</script>