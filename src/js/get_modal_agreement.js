
var modal = document.getElementById("myModalUserAgreemant");
var modalSecure = document.getElementById("ModalPoliticalSecurity");

//ModalPoliticalSecurity

// Get the button that opens the modal
var btn = document.getElementById("userAgreement");

// Get the <span> element that closes the modal
var close_user_agreement = document.getElementsByClassName("close_user_agreement")[0];
var close_user_security = document.getElementById("close_user_security");
var vacancy_agreement = document.getElementById("close_user_security");


$('#userAgreement').on('click', function() {
  modal.style.display = "block";
});

$('#callback_agreement').on('click', function() {
  modal.style.display = "block";
});

$('#vacancy_agreement').on('click', function() {
  modal.style.display = "block";
});

$('.btn_user_agreement').on('click', function() {
  modal.style.display = "none";
});

// When the user clicks on <span> (x), close the modal
close_user_agreement.onclick = function() {
  modal.style.display = "none";
}

close_user_security.onclick = function() {
  modalSecure.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
