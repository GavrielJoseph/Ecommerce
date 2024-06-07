<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')

    <style type="text/css">

    .title_design
    {
        text-align: center;
        font-size: 25px;
        font-weight: bold;
        padding-bottom: 40px;
    }

    .table_design
    {
        border: 2px solid white;
        width: 100%;
        margin: auto;
        text-align: center;
    }

    .th_design
    {
        background-color: skyblue;
    }

    .image_size
    {
        width: 150px;
        height: 125px;
    }

    </style>

  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      @include('admin.header')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">

            <h1 class="title_design" >All Orders</h1>

            <table class="table_design">

            <tr class="th_design">

                <th>Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>Phone number</th>
                <th>Product name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Payment Status</th>
                <th>Delivery Status</th>
                <th>Image</th>

            </tr>

            @foreach($order as $order)

            <tr>

                <td>{{$order->name}}</td>
                <td>{{$order->email}}</td>
                <td>{{$order->address}}</td>
                <td>{{$order->phone_number}}</td>
                <td>{{$order->product_name}}</td>
                <td>{{$order->quantity}}</td>
                <td>{{$order->price}}</td>
                <td>{{$order->payment_status}}</td>
                <td>{{$order->delivery_status}}</td>
                <td>
                    <img class="image_size" src="/product/{{$order->image}}">
                </td>

            </tr>

            @endforeach

            </table>

            </div>
        </div>

    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>

