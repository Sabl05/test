<?php include_once('header.php');?>

<?php
function send_request($url, $data) {
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $headers = array(
        "accept: application/json",
        "Authorization: Bearer kz1vFbPoI5jTxpia8VIKMGK0ff9TjwnYPBC5TGRb91o=",
        "Content-Type: application/json-patch+json",
    );
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

    $resp = curl_exec($curl);
    $decoded_resp = json_decode($resp, true);
    curl_close($curl);
    return $decoded_resp;
}

$url = "https://api.skillaz.ru/open-api/objects/hire-requests/find";
$id =  $_GET["id"];

$id = "\"$id\"";

$data = '{
  "PageSize": 1,
  "CurrentPage": 0,
  "Data": {},
  "Ids": [
    '.$id.'
  ]
}';

$requests = send_request($url, $data);
$request = $requests['Items']['0'];
/*
$url = "https://api.skillaz.ru/open-api/objects/hire-requests/find";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
    "accept: application/json",
    "Authorization: Bearer kz1vFbPoI5jTxpia8VIKMGK0ff9TjwnYPBC5TGRb91o=",
    "Content-Type: application/json-patch+json",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

$data = '{"CurrentPage": 0,  "Data": {"VacancyId": "602b6f21be694fd873b060f5"}}';

curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
$decoded_resp = json_decode($resp, true);
curl_close($curl);
$city = $decoded_resp['Items'][0]['Data']['City'];
$address = $decoded_resp['Items'][0]['Data']['Address'];
$salary = $decoded_resp['Items'][0]['Data']['ExtraData.Salary'];
*/
?>

<div class="container">
    <div class="search col-10 d-flex">
        <div class="col-md-10">
            <input type="text" class="no-border main-search-input" aria-label="Поиск" aria-describedby="button-addon">
            <div class="collapse multi-collapse" id="multiCollapseExample1" style="background-color: #ffff">
                <div class="main-collapseble_search ">
                    <?php include_once('search.php');?>
                </div>
            </div>
        </div>
        <div class="col-2 mx-2">
            <button class="text-white no-border button_blue_solid button_template main-search-button" type="button" id="button-addon">Найти</button>
            <a class="text-end text-white" data-bs-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">расширенный поиск</a>
        </div>
    </div>

    <div class="vacancy_details col-12 p-5">
        <div class="d-flex justify-content-between">
            <span class="menu_points mb-4 text-grey"><?=$request['Data']['OrgUnitId']['Name']?></span>
            <span class="title-middle text-orange text-thin vacancy_details_price"><?= number_format($request['Data']['ExtraData.Salary'], 0,'',' '); ?></span>
        </div>
        <div class="row">
            <span class="title-small"><?=$request['Data']['VacancyId']['Name']?></span>
        </div>
        <div class="row col-12 mt-4">
            <p class="regular_text text-grey">
                <?=$request['Data']['ExtraData.FunctionalResponsibilities']?>
            </p>
        </div>
        <div class="row">
            <span class="menu_points mb-4">Количество вакансий: 1</span>
        </div>
        <div class="row col-12 mt-5">
            <span class="title-small fw-bold">Информация о вакансии</span>
        </div>
        <div class="col-11 d-flex justify-content-between mt-4">
            <div class="col-6 p-3">
                <div class="d-flex justify-content-between mb-3">
                    <span class="menu_points mb-4 fw-bold col-6">Тип занятости:</span>
                    <span class="menu_points mb-4 text-grey offset-1 col-5"><?=$request['Data']['ExtraData.TypeOfEmployment']['Name']?></span>
                </div>
                <div class="d-flex justify-content-between mb-3">
                    <span class="menu_points mb-4 fw-bold col-6">График работы:</span>
                    <span class="menu_points mb-4 text-grey offset-1 col-5"><?=$request['Data']['ExtraData.Schedule']['Name']?></span>
                </div>
                <div class="d-flex justify-content-between mb-3">
                    <span class="menu_points mb-4 fw-bold col-6">Условия труда:</span>
                    <span class="menu_points mb-4 text-grey offset-1 col-5">Пока не передаётся</span>
                </div>
                <div class="d-flex justify-content-between mb-3">
                    <span class="menu_points mb-4 fw-bold col-6">Профессиональные навыки</span>
                    <span class="menu_points mb-4 text-grey offset-1 col-5"><?=$request['Data']['ExtraData.ProfessionalSkillLevel']?></span>
                </div>
                <div class="d-flex justify-content-between mb-3">
                    <span class="menu_points mb-4 fw-bold col-6">Регион</span>
                    <span class="menu_points mb-4 text-grey offset-1 col-5"><?=$request['Data']['Address']['Region']?></span>
                </div>
                <div class="d-flex justify-content-between mb-3">
                    <span class="menu_points mb-4 fw-bold col-6">Место работы</span>
                    <span class="menu_points mb-4 text-grey offset-1 col-5"><?=$request['Data']['Address']['Text']?></span>
                </div>
            </div>
            <div class="col-6 p-3">
                <div class="d-flex justify-content-between mb-3">
                    <span class="menu_points mb-4 fw-bold col-6">Опыт работы:</span>
                    <span class="menu_points mb-4 text-grey offset-1 col-5"><?=$request['Data']['ExtraData.RequiredExperience']?></span>
                </div>
                <div class="d-flex justify-content-between mb-3">
                    <span class="menu_points mb-4 fw-bold col-6">Образование:</span>
                    <span class="menu_points mb-4 text-grey offset-1 col-5"><?=$request['Data']['ExtraData.Education'][0]?></span>
                </div>
                <div class="d-flex justify-content-between mb-3">
                    <span class="menu_points mb-4 fw-bold col-6">Личные качества</span>
                    <span class="menu_points mb-4 text-grey offset-1 col-5">Пока не передаётся</span>
                </div>
            </div>
        </div>
        <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="text-white no-border button_blue_solid button_template vacancy_details_button col-3 mt-4" id="button-addon">Откликнуться</button>
    </div>

    <div class="mt-5">
        <span class="col-md-6 title-middle fw-bold">Похожие вакансии</span>
        <div class="section-wrapper d-flex flex-xs-column flex-md-row justify-content-between col-12 flex-wrap">
            <?php include_once('requests.php') ?>
        </div>

            <div class="col-12 mt-4">
                <a class="mt-5 col-md-2 regular_text fw-bold" href="searchresults.php?page=1&type=all">Все вакансии <img
                            src="./src/images/Arrow.svg" alt=""></a>
            </div>

    </div>
</div>

<?php include_once('footer.php');?>
