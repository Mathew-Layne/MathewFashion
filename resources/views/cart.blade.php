<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ ('/css/cart.css') }}">
    <title>Cart</title>
</head>
<x-header/>
<body>


    @if(empty($products))

    <div class="empty_container">
      <h1>Cart is empty</h1>  
    </div>    
        
    @else
    
   <div class="container">
        @foreach ($products as $info)
        <div class="content">
            <div class="cart-container">
                <div class="cart">
                    <img src="{{ $info->image }}">                     
                </div>
            </div>   
            <div class="details">
                <h1>{{ $info->pro_name }}</h1>
                <h3>{{ $info->description }}</h3>
                <h2>${{ $info->price }}.00</h2>
                <a class="remove" href="{{ url('/remove/'.$info->id) }}">Remove</a>
            </div>        
        </div> 
        <hr>
        @endforeach
        <div class="checkout">
            <h1>Checkout</h1>
            <hr>
            <a class="checkout_btn" href="{{ url('/checkout') }}">Proceed to checkout</a>  <br>
            <a class="home_btn" href="{{ url('/') }}">Continue shopping</a>  
            <p>FREE delivery on purchases over $100</p>
        </div>
    </div>

    @endif
     
</body>
<x-footer/>
</html>