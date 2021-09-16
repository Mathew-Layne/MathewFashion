<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ ('css/cart.css') }}">
    <title>Order Summary</title>
</head>
<x-header/>
<body>

   <div class="container">
       <div class="summary_info">
           <h1>Summary</h1>
           <hr>
           <table>
               <tr>
                   <th>Product Name</th>
                   <th>Description</th>
                   <th>Quantity</th>
                   <th>Price</th>
                   <th>Unit Price</th>
               </tr>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->pro_name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->qty }}</td>
                    <td>${{ $product->price * $product->qty }}.00</td>
                    <td>${{ $product->price }}.00</td>
                </tr>  
            @endforeach
           </table>
           <hr>
        </div>

        <div class="delivery_info">
            <h1>Delivery Information</h1>
           <hr>
            

            <table>
                <tr>
                    <td>Address: </td>
                    <td>{{ session()->get('Address') }}</td>
                </tr>
                <tr>
                    <td>City: </td>
                    <td>{{ session()->get('City') }}</td>
                </tr>
                <tr>
                    <td>Parish: </td>
                    <td>{{ session()->get('Parish') }}</td>
                </tr>
                <tr>
                    <td>Phone Number: </td>
                    <td>{{ session()->get('Phone') }}</td>
                </tr>
            </table>

        </div>
          
        <div class="summary">
            <h1>Order summary</h1>
            <hr style="margin-bottom: 20px">
            

            
            <table>
                <tr>
                    <td><h3>Subtotal:</h3></td>
                    <td>${{ $total_price }}.00</td>
                </tr>
                <tr>
                    <td><h3>GCT:</h3></td>
                    <td>${{ $total_price * 0.15 }}</td>
                </tr>
                <tr>
                    <td><h3>Delivery:</h3></td>
                    @if( $total_price > 100 )
                    <td>Free</td>
                    @else
                    <td>$20.00</td>
                    @endif
                </tr>
                <tr>
                    <td><h3 style="color:red">Grand total:</h3></td>
                    @if( $total_price > 100 )
                    <td>${{ $total_price * 1.15 }}</td>
                    @else
                    <td>${{ $total_price * 1.15 + 20}}</td>
                    @endif                    
                </tr>
            </table>
            <a class="checkout_btn" href="{{ url('/purchased') }}">Place Order</a>  <br>
            <a class="home_btn" href="{{ url('/cart') }}">Return to cart</a>  

        </div>
    </div>
     
</body>
<x-footer/>
</html>