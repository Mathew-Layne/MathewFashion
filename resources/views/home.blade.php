<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ url('css/style.css') }}">
    <title>Mathew's Fashion</title>
</head>
<body>   
    
<div class="header">
        <div class="container">
            <div class="navbar">
                <div class="logo">
                    <img src="{{ url('css/images/logo.png') }} " width='120px'>
                </div>
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
                           <li><a href="#footer">Contact</a></li>
                        @elseif(session()->get('User_Type') == "User")
                            
                            <li><a href="{{ url('profile') }}">Account</a></li>
                            <li><a href="#footer">Contact</a></li> 
                        @else
                            <li><a href="#footer">Contact</a></li>
                            <li><a href="{{ url('login') }}">Login</a></li>
                            
                        @endif
                        @if (session()->get('User_Type') == null)
                         <li><a href="{{ url('signup') }}">Signup</a></li>   
                        @else
                        
                        @endif
                    </ul>
                    <span class="cart_icon">
                        <a href="{{ url('cart') }}"><i class="fas fa-shopping-cart"></i>Cart<span class="count">{{ session()->get('Cart_count') }}</span></a>
                    </span>
                </nav>
                
                @if (session()->get('Status') == 'Active')
                <div class="logout">
                    <span class="username">{{ session()->get('Username') }}</span> 
                    {{-- <span> <a href="{{ url('logout') }}">Logout</a></span>  --}}
                </div>
                @endif
                
            </div>
            <div class="info">
                <div class="text">
                    <h1>Fashion fades,<br> Style is eternal!</h1>
                    <p>Whoever said that money can’t buy happiness,<br>
                        simply didn’t know where to go shopping.</p>
                    <a href="#category" class="btn">Explore Now</a>

                </div>
                <div class="img">
                    <img src="{{ url('css/images/mennew.png') }}" height="470px">
                </div>
            </div>
        </div>
    </div>
    <!-- Categories -->
    <div id="category" class="category">
        <div class="text">
            <h2>Top Categories</h2>
        </div>
        <div class="container2">
            <div class="imgs">
                <a href="{{ url('/shirts') }}"><img src="{{ url('css/images/top.jpg') }}"></a> 
                <h3>Shirts</h3>
            </div>
            <div class="imgs">
                <a href="{{ url('/pants') }}"><img src="{{ url('css/images/bottom.jpg') }}"></a>
                <h3>Pants</h3>
            </div>
            <div class="imgs">
                <a href="{{ url('/suits') }}"><img src="{{ url('css/images/suits.jpg') }}"></a>
                <h3>Suits</h3>
            </div>
        </div>
    </div>
    <div class="featured">
        <div class="text">
            <h2>Top Rated</h2>
            <a href="{{ url('/product') }}">View more</a>
        </div>
        <div class="container3">
            <div class="imgs2">
                <img src="{{ url('css/images/top5.jpg') }}">
                <h4>African Print</h4>
                <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                </div>
                <p>$50.00 USD</p>
            </div>
            <div class="imgs2">
                <img src="{{ url('css/rolex3.jpg') }}">
                <h4>Rolex Watch</h4>
                <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                </div>
                <p>$1700.00 USD</p>
            </div>
            <div class="imgs2">
                <img src="{{ url('css/images/suit2.jpg') }}">
                <h4>Suit - Purple</h4>
                <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                    <i class="far fa-star"></i>
                </div>
                <p>$450.00 USD</p>
            </div>
            <div class="imgs2">
                <img src="{{ url('css/images/pants33.jpg') }}">
                <h4>Ripped Jeans Pants</h4>
                <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <p>$30.00 USD</p>
            </div>
            <div class="imgs2">
                <img src="{{ url('css/images/shoes.jpg') }}">
                <h4>Clark's Boot - White</h4>
                <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                    <i class="far fa-star"></i>
                </div>
                <p>$150.00 USD</p>
            </div>
        </div>
    </div>
    <div class="featured">
        <div class="text">
            <h2>Recently Viewed</h2>
            <a href="{{ url('/product') }}">View more</a>
        </div>
        <div class="container3">
            <div class="imgs2">
                <img src="{{ url('css/images/shoes9.jpg') }}">
                <h4>Desert Clark's - White</h4>
                <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                </div>
                <p>$50.00 USD</p>
            </div>
            <div class="imgs2">
                <img src="{{ url('css/images/belt3.jpg') }}">
                <h4>Leathe Belt - Brown</h4>
                <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                </div>
                <p>$50.00 USD</p>
            </div>
            <div class="imgs2">
                <img src="{{ url('css/images/top19.jpg') }}">
                <h4>T-Shirt - Purple</h4>
                <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                    <i class="far fa-star"></i>
                </div>
                <p>$50.00 USD</p>
            </div>
            <div class="imgs2">
                <img src="{{ url('css/images/pants20.jpg') }}">
                <h4>Nike Joggers</h4>
                <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <p>$50.00 USD</p>
            </div>
            <div class="imgs2">
                <img src="{{ url('css/images/wallet.jpg') }}">
                <h4>Leathe Wallet - Black</h4>
                <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                    <i class="far fa-star"></i>
                </div>
                <p>$50.00 USD</p>
            </div>
            <div class="imgs2">
                <img src="{{ url('css/images/watch2.jpg') }}">
                <h4>African Print</h4>
                <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                </div>
                <p>$50.00 USD</p>
            </div>
            <div class="imgs2">
                <img src="{{ url('css/images/suit90.jpg') }}">
                <h4>African Print</h4>
                <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                </div>
                <p>$50.00 USD</p>
            </div>
            <div class="imgs2">
                <img src="{{ url('css/images/shoes2.jpg') }}">
                <h4>African Print</h4>
                <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                    <i class="far fa-star"></i>
                </div>
                <p>$50.00 USD</p>
            </div>
            <div class="imgs2">
                <img src="{{ url('css/images/watch1.jpg') }}">
                <h4>African Print</h4>
                <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <p>$50.00 USD</p>
            </div>
            <div class="imgs2">
                <img src="{{ url('css/images/pants25.jpg') }}">
                <h4>African Print</h4>
                <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                    <i class="far fa-star"></i>
                </div>
                <p>$50.00 USD</p>
            </div>
        </div>
    </div>
    <div class="offers">
        <div class="container4">
            <div class="imgs3">
                <img src="{{ url('css/images/rolex2.png') }}" width="350px">
            </div>
            <div class="text">
                <h3>30% OFF All Jewellery for Father's Day</h3>
                <a href="{{ url('/jewelry') }}" class="btn2">Learn More</a>
            </div>
        </div>
    </div>   
    <x-footer/>
</body>
</html>