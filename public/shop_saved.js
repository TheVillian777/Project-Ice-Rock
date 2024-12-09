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

            // Check if the book is already saved
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
