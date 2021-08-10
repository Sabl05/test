
<!-- The Modal -->
<div id="myModal_vacancy" class="modal_vacancy">

<!-- Modal content -->
<div class="modal-content_vacancy container">
  <div class="modal-header_vacancy" style="padding-left: 48px;">
    <span class="close_vacancy">&times;</span><br><br>
    <h2 style="display: block; color: #EF7D00; text-transform: uppercase;" id="vcancy_name"></h2>
  </div>
  <div class="modal-body_vacancy" style="padding-left: 48px;">
    <br><h3 style="color: #0086B8" class="lang" key="conditions">Условия</h3>
    <span class="fw-bold lang" key="work_graphic">График работы:</span><br>
    <span id="work_graphic"></span><br>
    <span class="fw-bold lang" key="salary">Заработная плата: </span><br>
    <span id="salary"></span><br>
    <span></span>
    <br><h3 style="color: #0086B8" class="lang" key="responsibilities">Обязанности:</h3>
    <span id="responsibility"></span><br>
    <br><h3 style="color: #0086B8" class="lang" key="requirements">Требования:</h3>
    <span id="requirements"></span><br><br>
  </div>
  <form class="modal-footer_vacancy" id="form">
    <div class="container inner-modal-footer_vacancy mt-2">
      <span class="fw-bold lang" key="madal_vacancy_form_title">Оставьте свои данные и наш менеджер свяжется с вами</span><br>
      <input style="display: none;" id="vacancy_id" type="text" name="id" value="">
      <input class="vacancy_modal_input mt-2 lang" type="text" name="first_name" placeholder="Имя*" id="form_name" key="input_name"><br>
      <input class="vacancy_modal_input mt-2 input-auto" type="text" name="tel" value="+7" id="form_tel"><br>
      <input class="vacancy_modal_input mt-2 lang" type="text" name="last_name" placeholder="Фамилия*" id="form_last_name" key="input_last_name"><br>
      <input class="vacancy_modal_input mt-2 lang" type="email" name="email" placeholder="Почта" id="form_emil" key="input_email"><br>
        <div class="subscribe d-flex mt-3 mb-3 col-12" style="color:rgba(255,255,255,1); align-items: baseline">
            <input class="col-1" type="checkbox" id="subscribeNews" required="" name="subscribe" value="newsletter">
            <span class="col-11">
              <sapn  class="lang i_agree_vacancy_modal" key="i_agree">Я согласен на обработку персональных данных в соответствии с </sapn>
              <span class="lang" style="color:#258ebc; text-decoration: underline; cursor: pointer" id="vacancy_agreement" key="security_policy">Пользовательским соглашением</span>
          </span>
        </div>
        <button class="vacancy_modal_btn mb-3" type="button" name="submit" id="sendData"> <span style="color: white;" class="lang" key="vacancy_form_submit">Отправить</span> </button>
    </div>
  </form>
</div>
</div>