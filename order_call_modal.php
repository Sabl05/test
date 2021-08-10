<!-- The Modal -->
<div id="order_call_modal" class="modal_call_order">

<!-- Modal content -->
<div class="modal-content_call_order container">
  <div class="modal-header_vacancy">
    <span class="close_order_modal" id="close_order_modal">&times;</span>
  </div>
  <form class="modal-footer_call_order" method="post" id="form_call_order">
    <h2 style="color: black; text-align: center;" id="chooseCity" class="title-middle fw-bold lang" key="user_agreement">Заказать звонок</h2>
    <div class="inner-modal-footer_call_order  mt-2" style="text-align: center;">
      <span class="regular_text call_order_subtitle lang" key="call_order_desc">Оставьте контактные данные и мы обязательно свяжемся с вами</span>
      <input class="vacancy_modal_input mt-2 lang input_call_order" type="text" name="first_name" placeholder="Имя" id="form_name" key="input_name"><br>
      <input class="vacancy_modal_input mt-2 lang input_call_order" type="text" name="last_name" placeholder="Фамилия" id="form_last_name" key="input_last_name"><br>
      <input class="vacancy_modal_input mt-2 input_call_order input-auto-format"
             type="text"
             name="tel"
             value="+7"
             id="form_tel"
             ><br>
        <div class="subscribe d-flex mt-3 mb-3 col-12" style="color:rgba(0,0,0,0.49); align-items: baseline">
            <input class="col-1" type="checkbox" id="subscribeNews" required="" name="subscribe" value="newsletter">
            <span class="col-11">
              <span class="lang order_call_checkbox" key="i_agree">Я согласен на обработку персональных данных в соответствии с </span>
              <span style="color:#258ebc; text-decoration: underline; cursor: pointer" id="callback_agreement" class="lang" key="security_policy">Пользовательским соглашением</span>
          </span>
        </div>
      <button class="vacancy_modal_btn mt-2" type="submit" name="submit" id="sendData_call_order"> <span style="color: white;" class="lang" key="vacancy_form_submit">Отправить</span> </button>
    </div>
  </form>
</div>
</div>