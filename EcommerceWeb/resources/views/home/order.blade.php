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
      <title>GM</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />

      
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
