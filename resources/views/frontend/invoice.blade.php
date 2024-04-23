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
            font-size: 24px; /* Increase font size for title */
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

        .backBtn {
            width: 100px;
            padding: 5px;
            border: 1px solid white;
            background-color: #333;
            border-radius: 5px;
        }

        .backBtn a {
            color: white;
        }

        .panel-title {
            font-size: 20px; /* Increase font size for panel title */
        }

        .table-condensed {
            border-collapse: separate;
            border-spacing: 0 10px; /* Add spacing between rows */
        }

        .table-condensed th,
        .table-condensed td {
            padding: 10px; /* Add padding for better readability */
        }

        .table-condensed th {
            font-size: 16px; /* Increase font size for table header */
            background-color: #f5f5f5; /* Light gray background color for table header */
        }

        .table-condensed td {
            font-size: 14px; /* Increase font size for table cells */
            vertical-align: middle; /* Align content vertically in the middle */
        }

        .total-row td {
            font-weight: bold; /* Make total row text bold */
            color: red; /* Change total row text color to red */
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="invoice-container">
                    <div class="invoice-header" style="display: flex; align-items: center;">
                        <div class="backBtn">
                            <a href="{{ route('frontend.home') }}">Back to Home</a>
                        </div>
                        <div style="margin-left: auto;">
                            <img src="{{ asset('images/logo-shop.png') }}" alt="" width="150px">
                            <h2>&nbsp;&nbsp;&nbsp;&nbsp;Invoice</h2>
                        </div>
                        <div style="margin-left: auto;">
                            <p>Order ID: {{ $order_id }}</span></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6">
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

<script>
    // Check if localStorage exists
    if (localStorage) {
        var invoiceDataStr = localStorage.getItem('invoiceData');

        if (invoiceDataStr) {
            var invoiceData = JSON.parse(invoiceDataStr);

            var customerInfoDiv = document.querySelector('.col-xs-6');
            if (customerInfoDiv) {
                customerInfoDiv.innerHTML += "<p><strong>Name: </strong>" + invoiceData.name + "</p>";
                customerInfoDiv.innerHTML += "<p><strong>Email: </strong>" + invoiceData.email + "</p>";
                customerInfoDiv.innerHTML += "<p><strong>Phone: </strong>" + invoiceData.phone + "</p>";
                customerInfoDiv.innerHTML += "<p><strong>Address: </strong>" + invoiceData.address + "</p>";
            } else {
                console.log("Couldn't find a div to contain customer information.");
            }

            var invoiceTableBody = document.querySelector('.table-condensed tbody');

            if (invoiceTableBody && invoiceData.product) {
                invoiceTableBody.innerHTML = '';
                var totalOrderPrice = 0;
                for (var i = 0; i < invoiceData.product.length; i++) {
                    var product = invoiceData.product[i];
                    var productTotalPrice = product.price * product.quantity;
                    totalOrderPrice += productTotalPrice;
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

            // Add total order price row
            var totalRow = document.createElement('tr');
            totalRow.classList.add('total-row'); // Add class for styling
            var totalNameCell = document.createElement('td');
            totalNameCell.textContent = 'Total Price';
            totalNameCell.colSpan = 3; // Merge cells for name column
            var totalValueCell = document.createElement('td');
            totalValueCell.classList.add('text-right');
            totalValueCell.textContent = formatCurrency(totalOrderPrice);
            totalRow.appendChild(totalNameCell);
            totalRow.appendChild(totalValueCell);
            invoiceTableBody.appendChild(totalRow);
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
            minimumFractionDigits: 0
        });
        return formatter.format(amount).replace('₫', 'VND');
    }

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
