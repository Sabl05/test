

$('#order_call').on('click', function() {
   document.getElementById("order_call_modal").style.display = "block";
});


window.onclick = function(event) {
  if (event.target == document.getElementById("order_call_modal")) {
    document.getElementById("order_call_modal").style.display = "none";
  }
}


$('#sendData_call_order').on('click', function() {


  event.preventDefault()

  var fd = new FormData(document.getElementById("form_call_order"));
  var lang = $('.translate').attr('id');
	
	
	
  if(fd.get('subscribe') != null){
	  $("span.order_call_checkbox").removeClass('red');
	  if ($(".item").hasClass("kz")) {
    $.ajax({
      type: 'post',
      url: './includes/send_data_call_order.php',
      dataType: 'text',
      data: fd,
      contentType: false,
      cache: false,
      processData: false,
      async: true,
      beforeSend: function() {
        $('#sendData_call_order').prop("disabled", true);

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
        $('#sendData_call_order').prop("disabled", false);
        document.getElementById('form').reset();
        if (data == "error") {
          Swal.fire(
            '',
            'Өрісті дұрыс толтырыңыз',
            'error'
          )
        }else {
          Swal.fire(
            'Жақсы',
            'Сіздің өтінішіңіз жіберілді',
            'success'
          )
          document.getElementById("order_call_modal").style.display = "none";
          $("#burger_menu").toggleClass("visible");
        }
      }
    });
  }else {
    $.ajax({
      type: 'post',
      url: './includes/send_data_call_order.php',
      dataType: 'text',
      data: fd,
      contentType: false,
      cache: false,
      processData: false,
      async: true,
      beforeSend: function() {
        $('#sendData_call_order').prop("disabled", true);

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
        $('#sendData_call_order').prop("disabled", false);
        document.getElementById('form').reset();
        if (data == "error") {
          Swal.fire(
            '',
            'Пожалуйста, корректно заполните поле',
            'error'
          )
        }else {
          Swal.fire(
            'Отлично',
            'Ваша заявка отправлена',
            'success'
          )
          document.getElementById("order_call_modal").style.display = "none";
          $("#burger_menu").toggleClass("visible");
        }
      }
    });
  }
  }else {
  	$("span.order_call_checkbox").addClass('red');
  }


});


$('#close_order_modal').on('click', function() {
  document.getElementById("order_call_modal").style.display = "none";
})
