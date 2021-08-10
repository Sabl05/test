
  $('a#vacancy_card').click(function() {


    if ($(".item").hasClass("kz")) {
      $.post("./includes/get_vacancy_modal_kz.php",
         {
           prev_id: $(this).attr("prev_id")
         },
         function(data) {
           data = JSON.parse(data);
           var modal = document.getElementById("myModal_vacancy");
           var span = document.getElementsByClassName("close_vacancy")[0];

           $( "#vcancy_name" ).text( data[0].vacancy_name );
           $( "#workTime" ).text( data[0].work_time );
           $( "#work_graphic" ).text( data[0].work_graphic );
           $( "#salary" ).text( data[0].salary );
           $( "#responsibility" ).text( data[0].responsibility );
           $( "#requirements" ).text( data[0].requirements );
           document.getElementById('vacancy_id').value = data[0].id;


           // When the user clicks the button, open the modal
           modal.style.display = "block";


           // When the user clicks on <span> (x), close the modal
           span.onclick = function() {
             modal.style.display = "none";
           }

           // When the user clicks anywhere outside of the modal, close it
           window.onclick = function(event) {
             if (event.target == modal) {
               modal.style.display = "none";
             }
           }

         }
      );
    } else {
      $.post("./includes/get_vacancy_modal_ru.php",
         {
           prev_id: $(this).attr("prev_id")
         },
         function(data) {
           data = JSON.parse(data);
           var modal = document.getElementById("myModal_vacancy");
           var span = document.getElementsByClassName("close_vacancy")[0];

           $( "#vcancy_name" ).text( data[0].vacancy_name );
           $( "#workTime" ).text( data[0].work_time );
           $( "#work_graphic" ).text( data[0].work_graphic );
           $( "#salary" ).text( data[0].salary );
           $( "#responsibility" ).text( data[0].responsibility );
           $( "#requirements" ).text( data[0].requirements );
           document.getElementById('vacancy_id').value = data[0].id;


           // When the user clicks the button, open the modal
           modal.style.display = "block";


           // When the user clicks on <span> (x), close the modal
           span.onclick = function() {
             modal.style.display = "none";
           }

           // When the user clicks anywhere outside of the modal, close it
           window.onclick = function(event) {
             if (event.target == modal) {
               modal.style.display = "none";
             }
           }

         }
      );
    }

    return false;
});
