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
let card = document.querySelector(".card")

card.addEventListener("mouseover", function() {

  let btn = document.querySelector(".card-btn")
  btn.style.display = "block"

})

card.addEventListener("mouseout", function() {

  let btn = document.querySelector(".card-btn")
  btn.style.display = "none"

})



