
var arrLang = {
  'kz': {
    'call_from_kz': 'Қазақстан бойынша қоңырау шалу тегін',
    'order_call': 'Қоңырауға тапсырыс',
    'choose_city': 'Қаланы таңдаңыз:',
    'header_content_work': 'Жұмыс бар!',
    'header_content_always': 'Әрқашан!',
    'header_content_for_each': 'Әркімге!',
    'who_we_are': 'Біз кімбіз?',
    'who_we_are_content': 'кәсіби дағдыларды іріктеуге, тегін оқытуға және Қазақстанның ірі компаниялары үшін персоналды кепілді жұмысқа орналастыруға маманданған сервистік компаниясы.',
    'for_applicants': 'Ізденушілер үшін біз ұсынамыз:',
    'for_applicants-1': '- кәсіби дағдыларға тегін оқыту',
    'for_applicants-2': '- жұмысқа орналастырудың барлық кезеңдерінде көмек көрсету',
    'for_applicants-3': '- жұмысқа орналасу үшін құжаттар пакетін жинауға көмектесу',
    'for_applicants-4': '- жеңілдікті бағамен жұмысқа орналасу үшін медициналық комиссияға жіберу',
    'for_applicants-5': '- одан әрі мансаптық өсу үшін бос жұмыс орындары туралы хабардар ету',
    'work_by_profrssion': 'Мамандықтар бойынша жұмыс',
    'seller': 'Сатушы',
    'baker': 'Наубайшы',
    'cooker': 'Аспаз',
    'security': 'Қауіпсіздік қызметтің бақалаушысы',
    'cashier': 'Кассир',
    'conditions': 'Жұмыс шарттары',
    'work_graphic': 'Жұмыс кестесі:',
    'salary': 'Жалақы:',
    'responsibilities': 'Міндеттері:',
    'requirements': 'Талаптар:',
    'madal_vacancy_form_title': 'Өз деректеріңізді қалдырыңыз және біздің менеджер сізбен  хабарласады',
    'input_name': 'Аты*',
    'input_tel': 'Телефоны*',
    'input_last_name': 'Тегі*',
    'input_email': 'Пошта',
    'vacancy_form_submit': 'Жіберу',
    'contact': 'Байланыстар',
    'contact_content': 'Алматы қ., Астана шағын ауданы, 1/10, «Люмир» СО',
    'user_agreement': 'Пайдаланушылық келісім',
    'security_policy': 'Қауіпсіздік саясаты',
    'all_rights_reserved': '© 2021 Jumisbar. Барлық құқықтар қорғалған',
    'or': 'немесе',
    'confirm': 'Келісемін',
    'call_order_desc': 'Байланыс мәліметтеріңізді қалдырыңыз, біз сізбен міндетті түрде байланысамыз',
	'i_agree': 'Сәйкес деректер жүйесімен келісемін ',
  },
  'ru': {
    'call_from_kz': 'звонок по Казахстану бесплатно',
    'order_call': 'Заказать звонок',
    'choose_city': 'Выбрать город:',
    'header_content_work': 'Работа есть!',
    'header_content_always': 'Всегда!',
    'header_content_for_each': 'Для каждого!',
    'who_we_are': 'Кто мы такие?',
    'who_we_are_content': 'сервисная компания, специализирующая на подборе, бесплатном обучении профессиональным навыкам и гарантированном трудоустройстве персонала для крупных компаний Казахстана.',
    'for_applicants': 'Для соискателей мы предлагаем:',
    'for_applicants-1': '- бесплатное обучение профессиональным навыкам',
    'for_applicants-2': '- помощь на всех этапах трудоустройства',
    'for_applicants-3': '- помощь в сборе пакета документов для трудоустройства',
    'for_applicants-4': '- направление на медицинскую комиссию для трудоустройства по льготной цене',
    'for_applicants-5': '- дальнейшее информирование о вакансиях для дальнейшего карьерного роста',
    'work_by_profrssion': 'Работа по профессиям',
    'seller': 'Продавец',
    'baker': 'Пекарь',
    'cooker': 'Повар',
    'security': 'Контролер службы безопасности',
    'cashier': 'Кассир',
    'conditions': 'Условия',
    'work_graphic': 'График работы:',
    'salary': 'Заработная плата:',
    'responsibilities': 'Обязанности:',
    'requirements': 'Требования:',
    'madal_vacancy_form_title': 'Оставьте свои данные и наш менеджер свяжется с вами',
    'input_name': 'Имя*',
    'input_tel': 'Телефон*',
    'input_last_name': 'Фамилия*',
    'input_email': 'Почта',
    'vacancy_form_submit': 'Отправить',
    'contact': 'Контакты',
    'contact_content': 'г. Алматы, микрорайон Астана, 1/10 ТЦ «Люмир»',
    'user_agreement': 'Пользовательское соглашение',
    'security_policy': 'Политика безопасности',
    'all_rights_reserved': '© 2021 Jumisbar. Все права защищены',
    'or': 'или',
    'confirm': 'Я согласен',
    'call_order_desc': 'Оставьте контактные данные и мы обязательно свяжемся с вами',
	'i_agree': 'Я согласен на систему данных в соответствии с ', 
  }
}


$(function() {
   $('.translate').click(function() {
     var lang = $(this).attr('id');

     $('.lang').each(function(index, item) {
       $(this).text(arrLang[lang][$(this).attr('key')]);
       $(this).attr("placeholder", arrLang[lang][$(this).attr('key')]);
     });

     if (lang == 'kz') {
       $('#always_header').removeClass('title-big-4');
       $('#for_each_header').removeClass('title-big-5');

       $('#always_header').addClass('title-big-2');
       $('#for_each_header').addClass('title-big-3');

       $('#political').attr("src", './file/1_kz.php');
       $('#agreement').attr("src", './file/2_kz.php');
     }else if (lang == 'ru') {
       $('#for_each_header').removeClass('title-big-3');
       $('#always_header').removeClass('title-big-2');

       $('#for_each_header').addClass('title-big-5');
       $('#always_header').addClass('title-big-4');

        $('#political').attr("src", './file/1.php');
        $('#agreement').attr("src", './file/2.php');
     }
   });
 });






 $('#kz').on("click", function() {
    $('#kz').removeClass('nav-btn');
    $('#ru').removeClass('nav-btn-active');

    $('#ru').addClass('nav-btn');
    $('#kz').addClass('nav-btn-active');

    $('.item').addClass('kz');
    $('.item').removeClass('ru');
  });

  $('#ru').on("click", function() {
    $('#ru').removeClass('nav-btn');
    $('#kz').removeClass('nav-btn-active');

    $('#kz').addClass('nav-btn');
    $('#ru').addClass('nav-btn-active');

    $('.item').removeClass('kz');
    $('.item').addClass('ru');
   });
