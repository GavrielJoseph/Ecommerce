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

                <th style="padding: 10px;">Name</th>
                <th style="padding: 10px;">Email</th>
                <th style="padding: 10px;">Address</th>
                <th style="padding: 10px;">Phone number</th>
                <th style="padding: 10px;">Product name</th>
                <th style="padding: 10px;">Quantity</th>
                <th style="padding: 10px;">Price</th>
                <th style="padding: 10px;">Payment Status</th>
                <th style="padding: 10px;">Delivery Status</th>
                <th style="padding: 10px;">Image</th>
                <th style="padding: 10px;">Delivered</th>
                <th style="padding: 10px;">Print PDF</th>

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
                <td>

                @if($order->delivery_status=='processing')

                <a href="{{url('delivered',$order->id)}}" onclick="return confirm('Are you sure this product is delivered?')" class="btn btn-primary">Delivered</a>

                @else

                <p style="color: green;">Delivered</p>

                @endif

                </td>

                <td>

                <a href="{{url('print',$order->id)}}" class="btn btn-secondary">Print</a>

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

