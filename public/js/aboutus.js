console.log("JavaScript loaded successfully!");

document.addEventListener("DOMContentLoaded", function() {
    const readMoreBtn = document.querySelector("#readMoreBtn");
    const moreContent = document.querySelector("#moreContent");

    if (readMoreBtn && moreContent) {  // Ensure both elements exist
        moreContent.style.display = "none"; // Hide content initially

        readMoreBtn.addEventListener("click", function() {
            if (moreContent.style.display === "none" || moreContent.style.display === "") {
                moreContent.style.display = "block";  // Show content
                readMoreBtn.textContent = "Read Less"; // Change button text
            } else {
                moreContent.style.display = "none";  // Hide content again
                readMoreBtn.textContent = "Read More"; // Reset button text
            }
        });
    } else {
        console.error("Error: Read More button or more content not found.");
    }
});
