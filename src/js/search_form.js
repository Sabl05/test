$(document).ready(function() {
    let values = ""
    $("#main_search_form").keydown(function(event){
        event.preventDefault()
        if(event.keyCode == 13 || event.keyCode == 32) {
            event.preventDefault();
            if ($("#keywords_inner > div").length <= 4 && $("#search_keywords_input").val() != ""){
                console.log($("#keywords_inner > div").length)
                create_element($("#search_keywords_input").val())
                values += $("#search_keywords_input").val() + " "
                $("#search_keywords_values").val(values)
                $("#search_keywords_input").val("")
            }
            else{
                alert("Слишком много ключевых слов")
            }
        }
    });
});

let create_element = (text) => {
    $("#keywords_inner").append('<div class="keyword mx-2 rounded d-flex"> <span name="key" class="menu_points text-white mx-3 align-self-center">'+ text +'</span> </div>');
}


