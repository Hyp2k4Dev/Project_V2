<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HTH SNEAKER STORE</title>
    <link rel="shortcut icon" href="{{asset('images/favicon.ico')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/fe/homepage.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="{{ asset('js/homepage.js') }}"></script>
</head>

<body>
    <div class="header">
        <div class="header-left">
            <a href="{{ route('frontend.home') }}"><img src="{{ asset('images/logo-shop.png') }}" alt="Mô tả của hình ảnh"></a>
            <div class="option-header">
                <a href="/product">Product</a>
                <a href="#">About</a>
                <a href="#">Blog</a>
            </div>
        </div>
        <a href="#" class="header-right">
            Contact
        </a>
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
    <div class="reviewSection">
        <img src="{{ asset('images/section-background.png') }}" alt="Mô tả của hình ảnh">
        <div class="homeReview">
            <h1>Đánh giá từ những người <br>đã mua sản phẩm</h1>
            <img src="{{ asset('images/heading-border.png') }}" alt="#"> <br>
            <img src="https://mixivivu.com/quote.svg" alt="#" style="padding:40px 10px 0 0;">
            <div class="reviews-container">
                <div class="review active">
                    <p class="subHeading">Trải Nghiệm Tuyệt Vời với Đôi Giày Mới!</p>
                    <p>Tôi vô cùng hài lòng với trải nghiệm của mình khi mua giày từ cửa hàng này.
                        <br> Đôi giày mới không chỉ làm tôi hạnh phúc vì vẻ ngoại hình tuyệt vời mà còn mang lại cảm giác thoải mái không thể tin được."
                    </p>
                    <p class="author">- Anh Trung</p>
                </div>
                <div class="review">
                    <p class="subHeading">Chất Lượng và Thiết Kế:</p>
                    <p>Đôi giày này thật sự nổi bật với chất liệu cao cấp và thiết kế tinh tế. Tôi đánh giá cao sự chắc chắn của chúng, cùng với sự tinh tế trong từng đường may. Điều này cho thấy rõ ràng về chất lượng sản phẩm.</p>
                    <p class="author">- Chị Đức Anh</p>
                </div>
                <div class="review">
                    <p class="subHeading">Thoải Mái Qua Cả Ngày:</p>
                    <p>Khám phá thành phố mới với đôi giày này là một trải nghiệm tuyệt vời. Chúng không chỉ nhẹ nhàng mà còn ôm vừa chân, mang lại cảm giác thoải mái mỗi bước di chuyển. Dù đi bộ hoặc đứng lâu, tôi không cảm thấy bất kỳ áp lực nào đáng kể.</p>
                    <p class="author">Anh Phú</p>
                </div>
                <div class="review">
                    <p class="subHeading">Phục Vụ Tận Tâm:</p>
                    <p>Đội ngũ nhân viên ở cửa hàng này rất nhiệt tình và chuyên nghiệp. Họ đã giúp tôi chọn ra đôi giày phù hợp với nhu cầu và sở thích cá nhân của mình. Sự tận tâm này thực sự làm tăng thêm giá trị cho trải nghiệm mua sắm của tôi.</p>
                    <p class="author">Chị Lan</p>
                </div>
                <div class="review">
                    <p class="subHeading">Đánh giá chung của khách hàng</p>
                    <p>Tôi không thể hạnh phúc hơn với quyết định mua giày từ cửa hàng này. Đôi giày không chỉ là một sản phẩm, mà là một trải nghiệm đẳng cấp và chất lượng. Tôi sẽ chắc chắn quay lại cho những lần mua sắm sau này và khuyến khích mọi người cùng trải nghiệm!</p>
                    <p class="author">Khách Hàng</p>
                </div>
                <div class="review-buttons">
                    <button onclick="showReview(0)">Đánh Giá 1</button>
                    <button onclick="showReview(1)">Đánh Giá 2</button>
                    <button onclick="showReview(2)">Đánh Giá 3</button>
                    <button onclick="showReview(3)">Đánh Giá 4</button>
                    <button onclick="showReview(4)">Đánh Giá 5</button>
                    <!-- Thêm nút hoặc menu thả xuống cho các đánh giá khác nếu cần -->
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
</body>

</html>