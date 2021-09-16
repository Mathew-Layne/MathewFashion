<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ url('css/admin.css') }}">
    <link href="https://kit-pro.fontawesome.com/releases/v5.15.3/css/pro.min.css" rel="stylesheet">
    {{-- <script src="https://kit.fontawesome.com/812b520597.js" crossorigin="anonymous"></script> --}}
    <title>Account</title>
</head>

<body>
    <div class="navbar">
        <div class="logo">
            <img src="{{ url('css/images/logo.png') }} " width='120px'>
        </div>
        <nav>
            <ul>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ url('product') }}">Products</a></li>
                <li><a href="{{ url('contact') }}">Contact</a></li>
                <li><a href="{{ url('login') }}">Login</a></li>
                <li><a href="{{ url('signup') }}">Signup</a></li>
            </ul>
            <span class="cart_icon">
                <a href="{{ url('cart') }}"><i class="fas fa-shopping-cart"></i>Cart<span
                        class="count">{{ session()->get('Cart_count') }}</span></a>
            </span>
        </nav>
        <div class="username">{{ session()->get('Username') }}</div>
    </div>

    <div class="container">
        <div class="sidebar">
            <h1>User</h1>
            <ul>
                <li><a href="{{ url('/profile') }}"><i class="fas fa-user"></i>Profile</a></li>
                <li><a href="{{ url('/mypurchases') }}"><i class="fas fa-credit-card"></i>MyPurchases</a></li>
                <li><a href="{{ url('/invoice') }}"><i class="fas fa-file-invoice-dollar"></i>Invoice</a></li>
                <li><a href="{{ url('/rewards') }}"><i class="fas fa-gift-card"></i>Rewards</a></li>
                <li><a class="logout" href="{{ url('/logout') }}"><i class="fas fa-sign-out-alt"></i>Logout</a></li>

            </ul>
        </div>
        <div class="content">
            @if(session()->get('check') == "profile")
            <h1>Profile</h1>
            <table>

                @foreach ($data as $info)
                <tr>
                    <td>First Name: </td>
                    <td>{{ $info->first_name }}</td>
                </tr>
                <tr>
                    <td>Last Name: </td>
                    <td>{{ $info->last_name }}</td>
                </tr>
                <tr>
                    <td>Username: </td>
                    <td>{{ $info->username }}</td>
                </tr>
                <tr>
                    <td>Email: </td>
                    <td>{{ $info->email }}</td>
                </tr>
                <tr>
                    <td>Phone Number: </td>
                    <td>{{ $info->phone_no }}</td>
                </tr>
                <tr>
                    <td>Address: </td>
                    <td>{{ $info->address }}</td>
                </tr>
                <tr>
                    <td>City: </td>
                    <td>{{ $info->city }}</td>
                </tr>
                <tr>
                    <td>Parish: </td>
                    <td>{{ $info->parish }}</td>
                </tr>
                @endforeach
            </table>

            <a class="edit" href="{{ url('/edit') }}">Edit</a>


            @elseif(session()->get('check') == "MyPurchases")

            <form action="{{ url('/mypurchases') }}" method="post">
                @csrf
                <select name="purchases" id="">
                    <option value="">Select Date</option>
                    @foreach($pdate as $info)
                     <option value="{{ $info->purchased_date }}">                         
                            {{ $info->purchased_date }}                           
                     </option>
                     @endforeach            
                </select>
                <input type="submit" value="Submit">
            </form>

            <div class="container">
                <table>
                    <tr>
                        <th>Product Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Purchased Dates</th>
                    </tr>
                    @foreach($mypurchases as $purchases)
                        <tr>
                            <td>{{ $purchases->product_name }}</td>
                            <td>{{ $purchases->description }}</td>
                            <td>{{ $purchases->price }}</td>
                            <td>{{ $purchases->quantity }}</td>
                            <td>{{ $purchases->purchased_date }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>



            @elseif(session()->get('check') == "Rewards")

            <h1>Rewards</h1>
            <div class="points_container">
                <div class="points">
                    <h2>Total Points</h2>
                    <span class="points_num">{{ $data->points }}</span>
                    <span class="top_points">Points</span>
                    <div>Customer earn 100 points for ever purchase made.</div>
                </div>

                <div class="points">
                    <h2>Points Used</h2>
                    <span class="points_num">0</span>
                    <span class="top_points">Points</span>
                    <div>Points can only be redeemed in store.</div>
                </div>
            </div>
            @endif
        </div>
    </div>


</body>

</html>