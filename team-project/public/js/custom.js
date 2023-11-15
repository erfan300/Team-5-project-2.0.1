//This function removes the animation of the log in message after if faded out
function handleAnimationEnd() {
    document.querySelector('.alert-success').remove();
}
document.addEventListener('DOMContentLoaded', function() {
    // Fade-out the log in message 
    setTimeout(function() {
        var alertElement = document.querySelector('.alert-success');
        alertElement.classList.add('fade-out');

        // Event Listener Listens for the end of the fade-out animation and activates handleAnimatedEnd
        alertElement.addEventListener('animationend', handleAnimationEnd);
    }, 2000); 
});

//Function for Slide Show 
let slideIndex = 0;

        function showSlides() {
            let i;
            const slides = document.getElementsByClassName("mySlides");
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slideIndex++;
            if (slideIndex > slides.length) { slideIndex = 1 }
            slides[slideIndex - 1].style.display = "block";
            setTimeout(showSlides, 6000); // Change slide every 6 seconds
        }

        document.addEventListener("DOMContentLoaded", function () {
            showSlides();
        });

//Function for filter link
document.addEventListener("DOMContentLoaded", function () {
    var filterLink = document.querySelector(".filter-link");
    var filterDropdown = document.querySelector(".filter-dropdown");

    filterLink.addEventListener("mouseover", function () {
        filterDropdown.style.display = "block";
    });

    filterLink.addEventListener("mouseout", function () {
        filterDropdown.style.display = "none";
    });
});