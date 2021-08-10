
$(document).ready(function() {

  $('#sendData').on("click", function() {

    event.preventDefault()

    var fd = new FormData(document.getElementById("form"));
    var lang = $('.translate').attr('id');

    if(fd.get('subscribe') != null) {
      $(".i_agree_vacancy_modal").removeClass('red');
      if ($(".item").hasClass("kz")) {
        $.ajax({
          type: 'post',
          url: './includes/send_data.php',
          dataType: 'text',
          data: fd,
          contentType: false,
          cache: false,
          processData: false,
          async: true,
          beforeSend: function() {
            $('#sendData').prop("disabled", true);

            let timerInterval
            Swal.fire({
              title: 'Please wait!',
              html: 'Server is loading the data.',
              timerProgressBar: true,
              didOpen: () => {
                Swal.showLoading()
                timerInterval = setInterval(() => {
                  const content = Swal.getHtmlContainer()
                  if (content) {
                    const b = content.querySelector('b')
                    if (b) {
                      b.textContent = Swal.getTimerLeft()
                    }
                  }
                }, 100)
              },
              willClose: () => {
                clearInterval(timerInterval)
              }
            }).then((result) => {
              /* Read more about handling dismissals below */
              if (result.dismiss === Swal.DismissReason.timer) {
                console.log('I was closed by the timer')
              }
            })


          },
          success: function(data) {

            if (data == "error") {
              Swal.fire(
                  '',
                  'Өрісті дұрыс толтырыңыз',
                  'error'
              );
            }else {
              Swal.fire(
                  'Жақсы',
                  'Сіздің өтінішіңіз жіберілді',
                  'success'
              );
              var modal = document.getElementById("myModal_vacancy");
              modal.style.display = "none";
              document.getElementById('form').reset();
            }
            //console.log(data);
            $('#sendData').prop("disabled", false);



          }
        });
      }else {
        $.ajax({
          type: 'post',
          url: './includes/send_data.php',
          dataType: 'text',
          data: fd,
          contentType: false,
          cache: false,
          processData: false,
          async: true,
          beforeSend: function() {
            $('#sendData').prop("disabled", true);

            let timerInterval
            Swal.fire({
              title: 'Please wait!',
              html: 'Server is loading the data.',
              timerProgressBar: true,
              didOpen: () => {
                Swal.showLoading()
                timerInterval = setInterval(() => {
                  const content = Swal.getHtmlContainer()
                  if (content) {
                    const b = content.querySelector('b')
                    if (b) {
                      b.textContent = Swal.getTimerLeft()
                    }
                  }
                }, 100)
              },
              willClose: () => {
                clearInterval(timerInterval)
              }
            }).then((result) => {
              /* Read more about handling dismissals below */
              if (result.dismiss === Swal.DismissReason.timer) {
                console.log('I was closed by the timer')
              }
            })


          },
          success: function(data) {

            if (data == "error") {
              Swal.fire(
                  '',
                  'Пожалуйста, корректно заполните поле',
                  'error'
              );
            }else {
              Swal.fire(
                  'Отлично',
                  'Ваша заявка отправлена',
                  'success'
              );
              var modal = document.getElementById("myModal_vacancy");
              modal.style.display = "none";
              document.getElementById('form').reset();
            }
            $('#sendData').prop("disabled", false);



          }
        });
      }
    } else {
      $(".i_agree_vacancy_modal").addClass('red');
    }







  });
});
