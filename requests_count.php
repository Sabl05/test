<?php

function send_request($url, $data) {
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
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

    $resp = curl_exec($curl);
    $decoded_resp = json_decode($resp, true);
    curl_close($curl);
    return $decoded_resp;
}

$url = "https://api.skillaz.ru/open-api/objects/hire-requests/find";
$data = '{"PageSize": 8,"CurrentPage": 1,}';
$requests = send_request($url, $data);

$request_count = array();
foreach ($requests['Items'] as $item){
    $name = $item['Data']['VacancyId']['Name'];
    $data = '{
  "PageSize": 8,
  "CurrentPage": 1,
  "Data": {},
  "DisplayName": "'.$name.'"
}';
    $request = send_request($url, $data);
    $request_count[] = array("name" => $item['Data']['VacancyId']['Name'], "count" => count($request));
}
?>
<?php
  echo "<pre>";
  print_r($request_count);
 $count = 0;

 foreach ($request_count as $item):
   $count++;
   if ($count == 2) {
     $count = 0;
  ?>
  <div class="card mt-4 col-md-3 col-sm-12 border-0 invis" >
      <div class="card-body p-4 section-card section-card_list">
          <div class="d-flex justify-content-between mb-3">
              <span class="fw-bold text_speciality col-10"> <?= $item['name']?> </span>
          </div>
          <div class="row mt-2">
              <a class="number_of_vacancies title-small text-white d-flex justify-content-between button_blue_solid" href="searchresults.php?page=1&KeyWords=<?= $item['name']?>">
                  <?= $item['count']?>
                  <span>-></span>
              </a>
          </div>
      </div>
      </div>
  <?php
}else {
  ?>
  <div class="card mt-4 col-md-3 col-sm-12 border-0" >
      <div class="card-body p-4 section-card section-card_list">
          <div class="d-flex justify-content-between mb-3">
              <span class="fw-bold text_speciality col-10"> <?= $item['name']?> </span>
          </div>
          <div class="row mt-2">
              <a class="number_of_vacancies title-small text-white d-flex justify-content-between button_blue_solid" href="searchresults.php?page=1&KeyWords=<?= $item['name']?>">
                  <?= $item['count']?>
                  <span>-></span>
              </a>
          </div>
      </div>
      </div>
  <?php
}
   ?>

<?php endforeach;?>
