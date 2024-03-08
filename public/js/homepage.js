document.addEventListener('DOMContentLoaded', function () {
    let reviews = document.querySelectorAll('.review');
    let currentIndex = 0;

    function showReview(index) {
        reviews.forEach(review => review.classList.remove('active'));
        reviews[index].classList.add('active');
    }

    function nextReview() {
        currentIndex = (currentIndex + 1) % reviews.length;
        showReview(currentIndex);
    }

    // Tự động chuyển đổi đánh giá sau mỗi 5 giây
    setInterval(nextReview, 4000);

    // Hiển thị đánh giá đầu tiên khi trang được tải
    showReview(currentIndex);
});
