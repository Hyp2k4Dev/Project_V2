<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HTH SNEAKER STORE</title>
    <link rel="shortcut icon" href="{{asset('images/favicon.ico')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/fe/homepage.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fe/cartpage.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="{{ asset('js/homepage.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/fe/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
</head>

<body>
    <div class="header">
        <div class="header-left">
            <a href="{{ route('frontend.home') }}"><img src="{{ asset('images/logo-shop.png') }}" alt="Mô tả của hình ảnh"></a>
            <div class="option-header">
                <a href="/product">Product</a>
                <a href="#">About</a>
                <a href="/blog">Blog</a>
            </div>
        </div>

        <div class="header-right">
            <form id="addToCartForm" action="{{ route('frontend.addToCart') }}" method="POST" style="display: none;">
                @csrf
            </form>
            <a href="#" class="btn-contact">
                Contact
            </a>
        </div>
    </div>
    <section class="pt-5 pb-5">
        <div class="container">
            <div class="row w-100">
                <div class="col-lg-12 col-md-12 col-12">
                    <h3 class="display-5 mb-2 text-center">Shopping Cart</h3>
                    <p class="mb-5 text-center">
                    </p>
                    <table id="shoppingCart" class="table table-condensed table-responsive">
                        <thead>
                            <tr>
                                <th style="width:60%">Product Name & Details</th>
                                <th style="width:12%">Price</th>
                                <th style="width:10%">Quantity</th>
                                <th style="width:10%">Total Amount</th> <!-- Thêm cột Total Amount -->
                                <th style="width:8%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Danh sách sản phẩm trong giỏ hàng sẽ được tạo ở đây -->
                        </tbody>
                    </table>
                    <div class="float-right text-right">
                        <h4>Total price:</h4>
                        <h1 id="totalPrice">$0.00</h1>
                    </div>
                </div>
            </div>
            <div class="row mt-4 d-flex align-items-center">
                <div class="col-sm-6 order-md-2 text-right">
                    <form action="{{ route('frontend.checkOut') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary mb-4 btn-lg pl-5 pr-5">Checkout</button>
                    </form>
                </div>
                <div class="col-sm-6 mb-3 mb-m-1 order-md-1 text-md-left">
                    <a href="/product">
                        <i class="fas fa-arrow-left mr-2"></i> Continue Shopping</a>
                </div>
            </div>
        </div>
    </section>
    <script>
        let cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];
        document.addEventListener('DOMContentLoaded', function() {
            // Lấy dữ liệu từ localStorage
            const deleteButtons = document.querySelectorAll('.delete-item');
            deleteButtons.forEach(button => {
                button.addEventListener('click', function(event) {
                    event.preventDefault();

                    const index = this.getAttribute('data-index');

                    removeItem(index);

                });
            });
            let cartItemsHTML = '';

            let total = 0;

            cartItems.forEach((item, index) => {
                item.price = parseFloat(item.price); // Chuyển đổi giá về số thập phân
                item.priceVN = formatCurrency(item.price); // Định dạng giá VNĐ
                total += item.price * item.quantity; // Tính tổng giá

                const productHTML = `
<tr>
    <td class="p-4">
        <div class="media align-items-center" style="display: flex;">
            <img src="${item.image}" width="200px" alt="imagePreview"> <!-- Sử dụng thuộc tính 'image' từ mỗi sản phẩm -->
            <div class="media-body" style="padding-left: 20px;">
                <h5>${item.name}</h5>
                <small>
                    <p class="text-muted">Color: ${item.color}</p>
                    <p>Brand: ${item.brand}</p>
                    <h2>Sizes</h2>
                    <ul>
                        <li>${item.size}</li>
                    </ul>
                </small>
            </div>
        </div>
    </td>
    <td class="text-right font-weight-semibold align-middle p-4">${item.priceVN}</td> <!-- Hiển thị giá ở đây -->
    <td class="align-middle p-4">
        <input class="form-control quantity-input" type="number" value="${item.quantity}" min="1" data-index="${index}">
    </td>
    <td class="text-right align-middle px-4" id="totalPrice${index}">${formatCurrency(item.price * item.quantity)}</td> <!-- Hiển thị tổng giá trị của sản phẩm -->
    <td class="text-center align-middle px-0">
    <a href="#" class="shop-tooltip close float-none delete-item" title="Remove" data-index="${index}">
        Xoá
    </a>
</td>

</tr>
`;

                // Thêm HTML của sản phẩm vào biến cartItemsHTML
                cartItemsHTML += productHTML;
            });

            // Hiển thị HTML của danh sách sản phẩm lên trang
            document.querySelector('.table tbody').innerHTML = cartItemsHTML;

            // Hiển thị tổng giá trị của các sản phẩm trong giỏ hàng trên trang web
            const totalPriceElement = document.getElementById('totalPrice');
            totalPriceElement.innerText = formatCurrency(total);


            // Hàm định dạng số tiền sang chuẩn VNĐ
            function formatCurrency(amount) {
                return amount.toLocaleString('vi-VN', {
                    style: 'currency',
                    currency: 'VND',
                    minimumFractionDigits: 0 // Số lượng chữ số sau dấu phẩy (để không hiển thị phần thập phân)
                });
            }

            // Sự kiện change cho các ô nhập số lượng
            document.querySelector('.table tbody').addEventListener('change', function(event) {
                if (event.target.classList.contains('quantity-input')) {
                    let index = event.target.dataset.index;
                    let newQuantity = parseInt(event.target.value);
                    if (!isNaN(newQuantity) && newQuantity > 0) {
                        if (cartItems && cartItems.length > 0 && cartItems[index]) {
                            let itemPrice = parseFloat(cartItems[index].price);
                            cartItems[index].quantity = newQuantity;
                            let totalPrice = itemPrice * newQuantity;
                            document.getElementById('totalPrice' + index).innerText = formatCurrency(totalPrice);
                            updateTotalPrice();
                            localStorage.setItem('cartItems', JSON.stringify(cartItems)); // Lưu danh sách sản phẩm mới vào localStorage
                        }
                    } else {
                        event.target.value = 1;
                    }
                    location.reload();
                }
            });


            // Hàm cập nhật tổng giá trị của tất cả các sản phẩm trong giỏ hàng
            function updateTotalPrice() {
                let total = 0;
                cartItems.forEach(item => {
                    total += parseFloat(item.price) * item.quantity;
                });
                // Hiển thị tổng giá trị của tất cả các sản phẩm trong giỏ hàng
                totalPriceElement.innerText = formatCurrency(total);
            }
            // Hàm để xoá sản phẩm khỏi giỏ hàng
            function removeItem(index) {
                cartItems.splice(index, 1);
                localStorage.setItem('cartItems', JSON.stringify(cartItems)); // Cập nhật lại localStorage

                // Reload trang để cập nhật giao diện
                location.reload();
            }
            updateTotalPrice();

        });

        document.addEventListener('DOMContentLoaded', function() {
            const deleteButtons = document.querySelectorAll('.delete-item');
            deleteButtons.forEach(button => {
                button.addEventListener('click', function(event) {
                    event.preventDefault();
                    const index = this.getAttribute('data-index');
                    console.log('Remove button clicked for index:', index); // Kiểm tra sự kiện click đã được bắt chưa
                    removeItem(index);
                });
            });

            function removeItem(index) {
                cartItems.splice(index, 1); // Xoá chỉ mục tương ứng từ mảng cartItems
                localStorage.setItem('cartItems', JSON.stringify(cartItems)); // Cập nhật lại localStorage
                location.reload(); // Tải lại trang để cập nhật giao diện
            }
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Lấy thông tin từ các mục trong trang
            let checkOutItems = [];

            // Duyệt qua từng dòng trong bảng danh sách sản phẩm trong giỏ hàng
            document.querySelectorAll('.table tbody tr').forEach(row => {
                let productName = row.querySelector('.media-body h5').innerText;
                let productPriceText = row.querySelector('.font-weight-semibold').innerText; // Lấy văn bản giá sản phẩm từ hàng hiện tại
                const productPrice = parseInt(productPriceText.replace(/\D/g, ''));
                let productQuantity = parseInt(row.querySelector('.quantity-input').value); // Lấy giá trị số lượng từ ô nhập số lượng trong hàng hiện tại và chuyển đổi thành số nguyên
                let productSize = row.querySelector('ul li').innerText;
                // Tạo đối tượng mô tả thông tin của mỗi sản phẩm
                let item = {
                    name: productName,
                    price: productPrice, // Giữ giá dưới dạng số nguyên
                    quantity: productQuantity,
                    size: productSize
                };

                // Thêm đối tượng vào mảng checkOutItems
                checkOutItems.push(item);
            });

            // Lưu mảng checkOutItems vào localStorage
            localStorage.setItem('checkOutItems', JSON.stringify(checkOutItems));
        });


        // Hàm định dạng số tiền sang chuẩn VNĐ
        // function formatCurrency(amount) {
        //     return amount.toLocaleString('vi-VN', {
        //         style: 'currency',
        //         currency: 'VND',
        //         minimumFractionDigits: 0 // Số lượng chữ số sau dấu phẩy (để không hiển thị phần thập phân)
        //     });
        // }
    </script>



</body>

</html>