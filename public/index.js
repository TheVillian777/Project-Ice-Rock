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
