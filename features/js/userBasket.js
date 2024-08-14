const url = '/entities/basket/userBasket.php'
const urlDelet = '/features/basketRequest/delet.php'
const urlApplic = '/features/basketRequest/basketOrder.php'
const cont = document.querySelector('#cont')
let data = []
//Фильтр
const search = document.querySelector('#search')
const find = document.querySelector('#find')
const blockSearch = document.querySelector('#blockSearch')
let product = []




if(vition.textContent == 'ВОЙТИ'){
  cont.innerHTML = `<h1>ВОЙДИТЕ В АККАУНТ</h1>`
}else{
start()
}

async function start(){

  try{
    response = await fetch(url, {
      method: 'post',

      body: JSON.stringify({
        name: vition.textContent
      }),
      headers: {
        "Content-type": "application/json; charset=UTF-8"
      }
    })
    result = await response.json()
    product = result
    render(result)
    // return result
  }catch(err){
    console.error(err)
  }
}

function render(data){
  if(!!data.message){
    cont.innerHTML = `<h1>КОРЗИНА ПУСТА</h1>`
  }else{
  let sum = 0
  data.forEach((e) => {
    f = Number(e.price)
    t = Number(e.num)
     sum += f * t
  })
  console.log(sum)
  create = `
     <!-- <div class="line"> -->
  <div class="basketDown">
    <div class="info">
      <h2>ИТОГ</h2>
    </div>
    <menu>
      <div class="price">${sum}₽</div>
      <button data-order='order' type='button'>Оформить</button>
    </menu>
  </div>
  <!-- </div> -->
  `
  data.forEach((u) => {
    if(u.image){
      img = u.image
    }else{
      img = '/shared/image/NULL.png'
    }
    create += `
      <div class="form">
        <div class="image"><img src="${img}" alt=""></div>
        <div class="tov">
          <div class="name">${u.nameTov}</div>
          </div>
          <div class="info">
            <div>
            Цена: ${u.price}₽
            </div>
            <div>
            Количество: <div class='row'><button class='but' data-min='${u.id}' type='button'>-</button>x${u.num}<button class='but' data-plus='${u.id}' type='button'>+</button></div>
            </div>
            <input type="hidden" name="product" value="${u.id}">
            <button class='delite' data-id='${u.id}' type='button'>Удалить</button>
    </div>
  </div>
    `
  })
  cont.innerHTML = create
  }
}

cont.addEventListener('click', (event) => {
  if(event.target.dataset.id !== undefined)
  {
    console.log(event.target.dataset)
    d = event.target.dataset.id
    delet(d)
  }
  if(event.target.dataset.order){   
    result.forEach((u) => {
      return data.push(u.id)
    })
    application(data)
  }
  if(event.target.dataset.plus || event.target.dataset.min){
    if(event.target.dataset.plus){
      pm = event.target.dataset.plus
      m = 'plus'
    }else{
      pm = event.target.dataset.min
      m = 'min'
    }
    plusMin(pm, m)
  }
})
async function plusMin(pm, m){
  resp = await fetch(urlDelet,{
    method: 'post',
    body: JSON.stringify({
      data: pm,
      // p: pm,
      m: m
    }),
    headers: {"Content-type": "application/json; charset=UTF-8"}
  })
  start()
}

async function application(data){
  resp = await fetch(urlApplic, {
    method: 'post',
    body: JSON.stringify(data
    ),
    headers: {
      "Content-type": "application/json; charset=UTF-8"
    }
  })
  res = await resp.json()
  start()
}

async function delet(){
  response = await fetch( urlDelet, {
    method: 'post',
    body: JSON.stringify({
      data: d
    }),
    headers: {"Content-type": "application/json; charset=UTF-8"}
  })
  result = await response.json()
  start()
}

// Фильтр
// search.addEventListener('input', (event) => {
//   if(event.target.value == ''){
//     find.innerHTML = ''
//   }else{
//   const  value  = event.target.value.toLowerCase()
//   const filterProduct = product.filter((product) => {
//   return product.nameTov.toLowerCase().includes(value) + product.price.includes(value)
//   })


//   console.log(value)
//     users(filterProduct)
//     find.style.display = 'block'
//   }
// })

// function users(res = []){
//   const html = res.map(renderTov).join('')
//   find.innerHTML = html
// }

// function renderTov(tov){
//   return `
//     <li>${tov.nameTov}</li>
//   `
// }

//     find.addEventListener('click', (event) => {
//       console.log(event.target.textContent)
//       f = event.target.textContent
//       // filterReset.style.display = 'flex'
//       findRender(result, f)
//     })
//     search.addEventListener('blur', () => {
//       setTimeout(() =>{
//         find.style.display = 'none'
//       }, 200)
//     }) 
// search.addEventListener('focus', () => {
//   if(find.textContent !== ''){
//     find.style.display = 'block'
//   }else{
//     find.innerHTML = ''
//   }
// })

// function findRender(data, f){
//   filt = data.filter(function(p){
//     return p.name === f
//   })
//   render(filt)
// }

// function newRender (data){

// }