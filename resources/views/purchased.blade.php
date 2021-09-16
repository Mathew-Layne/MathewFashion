<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://kit-pro.fontawesome.com/releases/v5.15.3/css/pro.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('css/cart.css') }}">
    <title>Order Confirmation</title>
</head>
<x-header />

<body>
    <div class="purchase_container">
        <h1>Thank You.</h1>
        <h2>Your Order was completed successfully.</h2>
        <div class="info">
            <div class="icon">
                <i class="fad fa-paper-plane"></i>
            </div>

            <div class="details">
                <p>An email receipt including the details boout your order has been sent to the email address provided
                    and can also be viewed on <a href="{{ url('/mypurchases') }}">My Purchases </a>page.</p>
            </div>
        </div>
        <div class="info">
            <div class="details">
                <p>Your order has been shipped and can take up to 24 hours to be delivered to the address provided.</p>
            </div>
            
            <div class="icon">
                <i class="fad fa-shipping-fast"></i>
            </div>            
        </div>

    </div>



</body>
<x-footer />

</html>