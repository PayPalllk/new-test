const filterReset = document.getElementById('filterReset')
const image = document.getElementsByClassName('image')
const filter = document.getElementById('filter')
const main = document.getElementById('main')
const content = document.getElementById('content')
const up = document.getElementById('up')
let buyButton /* Функционал кнопки */
let index = document.getElementsByClassName('index')
let y = 0

filter.onclick = function(event) {
  // console.log(event.target.textContent)
  e = event.target.textContent
  if(e !== ''){
    filt = result.filter(function(p){
      return p.type === e
    })
    filterCreate(e, filt)
  }
}
function filterCreate(type, data){
  filterReset.style.display = 'flex'
  main.innerHTML = ''
  preRender(type, data, ind='')
}
filterReset.onclick = function() {
  groupBy(typeResp, result)
  filterReset.style.display = 'none'
}
// Нормализация картинок
/* if(image == (notFound)){
  image.src = 'image/NULL.png'
} */

  // Стрелочка на вверх
window.addEventListener('scroll', function() {
  if(scrollY <= 100){
    up.style.display = 'none'
  }else{
  if(scrollY < y){
    
    up.style.display = 'block'
  }else{
    up.style.display = 'none'
  }
  y = scrollY
  }
  // if(scrollY <= 100){
  //   up.style.display = 'none'
  // }else{
  //   up.style.display = 'block'
  // }
})
