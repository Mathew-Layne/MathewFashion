<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ url('css/login.css') }}">
    <title>Login</title>
</head>
<x-header/>
<body> 
    <div class="container"> 
        <div class="info">
            <img src="{{ url('css/images/model.png') }}" alt="">
        </div>  
        <form action="{{ url('/login') }}" method="post">
            <h1>Login</h1>
            @csrf
            <input type="text" name="email" Placeholder="Enter Email Address"><br>
            @error('email')<span style="color:red">{{ $message }}</span>@enderror <br>
            <input type="password" name="password" Placeholder="Enter Password"><br>
            @error('password')<span style="color:red">{{ $message }}</span>@enderror <br>
            <input id="login" type="submit" value="Login">    
        </form>    
    </div>
</body>
<script src="{{ url('script.js') }}"></script>
<x-footer/>  
</html>