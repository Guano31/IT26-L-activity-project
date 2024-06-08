let openShopping = document.querySelector('.shopping');
let closeShopping = document.querySelector('.closeShopping');
let list = document.querySelector('.list');
let listCard = document.querySelector('.listCard');
let body = document.querySelector('body');
let total = document.querySelector('.total');
let quantity = document.querySelector('.quantity');

openShopping.addEventListener('click', ()=>{
    body.classList.add('active');
})
closeShopping.addEventListener('click', ()=>{
    body.classList.remove('active');
})

let products = [
    {
        id: 1,
        name: 'Fluted Hem Dress',
        image: 'img1.jfif',
        price: 120000
    },
    {
        id: 2,
        name: 'Pleat Printed Dress ',
        image: 'img2.jfif',
        price: 120000
    },
    {
        id: 3,
        name: 'Flowy Shirt Dress',
        image: 'img3.jfif',
        price: 220000
    },
    {
        id: 4,
        name: 'Double Layer Dress',
        image: 'img4.jfif',
        price: 123000
    },
    {
        id: 5,
        name: 'Hellow Dress ',
        image: 'img5.jfif',
        price: 320000
    },
    {
        id: 6,
        name: 'Wow Dress ',
        image: 'img6.jfif',
        price: 120000
    },
    {
        id: 7,
        name: 'Bitch Dress',
        image: 'img7.jpg',
        price: 120000
    },
    {
        id: 8,
        name: 'Showy Dress',
        image: 'img8.jfif',
        price: 120000
    }

];

let listCards  = [];
function initApp(){
    products.forEach((value, key) =>{
        let newDiv = document.createElement('div');
        newDiv.classList.add('item');
        newDiv.innerHTML = `
            <img src="image/${value.image}">
            <div class="title">${value.name}</div>
            <div class="price">${value.price.toLocaleString()}</div>
            <button onclick="addToCard(${key})">Add To Card</button>`;
        list.appendChild(newDiv);
    })
}
initApp();
function addToCard(key){
    if(listCards[key] == null){
        // copy product form list to list card
        listCards[key] = JSON.parse(JSON.stringify(products[key]));
        listCards[key].quantity = 1;
    }
    reloadCard();
}
function reloadCard(){
    listCard.innerHTML = '';
    let count = 0;
    let totalPrice = 0;
    listCards.forEach((value, key)=>{
        totalPrice = totalPrice + value.price;
        count = count + value.quantity;
        if(value != null){
            let newDiv = document.createElement('li');
            newDiv.innerHTML = `
                <div><img src="image/${value.image}"/></div>
                <div>${value.name}</div>
                <div>${value.price.toLocaleString()}</div>`;

                listCard.appendChild(newDiv);
        }
    })
    // total.innerText = totalPrice.toLocaleString();
    quantity.innerText = count;
}
function changeQuantity(key, quantity){
    if(quantity == 0){
        delete listCards[key];
    }else{
        listCards[key].quantity = quantity;
        listCards[key].price = quantity * products[key].price;
    }
    reloadCard();
}