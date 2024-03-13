document.addEventListener('DOMContentLoaded', function () {
    let reviews = document.querySelectorAll('.review');
    let buttons = document.querySelectorAll('.review-buttons button');

    function showReview(index) {
        reviews.forEach(review => review.classList.remove('active'));
        reviews[index].classList.add('active');
    }

    function selectReview(index) {
        showReview(index);
    }

    function autoSwitchReview() {
        let currentIndex = Array.from(reviews).findIndex(review => review.classList.contains('active'));
        let nextIndex = (currentIndex + 1) % reviews.length;
        showReview(nextIndex);
    }

    setInterval(autoSwitchReview, 5000);

    showReview(0);

    buttons.forEach((button, index) => {
        button.addEventListener('click', function () {
            selectReview(index);
        });
    });
});
