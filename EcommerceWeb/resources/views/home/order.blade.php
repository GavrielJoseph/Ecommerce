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

    <style>

    .center
    {
        margin: auto;
        width: 70%;
        padding: 30px;
        text-align: center;
    }

    table,td,th
    {
        border: 1px solid black;
    }

    .th_design
    {
        padding: 10px;
        background-color: skyblue;
        font-size: 20px;
        font-weight: bold;
    }

    </style>

   </head>
   <body>

        <!-- header section strats -->
        @include('home.header')

        
        <div class="center">

            <table>

                <tr>
                    <th class="th_design">Product Name</th>
                    <th class="th_design">Quantity</th>
                    <th class="th_design">Price</th>
                    <th class="th_design">Payment Status</th>
                    <th class="th_design">Delivery Status</th>
                    <th class="th_design">Image</th>
                    <th class="th_design">Cancel Order</th>
                </tr>

                @foreach($order as $order)

                <tr>
                    <td>{{$order->product_name}}</td>
                    <td>{{$order->quantity}}</td>
                    <td>{{$order->price}}</td>
                    <td>{{$order->payment_status}}</td>
                    <td>{{$order->delivery_status}}</td>
                    <td>
                        <img heigth="100" width="120" src="product/{{$order->image}}">
                    </td>

                    <td>

                        @if($order->delivery_status=='processing')

                        <a onclick="return confirm('Are you sure?')" class="btn btn-danger" href="{{url('cancel_order',$order->id)}}">Cancel Order</a>

                        @else

                        <p style="color: blue;">Not Allowed</p>

                        @endif
                    </td>

                </tr>

                @endforeach

            </table>

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