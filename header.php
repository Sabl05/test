<?php
  session_start();
  require ('./includes/db.php');
  if (!$_SESSION['city']) {
      $_SESSION['city'] = "Алматы";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css" integrity="sha512-UTNP5BXLIptsaj5WdKFrkFov94lDx+eBvbKyoe1YAfjeRPC+gT5kyZ10kOHCfNZqEui1sxmqvodNUx3KbuYI/A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./src/css/all.css">
    <title>Работа есть!</title>
</head>
<body>

<!--<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-lg modal-dialog modal-dialog-centered">
        <div class="modal-content p-3 d-flex justify-content-center align-items-center">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex flex-column">
                <span class="regular_text fw-bold">Оставьте свои данные и наш менеджер свяжется с вами</span>
                <input type="text" class="search_form_input mt-3" aria-label="Поиск" placeholder="Имя" aria-describedby="button-addon" required>
                <input type="text" class="search_form_input mt-3" aria-label="Поиск" placeholder="Фамилия" aria-describedby="button-addon" required>
                <input type="phone" class="search_form_input mt-3" aria-label="Поиск" placeholder="Телефон" aria-describedby="button-addon" required>
                <input type="email" class="search_form_input mt-3" aria-label="Поиск" placeholder="Почта" aria-describedby="button-addon">
                <button type="button" class="btn button_blue_solid mt-3 fw-bold text-white regular_text text-center" data-bs-dismiss="modal">Отправить</button>
            </div>
        </div>
    </div>
</div>-->


<header class="container-fluid p-2">
    <div class="d-flex align-items-center container">
        <div class="d-flex" style="margin-right: 1rem">
            <div class="d-flex justify-content-between button_toggle_menu">
                <!--<img src="./src/images/burger.svg" id="header_btn" alt="">-->
                <!--<img src="./src/images/call.svg" alt="phone" width="45px;" id="header_btn"> -->
				<svg xmlns="http://www.w3.org/2000/svg" height="60" style="width:45px;fill: #EF7D00;" id="header_btn" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
          <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
        </svg>
                <div class="col-3 burger_menu" id="burger_menu">
                    <div class="burger_menu_wrapper d-flex flex-column">
                        <!--<div class="row">
                            <img src="./src/images/Logo.png" alt="">
                        </div>
                        <div class="row d-flex flex-column mt-3">
                            <span class="menu_points">Поиск работы</span>
                            <span class="menu_points">Каталог вакансий</span>
                            <span class="menu_points">Стажировка</span>
                        </div>
                        <div class="row d-flex flex-column mt-3">
                            <span class="regular_text fw-bold">+8 800 070 9999</span>
                            <span class="menu_points text-grey">+8 747 095 0023</span>
                            <span class="menu_points text-grey">Info@jumysbar.kz</span>
                        </div>-->
                      <!--  <script data-b24-form="click/1/xn5k44" data-skip-moving="true">
                              (function(w,d,u){
                                     var s=d.createElement('script');s.async=true;s.src=u+'?'+(Date.now()/180000|0);
                                     var h=d.getElementsByTagName('script')[0];h.parentNode.insertBefore(s,h);
                             })(window,document,'https://bitrix.jumisbar.kz/upload/crm/form/loader_1_xn5k44.js');
                      </script>-->
                        <form style="text-align: center;">
                            <!--<button class="button_template burger_button_inside mb-2" type="submit">Отправить резюме</button>
                            <button class="button_template burger_button_inside mb-2" type="submit">Заполнить анкету</button>-->
              							<span class="menu_points text-grey d-block menu_point_mobile_phone mt-3">8 800 070 9999</span>
              							<span class="menu_points menu_point_mobile_order text-grey d-block mt-2 lang" key="call_from_kz">Звонок по Казахстану бесплатно</span>
              							<span class="menu_points menu_point_mobile_order text-grey d-block mt-4 lang" key="or">Или</span>
                            <button data-bs-toggle="modal" data-bs-target="#exampleModal" class="button_template burger_button_inside_blue text-white no-border mb-2 mt-2 lang" type="button" key="order_call" id="order_call">
                              Заказать звонок</button>
                        </form>
                        <?php require "./order_call_modal.php"; ?>
                        <!--<div class="row d-flex flex-column mt-3">
                            <span class="menu_points">Политика конфиденциальности</span>
                        </div>-->
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex">
            <a href="/jumisbar">
                <img src="./src/images/Logo.png" alt="" id="header_logo" class="header-logo">
            </a>
        </div>

        <div style="display: grid; align-items: flex-start; margin-left: auto;">
            <?php require('./city_modal.php'); ?>
        </div>

        <div class="d-flex header_nav" style="margin-left: auto;">
            <div style="padding-right: 30px;  padding: 8px;" class="hunter">
              <a href="tel:88000709999" class="text_speciality call_hyper_link" style="float: right; color: #EF7D00;"> 8 800 070 9999</a>
              <!--<img src="./src/images/call.svg" alt="phone" width="7%" style="float: right; margin-right: 5px">--><br>
              <span class="nav-text lang" style="float: right;" key="call_from_kz">звонок по Казахстану бесплатно</span>
            </div>
            <div>
              <button class="nav-text nav-btn translate" id="kz">Каз</button><br>
              <button class="nav-text nav-btn-active translate" id="ru">Рус</button>
            </div>
        </div>


    </div>
</header>
