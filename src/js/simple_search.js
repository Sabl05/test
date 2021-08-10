let send_request = () => {
    $.ajax({
        url: '/jumisbar/searchresults.php',
        method: 'get',
        success: function(){
            document.location.href = '/jumisbar/searchresults.php?KeyWords='+$("#search_input").val().trim()+'&page=1'
        }
    });
}
$(document).ready(function (event) {
    $("#search_button").click(function (event) {
        send_request()
    })
})
