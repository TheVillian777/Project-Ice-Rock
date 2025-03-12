// variables to calcuate how to move images.
const sliderContainer = document.querySelector('.slider-container');
const slides = document.querySelectorAll('.slide');
const totalSlides = slides.length;
let currentIndex = 0;

// Periodic scrolling in 5 seconds interval
setInterval(() => {
    moveToNextSlide();
}, 5000); 

// Force move to the next slide
function moveToNextSlide() {
    currentIndex = (currentIndex + 1) % totalSlides;
    updateSliderPosition();
}

// Force move to the previous slide
function moveToPrevSlide() {
    currentIndex = (currentIndex - 1 + totalSlides) % totalSlides;
    updateSliderPosition();
}

// Updates the image sliders position
function updateSliderPosition() {
    sliderContainer.style.transform = `translateX(-${currentIndex * 100}%)`;
}

// Attach event listeners to arrows so you have the option to moves the images either next slide or previous
document.querySelector('.prev-arrow').addEventListener('click', moveToPrevSlide);
document.querySelector('.next-arrow').addEventListener('click', moveToNextSlide);


// Calculates how many spaces to move the books either forward or backwards
const bookSliderContainer = document.querySelector('.book-slider-container');
const bookSlides = document.querySelectorAll('.book-slide');
const totalBookSlides = bookSlides.length;
let currentBookIndex = 0;

document.querySelector('.book-next-arrow').addEventListener('click', () => {
    currentBookIndex = (currentBookIndex + 1) % totalBookSlides;
    updateBookSliderPosition();
});

document.querySelector('.book-prev-arrow').addEventListener('click', () => {
    currentBookIndex = (currentBookIndex - 1 + totalBookSlides) % totalBookSlides;
    updateBookSliderPosition();
});

function updateBookSliderPosition() {
    const bookSlideWidth = bookSlides[0].clientWidth + 20; 
    bookSliderContainer.style.transform = `translateX(-${currentBookIndex * bookSlideWidth}px)`;
}

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

document.addEventListener("DOMContentLoaded", () => {
    const popup = document.getElementById("bookPopup");
    const closeBtn = document.querySelector(".close-btn");
    const bookSlides = document.querySelectorAll(".book-slide");

    bookSlides.forEach(book => {
        book.addEventListener("click", () => {
            document.getElementById("popup-book-cover").src = book.querySelector("img").src;
            document.getElementById("popup-book-title").innerText = book.querySelector("h3").innerText;
            document.getElementById("popup-book-author").innerText = book.querySelector("p").innerText;
            document.getElementById("popup-book-price").innerText = book.querySelector(".price").innerText;
            popup.style.display = "flex";
        });
    });

    closeBtn.addEventListener("click", () => {
        popup.style.display = "none";
    });
});