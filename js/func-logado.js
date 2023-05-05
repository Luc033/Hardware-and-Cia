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
  })
()

//listagem de produtos por javascript
const produtos = [
  {
    id: 1,
    imageURL: "thumb_tv_p1e_43_1_1.png",
    name: "Televisão XIAOMI P1E 43",
    price: 1799.99
  },
  {
    id: 2,
    imageURL: "celular-sansung.jpg",
    name: "Celular Sansung A70",
    price: 2199.90
  },
  {
    id: 3,
    imageURL: "notebook-dell.avif",
    name: "Notebook Dell I5 11th",
    price: 3490.99
  },
]
 
// Exibindo os produtos individuais 
const containerProducts = document.querySelector(".linha-card")

produtos.map((produto) => {

  containerProducts.innerHTML += 
    `
    <div class="card" />
      <img class="card-img-top" src="imagens/${produto.imageURL}" alt="${produto.name}">
        <div class="card-body">
          <h1>${produto.name}</h1>
          <h2>R$${produto.price}</h2>
          <p>À vista no PIX</p>
          <div class="branco"></div>
          <a href="#" class="btn card-btn"><i class="bi bi-cart3"></i> Comprar</a>
        </div>
    </div>
    ` 
})


 

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

//Adicionando o dropdown do botão "Relatório"

// selecione o botão e o submenu
const btnRelatorio = document.getElementById("btn-dropd-relatorio");
const submenuRelatorio = document.querySelector(".submenu-relatorio");

// adicione um evento de clique ao botão
btnRelatorio.addEventListener("click", function() {
  // verifique se o submenu está visível
  if (submenuRelatorio.style.display === "block") {
    // se estiver visível, oculte-o
    submenuRelatorio.style.display = "none";
  } else {
    // se estiver oculto, exiba-o
    submenuRelatorio.style.display = "block";
  }
});

const filtro = document.querySelector("#filter-btn")

const handleSumbit = (e) => {

  console.log("funfo")

  const range1 = document.querySelector("#slider-1") 
  const range2 = document.querySelector("#slider-2") 

  const menorPreco = document.querySelector("#menorPreco")
  const maiorPreco = document.querySelector("#maiorPreco")

  produtos.map((produto) => {
    if(range1 < produto.price < range2) {
      return true
    } else {
      produto.style.display = "none"
    }
  })
}





