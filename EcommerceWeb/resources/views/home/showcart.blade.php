<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>Famms - Fashion HTML Template</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />

      <style type="text/css">
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }

        .center {
            margin: auto;
            width: 70%;
            text-align: center;
            padding: 30px;
            background: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }

        th, td {
            border: 1px solid #dee2e6;
            padding: 15px;
            text-align: left;
        }

        .th_design {
            font-size: 18px;
            padding: 10px;
            background: #007bff;
            color: white;
            text-align: center;
        }

        .img_design {
            height: 150px;
            width: 150px;
            object-fit: cover;
            border-radius: 8px;
        }

        .total_design {
            font-size: 24px;
            padding: 20px;
            font-weight: bold;
            color: #28a745;
        }

        .btn {
            display: inline-block;
            font-weight: 400;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            user-select: none;
            border: 1px solid transparent;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            line-height: 1.5;
            border-radius: 0.25rem;
            transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        .btn-danger {
            color: #fff;
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .btn-danger:hover {
            color: #fff;
            background-color: #c82333;
            border-color: #bd2130;
        }

        .btn-danger:not(:disabled):not(.disabled):active {
            color: #fff;
            background-color: #bd2130;
            border-color: #b21f2d;
            box-shadow: none;
        }

        h1 {
            margin: 20px 0;
        }

        .order-buttons {
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        .order-buttons a {
            padding: 15px 25px;
            font-size: 18px;
            border-radius: 5px;
            text-decoration: none;
        }

        .alert-success {
            color: #155724;
            background-color: #d4edda;
            border-color: #c3e6cb;
            padding: 20px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            border-radius: 0.25rem;
        }

        .close {
            float: right;
            font-size: 1.5rem;
            font-weight: 700;
            line-height: 1;
            color: #000;
            text-shadow: 0 1px 0 #fff;
            opacity: .5;
        }

        .close:hover {
            color: #000;
            text-decoration: none;
            opacity: .75;
        }
      </style>
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
         @include('home.header')
         <!-- end header section -->
         <!-- slider section -->

         <!-- end slider section -->

      <!-- why section -->

      @if(session()->has('message'))

            <div class="alert alert-success">
                
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                
                {{session()->get('message')}}

            </div>

      @endif
     

        <div class="center">

            <table>
                <tr>
                    <th class="th_design">Product name</th>
                    <th class="th_design">Product quantity</th>
                    <th class="th_design">Price</th>
                    <th class="th_design">Image</th>
                    <th class="th_design">Action</th>
                </tr>
       
                <?php $totalprice = 0; ?>

                @foreach($cart as $cart)

                <tr>
                    <td>{{$cart->product_name}}</td>
                    <td>{{$cart->quantity}}</td>
                    <td>Rp {{ number_format(floatval(str_replace('.', '', $cart->price)), 0, '.', '.') }}</td>
                    <td><img class="img_design" src="/product/{{$cart->image}}"></td>
                    <td>
                        <a class="btn btn-danger" onclick="return confirm('Are you sure?')" href="{{url('remove_cart',$cart->id)}}">Remove Product</a>
                    </td>
                </tr>

                <?php
                    $itemPrice = floatval(str_replace('.', '', $cart->price));
                    if ($itemPrice > 0) {
                        $totalprice += $itemPrice;
                    }
                ?>

                @endforeach

                <?php
                $totalprice_formatted = number_format($totalprice, 0, ',', '.');
                ?>     

            </table>

            <div>
                <h1 class="total_design">Total Price: Rp {{ $totalprice_formatted }}</h1>
            </div>

            <div>
                <h1 style="font-size: 25px; padding-bottom: 15px;">Order Here</h1>
                <div class="order-buttons">
                    <a href="{{url('cash_order')}}" class="btn btn-danger">COD/TRANSFER</a>
                    <a href="{{url('stripe',$totalprice)}}" class="btn btn-danger">Pay Using Card</a>
                </div>
            </div>

        </div>

      <!-- footer start -->
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By Kelompok<a href="https://html.design/">Free Html Templates</a><br>
            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
         </p>
      </div>
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
   </body>
</html>
