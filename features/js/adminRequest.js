const url = '/entities/allProduct/allProduct.php'
const urlType = '/entities/typeProduct/type.php'
const urlDelite = '/features/delite/delite.php'
// ../../features/delite/delite.php

async function katalog(){
  main.innerHTML = `<h2 class='load'>Загрузка...</h2>`
  try{
    type = await fetch(urlType)
    typeResp = await type.json()
    response = await fetch(url)
    result = await response.json()
    console.log(result)
    if(!!result){
      nullColection()
    }
    product = result
    groupBy(typeResp, result)
    return typeResp, result
    // start(result)
  }catch(err){
    console.error('Ошибка:', err)
    nullColection()
  }
}

katalog()

function nullColection(){
  main.innerHTML = `<form class="add Box" action="../../features/add/add.php" enctype="multipart/form-data" method="post" autocomplete="off">
        <div class="img">
          <input type="file" name="image">
        </div>
        <input type="text" name="type" required value="" placeholder="Категория">
        <div class="text"><input type="required" required name="nam" placeholder="Наименование"></div>
        <div class="price">
          <input type="number" required name="price" placeholder="Цена"></div>
          <button type="sub">Добавить</button>
      </form>`
}

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
  <h3>${t}</h3>
  <div  class="case">
   <form class="add Box" action="../../features/add/add.php" enctype="multipart/form-data" method="post" autocomplete="off">
        <div class="img">
          <input type="file" name="image">
        </div>
        <input type="text" name="type" required value="${t}" placeholder="Категория">
        <div class="text"><input type="required" required name="nam" placeholder="Наименование"></div>
        <div class="price">
          <input type="number" required name="price" placeholder="Цена"></div>
          <button type="sub">Добавить</button>
      </form>
  `;
  render(data)

}
async function render(data){
  data.forEach((u) => {
      if(u.image){
        img = ` <div class="img"><img class="image" src="${u.image}"></div>`
      }else{
        img = `<div class="NULL"><img src="/shared/image/NULL.png" alt=""></div>`
      }
      creat += `
      <form class="Box" action="../../features/put/putTov.php" method="POST">
          ${img}
          <div class="text">
            <input type="text" name="nam" value="${u.name}">
          </div>
          <div class="row">
          <div class="id">id:<input type="text" readonly name="id" value="${u.id}" size=10></div>
          <div><input type="text" name="price" value="${u.price}">₽</div>
        </div>
          <div class="row">
          <button type="sub" class="button">Изменть</button>
        <button type="button" data-id='${u.id}' class="delite">Удалить</button>
      </div>
        </form> `
})
creat += `
</div><!-- Закрытие case -->
</div>`
main.insertAdjacentHTML('beforeend', creat)

}
async function delit(data){
  response = await fetch(urlDelite, {
    method: 'post',
    body: JSON.stringify(
      data
    ),
    headers: {
      "Content-type": "application/json; charset=UTF-8"
    }
  })
  res = await response.json()
  katalog()
  if(res.message){
    alert(res.message)
  }
}

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
    <form class="Box" action="../../features/put/putTov.php" method="POST">
        ${img}
        <div class="text">
          <input type="text" name="nam" readonly value="${u.name}">
        </div>
        <div class="row">
        <div class="id">id:<input type="text" readonly name="id" value="${u.id}" size=10></div>
        <div><input type="text" disabled name="price" value="${u.price}">₽</div>
      </div>
      <div class="row">
          <button type="sub" class="button">Изменть</button>
        <button type="button" data-id='${u.id}' class="delite">Удалить</button>
      </div>
      </form> `
})
creat += `
</div><!-- Закрытие case -->
`
main.insertAdjacentHTML('beforeend', creat)
}

// Слушатели
main.addEventListener('click', (event) => {
  id = event.target.dataset.id
  if(id){
    delit(id)
    // console.log(id)
  }
})