<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <title>Create Order</title>
    <style>
        body {
            margin: 0;
            padding: 20px;
        }

        form {
            max-width: 500px;
            margin: auto;
        }

        input[type="text"],
        input[type="email"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>

    <form id="orderForm" action="/order-submit" method="post">
        @csrf
        <h2>Tạo đơn hàng</h2>
        <label for="name">Tên khách hàng:</label>
        <input type="text" id="name" name="name" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="phone">Số điện thoại:</label>
        <input type="text" id="phone" name="phone" required><br>

        <label for="address">Địa chỉ:</label>
        <input type="text" id="address" name="address" required><br>

        <div id="products">
            <div class="product">
                <label for="product1">ID Sản phẩm:</label>
                <input type="text" id="product1" name="products[0][product_id]" required><br>

                <label for="quantity1">Số lượng:</label>
                <input type="number" id="quantity1" name="products[0][quantity]" required><br>

                <label for="size1">Kích thước:</label>
                <input type="text" id="size1" name="products[0][size]" required><br>
            </div>
        </div>

        <button type="button" onclick="addProduct()">Thêm sản phẩm</button><br>

        <input type="submit" value="Tạo đơn hàng">
    </form>

    <script>
        let productCount = 1;

        function addProduct() {
            productCount++;
            let productHtml = `
            <div class="product">
                <label for="product${productCount}">ID Sản phẩm:</label>
                <input type="text" id="product${productCount}" name="products[${productCount - 1}][product_id]" required><br>

                <label for="quantity${productCount}">Số lượng:</label>
                <input type="number" id="quantity${productCount}" name="products[${productCount - 1}][quantity]" required><br>

                <label for="size${productCount}">Kích thước:</label>
                <input type="text" id="size${productCount}" name="products[${productCount - 1}][size]" required><br>
            </div>
        `;
            document.getElementById('products').insertAdjacentHTML('beforeend', productHtml);
        }
    </script>

</body>

</html>