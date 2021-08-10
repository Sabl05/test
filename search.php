<form id="main_search_form" action="searchresults.php" method="GET" class="d-flex flex-column px-4">
    <input type="text" name="page" style="visibility: hidden; display: none; width: 0; position: absolute" value="1">
    <div class="d-flex row col-12 mt-3">
        <div class="col-md-8">
            <div class="d-flex flex-column">
                <span class="fw-bold fs-5 menu_title">Ключевые слова</span>
                <input id="search_keywords_input" type="text" class="no-border main-search-input" aria-label="Поиск" aria-describedby="button-addon">
                <input type="text" id="search_keywords_values" name="KeyWords" value="" style="visibility: hidden">
            </div>
            <div class="col-md-12 keywords_inner d-flex" id="keywords_inner">
            </div>
        </div>
        <div class="col-md-4 d-flex flex-column">
            <span class="fw-bold fs-5 menu_title">Регион</span>
            <select class="form-select" id="region_select" name="Region" aria-label="Default select example">
                <option value="Алматы">Алматы</option>
            </select>
        </div>
    </div>
    <div class="d-flex row col-12 mt-3">
        <div class="d-flex flex-column col-md-3">
            <span class="fw-bold fs-5 mb-3 title-small">Зарплата</span>
            <div class="form-check">
                <input class="form-check-input"  type="radio" value="No" name="PayAmmount" id="withPayAmmount">
                <label class="form-check-label menu_points" for="withPayAmmount">
                    Не имеет значения
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" value="42500" name="PayAmmount" id="withPayAmmount-1">
                <label class="form-check-label menu_points" for="withPayAmmount-1">
                    от 42 500
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" value="80000" name="PayAmmount" id="withPayAmmount-2">
                <label class="form-check-label menu_points" for="withPayAmmount-2">
                    от 80 000
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" value="160000" name="PayAmmount" id="withPayAmmount-3">
                <label class="form-check-label menu_points" for="withPayAmmount-3">
                    от 160 000
                </label>
            </div>
        </div>
        <div class="d-flex flex-column col-md-3">
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
        <div class="d-flex flex-column col-md-3">
            <span class="fw-bold fs-5 mb-3 title-small">График работы</span>
            <div class="form-check">
                <input class="form-check-input" type="radio" value="WholeDay" name="Schedule" id="Schedule">
                <label class="form-check-label menu_points" for="Schedule">
                    Полный день
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" value="Flexible" name="Schedule"  id="Schedule-1">
                <label class="form-check-label menu_points" for="Schedule-1">
                    Гибкий график
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" value="Changeable" name="Schedule"  id="Schedule-3">
                <label class="form-check-label menu_points" for="Schedule-3">
                    Сменный график
                </label>
            </div>
        </div>
        <div class="d-flex flex-column col-md-3">
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
                        <input class="form-check-input" type="radio" value="PartHour" name="Employment-Type" id="Employment-Type">
                        <label class="form-check-label menu_points" for="Employment-Type">
                            Час
                        </label>
                    </div>
                    <div class="form-check form-check-sidebar mt-1">
                        <input class="form-check-input" type="radio" value="PartDay" name="Employment-Type" id="Employment-Type-1">
                        <label class="form-check-label menu_points" for="Employment-Type-1">
                            День
                        </label>
                    </div>
                    <div class="form-check form-check-sidebar mt-1">
                        <input class="form-check-input" type="radio" value="PartMonth" name="Employment-Type" id="Employment-Type-2">
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
    <div class="d-flex row col-4 align-self-start">
        <button class="button_template button_blue_solid text-white search_button_submit no-border mb-4" type="submit">Показать результаты</button>
    </div>
</form>