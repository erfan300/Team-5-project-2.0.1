//This function removes the animation of the log in message after if faded out
function handleAnimationEnd() {
    document.querySelector('.alert-success').remove();
}
document.addEventListener('DOMContentLoaded', function() { 
    setTimeout(function() {
        var alertElement = document.querySelector('.alert-success');
        alertElement.classList.add('fade-out');

        alertElement.addEventListener('animationend', handleAnimationEnd);
    }, 2000); 
});

//Function for Slide Show change
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

//Function for filter link popdown box
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

// This checks the threshold and quantity. If quantity if equal to or less than threshold, than alert message 
// appears for the user
document.addEventListener('DOMContentLoaded', function () {
    var stockLevel = parseInt(document.querySelector('.book-container').dataset.stockLevel);
    var threshold = parseInt(document.querySelector('.book-container').dataset.threshold);

    if (!isNaN(stockLevel) && !isNaN(threshold) && stockLevel <= threshold && stockLevel > 0) {
        var notification = document.createElement('div');
        notification.className = 'notification';
        notification.innerHTML = 'Hurry! Only ' + stockLevel + ' left in stock.';

        document.body.appendChild(notification);

        // Display the notification for 2 seconds before removing it
        setTimeout(function () {
            notification.style.opacity = '0';
            setTimeout(function () {
                notification.remove();
            }, 1000);
        }, 2000);
    }
});





