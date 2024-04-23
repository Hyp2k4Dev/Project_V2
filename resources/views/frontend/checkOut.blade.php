<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HTH SNEAKER STORE</title>
    <link rel="shortcut icon" href="{{asset('images/favicon.ico')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/fe/homepage.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fe/checkout.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="{{ asset('js/homepage.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/fe/bootstrap.min.css') }}">
    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <style>
        .cart-table {
            width: 100%;
            border-collapse: collapse;
        }

        .cart-table th,
        .cart-table td {
            padding: 8px;
            border-bottom: 1px solid #ddd;
            word-wrap: break-word;
        }

        .cart-table th {
            background-color: #f2f2f2;
        }

        .cart-table td {
            text-align: left;
        }
    </style>

</head>

<body>
    <div id="noProductMessage" style="display: none;">
        <p>Không có sản phẩm nào.</p>
    </div>
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
            <a href="https://www.facebook.com/profile.php?id=61558257755008" class="btn-contact">Contact</a>
        </div>
    </div>

    <main>
        <div class="row">
            <div class="col-75">
                <div class="container">
                    <form id="orderForm" action="{{ route('frontend.checkout.submit') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-50">
                                <h3>Billing Address</h3>
                                <label for="name">Full Name</label>
                                <input type="text" id="name" name="name" placeholder="Your name" required>
                                <label for="email">Email</label>
                                <input type="text" id="email" name="email" placeholder="abc@example.com" required>
                                <label for="phone">Phone Number</label>
                                <input type="text" id="phone" name="phone" placeholder="Phone number" required>
                                <label for="address">Address</label>
                                <input type="text" id="address" name="address" placeholder="Ha Noi City, etc" required>
                                <input type="hidden" id="productData" name="productData">
                            </div>
                        </div>
                        <div class="col-25">
                            <div class="container">
                                <h4>Cart
                                    <span class="price" style="color:black">
                                        <i class="fa fa-shopping-cart"></i>
                                    </span>
                                    <p></p>
                                </h4>
                            </div>
                        </div>
                        <label>
                            <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
                        </label>
                        <br>
                        <button type="submit" class="button-30" role="button">Check Out</button>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Lấy thông tin từ localStorage
            let products = localStorage.getItem('cartItems');

            // Kiểm tra xem có thông tin trong localStorage không
            if (!products || JSON.parse(products).length === 0) {
                // Nếu không có sản phẩm trong giỏ hàng, hiển thị thông báo "No products in the cart"
                let cartHeader = document.querySelector('.col-25 h4');
                cartHeader.innerHTML = 'Cart <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i></span><p>No products in the cart</p>';
            } else {
                // Nếu có sản phẩm, hiển thị giỏ hàng bình thường
                products = JSON.parse(products);

                // Điền dữ liệu vào các trường của biểu mẫu
                document.getElementById('name').value = products.name || '';
                document.getElementById('email').value = products.email || '';
                document.getElementById('phone').value = products.phone || '';
                document.getElementById('address').value = products.address || '';

                displayCart(products);
            }
        });


        document.getElementById('orderForm').addEventListener('submit', function(event) {
            event.preventDefault();

            let orderDetails = JSON.parse(localStorage.getItem('cartItems'));

            if (!orderDetails || orderDetails.length === 0) {
                // Nếu không có sản phẩm trong giỏ hàng, hiển thị cảnh báo
                alert('No products in the cart.');
                return; // Ngăn chặn tiếp tục thực hiện sự kiện submit
            }
            let name = document.getElementById('name').value;
            let email = document.getElementById('email').value;
            let phone = document.getElementById('phone').value;
            let address = document.getElementById('address').value;
            let productsData = [];
            let product = productsData;

            let invoiceData = {
                name: name,
                email: email,
                phone: phone,
                address: address,
                product: product,
                // Thêm order_id vào invoiceData
                order_id: orderDetails[0].order_id // Giả sử order_id được lấy từ orderDetails[0]
            };

            orderDetails.forEach(item => {
                let productInfo = {
                    id: item.id.toString(),
                    name: item.name.toString(),
                    quantity: item.quantity.toString(),
                    price: item.price,
                    size: item.size.toString(),
                    totalPrice: item.price * item.quantity,
                    timestamp: new Date().toLocaleString('en-US', {
                        timeZone: 'Asia/Ho_Chi_Minh',
                        hour12: true,
                        year: 'numeric',
                        month: 'numeric',
                        day: 'numeric',
                        hour: 'numeric',
                        minute: 'numeric',
                        second: 'numeric'
                    })
                };
                productsData.push(productInfo);
            });


            function customStringify(obj) {
                return JSON.stringify(obj)
                    .replace(/[\u007F-\uFFFF]/g, function(chr) {
                        return "\\u" + ("0000" + chr.charCodeAt(0).toString(16)).substr(-4);
                    });
            }
            let productsDataJSON = customStringify(productsData);

            document.getElementById('productData').value = productsDataJSON;

            // Lưu invoiceData vào localStorage
            localStorage.setItem('invoiceData', JSON.stringify(invoiceData));

            localStorage.removeItem('cartItems');

            this.submit();
        });


        function displayCart(products) {
            // Kiểm tra nếu không có sản phẩm trong giỏ hàng
            if (!products || products.length === 0) {
                // Hiển thị cảnh báo
                document.getElementById('noProductMessage').style.display = 'block';
                // Ẩn form
                document.getElementById('orderForm').style.display = 'none';
                return;
            }

            // Tạo bảng
            let table = document.createElement('table');
            table.classList.add('cart-table');

            // Tạo header cho bảng
            let headerRow = document.createElement('tr');
            headerRow.innerHTML = '<th>Name</th><th>Quantity</th><th>Size</th><th>Price</th>';
            table.appendChild(headerRow);

            let totalPrice = 0;

            // Thêm dòng cho từng sản phẩm
            products.forEach(item => {
                let row = document.createElement('tr');
                row.innerHTML = `<td>${item.name}</td><td>${item.quantity}</td><td>${item.size}</td><td>${formatCurrency(item.price)}</td>`;
                table.appendChild(row);
                totalPrice += item.price * item.quantity;
            });

            // Hiển thị bảng
            let productsContainer = document.querySelector('.col-25 .container');
            productsContainer.innerHTML = ''; // Xóa nội dung cũ trước khi thêm mới
            productsContainer.appendChild(table);

            // Hiển thị tổng giá tiền
            let totalPriceElement = document.createElement('p'); // Tạo phần tử mới
            totalPriceElement.innerHTML = `<strong>Total Price: <span>${formatCurrency(totalPrice)}</span></strong>`; // Thiết lập nội dung của phần tử
            productsContainer.appendChild(totalPriceElement);
        }

        function formatCurrency(amount) {
            // Chuyển đổi số thành chuỗi và thêm đơn vị tiền tệ
            const formatter = new Intl.NumberFormat('vi-VN', {
                style: 'currency',
                currency: 'VND',
                currencyDisplay: 'code', // Hiển thị mã tiền tệ thay vì ký hiệu
                minimumFractionDigits: 0 // Số lượng chữ số sau dấu phẩy (để không hiển thị phần thập phân)
            });
            return formatter.format(amount).replace('₫', 'VND'); // Thay thế ký hiệu tiền tệ từ "₫" sang "VND"
        }
    </script>

</body>

</html>