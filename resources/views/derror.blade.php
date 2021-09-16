<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Under Construction</title>
    <script src="https://kit.fontawesome.com/812b520597.js" crossorigin="anonymous"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        body {
            display: flex;
            justify-content: center;
        }

        .container {
            width: 40%;
            height: 300px;
            text-align: center;
            margin-top: 200px;
        }

        p {
            font-size: 18px;
            font-family: Arial, Helvetica, sans-serif;
            margin-bottom: 20px;
            color: gray;
        }

        h1 {
            font-size: 50px;
            font-family: Arial, Helvetica, sans-serif;
            margin: 8px;

        }

        a {
            color: white;
            background-color: #ff5618;
            padding: 9px 30px;
            border-radius: 30px;
            transition: all 0.5s;
            font-weight: bold;
            text-decoration: none;
            margin-top: 15px;
        }

        #icon {
            color: gray;
            font-size: 45px;
        }
    </style>
</head>

<body>
    <div class="container">
        <i id="icon" class="fas fa-unlink"></i>
        <h1>Sorry</h1>
        <p>Your account has been deactivated, please contact admin</p>
        <a href="{{ url('/') }}"><i class="fas fa-arrow-left"></i> Go Back</a>
    </div>

</body>

</html>