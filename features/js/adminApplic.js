const url = '/entities/basket/adminBasket.php'
const urlReady = '/features/basketRequest/adminReady.php'
const urlGetTov = '/features/basketRequest/adminGet.php'
const table = document.querySelector('#table')
const form = document.querySelector('#form')
const waiting = document.querySelector('#waiting')
const ready = document.querySelector('#ready')
const button = document.querySelector('#buttonTable')
let st = 'waiting'
//Фильтр
const search = document.querySelector('#search')
const find = document.querySelector('#find')
const blockSearch = document.querySelector('#blockSearch')
const filterReset = document.getElementById('resetFilter')
let product = []

ready.onclick = () => {
  if(st = 'ready'){
    ready.style.borderBottom = '1px solid white'
    ready.style.background = 'white'
    waiting.style.borderBottom = '1px solid #939ed0'
    waiting.style.background = '#eeefe8'
    filtReady(result)
  }
}
waiting.onclick = () => {
  if(st = 'waiting'){
    waiting.style.borderBottom = '1px solid white'
    ready.style.borderBottom = '1px solid #939ed0'
    waiting.style.background = 'white'
    ready.style.background = '#eeefe8'
    filtWait(result)
  }
}

filterReset.onclick = () => {
  if(st == 'waiting'){
    filtWait(result)
    }else{
      filtReady(result)
    }
    filterReset.style.display = 'none'
}

start()

async function start(){
  try{
    response = await fetch(url)
    result = await response.json()
    if(st == 'waiting'){
    filtWait(result)
    }else{
      filtReady(result)
    }
    product = result
  }catch(err){
    console.error(err)
  }
}

function filtWait(result){
  res = result.filter((e) => {
    return e.status === 'waiting'
  })
  render(res)
  button.style.display = 'block'
}
function filtReady(result){
  res = result.filter((e) => {
    return e.status === 'ready'
  })
  if(!res){
    content.innerHTML = "<h1>Пока что ничего нету, возможно администратор ещё не ответил на ваш запрос</h1>"
  }else{
    renderReady(res)
    button.style.display = 'none'
  }
}
function renderReady(data) {
  let creat = ''
  data.forEach((u) => {
    if(u.email == ''){
      email = ''
    }else{
      email = `
   <div>Email: ${u.email}</div>`
    }
    if(u.number == ''){
      number = ''
    }else{
      number = `
   <div>Номер тел: ${u.number}</div>`
    }
    creat += `
   <div class="formAdmin">
   <div>
   <div>name: ${u.name}</div>
    </div>
     <div class="tov">
       <div class="name">${u.nameTov}</div>
       </div>
       <div>
        <span>Дата добавления:</span>
        <div>${u.toDay}</div>
       </div>
       <div class="info">
         Цена: ${u.price}₽
         Количество: x${u.num}
         <input type="hidden" name="product" value="${u.id}">
         <div>
         Готов к выдаче
         </div>         
       </div>
       <button data-get='${u.id}' type='button' style="height: fit-content;
    align-self: center; margin: auto;">Выдан</button>
</div>
 `
    
  })
  table.innerHTML = creat
}
async function getTov(data){
  response = await fetch(urlGetTov, {
    method: 'post',
    body: JSON.stringify(
      data
    ),
    headers: {
      "Content-type": "application/json; charset=UTF-8"
    }
  })
  res = await response.json()
  start()
  // if(res.message){
  //   alert(res.message)
  // }
}


function render(data){
  
  let creat = ''
  data.forEach((u) => {
    if(u.email == ''){
      email = ''
    }else{
      email = `
   <div>Email: ${u.email}</div>`
    }
    if(u.number == ''){
      number = ''
    }else{
      number = `
   <div>Номер тел: ${u.number}</div>`
    }
    creat += `
   <div class="formAdmin">
   <div>
   <div>name: ${u.name}</div>
    </div>
       <div>Номер товара: ${u.idTov}</div>
     <div class="tov">
       <div class="name">${u.nameTov}</div>
       </div>
       <div>
        <span>Дата добавления:</span>
        <div>${u.toDay}</div>
       </div>
       <div class="info">
         <div>Цена: ${u.price}₽</div>
         <div>Количество: x${u.num}</div>
         <input type='hidden' name='id[]' value='${u.id}'>
         <select name="status[]">
          <option value='waiting'>Ожидает</option>
          <option value='ready'>Готово</option>
        </select>
 </div>
</div>
 `
    
  })
  table.innerHTML = creat
}

async function query(data) {
  response = await fetch(urlReady, {
    method: 'post',
    body: JSON.stringify(data),
    headers: {
      "Content-type": "application/json; charset=UTF-8"
    }
  })
}

// Слушатели
table.addEventListener('click', (event) => {
  id = event.target.dataset.get
  if(id && id !== ''){
    getTov(id)
  }
})

// Фильтр
search.addEventListener('input', (event) => {
  if(event.target.value == ''){
    find.innerHTML = ''
  }else{
  const  value  = event.target.value.toLowerCase()
  if(st === 'waiting'){
    res = result.filter((e) => {
      return e.status === 'waiting'
    })
    }else{
      res = result.filter((e) => {
        return e.status === 'ready'
      })
    }
  
  const filterProduct = res.filter((product) => {
  return product.nameTov.toLowerCase().includes(value)/*  + product.price.includes(value) */
  })
  console.log(filterProduct)
    users(filterProduct)
    find.style.display = 'block'
  }
  // const filterName = res.filter((n) => {
  //   return n.name.toLowerCase().includes(value)
  // })
})

function users(res = []){
  const html = res.map(renderTov).join('')
  find.innerHTML = html
}

function renderTov(tov){
  return `
    <li>${tov.nameTov}</li>
  `
}

    find.addEventListener('click', (event) => {
      console.log(event.target.textContent)
      f = event.target.textContent
      // filterReset.style.display = 'flex'
      findRender(result, f)
    })
    search.addEventListener('blur', () => {
      setTimeout(() =>{
        find.style.display = 'none'
      }, 200)
    }) 
search.addEventListener('focus', () => {
  if(find.textContent !== ''){
    find.style.display = 'block'
  }else{
    find.innerHTML = ''
  }
})

function findRender(data, f){
  filt = data.filter(function(p){
    return p.nameTov === f
  })
  filterReset.style.display = 'block'
  table.innerHTML = ''
  if(st === 'waiting'){
  filtWait(filt)
  }else{
    filtReady(filt)
  }
}

