// Valitation forms
(function () {
    'use strict'
  
    var forms = document.querySelectorAll('.needs-validation')
  
    Array.prototype.slice.call(forms)
      .forEach(function (form) {
        form.addEventListener('submit', function (event) {
          if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
          }
  
          form.classList.add('was-validated')
        }, false)
      })
  })()

const olhoFechado = document.querySelector("#olho-fechado");
const olhoAberto = document.querySelector("#olho-aberto");

olhoFechado.addEventListener("click", function() {
  olhoFechado.style.display = "none";
  olhoAberto.style.display = "block";

  let input = document.querySelector(".senha-view input");
  input.setAttribute("type", "text");
})

olhoAberto.addEventListener("click", function() {
  olhoFechado.style.display = "block";
  olhoAberto.style.display = "none";

  let input = document.querySelector(".senha-view input");
  input.setAttribute("type", "password");
})