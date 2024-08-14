const search = document.querySelector('#search')
const find = document.querySelector('#find')
const blockSearch = document.querySelector('#blockSearch')
let product = []


search.addEventListener('input', (event) => {
  if(event.target.value == ''){
    find.innerHTML = ''
  }else{
  const  value  = event.target.value.toLowerCase()
  const filterProduct = product.filter((product) => {
  return product.name.toLowerCase().includes(value)/*  + product.id.includes(value) */
  })


  // console.log(value)
    users(filterProduct)
    find.style.display = 'block'
  }
})

function users(res = []){
  const html = res.map(renderTov).join('')
  find.innerHTML = html
}

function renderTov(tov){
  return `
    <li>${tov.name}</li>
  `
}

    find.addEventListener('click', (event) => {
      console.log(event.target.textContent)
      if(event.target.textContent !== ''){
      f = event.target.textContent
      filterReset.style.display = 'flex'
      findRender(result, f)
      }
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
    return p.name === f
  })
  newRender(filt)
}

