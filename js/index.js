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


//botão aparecendo após o hover 
const cards = document.querySelectorAll(".card")
cards.forEach(function(card) {

  card.addEventListener("mouseover", function() {
    const btn = this.querySelector(".card-btn")
    btn.style.display = "block"

    const branco = this.querySelector(".branco")
    branco.style.display = "none"
  })
  
  card.addEventListener("mouseout", function() {
    const btn = this.querySelector(".card-btn")
    btn.style.display = "none"

    const branco = this.querySelector(".branco")
    branco.style.display = "block"
  })
})