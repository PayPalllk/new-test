const entry = document.getElementById('entry')
const back = document.getElementById('left')
const vition = document.getElementById('vition')
const exit = document.getElementById('exit')
const user = document.getElementById('user')
const subEntry = document.getElementById('sub-entry')
// const formEntry = document.querySelector('#formEntry')
let formEntry = document.forms.entry
const urlEntry = '../../features/entry/entry.php'
const urlUserInt = '/features/user/userInt.php'

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
back.onclick = () =>{
  entry.style.display = 'none'
  document.body.style.overflow = 'unset'
}

subEntry.onclick = async () =>{
  // const formData = new FormData(formEntry)
  // formData.get('login')
  // formData.get('pass')
  // formData.append('login', login)
  // Entry(formData)
  resp = await fetch(urlEntry, {
    method: 'post',
    body: new FormData(formEntry)
  })
  r = await resp.json()
  if(r.admin){
    window.location = r.admin
  }
  if(r.user && r.status === 'ok'){
    vition.textContent = r.user
    user.textContent = r.user
    entry.style.display = 'none'
    document.body.style.overflow = 'unset'
  }
  if(r.message){
    alert(r.message)
  }
}
// Ассинхронный запрос на вход
// async function Entry(data){
//   resp = await fetch(urlEntry, {
//     method: 'post',
//     body: JSON.stringify(data),
//     header: {"Content-type": "application/json; charset=UTF-8"}
//   })
// }

// Запрос в корзину на наличие и количество товаров у пользователя
async function kol(data){
  resp = await fetch(urlUserInt, {
    method: 'post',
    header: {"Content-type": "application/json; charset=UTF-8"},
    body: JSON.stringify(data)
  })
}