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
document.addEventListener('DOMContentLoaded', function () {
    const additionalCards = [
        `<div class="col-md-4 mb-3">
            <div class="card">
            <img src="{{ asset('images\logoconverse.jpg') }}" class="card-img-top" alt="#">
                <div class="card-body">
                    <h5 class="card-title">Additional Card 1</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>`,
        `<div class="col-md-4 mb-3">
            <div class="card">
            <img src="{{ asset('images\logoconverse.jpg') }}" class="card-img-top" alt="#">
                <div class="card-body">
                    <h5 class="card-title">Additional Card 2</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>`,
        `<div class="col-md-4 mb-3">
            <div class="card">
            <img src="{{ asset('images\logoconverse.jpg') }}" class="card-img-top" alt="#">
                <div class="card-body">
                    <h5 class="card-title">Additional Card 3</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>`
    ];

    let currentCardIndex = 0;

    function addMoreCards() {
        const row = document.getElementById('cardContainer');
        for (let i = currentCardIndex; i < currentCardIndex + 3 && i < additionalCards.length; i++) {
            const newCard = document.createElement('div');
            newCard.innerHTML = additionalCards[i];
            row.appendChild(newCard.firstChild);
        }
        currentCardIndex += 3;
        if (currentCardIndex >= additionalCards.length) {
            document.getElementById('showMoreBtn').style.display = 'none';
        }
    }
    document.getElementById('showMoreBtn').addEventListener('click', addMoreCards);
});
document.addEventListener('DOMContentLoaded', function () {
    var backToTopButton = document.querySelector('.back-to-top-btn');

    window.addEventListener('scroll', function () {
        if (window.scrollY > 300) {
            backToTopButton.style.display = 'block';
        } else {
            backToTopButton.style.display = 'none';
        }
    });

    backToTopButton.addEventListener('click', function (e) {
        e.preventDefault();
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });
});
//customer nhan tin ho tro voi staff
document.addEventListener('DOMContentLoaded', function () {
    var chatButton = document.querySelector('.chat-btn');

    chatButton.addEventListener('click', function () {
        // Open chat window or initiate chat action here
        // For example, open a new chat page in a new window
        window.open('https://www.messenger.com/t/274283589104715', '_blank', 'width=800,height=600');
    });
});
