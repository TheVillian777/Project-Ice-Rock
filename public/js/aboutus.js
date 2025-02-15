console.log("JavaScript loaded successfully!");

document.addEventListener("DOMContentLoaded", function () {
    const readMoreBtn = document.querySelector("#readMoreBtn");
    const moreContent = document.querySelector("#moreContent");

    if (readMoreBtn && moreContent) {  
        moreContent.style.display = "none"; // Hide extra content initially

        readMoreBtn.addEventListener("click", function () {
            const isHidden = moreContent.style.display === "none";

            moreContent.style.display = isHidden ? "block" : "none"; // Toggle content visibility
            readMoreBtn.textContent = isHidden ? "Read Less" : "Read More"; // Change button text
        });
    }
});
