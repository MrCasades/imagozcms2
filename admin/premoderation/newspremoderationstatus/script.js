//Проверка на число

const checkNum = document.getElementById('checknum')

const confirm = document.getElementById('confirm')

confirm.addEventListener('click', (event) => {
    if ((isNaN(checkNum.value)) || ((checkNum.value < 0) || (checkNum.value > 100))){
        const incorr = document.getElementById('incorr')
        incorr.innerHTML = 'Данные некорректны! Введите любое число от 0 до 100'
        event.preventDefault()	
    }
})

//Изменение гонорара

const priceText = document.getElementById('pricetext')

const addBonus = document.getElementById('addbonus')

const defaultPrice = priceText.innerHTML


addBonus.addEventListener('input', (event) => {

    if ((!addBonus.value) || (isNaN(addBonus.value))){
        priceText.innerHTML = defaultPrice
    }
    else{

        priceText.innerHTML = parseFloat(defaultPrice) + parseFloat(addBonus.value)}
})
