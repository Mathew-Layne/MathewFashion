<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice</title>
    <style>
        .invoice_container{
            width: 60%;
            margin: auto;
            height: 100%;
            box-shadow: 5px 5px 10px gray;
            padding: 20px 20px 50px 20px;
            
        }
        .invoice_container img{
            width: 150px;  
            margin-bottom: 30px;          
        }

        .invoice{
            width:100%;
            height: 70px;
            background-color:black;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            margin-bottom: 20px;
        }

        .incoive_num{
            text-align: right;            
        }

        .store_address{
            margin-bottom: 20px;
        }

        .bill_to{
            margin-bottom:30px;
        }

        th{
            padding: 5px 50px 5px 10px;
            background-color: lightgray;    
            margin-bottom: 20px;        
        }

        td{
          padding: 5px 10px;            
        }

        .invoice_sum{
            width:100%;
            height: 30px;
            background-color:black;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            margin-top: 20px;
        }

        .total{
            /* background-color: aqua; */
            margin-left: 460px;
            padding-top: 10px;
            margin-bottom: 30px;
        }

    
    </style>
</head>
<x-header/>
<body>
<div class="invoice_container">
    <img src="{{ url('/css/images/logo.png') }}" alt="Logo">
    <div class="invoice">
        <h1>INVOICE</h1>
    </div>
    <h3 class="incoive_num"># MF-INV-1000001</h3>
    <div class="store_address">
        <h3>Mathew Fashion</h3> 
        <p>23 Trafalgar Rd.</p>
        <p>Kingston, Jamaica</p>
        <p>P.O Box 10596</p>
    </div>

    <div class="bill_to">
        <p>Bill To</p>
        <h4>{{ $data->first_name }}  {{ $data->last_name }}</h4>
        <p>{{ $data->address }}</p>
        <p>{{ $data->city }}, {{ $data->parish }}</p>
    </div>
    

    <table cellpadding="0" cellspacing="0">
        <tr>
            <th>Product Name</th>
            <th>Product Description</th>
            <th>Price</th>
        </tr>
        @foreach ($products as $info)
            <tr>
                <td>{{ $info->pro_name }}</td>  
                <td style="padding: 5px 150px 5px 10px;">{{ $info->description }}</td>
                <td>${{ $info->price }}.00</td>      
            </tr> 
        @endforeach            
    </table>

    <div class="invoice_sum">
        <h3>INVOICE SUMMARY</h3>
    </div>
    <div class="total">
        <table>
            <tr>
                <td style="padding: 5px 70px 5px 10px;">Sub Total</td>
                <td>${{ $total }}.00</td>
            </tr>
            <tr>
                <td style="padding: 5px 70px 5px 10px;">GCT(15%)</td>
                <td>${{ $total*0.15 }}</td>
            </tr>
            <tr>
                <td style="font-weight:bold; padding: 5px 70px 5px 10px">Grand Total</td>
                <td style="font-weight:bold">${{ $total*1.15 }}</td>
            </tr>
        </table>
    </div>

    <h3 style="text-align:center">Thank you for shopping with Mathew Fashion!!</h3>
</div>



    
</body>
<x-footer/>
</html>

{{-- <form action="" method="post">
        @csrf
        <input type="search" name="searchbar" placeholder="Search">
        <input type="submit" value="Search">
    </form>
@if(isset())
    <h1>Results not found</h1>
@else
    @foreach ($data as $info)
        {{ $info->pro_name }}
    @endforeach
@endif --}}