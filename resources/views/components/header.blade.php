<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://kit-pro.fontawesome.com/releases/v5.15.4/css/pro.min.css" rel="stylesheet">
    <style>
        * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: Arial, Helvetica, sans-serif;
        }
        .navbar {
        display: flex;
        align-items: center;
        padding: 20px;
        justify-content: space-between;
        }
        /* nav {
        flex: 1;
        text-align: right;
        } */
        nav ul {
        display: inline-block;
        list-style-type: none;
        }
        nav ul li {
        display: inline-block;
        margin-right: 20px;
        }
        nav ul li a {
        text-decoration: none;
        color: black;
        font-weight: bold;
        }
        nav ul li a:hover {
        border-bottom: 2px solid #ff5618;
        }

        .dropdown{
            display:none;
        }
        
        nav ul li:hover .dropdown{
            display: block;
            position: absolute;
            background-color: #f3e2c1d7;
        }
        
        nav ul li:hover .dropdown ul li{
            display: block;
            margin: 9px;
            padding: 10;
        }

        .cart_icon a{
            font-weight:bold;
            color: black;
            text-decoration: none;
        }
        
        .count{
            color: white;
            font-size: 10px;
            padding: 3px 5px;
            background-color: red;
            border-radius: 70%;
            position: absolute;
            top: 32px;
            font-weight:bold;
        }

        .username{
            font-weight:bold;
            /* background-color:lightgrey; */
            padding: 9px 20px;
            border-radius: 50px;
        }
        </style>
</head>
<body>
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
                            <li><a href="{{ url('/profile') }}">Account</a></li>
                            <li><a href="#footer">Contact</a></li> 
                        @else 
                            <li><a href="#footer">Contact</a></li>                           
                            <li><a href="{{ url('login') }}">Login</a></li>
                            <li><a href="{{ url('signup') }}">Signup</a></li>
                        @endif
                    </ul>
                    <span class="cart_icon">
                        <a href="{{ url('cart') }}"><i class="fas fa-shopping-cart"></i>Cart<span class="count">{{ session()->get('Cart_count') }}</span></a>
                    </span>
                </nav>
                
                @if (session()->get('Status') == 'Active')
                <div class="logout">
                    <span class="username"> Hi. {{ session()->get('Username') }}</span> 
                    {{-- <span> <a href="{{ url('logout') }}">Logout</a></span>  --}}
                </div>
                @endif
                
            </div>
</body>
</html>