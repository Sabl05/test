<?php

$url = "https://api.skillaz.ru/open-api/objects/hire-requests/find";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "accept: application/json",
   "Authorization: Bearer ",
   "Content-Type: application/json-patch+json",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

//$data = '{"CurrentPage": 0,  "Data": {"VacancyId": "602b6f21be694fd873b060f5"}}';
$data = '{"PageSize": 12,"CurrentPage": 1,}';

curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
$decoded_resp = json_decode($resp, true);
curl_close($curl);

?>
<?php

  echo "<pre>";
  print_r($decoded_resp['Items']);
  $count = 0;
  foreach ($decoded_resp['Items'] as $item):
    $count++;
    if ($count == 2) {
      $count = 0;
      ?>
      <div class="card mt-2 col-md-4 col-sm-12 vacancy_card invis" id=<?=$item['Id']?>>
          <div class="card-body section-card d-flex flex-column justify-content-between">

                  <span class="menu_points text-grey fs-5 mb-3"><?=$item['Data']['OrgUnitId']['Name']?></span>


                  <span class="fw-bold text-uppercase col-12 regular_text"><?=$item['Data']['VacancyId']['Name']?></span>


                  <span class="text-orange vacancy_details_price fw-bold"><?= number_format($item['Data']['ExtraData.Salary'], 0, '', ' ');?></span>
          </div>
      </div>


      <?php
    }else {
      ?>

      <div class="card mt-2 col-md-4 col-sm-12 vacancy_card" id=<?=$item['Id']?>>
          <div class="card-body section-card d-flex flex-column justify-content-between">

                  <span class="menu_points text-grey fs-5 mb-3"><?=$item['Data']['OrgUnitId']['Name']?></span>


                  <span class="fw-bold text-uppercase col-12 regular_text"><?=$item['Data']['VacancyId']['Name']?></span>


                  <span class="text-orange vacancy_details_price fw-bold"><?= number_format($item['Data']['ExtraData.Salary'], 0, '', ' ');?></span>
          </div>
      </div>
      <?php
    }

  ?>
<?php endforeach;?>
