console.log('status: "OK"')
const url = '/entities/test/test.php'
const post = document.querySelector(".user")
async function test(){
   post.innerHTML = 'Загрузка...'
  try{
    
    const response = await fetch(url/* , {
      method: "GET",
      credentials: "same-origin",

    } */)
    const data = await response.json()
    console.log(data)
    post.innerHTML = data.name
   
  } catch(error){
    console.error('Ошибка: ', error)
  }
  finally{
    
    
  }
}
test()