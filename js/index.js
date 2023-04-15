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

//mudando componentes de responsividade do site
let largura = document.querySelector("body").clientWidth
let imagemLogo = document.querySelector(".logo-header")
let inputSearch = document.querySelector(".inputSearch")

let filter = document.querySelector(".btn-filter")
const newI = document.createElement("i")
newI.className = "bi bi-filter"


if(largura < 500) {

  imagemLogo.setAttribute("src", "imagens/favicon.png");
  imagemLogo.style.width = "30%";
  inputSearch.style.width = "50%";
  filter.innerHTML = ""
  filter.appendChild(newI)
  filter.style.width = "auto"

} else {
  imagemLogo.setAttribute("src", "imagens/logo-sombra.png");
}

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

//range filter
window.onload = function () {
  slideOne()
  slideTwo()
}

let sliderOne = document.getElementById("slider-1")
let sliderTwo = document.getElementById("slider-2")

let displayValOne = document.getElementById("range1")
let displayValTwo = document.getElementById("range2")

let minGap= 0
let = sliderTrack = document.querySelector(".slider-track")
let sliderMaxValue = document.getElementById("slider-1").max

function slideOne () {
  if (parseInt(sliderTwo.value) - parseInt(sliderOne.value) <= minGap) {
    sliderOne.value = parseInt(sliderTwo.value) - minGap
  }
  displayValOne.textContent = (`R$${sliderOne.value}`)
  fillColor()
}

function slideTwo () {
  if (parseInt(sliderTwo.value) - parseInt(sliderOne.value) <= minGap) {
    sliderTwo.value = parseInt(sliderOne.value) + minGap
  }
  displayValTwo.textContent = (`R$${sliderTwo.value}`)
  fillColor()
}

function fillColor () {
  percent1 = (sliderOne.value / sliderMaxValue) * 100
  percent2 = (sliderTwo.value / sliderMaxValue) * 100
  sliderTrack.style.background = `linear-gradient(to right, #dadae5 ${percent1}%, #f95738 ${percent1}%, #f95738  ${percent2}%, #dadae5 ${percent2}%)`
}

