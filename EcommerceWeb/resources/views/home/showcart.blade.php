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

        .center
        {
            margin: auto;
            width: 70%;
            text-align: center;
            padding: 30px;
        }

        table,th,td
        {
            border: 1px solid grey;
        }

        .th_design
        {
            font-size: 30px;
            padding: 5px;
            background: skyblue;
        }

        .img_design
        {
            height: 150px;
            width: 150px;
        }

        .total_design
        {
            font-size: 20px;
            padding: 40px;
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
                <h1 class="total_design" >Total Price: Rp {{ $totalprice_formatted }}</h1>
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