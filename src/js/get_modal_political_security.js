


$('#politicalSecurity').on('click', function() {
  document.getElementById("ModalPoliticalSecurity").style.display = "block";
});

$('.btn_user_political').on('click', function() {
  document.getElementById("ModalPoliticalSecurity").style.display = "none";
});


document.getElementsByClassName("close_user_security")[0].onclick = function() {
  document.getElementById("ModalPoliticalSecurity").style.display = "none";
}


window.onclick = function(event) {
  if (event.target == document.getElementById("ModalPoliticalSecurity")) {
    document.getElementById("ModalPoliticalSecurity").style.display = "none";
  }
}
