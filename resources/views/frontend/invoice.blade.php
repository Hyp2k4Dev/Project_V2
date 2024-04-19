<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding-top: 20px;
        }

        .invoice-title h2,
        .invoice-title h3 {
            display: inline-block;
        }

        .table>tbody>tr>.no-line {
            border-top: none;
        }

        .table>thead>tr>.no-line {
            border-bottom: none;
        }

        .table>tbody>tr>.thick-line {
            border-top: 2px solid;
        }

        .invoice-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .invoice-header {
            margin-bottom: 20px;
            border-bottom: 1px solid #ddd;
            padding-bottom: 10px;
        }

        .invoice-header h2 {
            margin: 0;
            color: #333;
        }

        .invoice-header p {
            margin: 5px 0;
            color: #777;
        }

        .invoice-info {
            margin-top: 20px;
        }

        .invoice-info p {
            margin: 5px 0;
        }
        .backBtn{
            width: 100px;
            padding: 5px;
            border: 1px solid white;
            background-color: #333;
            border-radius: 5px;
        }
        .backBtn a{
            color: white;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-xs-12">

                <div class="invoice-container">
                    <div class="invoice-header">
                        <div class="backBtn">
                            <a href="{{ route('frontend.home') }}">Back to Home</a>
                        </div>
                        <h2>Invoice</h2>
                        @if(session('order_id'))
                        <p>Đơn hàng của bạn có mã số: {{ session('order_id') }}</p>
                        @else
                        <p>Không có thông tin về đơn hàng.</p>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-xs-6">
                            <!-- Customer info -->
                        </div>
                        <div class="col-xs-6 text-right">
                            <address>
                                <strong>Order Date:</strong><br>
                            </address>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><strong>Order summary</strong></h3>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-condensed">
                                <thead>
                                    <tr>
                                        <td><strong>Item</strong></td>
                                        <td class="text-center"><strong>Price</strong></td>
                                        <td class="text-center"><strong>Quantity</strong></td>
                                        <td class="text-right"><strong>Total</strong></td>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="invoiceInfo">
        <!-- Place to display invoice data from localStorage -->
    </div>


    <script>
        // Check if localStorage exists
        if (localStorage) {
            var invoiceDataStr = localStorage.getItem('invoiceData');

            if (invoiceDataStr) {
                var invoiceData = JSON.parse(invoiceDataStr);

                // Add customer information to the div
                var customerInfoDiv = document.querySelector('.col-xs-6');
                if (customerInfoDiv) {
                    customerInfoDiv.innerHTML += "<p><strong>Customer name: </strong>" + invoiceData.name + "</p>";
                } else {
                    console.log("Couldn't find a div to contain customer information.");
                }

                // Find the reference to the table body
                var invoiceTableBody = document.querySelector('.table-condensed tbody');

                // Check if the reference exists and invoiceData.product also exists
                if (invoiceTableBody && invoiceData.product) {
                    // Clear all existing rows in the tbody
                    invoiceTableBody.innerHTML = '';

                    // Loop through each product and add information to the tbody
                    for (var i = 0; i < invoiceData.product.length; i++) {
                        var product = invoiceData.product[i];

                        // Create a new row in the table
                        var row = document.createElement('tr');

                        // Create cells for the row
                        var itemNameCell = document.createElement('td');
                        itemNameCell.textContent = product.name;

                        var itemPriceCell = document.createElement('td');
                        itemPriceCell.classList.add('text-center');
                        // Format the product price using the formatCurrency function
                        itemPriceCell.textContent = formatCurrency(product.price);

                        var itemQuantityCell = document.createElement('td');
                        itemQuantityCell.classList.add('text-center');
                        itemQuantityCell.textContent = product.quantity;

                        var itemTotalCell = document.createElement('td');
                        itemTotalCell.classList.add('text-right');
                        // Format the total price of the product using the formatCurrency function
                        itemTotalCell.textContent = formatCurrency(product.price * product.quantity);

                        // Add cells to the row
                        row.appendChild(itemNameCell);
                        row.appendChild(itemPriceCell);
                        row.appendChild(itemQuantityCell);
                        row.appendChild(itemTotalCell);

                        // Add the row to the tbody
                        invoiceTableBody.appendChild(row);
                    }
                } else {
                    console.log("Couldn't find the tbody of the table.");
                }

                // Display the order date
                var orderDateDiv = document.querySelector('.col-xs-6.text-right address');
                if (orderDateDiv) {
                    // Create a <p> element to contain the order date information
                    var pElement = document.createElement('p');
                    // Get the order date from the first product
                    var orderDate = invoiceData.product[0].timestamp;
                    // Set the content of the <p> element with the order date information
                    pElement.innerHTML = "Order Date: " + orderDate;
                    // Add the <p> element to the target div
                    orderDateDiv.appendChild(pElement);
                } else {
                    console.log("Couldn't find a div to contain order date information.");
                }
            } else {
                console.log("No invoice data found in localStorage.");
            }
        } else {
            console.log("Your browser does not support localStorage.");
        }

        // Function to format currency
        function formatCurrency(amount) {
            // Convert the number to a string and add currency unit
            const formatter = new Intl.NumberFormat('vi-VN', {
                style: 'currency',
                currency: 'VND',
                currencyDisplay: 'code', // Display currency code instead of symbol
                minimumFractionDigits: 0 // Number of digits after the decimal point (to hide decimal part)
            });
            return formatter.format(amount).replace('₫', 'VND'); // Replace currency symbol from "₫" to "VND"
        }

        // Event listener to remove invoiceData from localStorage when the browser is closed
        window.addEventListener('unload', function(event) {
            // Check if localStorage exists and if invoiceData exists
            if (localStorage && localStorage.getItem('invoiceData')) {
                // Remove invoiceData from localStorage
                localStorage.removeItem('invoiceData');
            }
        });
    </script>
</body>

</html>