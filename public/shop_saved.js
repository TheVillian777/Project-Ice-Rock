document.addEventListener('DOMContentLoaded', () => {
    const priceRange = document.getElementById('priceRange');
    const priceValue = document.getElementById('priceValue');

    priceRange.addEventListener('input', () => {
        priceValue.textContent = `£${priceRange.value}`;
    });
});

document.addEventListener('DOMContentLoaded', () => {
    const stars = document.querySelectorAll('.star');

    stars.forEach(star => {
        star.addEventListener('click', () => {
            const rating = star.getAttribute('data-value');

            stars.forEach(s => {
                s.classList.toggle('highlighted', s.getAttribute('data-value') <= rating);
            });

            console.log(`You rated: ${rating} stars`);
        });
    });
});

document.addEventListener('DOMContentLoaded', () => {
    const savedBooks = JSON.parse(localStorage.getItem('saved-books')) || [];

    // event listener for bookmark
    const saveIcons = document.querySelectorAll('.save-bookmark');
    saveIcons.forEach(icon => {
        icon.addEventListener('click', () => {
            const book = {
                title: icon.getAttribute('data-title'),
                author: icon.getAttribute('data-author'),
                image: icon.getAttribute('data-image')
            };

            // check if the book is already saved
            if (!savedBooks.some(savedBook => savedBook.title === book.title)) {
                savedBooks.push(book); // add to saved books array
                localStorage.setItem('saved-books', JSON.stringify(savedBooks)); // store in local storage
                alert(`${book.title} has been saved to your collection!`);
            } else {
                alert(`${book.title} is already in your saved books.`);
            }
        });
    });
});

document.addEventListener("DOMContentLoaded", () => {
    const carousel = document.querySelector('.book-carousel');
    const prevButton = document.querySelector('.carousel-prev');
    const nextButton = document.querySelector('.carousel-next');
    const cardWidth = document.querySelector('.book-card').offsetWidth;

    let scrollPosition = 0;

    //scroll by one when the user clicks, if it reaches the end then go back to 0
    nextButton.addEventListener('click', () => {
        scrollPosition += cardWidth * 1;
        if (scrollPosition >= carousel.scrollWidth) { 
            scrollPosition = 0;
        }
        carousel.scrollTo({ left: scrollPosition, behavior: 'smooth' });
    });

    prevButton.addEventListener('click', () => {
        scrollPosition -= cardWidth * 1;
        if (scrollPosition < 0) {
            scrollPosition = carousel.scrollWidth - cardWidth * 4;
        }
        carousel.scrollTo({ left: scrollPosition, behavior: 'smooth' });
    });
});
