<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HTH SNEAKER STORE</title>
    <link rel="shortcut icon" href="{{asset('images/favicon.ico')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/fe/homepage.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="{{ asset('js/homepage.js') }}"></script>
</head>

<body>
    <div class="header">
        <div class="header-left">
            <a href="{{ route('frontend.home') }}"><img src="{{ asset('images/logo-shop.png') }}" alt="Mô tả của hình ảnh"></a>
            <div class="option-header">
                <a href="/product">Products</a>
                <a href="#">About</a>
                <a href="/blog">Blogs</a>
            </div>
        </div>
        <div class="header-right">

            <form id="addToCartForm" action="{{ route('frontend.addToCart') }}" method="POST" style="display: none;">
                @csrf
            </form>
            <a href="#" class="add-cart" onclick="event.preventDefault(); document.getElementById('addToCartForm').submit();">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 56 56">
                    <path fill="currentColor" d="M20.008 39.649H47.36c.913 0 1.71-.75 1.71-1.758s-.797-1.758-1.71-1.758H20.406c-1.336 0-2.156-.938-2.367-2.367l-.375-2.461h29.742c3.422 0 5.18-2.11 5.672-5.461l1.875-12.399a7.2 7.2 0 0 0 .094-.89c0-1.125-.844-1.899-2.133-1.899H14.641l-.446-2.976c-.234-1.805-.89-2.72-3.28-2.72H2.687c-.937 0-1.734.822-1.734 1.76c0 .96.797 1.781 1.735 1.781h7.921l3.75 25.734c.493 3.328 2.25 5.414 5.649 5.414m31.054-25.454L49.4 25.422c-.188 1.453-.961 2.344-2.344 2.344l-29.906.023l-1.993-13.594ZM21.86 51.04a3.766 3.766 0 0 0 3.797-3.797a3.781 3.781 0 0 0-3.797-3.797c-2.132 0-3.82 1.688-3.82 3.797c0 2.133 1.688 3.797 3.82 3.797m21.914 0c2.133 0 3.82-1.664 3.82-3.797c0-2.11-1.687-3.797-3.82-3.797c-2.109 0-3.82 1.688-3.82 3.797c0 2.133 1.711 3.797 3.82 3.797" />
                </svg>
                <span id="cartCounter" class="cart-counter">0</span>
            </a>
            <a href="#" class="btn-contact">
                Contact
            </a>
        </div>
    </div>

    </div>
    <div class="banner">
        <div class="img-bander">
            <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEiNXKe3GTbcjdqvX9YlFOBE0tAB-l5MnoT_D7zyXqOmuzm3fX57Url44VlGJIUXr3YbEeWBBh95DBAOdbrwTdkzPZfqnA8M_ueN7uazMv4SCUhcf8entgJrIv_u-hsPGG_ZuVd8KKbI5Zr0oli-40C0BQm5sj7uN6kE_d7I-Cg-YWOO9Hrc0t6i7ktb/s1920/shoe%20banner%20by%20lincungstock.jpg" alt="">
            <div class="search-banner">
                <h4>Do you have your product yet?</h4>
                <p>More than 100 products are waiting for you</p>
                <form>
                    <div class="input-search">
                        <i class="bi bi-search" style="font-size: 20px;"></i>
                        <input type="text" placeholder="input name product ...">
                    </div>
                    <button type="submit">Search</button>
                </form>
            </div>
        </div>
    </div>
    </div>
    <div class="product-hot-new">
        @foreach($products as $product)
        <a href="#" class="item-product">
            <div class="img-product">
                <img src="{{ asset($product->Image) }}" alt="Product Image">
            </div>
            <div class="infor">
                <p class="title">{{ $product->Name_sneaker }}</p>
                <p class="description">
                    <?php
                    $description = $product->Description;
                    if (strlen($description) > 268) {
                        $trimmedDescription = substr($description, 0, 268) . '...';
                        echo $trimmedDescription;
                    } else {
                        echo $description;
                    }
                    ?>
                </p>
                <p class="price"> {{ $product->Price }} đ</p>
            </div>
        </a>
        @endforeach
    </div>
    <div class="reviewSection">
        <img src="{{ asset('images/section-background.png') }}" alt="Image description">
        <div class="homeReview">
            <h1>Customer Reviews</h1>
            <img src="{{ asset('images/heading-border.png') }}" alt="Border image"> <br>
            <img src="https://mixivivu.com/quote.svg" alt="#" style="padding:40px 10px 0 0;">
            <div class="reviews-container">
                <div class="review active">
                    <p class="subHeading">Great Experience with New Shoes!</p>
                    <p>I am extremely satisfied with my experience of buying shoes from this store. The new shoes not only make me happy because of their great appearance but also provide an incredibly comfortable feeling.</p>
                    <p class="author">- Mr. Trung</p>
                </div>
                <div class="review">
                    <p class="subHeading">Quality and Design:</p>
                    <p>These shoes truly stand out with their premium materials and exquisite design. I highly appreciate their durability and the delicacy in every stitch. This clearly demonstrates the product's quality.</p>
                    <p class="author">- Ms. Duc Anh</p>
                </div>
                <div class="review">
                    <p class="subHeading">Comfort Throughout the Day:</p>
                    <p>Exploring the new city with these shoes is a great experience. They are not only lightweight but also snug, providing comfort with every step. Whether walking or standing for long periods, I don't feel any significant pressure.</p>
                    <p class="author">- Mr. Phu</p>
                </div>
                <div class="review">
                    <p class="subHeading">Attentive Service:</p>
                    <p>The staff at this store is very enthusiastic and professional. They helped me choose shoes that fit my needs and personal preferences. This dedication truly adds value to my shopping experience.</p>
                    <p class="author">- Ms. Lan</p>
                </div>
                <div class="review">
                    <p class="subHeading">Overall Customer Review:</p>
                    <p>I couldn't be happier with my decision to buy shoes from this store. The shoes are not just a product but also a high-quality and classy experience. I will definitely come back for future purchases and encourage everyone to experience it!</p>
                    <p class="author">- Customer</p>
                </div>
                <div class="review-buttons">
                    <button onclick="selectReview(0)">Review 1</button>
                    <button onclick="selectReview(1)">Review 2</button>
                    <button onclick="selectReview(2)">Review 3</button>
                    <button onclick="selectReview(3)">Review 4</button>
                    <button onclick="selectReview(4)">Review 5</button>
                </div>
            </div>
        </div>
    </div>
    <div class="partnerSection">
        <img src="{{ asset('images/section-background.png') }}" alt="Image description">
        <div class="homePartner">
            <h1>Partnering with Famous Brands</h1>
            <img src="{{ asset('images/heading-border.png') }}" alt="Border image"> <br>
            <div class="logoPartner">
                <img src="{{ asset('images\logoadidas.jpg') }}" alt="#"> <br>
                <img src="{{ asset('images\logonike.jpg') }}" alt="#"> <br>
                <img src="{{ asset('images\logojordan.jpg') }}" alt="#"> <br>
                <img src="{{ asset('images\logovans.jpg') }}" alt="#"> <br>
                <img src="{{ asset('images\logobalenciaga.jpg') }}" alt="#"> <br>
                <img src="{{ asset('images\logoconverse.jpg') }}" alt="#"> <br>
            </div>
            <p>Explore the world of shoes with top brands like Nike, Adidas, Balenciaga, Converse, and Vans - where diversity and high style meet every preference and trend.</p>
        </div>
    </div>
    <div class="newBlog">
        <div style="margin-left: 80px;">
            <h1>Update the latest news:</h1><br>
            <p>Explore upcoming shoe releases and promotions.</p><br>
            <img src="{{ asset('images/heading-border.png') }}" alt="#"> <br>
        </div>
        <div class="about-blog" id="cardContainer">
            <div class="col-md-4 mb-3 boxCard">
                <div class="card">
                    <img src="{{ asset('images\logoconverse.jpg') }}" class="card-img-top" alt="#">
                    <div class="card-body">
                        <h5 class="card-title">Card title 1</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3 boxCard">
                <div class="card">
                    <img src="{{ asset('images\logoconverse.jpg') }}" class="card-img-top" alt="#">
                    <div class="card-body">
                        <h5 class="card-title">Card title 2</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3 boxCard">
                <div class="card">
                    <img src="{{ asset('images\logoconverse.jpg') }}" class="card-img-top" alt="#">
                    <div class="card-body">
                        <h5 class="card-title">Card title 3</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center" style="padding: 0; height:100% ;">
            <a href="/blog">
                <button class="btn btn-more btn-primary" style="cursor: pointer">More</button>
            </a>
        </div>
    </div>
    <div class="footer">
        <div class="footer-container">
            <div class="footer-section">
                <h3>Store Information</h3>
                <p>4th floor, VTC Online Building, 18 Tam Trinh Street, Hai Ba Trung, Ha Noi</p>
                <p>Email: sneakerstore@gmail.com</p>
                <p>Phone: (84) 393234822</p>
            </div>
            <div class="footer-section">
                <h3>Product Categories</h3>
                <ul>
                    <li><a href="#">Men's Shoes</a></li>
                    <li><a href="#">Women's Shoes</a></li>
                    <li><a href="#">Children's Shoes</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h3>Useful Links</h3>
                <ul>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Terms of Use</a></li>
                </ul>
            </div>
        </div>
    </div>
    <a href="#" class="back-to-top-btn"><i class="bi bi-arrow-up-short"></i></a>
    <button class="btn-circle chat-btn">
        <i class="bi bi-messenger" style="color: white;"></i>
    </button>
    <script>
        window.onload = function() {
            // Khi trang được tải lại, kiểm tra xem đã có giá trị số lượng trong Local Storage chưa
            let cartCounter = document.getElementById('cartCounter');
            let count = parseInt(localStorage.getItem('cartItemCount'));

            if (!isNaN(count)) {
                // Nếu đã có giá trị trong Local Storage, cập nhật số lượng hiển thị trên trang
                cartCounter.innerText = count;
            }
        };

        function addToCart(event) {
            event.preventDefault(); // Ngăn chặn hành động mặc định của nút

            let cartCounter = document.getElementById('cartCounter');
            let count = parseInt(cartCounter.innerText);

            count++;
            cartCounter.innerText = count;

            // Lưu giá trị mới vào Local Storage
            localStorage.setItem('cartItemCount', count.toString());

            document.getElementById('addToCartForm').submit();
        }
    </script>
</body>

</html>