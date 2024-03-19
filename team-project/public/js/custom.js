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

document.addEventListener("DOMContentLoaded", function () {
    // Get all buttons with class 'show-replies-btn'
    var showButtons = document.querySelectorAll('.show-replies-btn');

    // Loop through each button
    showButtons.forEach(function (button) {
        // Add click event listener to each button
        button.addEventListener('click', function () {
            // Get the comment id from the data attribute
            var commentId = button.getAttribute('data-comment-id');

            // Get the corresponding replies content and hide/show buttons
            var repliesContent = document.getElementById('replies-' + commentId);
            var hideButton = document.querySelector('.hide-replies-btn[data-comment-id="' + commentId + '"]');

            // Show the replies content and hide the show button
            repliesContent.style.display = 'block';
            button.style.display = 'none';

            // Show the hide button
            hideButton.style.display = 'inline-block';
        });
    });

    // Get all buttons with class 'hide-replies-btn'
    var hideButtons = document.querySelectorAll('.hide-replies-btn');

    // Loop through each button
    hideButtons.forEach(function (button) {
        // Add click event listener to each button
        button.addEventListener('click', function () {
            // Get the comment id from the data attribute
            var commentId = button.getAttribute('data-comment-id');

            // Get the corresponding replies content and show/hide buttons
            var repliesContent = document.getElementById('replies-' + commentId);
            var showButton = document.querySelector('.show-replies-btn[data-comment-id="' + commentId + '"]');

            // Hide the replies content and hide the hide button
            repliesContent.style.display = 'none';
            button.style.display = 'none';

            // Show the show button
            showButton.style.display = 'inline-block';
        });
    });
});




