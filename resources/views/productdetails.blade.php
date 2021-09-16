<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ url('css/product.css') }}">
    <link href="https://kit-pro.fontawesome.com/releases/v5.15.3/css/pro.min.css" rel="stylesheet">
    <title>Product Details</title>
</head>
<x-header/>
<body>
    <div class="container2">
        @foreach ($data as $info)  
        
            <div class="detail-img">
                <img src="/{{ $info->image }}">
            </div>

            <div class="details">
                <h1>{{ $info->pro_name }}</h1>
                <p>{{ $info->description }}</p> 
                <h2>${{ $info->price }}.00</h2>
                <form action="{{ url('cart') }}" method="post">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $info->id }}">
                    <label for="">Quantity: </label>
                    <select name="qty">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                    </select><br>
                    <button class="cart" type="submit">Add To Cart <i class="fas fa-cart-plus"></i></button>
                </form>
                
            </div>

        @endforeach
    </div>
</body>
<x-footer/>
</html>