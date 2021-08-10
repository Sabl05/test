$(".vacancy_card").click(function (event) {
    $.ajax({
        url: '/jumisbar/vacancy_details.php',
        method: 'get',
        success: function(){
            document.location.href = '/jumisbar/vacancy_details.php?id='+event.currentTarget.id
        }
    });
})