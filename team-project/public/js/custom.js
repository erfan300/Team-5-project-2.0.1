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