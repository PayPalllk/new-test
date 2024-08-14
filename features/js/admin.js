const vition = document.getElementById('vition')
const exit = document.getElementById('exit')
const user = document.getElementById('user')
const filter = document.getElementById('filter')
const filerReset = document.getElementById('filterReset')
const main = document.getElementById('main')
let index = document.getElementsByClassName('index')

  filter.onclick = function(event) {
    console.log(event.target.textContent)
    e = event.target.textContent
    if(e){
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

// Конец фильтра

// Вход и выход
vition.onclick = () =>{
  if(vition.textContent == 'ВОЙТИ'){
    entry.style.display = 'inline'
    document.body.style.overflow = 'hidden'
  } else {
    exit.style.display = 'flex'
  }
}
user.onclick = () =>{
  exit.style.display = 'none'
}

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