const url = '/entities/allProduct/allProduct.php'
const urlType = '/entities/typeProduct/type.php'
const urlBuy = '/features/buy/buy.php'
const urlBasket = '/entities/basket/userBasket.php'

async function katalog(){
  main.innerHTML = `<h2 class='load'>Загрузка...</h2>`
  try{
    type = await fetch(urlType)
    typeResp = await type.json()
    response = await fetch(url)
    result = await response.json()
    console.log(result)
    product = result
    groupBy(typeResp, result)
    return typeResp, result
    // start(result)
  }catch(err){
    console.error('Ошибка:', err)
  }
}

katalog()



function groupBy(type, result){
  main.innerHTML = ''
  filter.innerHTML = ''
  let num = 0
  ind = 0
  type.forEach((e) => {
    ++num
      filter.insertAdjacentHTML('beforeend', `<div data-index="${num}">${e.type}</div>`)
  });
  for(let a of type){
    ++ind
    t = a.type
    d = result
    filt = d.filter(function(p){
      return p.type === t
    })
    preRender(t, filt, ind)
    
  }
}
function preRender(t, data, index){
  creat =  `<div class="index" id="index${index}"> <!-- Объединение типов //id="index${index} - опционален -->
  <h3>${t}</h3>`;
  render(data)

}
async function render(data){
  creat +=  `
  <div  class="case">
  `
  data.forEach((u) => {
      if(u.image){
        img = ` <div class="img"><img class="image" src="${u.image}"></div>`
      }else{
        img = `<div class="NULL"><img src="/shared/image/NULL.png" alt=""></div>`
      }
      creat += `
      <form class="Box">
      ${img}
      <div class="text">
      <input type="hidden" name="id" value="${u.id}">
      ${u.name}
      <div>${u.name}</div>
      </div>
      <div class="price">${u.price}₽</div><button data-id="${u.id}" class="buy" type="button">+ Добавить</button>
      </form> 
      `
})
creat += `
</div><!-- Закрытие case -->
</div>`
main.insertAdjacentHTML('beforeend', creat)

}
main.onclick = async function(event){
  id = event.target.dataset.id
  if(id && id !== ''){
    u = vition.textContent
  buy(id, u)
  console.log(u)
  }
}
async function buy(id, user){
  try{
  r = await fetch(urlBuy, {
    method: 'POST',
    
    body: JSON.stringify({
      idTov: id,
      name: user
    }),
    headers: {
      "Content-type": "application/json; charset=UTF-8"
    }
  })
  if(r.status >= 200 && r.status < 400){
  re = await r.json()
    if(re.message){
      alert(re.message)
    }else{
      alert('Товар добавлен в корзину')
    }
  }
  }catch(err){
    console.error('Ошибка:',err)
  }
}

// Поиск
function newRender(data){
  main.innerHTML = ''
  creat =  `
  <div  class="case">
  `
  data.forEach((u) => {
      if(u.image){
        img = ` <div class="img"><img class="image" src="${u.image}"></div>`
      }else{
        img = `<div class="NULL"><img src="/shared/image/NULL.png" alt=""></div>`
      }
      creat += `
      <form class="Box">
      ${img}
      <div class="text">
      <input type="hidden" name="id" value="${u.id}">
      ${u.name}</div>
      <div class="price">${u.price}₽</div><button data-id="${u.id}" class="buy" type="button">+ Добавить</button>
      </form> 
      `
})
creat += `
</div><!-- Закрытие case -->
`
main.insertAdjacentHTML('beforeend', creat)
}
