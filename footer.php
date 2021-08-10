<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<script src="./src/js/search_form.js"></script>
<script src="./src/js/sweet-modal.min.js"></script>
<script src="./src/js/get_request_info.js"></script>
<script src="./src/js/simple_search.js"></script>




<script>
    $(document).ready(function () {
        $("#header_btn").click(function () {
            $("#burger_menu").toggleClass("visible")
        })
    })

</script>
<footer class="footer">
    <div class="footer_block container">
        <div class="footer_inner_content footer_mb">
            <img class="footer-img" src="./src/images/Logo_footer.png" alt="">
        </div>
        <div class="invisible_800">
            <div class="footer_inner_content">
                <!--<span class="footer-item_text footer-item_title menu_title">Меню</span><br>-->
                <!--<span class="footer-item_text menu_points">Поиск работы</span>-->
                <!--<span class="footer-item_text menu_points">Каталог вакансий</span>-->
<!--                <span class="footer-item_text mb-3 menu_points">Стажировка</span>-->
            </div>
        </div>
<!--        <div class="col-3">-->
<!--            <div class="d-flex flex-column">-->
<!--                <span class="footer-item_text footer-item_title menu_title mb-5">О нас</span>-->
<!--                <span class="footer-item_text mb-3 menu_points">О проекте Jumisbar</span>-->
<!--                <span class="footer-item_text mb-3 menu_points">Как подать нам вакансию</span>-->
<!--                <span class="footer-item_text mb-3 menu_points">Контакты</span>-->
<!---->
<!--            </div>-->
<!--        </div>-->
        <div>
            <div class="footer_inner_content footer_center">
              <div class="footer_hyperlink_file">
                <a class="footer_underline lang" style="color: white; cursor: pointer" key="user_agreement" id="userAgreement">Пользовательское соглашение</a>
              </div>
              <div class="footer_hyperlink_file">
                <a class="footer_underline lang" style="color: white; cursor: pointer" key="security_policy" id="politicalSecurity">Политика безопасности</a>
              </div>
            </div>
        </div>


    </div>
    <div style="display: grid; align-items: flex-end; width: 100%">
      <span class="regular_text lang" style="text-align: center; color: #D9DBE1; font-size: 14px;" key="all_rights_reserved">© 2021 Jumisbar. Все права защищены</span>
    </div>
</footer>

<?php require('./political_security_modal.php'); ?>
<?php require('./user_agreement_modal.php'); ?>


<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js" integrity="sha512-gY25nC63ddE0LcLPhxUJGFxa2GoIyA5FLym4UJqHDEMHjp8RET6Zn/SHo1sltt3WuVtqfyxECP38/daUc/WVEA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://ajax.googleapis.com/ajax/libs/cesiumjs/1.78/Build/Cesium/Cesium.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="undefined" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="undefined" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.esm.min.js" integrity="undefined" crossorigin="anonymous"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="src/js/get_modal_political_security.js"></script>
<script src="src/js/get_modal_agreement.js"></script>
<script src="src/js/get_model_vacancy.js"></script>
<script src="src/js/send_data_form.js"></script>
<script src="src/js/carousel_setting.js"></script>
<script src="src/js/translate.js"></script>
<script src="src/js/get_order_call_modal.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/cleave.js/1.6.0/cleave.min.js"></script>
<script>
    new Cleave('.input-auto-format', {
        numericOnly: true,
        blocks: [0, 1, 3, 0,  3, 4],
        delimiters: ["+", "(", ")", "-", "-"]
    });

    new Cleave('.input-auto', {
        numericOnly: true,
        blocks: [0, 1, 3, 0,  3, 4],
        delimiters: ["+", "(", ")", "-", "-"]
    });
</script>

</body>
</html>
