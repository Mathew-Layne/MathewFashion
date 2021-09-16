<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ url('css/signup.css') }}">
    <title>Signup</title>
    <style>
  
    
    </style>
</head>

<x-header/>
<body>
    <form action="{{ url('signup') }}" method="post">
        <h1>Signup</h1>
        @csrf
        <input type="text" name="fname" value="{{ old('fname') }}" Placeholder="Enter First Name"><br>
        @error('fname')<span style="color:red">{{ 'The First Name field is required.' }}</span>@enderror <br>
        <input type="text" name="lname" value="{{ old('lname') }}" Placeholder="Enter Last Name"><br>
        @error('lname')<span style="color:red">{{ 'The Last Name field is required.' }}</span>@enderror <br>
        <input type="text" name="username" value="{{ old('username') }}" Placeholder="Enter Username"><br>
        @error('username')<span style="color:red">{{ 'The Username field is required.' }}</span>@enderror <br>
        <input type="text" name="phone_no" value="{{ old('phone_no') }}" Placeholder="Enter Phone Number"><br>
        @error('phone_no')<span style="color:red">{{ 'The Phone Number field is required.' }}</span>@enderror <br>
        <input type="email" name="email" value="{{ old('email') }}" Placeholder="Enter Email Address"><br>
        @error('email')<span style="color:red">{{ 'The Email field is required.' }}</span>@enderror <br>
        <input type="password" name="pwd" value="{{ old('pwd') }}" Placeholder="Create Password"><br>
        @error('pwd')<span style="color:red">{{ 'The Password field is required.' }}</span>@enderror <br>
        <input type="password" name="vpwd" value="{{ old('vpwd') }}" Placeholder="Verify Password"><br> 
        @error('vpwd')<span style="color:red">{{ 'The Verified Password field is required.' }}</span>@enderror <br>
        <input type="text" name="address" value="{{ old('address') }}" Placeholder="Enter Address"><br> 
        @error('address')<span style="color:red">{{ 'The Address field is required.' }}</span>@enderror <br>  
        <input type="text" name="city" value="{{ old('city') }}" Placeholder="Enter City"><br> 
        @error('city')<span style="color:red">{{ 'The City field is required.' }}</span>@enderror <br>
        <select name="parish">
            <option>Select Parish</option>
            <option value="Clarendon">Clarendon</option>            
            <option value="Hanover">Hanover</option>
            <option value="Kingston & St Andrew">Kingston & St Andrew</option>
            <option value="Manchester">Manchester</option>
            <option value="St. Ann">St. Ann</option>
            <option value="St. Catherine">St. Catherine</option>
            <option value="St. Elizabeth">St. Elizabeth</option>
            <option value="St. James">St. James</option>
            <option value="St. Mary">St. Mary</option>
            <option value="St. Thomas">St. Thomas</option>
            <option value="Trelawny">Trelawny</option>
            <option value="Westmoreland">Westmoreland</option>
        </select><br> 
        @error('parish')<span style="color:red">{{ 'The Parish field is required.' }}</span>@enderror <br>
        <input type="submit" value="Signup">     
    </form>
</body>
<x-footer/>
</html>