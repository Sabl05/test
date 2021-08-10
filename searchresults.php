<?php include_once('header.php'); ?>

<?php
//var_dump($_GET);

function http_load($urls, $callback = false)
{
    $mh = curl_multi_init();
    $chs = array();
    foreach ($urls as $url) {
        $chs[] = ($curl = curl_init());

        curl_setopt($curl, CURLOPT_URL, $url['url']);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $headers = array(
            "accept: application/json",
            "Authorization: Bearer kz1vFbPoI5jTxpia8VIKMGK0ff9TjwnYPBC5TGRb91o=",
            "Content-Type: application/json-patch+json",
        );
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);


        curl_setopt($curl, CURLOPT_POSTFIELDS, $url['data']);

        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        curl_multi_add_handle($mh, $curl);
    }

    // если $callback задан как false, то функция должна не вызывать $callback, а выдать страницы как результат работы

    if ($callback === false) {
        $results = array();
    }

    $prev_running = $running = null;

    do {
        curl_multi_exec($mh, $running);

        if ($running != $prev_running) {
            // получаю информацию о текущих соединениях

            $info = curl_multi_info_read($mh);

            if (is_array($info) && ($ch = $info['handle'])) {

                // получаю содержимое загруженной страницы
                $content = curl_multi_getcontent($ch);
                $content = json_decode($content, true);
                // скаченная ссылка
                $url = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);


                if ($callback !== false) {
                    // вызов callback-обработчика
                    $callback($url, $content, $info['result'], $ch);

                } else {
                    // добавление в хеш результатов
//                    $results[ ] = array( 'content' => $content, 'status' => $info['result'], 'status_text' => curl_error( $ch ) );
                    $results[] = $content;
                }

            }

            // обновляю кешируемое число текущих активных соединений
            $prev_running = $running;
        }


    } while ($running > 0);

    foreach ($chs as $ch) {
        curl_multi_remove_handle($mh, $ch);

        curl_close($ch);
    }
    curl_multi_close($mh);

    // результаты
    return ($callback !== false) ? true : $results;

}

$number_results = 0;
$count = 0;

function get_requests($current_page=0, $page_size=0)
{
    global $count;
    $urls = array();
    $url = "https://api.skillaz.ru/open-api/objects/hire-requests/find";
    if ((isset($_GET['type']) && $_GET['type'] == 'all') || ($page_size == 0 && $current_page == 0)) {
        foreach (explode(" ",$_GET['KeyWords']) as $keyword) {
            $name = "\"$keyword\"";
            if ($keyword != "" && $keyword != " ") {
                $data = '{"PageSize": ' . $page_size . ',
                "CurrentPage": ' . $current_page . ',
                "DisplayName":' . $name . ',
                "Data": {"Address": {"Region":"'.$_GET['Region'].'"},
                    "ExtraData.Salary":'.$_GET['PayAmmount'].',
                    },
                }';
                $urls[] = array("url" => $url, "data" => $data);
            }
        }
        return http_load($urls);
    }
    foreach (explode(" ",$_GET['KeyWords']) as $key => $keyword) {
        $url = "https://api.skillaz.ru/open-api/objects/hire-requests/find";
        $name = "\"$keyword\"";
        if ($keyword != "" && $keyword != " ") {
            if($count == 1) {
                $data = '{"PageSize": ' . 6 . ',"CurrentPage": ' . $_GET['page'] . ', "DisplayName":' . $name . '}';
                $urls[] = array("url" => $url, "data" => $data);
            }
            else{
                $local = array();
                if($count == 0){ return 0; }
                $data = '{"PageSize": ' . floor(6/$count) . ',"CurrentPage": ' . $_GET['page'] . ', "DisplayName":' . $name . '}';
                $local[] = array("url" => $url, "data" => $data);
                $vacancy = http_load($local);
                if(count($vacancy[0]['Items']) == 0) {
                    $count -= 1;
                    $keywords = explode(" ",$_GET['KeyWords']);
                    unset($keywords[$key]);
                    $_GET['KeyWords'] = implode(" ",$keywords);
                    get_vacancies();
                    break;
                }
                $urls[] = array("url" => $url, "data" => $data);
            }
        }
    }
    return http_load($urls);
}

$results_to_count = get_requests();

foreach($results_to_count as $result){
    if(!empty($result['Items'])) $count++;
    $number_results += count($result['Items']);
}
if($count != 0) {

$results = get_requests($_GET['page']);
foreach ($results as $item){
    foreach ($item['Items'] as $request){
        $requests[] = $request;
    }
}

//$urls = array();
//function get_vacancies() {
//    global $count, $urls;
//    foreach (explode(" ",$_GET['KeyWords']) as $key => $keyword) {
//        $url = "https://api.skillaz.ru/open-api/objects/hire-requests/find";
//        $name = "\"$keyword\"";
//
//        if ($keyword != "" && $keyword != " ") {
//            if($count == 1) {
//                $data = '{"PageSize": ' . 6 . ',"CurrentPage": ' . $_GET['page'] . ', "DisplayName":' . $name . '}';
//                $urls[] = array("url" => $url, "data" => $data);
//            }
//            else{
//                $local = array();
//                $data = '{"PageSize": ' . floor(6/$count) . ',"CurrentPage": ' . $_GET['page'] . ', "DisplayName":' . $name . '}';
//                $local[] = array("url" => $url, "data" => $data);
//                $vacancy = http_load($local);
//                if(count($vacancy[0]['Items']) == 0) {
//                    $count -= 1;
//                    $keywords = explode(" ",$_GET['KeyWords']);
//                    unset($keywords[$key]);
//                    $_GET['KeyWords'] = implode(" ",$keywords);
//                    get_vacancies();
//                    break;
//                }
//                $urls[] = array("url" => $url, "data" => $data);
//            }
//        }
//    }
//}

//get_vacancies();

//foreach ( http_load( $urls ) as $request ) {
//    if (isset($_GET['type']) && $_GET['type'] == 'all'){
//        foreach ($results_to_count['Items'] as $item)
//            $requests[] = $item;
//        break;
//    }
//    foreach ($request['Items'] as $item)
//        $requests[] = $item;
//}
//if ($count == 1) {
//    $count = 6;
//    $all_results = get_requests($_GET['page'], $count);
//}
//else {
//    $all_results = get_requests($_GET['page'], $count);
//}
//foreach ($all_results as $result) {
//    if(count($result['Items']) == 0) continue;
//    for ($i = 0; $i<$count; $i++) {
//        $requests[] = $result['Items'][$i];
//    }
//}
$active = $_GET['page'];
$count_show_pages = 10;
$url_page = "searchresults.php?";

$query = explode("&", urldecode($_SERVER['QUERY_STRING']));
$query[0] = "page=1";

$query = implode("&", $query);
$url = "searchresults.php?" . $query;

if ($number_results > 1) {
    $left = $active - 1;
    $right = ceil(($number_results/6) - $active);
    if ($left < floor($count_show_pages / 2)) $start = 1;
    else $start = $active - floor($count_show_pages / 2);
    $end = ($start + $count_show_pages - 1);
    while($end > ceil($number_results/6))
        $end-=1;
    if ($end > $number_results) {
        $start -= ($end - $number_results);
        $end = ceil($number_results / 6);
        if ($start < 1) $start = 1;
    }
}

}
else{
    $results_to_count = 0;
}



?>
<div class="container mt-5">
    <div class="search col-10 d-flex">
        <div class="col-md-10">
            <input type="text" class="no-border main-search-input" aria-label="Поиск" aria-describedby="button-addon">
            <div class="collapse multi-collapse" id="multiCollapseExample1" style="background-color: #ffff">
                <div class="main-collapseble_search ">
                    <?php include_once('search.php'); ?>
                </div>
            </div>
        </div>
        <div class="col-2 mx-2">
            <button class="text-white no-border button_blue_solid button_template main-search-button" type="button"
                    id="button-addon">Найти
            </button>
            <a class="text-end text-white" data-bs-toggle="collapse" href="#multiCollapseExample1" role="button"
               aria-expanded="false" aria-controls="multiCollapseExample1">расширенный поиск</a>
        </div>
    </div>
</div>
<div class="container mt-5">
    <span class="title-middle">Найдено <?= $number_results ?> вакансии</span>
</div>
<div class="container d-flex mt-3">
    <sidebar class="col-md-3">
        <form id="main_search_form" action="searchresults.php" method="GET" class="d-flex flex-column">
            <input type="text" name="page" style="visibility: hidden; display: none; width: 0; position: absolute"
                   value="1">
            <div class="d-flex row col-12 mt-3">
                <div class="col d-flex flex-column">
                    <span class="fw-bold fs-5 menu_title">Регион</span>
                    <select class="form-select" id="region_select" name="Region" aria-label="Default select example">
                        <option value="Алматы">Алматы</option>
                    </select>
                </div>
            </div>
            <div class="d-flex flex-column col-12 mt-3">
                <div class="d-flex flex-column col">
                    <span class="fw-bold fs-5 mb-3 title-small">Зарплата</span>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="No" name="PayAmmount" id="withPayAmmount">
                        <label class="form-check-label menu_points" for="withPayAmmount">
                            Не имеет значения
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="42500" name="PayAmmount"
                               id="withPayAmmount-1">
                        <label class="form-check-label menu_points" for="withPayAmmount-1">
                            от 42 500
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="80000" name="PayAmmount"
                               id="withPayAmmount-2">
                        <label class="form-check-label menu_points" for="withPayAmmount-2">
                            от 80 000
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="160000" name="PayAmmount"
                               id="withPayAmmount-3">
                        <label class="form-check-label menu_points" for="withPayAmmount-3">
                            от 160 000
                        </label>
                    </div>
                </div>
                <div class="d-flex flex-column col">
                    <span class="fw-bold fs-5 mb-3 title-small">Опыт работы</span>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="No" name="Experience" id="Experience">
                        <label class="form-check-label menu_points" for="Experience">
                            Не имеет значения
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="1_3" name="Experience" id="Experience-1">
                        <label class="form-check-label menu_points" for="Experience-1">
                            От 1 до 3
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="3plus" name="Experience" id="Experience-2">
                        <label class="form-check-label menu_points" for="Experience-2">
                            от 3 и более
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="5plus" name="Experience" id="Experience-3">
                        <label class="form-check-label menu_points" for="Experience-3">
                            от 5 и более
                        </label>
                    </div>
                </div>
                <div class="d-flex flex-column col">
                    <span class="fw-bold fs-5 mb-3 title-small">График работы</span>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="WholeDay" name="Schedule" id="Schedule">
                        <label class="form-check-label menu_points" for="Schedule">
                            Полный день
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="Flexible" name="Schedule" id="Schedule-1">
                        <label class="form-check-label menu_points" for="Schedule-1">
                            Гибкий график
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="Changeable" name="Schedule" id="Schedule-3">
                        <label class="form-check-label menu_points" for="Schedule-3">
                            Сменный график
                        </label>
                    </div>
                </div>
                <div class="d-flex flex-column col">
                    <span class="fw-bold fs-5 mb-3 title-small">Тип занятости</span>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="Full" name="Employment" id="Employment">
                        <label class="form-check-label menu_points" for="Employment">
                            Полная занятость
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="Part" name="Employment" id="Employment-1">
                        <label class="form-check-label menu_points" for="Employment-1">
                            Частичная занятость
                        </label>
                        <div class="sidebar_menu--subitem">
                            <span class="mb-3 ">Тип ставки</span>
                            <div class="form-check form-check-sidebar mt-1">
                                <input class="form-check-input" type="radio" value="PartHour" name="Employment-Type"
                                       id="Employment-Type">
                                <label class="form-check-label menu_points" for="Employment-Type">
                                    Час
                                </label>
                            </div>
                            <div class="form-check form-check-sidebar mt-1">
                                <input class="form-check-input" type="radio" value="PartDay" name="Employment-Type"
                                       id="Employment-Type-1">
                                <label class="form-check-label menu_points" for="Employment-Type-1">
                                    День
                                </label>
                            </div>
                            <div class="form-check form-check-sidebar mt-1">
                                <input class="form-check-input" type="radio" value="PartMonth" name="Employment-Type"
                                       id="Employment-Type-2">
                                <label class="form-check-label menu_points" for="Employment-Type-2">
                                    Месяц
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="Employment" id="Employment-2">
                        <label class="form-check-label menu_points" for="Employment-2">
                            Стажировка
                        </label>
                    </div>
                </div>
            </div>
            <div class="d-flex row col align-self-start">
                <button class="button_template button_blue_solid text-white search_button_submit no-border"
                        type="submit">Показать результаты
                </button>
            </div>
        </form>
    </sidebar>

    <div class="col-md-9">
        <?php if($results_to_count != 0): ?>
        <?php foreach ($requests as $item): ?>
                <div class="vacancy_card card mt-4 col-sm-12 border-0" id=<?=$item['Id']?>>
                    <div class="card-body p-4 section-card">
                        <div class="row mt-2">
                            <span class="text-secondary "><?= $item['Data']['OrgUnitId']['Name'] ?></span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span class="fw-bold text-uppercase col-10 fs-4"><?= $item['Data']['VacancyId']['Name'] ?></span>
                            <span class="col-2">9:00-18:00</span>
                        </div>
                        <div class="row mt-2">
                            <span class="fs-4 text-secondary"><?= number_format($item['Data']['ExtraData.Salary'], 0, '', ' '); ?></span>
                        </div>

                    </div>
                </div>
            <?php endforeach; ?>
            <div id="paginationmt-5" class="mt-5">
                <?php if ($active != 1) { ?>
                    <?php $query = explode("&", $query);
                    $query[0] = "page=" . ($active - 1);
                    $query = implode("&", $query); ?>
                <?php } ?>
                <?php for ($i = $start; $i <= $end; $i++) { ?>
                    <?php
                    $query = explode("&", $query);
                    $query[0] = "page=" . $i;
                    $query = implode("&", $query);
                    ?>
                    <?php if ($i == $active) { ?><span class="pagination_link menu_points"><?= $i ?></span><?php } else { ?>
                        <a class="pagination_link menu_points" href="<?php if ($i == 1) { ?><?= $url ?><?php } else { ?><?= $url_page . $query; ?><?php } ?>"><?= $i ?></a><?php } ?>
                <?php } ?>
                <?php if ($active != $number_results) { ?>
                    <?php $query = explode("&", $query);
                    $query[0] = "page=" . ($active + 1);
                    $query = implode("&", $query); ?>
                <?php } ?>
            </div>
        <?php else: ?>
        <div class="col-12 d-flex justify-content-center mt-5">
            <span class="fs-1 text-center">Нет результатов</span>
        </div>
        <?php endif; ?>

    </div>
</div>



<?php include_once('footer.php'); ?>
