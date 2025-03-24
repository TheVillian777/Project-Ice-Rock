//Add to basket function
const bookslide = document.querySelectorAll('.book-slide');

bookSlides.forEach((slide) => {
    const popup = slide.querySelector('.hover-popup');
    popup.addEventListener('click', () => {
        alert(`${slide.querySelector('h3').innerText} added to basket!`);
    });
});

//takes user to the shop
function navigateToShop(){
    window.location.href = `shop`;
}
