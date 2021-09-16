<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/812b520597.js" crossorigin="anonymous"></script>
    <style>
        * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: Arial, Helvetica, sans-serif;
        }
        .container6 {
        width: 80%;
        display: flex;
        align-items: center;
        flex-wrap: wrap;  
        margin-top: 40px; 
        margin: auto;
        padding: 40px 0;
        }
        .footer{
        background-color: black;
        color:white;
        text-align: center;
        padding-bottom: 20px;
        }
        .container6 .info img{
        filter: invert();
        }
        .container6 .info{
        flex: 1;
        text-align: center;
        }

        .container6 .info a{
        text-decoration: none;
        color: #555;
        margin: 5px;
        }
        .container6 .info h3{
        font-weight: bold;
        font-size: 25px;
        margin-bottom: 10px;
        }

        .container6 .info p{
        text-decoration: none;
        color: #555;
        padding: 2px 0;
        }
        .socials i{
        color: #555;
        font-size: 35px;
        margin: 0 10px;
        }
        .socials i:hover{
        color: white;  
        }
    </style>
</head>
<body>
    <div id="footer" class="footer">
        <div class="container6">
            <div class="info">
                <img src="{{ url('css/images/logo.png') }}">
            </div>
            <div class="info">
                <h3>Contact Us</h3>
                <p>Tel: 1(876) 392-7600</p>
                <p>mathewfashion@gmail.com</p>
                <p>69 Hope Road, Kingston 10</p>
            </div>
            <div class="info">
                <h3>About Us</h3>
                <p>Delivery Policy</p>
                <p>Careers</p>
                <p>Return Policy</p>
            </div>
            <div class="info">
                <h3>Gift Cards</h3>
                <p>Coupons</p>
                <p>Gift Cards</p>
                <p>Weekly ads</p>
            </div>
        </div>
        <div class="socials">
            <a href="https://www.instagram.com/unrxlyman/"><i class="fab fa-instagram"></i></a>
            <a href="https://twitter.com/"><i class="fab fa-twitter-square"></i></a>
            <a href="https://www.facebook.com/MathewLayne"><i class="fab fa-facebook-square"></i></a>
        </div>
    </div>
</body>
</html>