document.addEventListener('DOMContentLoaded', function() {
    const bookSliderContainer = document.querySelector('.book-slider-container');
    const bookPrevArrow = document.querySelector('.book-prev-arrow');
    const bookNextArrow = document.querySelector('.book-next-arrow');
 
    const scrollAmount = 300; // Adjust this value to control how much to scroll
 
    bookPrevArrow.addEventListener('click', () => {
        bookSliderContainer.scrollBy({
            left: -scrollAmount,
            behavior: 'smooth'
        });
    });
 
    bookNextArrow.addEventListener('click', () => {
        bookSliderContainer.scrollBy({
            left: scrollAmount,
            behavior: 'smooth'
        });
    });
});
 
document.addEventListener("DOMContentLoaded", function () {
    const slides = document.querySelectorAll(".slide");
    let currentIndex = 0;
    const totalSlides = slides.length;
 
    function showSlide(index) {
        slides.forEach((slide, i) => {
            slide.style.display = i === index ? "block" : "none";
        });
    }
 
    function nextSlide() {
        currentIndex = (currentIndex + 1) % totalSlides;
        showSlide(currentIndex);
    }
 
    // Initial display
    showSlide(currentIndex);
   
    // Change slide every 8 seconds
    setInterval(nextSlide, 8000);
});
 
//Add to basket function
const bookslide = document.querySelectorAll('.book-card');
 
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