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
            padding: 30px;
            text-align: center;
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

        .btn-primary {
            color: #fff;
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            color: #fff;
            background-color: #0056b3;
            border-color: #004085;
        }

        .btn-primary:not(:disabled):not(.disabled):active {
            color: #fff;
            background-color: #004085;
            border-color: #003068;
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
         <!-- header section starts -->
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
                    <th class="th_design">Product Name</th>
                    <th class="th_design">Quantity</th>
                    <th class="th_design">Price</th>
                    <th class="th_design">Payment Status</th>
                    <th class="th_design">Delivery Status</th>
                    <th class="th_design">Image</th>
                    <th class="th_design">Actions</th>
                </tr>

                @foreach($order as $order)

                <tr>
                    <td>{{$order->product_name}}</td>
                    <td>{{$order->quantity}}</td>
                    <td>{{$order->price}}</td>
                    <td>{{$order->payment_status}}</td>
                    <td>{{$order->delivery_status}}</td>
                    <td>
                        <img class="img_design" height="100" width="120" src="product/{{$order->image}}">
                    </td>
                    <td>
                        @if($order->delivery_status == 'processing')
                        <a onclick="return confirm('Are you sure?')" class="btn btn-danger" href="{{url('cancel_order', $order->id)}}">Cancel Order</a>
                        @elseif($order->delivery_status == 'delivered' || $order->delivery_status == 'you canceled the order')
                        <a onclick="return confirm('Are you sure you want to delete this order?')" class="btn btn-primary" href="{{url('delete_order', $order->id)}}">Delete Order</a>
                        @else
                        <p style="color: blue;">Done</p>
                        @endif
                    </td>
                </tr>

                @endforeach

            </table>

        </div>

      <!-- jQuery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
   </body>
</html>
