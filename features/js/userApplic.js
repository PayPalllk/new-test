const content = document.querySelector('#container')
const waiting = document.querySelector('#waiting')
const ready = document.querySelector('#ready')
const url = '/entities/basket/userApplic.php'
let st = 'ready'

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
  if(st = 'ready'){
    waiting.style.borderBottom = '1px solid white'
    ready.style.borderBottom = '1px solid #939ed0'
    waiting.style.background = 'white'
    ready.style.background = '#eeefe8'
    filtWait(result)
  }
}

start()
async function start() {
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
  filtWait(result)
  console.log(result)
}
function filtWait(result){
  res = result.filter((e) => {
    return e.status === 'waiting'
  })
  s = 'Ожидает'
  render(res, s)
}
function filtReady(result){
  res = result.filter((e) => {
    return e.status === 'ready'
  })
  if(!res){
    content.innerHTML = "<h1>Пока что ничего нету, возможно администратор ещё не ответил на ваш запрос</h1>"
  }else{
    s = 'Готов'
    render(res, s)
  }
}
function render(data) {
  content.innerHTML = ''
  let create = ''
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
         Цена: ${u.price}₽
         <div>
            Количество: x${u.num}
          </div>
          <div>
            Статус: ${s}
          </div>
         <!-- <input type="checkbox" name="product" value="${u.idTov}"> -->
         <input type="hidden" name="product" value="${u.id}">
 </div>
</div>
 `
})

content.innerHTML = create
}