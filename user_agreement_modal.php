<!-- The Modal -->
<div id="myModalUserAgreemant" class="modal_vacancy">

<!-- Modal content -->
<div class="modal-content_vacancy container">
  <div class="modal-header_vacancy">
    <span class="close_user_agreement" id="close_user_agreement">&times;</span>
    <br><br>
    <h2 style="display: block; color: #EF7D00; text-transform: uppercase; text-align: center;" id="chooseCity" class="lang" key="user_agreement">Пользовательское соглашение</h2>
  </div>
  <div class="modal-body_vacancy" style="padding: 0 3em 1em 3em;">
    <iframe src="./file/2.php" onload="resizeIframe(this)" id="agreement"></iframe><br>
    <button type="button" name="button" class="btn_user_agreement lang" key="confirm" style="margin-top: 10px;">Я согласен</button>
  </div>
    <script language="javascript" type="text/javascript">
        function resizeIframe(obj) {
            obj.style.height = (document.documentElement.clientHeight-(document.documentElement.clientHeight * 0.21))+"px"
            obj.style.width = 100 + "%"

        }
    </script>
</div>
</div>
