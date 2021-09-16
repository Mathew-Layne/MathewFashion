<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit</title>
    <style>
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: Arial, Helvetica, sans-serif;
    }
    
    form{
        box-shadow: 0 0 20px rgb(218, 218, 218);
        height: 100%;
        width: 500px;
        margin: auto;
        margin-top: 50px;
        margin-bottom: 70px;
        padding: 25px;
    }
    
    input[type="text"]{
        padding: 10px 20px;
        width: 100%;
        margin: 8px 0;
    }
    
       
    select{
        padding: 10px 20px;
        width: 100%;
        background-color: white; 
        margin: 8px 0;

    }
    
    input[type="submit"]{
        padding: 8px 40px;  
        background-color: rgb(0, 89, 255); 
        border: none; 
        color: white;
        border-radius: 20px;
        font-weight: bold;
        margin: 8px 0;
    }
    
    form h1{
        text-align: center;
        margin-bottom: 30px;
    }

    .cancel_btn{
        padding: 8px 40px;  
        background-color: rgb(255, 0, 0); 
        border: none; 
        color: white;
        border-radius: 20px;
        
        text-decoration: none; 
    }
    </style>
</head>
<x-header/>
<body>
    <form action="" method="post">
        <h1>Edit</h1>
        @csrf
        <input type="text" name="fname" value="{{ $data->first_name }}" Placeholder="Enter First Name"><br>        
        <input type="text" name="lname" value="{{ $data->last_name }}" Placeholder="Enter Last Name"><br>        
        <input type="text" name="username" value="{{ $data->username }}" Placeholder="Enter Username"><br>        
        <input type="text" name="phone_no" value="{{ $data->phone_no }}" Placeholder="Enter Phone Number"><br>                  
        <input type="text" name="address" value="{{ $data->address }}" Placeholder="Enter Address"><br>         
        <input type="text" name="city" value="{{ $data->city }}" Placeholder="Enter City"><br>
        <select name="parish" value="{{ $data->parish}}">
            <option value="{{ $data->parish}}">{{ $data->parish}}</option>
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
        <input id="update" type="submit" value="Update">
        <a class="cancel_btn"href="{{ url('/admin') }}">Cancel</a>
    </form>
</body>

<x-footer/>
</html>