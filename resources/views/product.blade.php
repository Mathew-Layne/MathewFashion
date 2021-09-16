<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ url('css/product.css') }}">

    <title>Product</title>
</head>
<div class="navbar">
                <div class="logo">
                    <img src="{{ url('css/images/logo.png') }} " width='120px'>
                </div>
                <form action="{{ url('search') }}" method="get">
                    <input class="search" type="text" name="search" placeholder="Search Product">
                    <button class="search_btn" type="submit"><i class="fas fa-search"></i></button>
                </form>
                <nav>
                    
                    <ul>
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li><a href="{{ url('/product') }}">Products</a>
                            <div class="dropdown">
                                <ul>
                                    <li><a href="{{ url('/jewelry') }}">Jewelry</a></li>
                                    <li><a href="{{ url('/pants') }}">Pants</a></li>
                                    <li><a href="{{ url('/shirts') }}">Shirts</a></li>
                                    <li><a href="{{ url('/shoes') }}">Shoes</a></li>
                                    <li><a href="{{ url('/suits') }}">Suits</a></li>
                                </ul>
                            </div>
                        </li>                        
                        @if (session()->get('User_Type') == "Admin")
                           <li><a href="{{ url('admin') }}">Admin</a></li> 
                           <li><a href="{{ url('contact') }}">Contact</a></li>
                        @elseif(session()->get('User_Type') == "User")                                                       
                            <li><a href="{{ url('/profile') }}">Account</a></li>
                            <li><a href="{{ url('contact') }}">Contact</a></li> 
                        @else 
                            <li><a href="{{ url('contact') }}">Contact</a></li>                           
                            <li><a href="{{ url('login') }}">Login</a></li>
                            <li><a href="{{ url('signup') }}">Signup</a></li>
                        @endif
                    </ul>
                    <span class="cart_icon">
                        <a href="{{ url('cart') }}"><i class="fas fa-shopping-cart"></i>Cart<span class="count">{{ session()->get('Cart_count') }}</span></a>
                    </span>
                </nav>
                
            </div>
<body>
    
    <div class="container">

     @if(session()->get('Category') == "Product")
        @foreach ($data as $info)
        <div class="content">
            <div class="productbg">
                <div class="products">
                    @if($info->quantity < 1)
                    <h3 class="unavailable">Unavailable</h3>
                    @else                   
                    <a href="{{ url('/productdetails/'.$info->id) }}"><img src="{{ $info->image }}"></a>
                    @endif
                </div>
            </div>
            <div class="text">
                <h3>{{ $info->pro_name }}</h3>
                <p>{{ $info->description }}</p>
                <h2>${{ $info->price }}.00</h2>
                @if(session()->get('User_Type') == "Admin")
                <a class="remove_pro" href="{{ url('/removeproduct/'.$info->id) }}">Remove</a>
                @endif
            </div>
        </div>
        @endforeach
        @elseif(session()->get('Category') == "Jewelry")
        @foreach ($data as $info)
        <div class="content">
            <div class="productbg">
                <div class="products">
                    <a href="{{ url('/productdetails/'.$info->id) }}"><img src="{{ $info->image }}"></a>
                </div>
            </div>
            <div class="text">
                <h3>{{ $info->pro_name }}</h3>
                <p>{{ $info->description }}</p>
                <h2>${{ $info->price }}.00</h2>
            </div>
        </div>
        @endforeach
        @elseif(session()->get('Category') == "Pants")
        @foreach ($data as $info)
        <div class="content">
            <div class="productbg">
                <div class="products">
                    <a href="{{ url('/productdetails/'.$info->id) }}"><img src="{{ $info->image }}"></a>
                </div>
            </div>
            <div class="text">
                <h3>{{ $info->pro_name }}</h3>
                <p>{{ $info->description }}</p>
                <h2>${{ $info->price }}.00</h2>

            </div>
        </div>
        @endforeach
        @elseif(session()->get('Category') == "Shirts")
        @foreach ($data as $info)
        <div class="content">
            <div class="productbg">
                <div class="products">
                    <a href="{{ url('/productdetails/'.$info->id) }}"><img src="{{ $info->image }}"></a>
                </div>
            </div>
            <div class="text">
                <h3>{{ $info->pro_name }}</h3>
                <p>{{ $info->description }}</p>
                <h2>${{ $info->price }}.00</h2>
            </div>
        </div>
        @endforeach
        @elseif(session()->get('Category') == "Shoes")
        @foreach ($data as $info)
        <div class="content">
            <div class="productbg">
                <div class="products">
                    <a href="{{ url('/productdetails/'.$info->id) }}"><img src="{{ $info->image }}"></a>
                </div>
            </div>
            <div class="text">
                <h3>{{ $info->pro_name }}</h3>
                <p>{{ $info->description }}</p>
                <h2>${{ $info->price }}.00</h2>
            </div>
        </div>
        @endforeach
        @elseif(session()->get('Category') == "Suits")
        @foreach ($data as $info)
        <div class="content">
            <div class="productbg">
                <div class="products">
                    <a href="{{ url('/productdetails/'.$info->id) }}"><img src="{{ $info->image }}"></a>
                </div>
            </div>
            <div class="text">
                <h3>{{ $info->pro_name }}</h3>
                <p>{{ $info->description }}</p>
                <h2>${{ $info->price }}.00</h2>
            </div>
        </div>
        @endforeach
        @endif
    </div>
</body>
<x-footer />
</html>
