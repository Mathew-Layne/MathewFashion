<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ url('css/admin.css') }}">
    <link href="https://kit-pro.fontawesome.com/releases/v5.15.3/css/pro.min.css" rel="stylesheet">   
    <title>Admin</title>

    
</head>

<body>
    <div class="navbar">
                <div class="logo">
                    <img src="{{ url('css/images/logo.png') }} " width='120px'>
                </div>
                <nav>
                    <ul>
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li><a href="{{ url('product') }}">Products</a>
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
                        <li class="username">{{ session()->get('Username') }}</li>                                             
                    </ul> 
                                    
                </nav>              
        </div>
    <div class="container">
        <div class="sidebar">
            <h1>Admin</h1>
            <ul>
                <li><a href="{{ url('/admin') }}"><i class="fas fa-user"></i>Profile</a></li>
                <li><a href="{{ url('/dashboard') }}"><i class="fas fa-chart-line"></i>Dashboard</a></li>
                <li><a href="{{ url('/users') }}"><i class="fas fa-users"></i>Users</a></li>
                <li><a href="{{ url('/addproduct') }}"><i class="far fa-plus-circle"></i>Add Product</a></li>
                <li><a href="{{ url('/inventory') }}"><i class="fad fa-warehouse"></i>Inventory</a></li>
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

            @elseif(session()->get('check') == "dashboard")
            <h1>Dashboard</h1>
            <div class="dash_container">
                <div class="dash1">
                    <div class="icon"><i class="far fa-money-check-alt"></i></div>
                    <div class="text">
                        <p>Total Purchases</p>
                        <p>1.5Million</p>
                    </div> 
                </div>
                <div class="dash2">
                    <div class="icon"><i class="fad fa-warehouse"></i></div>
                    <div class="text">
                        <p>Total Products</p>
                        <p>{{ $products }}</p>
                    </div> 
                </div>
                <div class="dash3">
                    <div class="icon"><i class="fad fa-users"></i></div>
                    <div class="text">
                        <p>Total Users</p>
                        <p>{{ $users }} Users</p>
                    </div> 
                </div>                
            </div>

            
            @elseif(session()->get('check') == "users")
            <h1>Users</h1>
            <table> 
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Action</th>

                </tr>               
                @foreach ($data as $info)
                <tr>
                    <td>{{ $info->id }}</td>
                    <td>{{ $info->first_name }}</td>
                    <td>{{ $info->last_name }}</td>
                    <td>{{ $info->username }}</td>
                    <td>{{ $info->email }}</td>
                    <td>{{ $info->phone_no }}</td>                    
                    <td><a class="deactivate_btn" href="{{ url('/deactivate/'.$info->id) }}">Deactivate</a></td>
                </tr>               
                @endforeach                
            </table>


            @elseif(session()->get('check') == "addproduct")
            <h1>Add Product</h1>
            <form action="" method="post" enctype="multipart/form-data"> 
                @csrf               
                <input id="pro_name" type="text" name="pro_name" placeholder="Enter Product Name"><br>
                <input type="text" name="description" Placeholder="Enter Description"><br>
                <input type="text" name="price" Placeholder="Enter Price"><br>
                <input type="text" name="quantity" Placeholder="Enter Quantity"><br>
                <select name="category">
                    <option>Select Category</option>
                    <option value="Jewelry">Jewelry</option>
                    <option value="Pants">Pants</option>
                    <option value="Shirts">Shirts</option>
                    <option value="Shoes">Shoes</option>
                    <option value="Suits">Suits</option>                    
                </select><br>
                <input type="file" name="image"><br>                
                <input id="add_btn" class="add_btn" type="submit" value="Add Product">                
            </form>       
            
            
            @elseif(session()->get('check') == "Inventory")            
            <h1>Inventory</h1>
            <table > 
                <tr>
                    <th>Product Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Quantity</th>                              
                </tr>               
                @foreach ($inventory as $info)
                <tr>
                    <td>{{ $info->pro_name }}</td>
                    <td>{{ $info->description }}</td>
                    <td>${{ $info->price }}.00</td>    
                    <td>{{ $info->quantity }}</td>             
                </tr>               
                @endforeach                
            </table>
            {{ $inventory->links() }}
            @endif
        </div>
    </div>
   
    
</body>
<script src="{{ url('script.js') }}"></script>
</html>