<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    @include('admin.css')

    <style type="text/css">
        .center {
            margin: auto;
            width: 80%;
            border-radius: 10px;
            text-align: center;
            margin-top: 40px;
            overflow-x: auto;
        }

        .font_size {
            text-align: center;
            font-size: 40px;
            padding-top: 20px;
            font-family: Arial, sans-serif;
            color: #87CEEB;
        }

        .img_size {
            width: 100px;
            height: auto;
            border-radius: 10px;
        }

        .th_color {
            background: #87CEEB;
            color: white;
        }

        .th_design {
            padding: 10px;
            font-family: Arial, sans-serif;
            font-size: 16px;
            border-right: 1px solid #ddd;
        }

        .th_design:last-child {
            border-right: none;
        }

        .title_design {
            text-align: center;
            font-size: 40px;
            padding-top: 20px;
            font-family: Arial, sans-serif;
            color: #87CEEB;
            margin-bottom: 30px;
        }

        .table_design {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            font-family: Arial, sans-serif;
            background-color: #333;
            color: #f2f2f2;
            border-radius: 10px;
            overflow: hidden;
            table-layout: fixed;
        }

        th, td {
            padding: 8px;
            border-bottom: 1px solid #555;
            border-right: 1px solid #555;
            font-size: 14px;
            word-wrap: break-word;
        }

        th:last-child, td:last-child {
            border-right: none;
        }

        tr:hover {
            background-color: #555;
        }

        .btn {
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            font-family: Arial, sans-serif;
            font-size: 12px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn-success {
            background-color: #4CAF50;
            color: white;
        }

        .btn-danger {
            background-color: #f44336;
            color: white;
        }

        .btn-success:hover {
            background-color: #45a049;
        }

        .btn-danger:hover {
            background-color: #da190b;
        }

        .alert-success {
            color: #155724;
            background-color: #d4edda;
            border-color: #c3e6cb;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            border-radius: 4px;
        }

        .alert-success .close {
            color: #155724;
            text-decoration: none;
            cursor: pointer;
        }

        @media (max-width: 768px) {
            .font_size {
                font-size: 24px;
            }

            .th_design, th, td {
                font-size: 12px;
                padding: 8px;
            }

            .img_size {
                width: 80px;
            }

            .btn {
                padding: 4px 8px;
                font-size: 10px;
            }
        }

    </style>
</head>
<body>
<div class="container-scroller">
    <!-- Sidebar and Header includes -->
    @include('admin.sidebar')
    @include('admin.header')

    <div class="main-panel">
        <div class="content-wrapper">

            <h1 class="title_design">All Orders</h1>

            <!-- Search Form -->
            <div style="padding-left: 400px; padding-bottom: 30px;">
                <form action="{{url('search')}}" method="get">
                    @csrf
                    <input type="text" style="color: black;" name="search" placeholder="Search Here">
                    <input type="submit" value="Search" class="btn btn-outline-primary">
                </form>
            </div>

            <!-- Sort by Delivery Status Button -->
            <div style="padding-left: 400px; padding-bottom: 30px;">
                <form action="{{url('sort')}}" method="get">
                    <input type="submit" value="Sort by Delivery Status" class="btn btn-outline-primary">
                </form>
            </div>

            <!-- Sort by Name Button -->
            <div style="padding-left: 400px; padding-bottom: 30px;">
                <form action="{{ route('admin.sortByName') }}" method="get">
                    <input type="submit" value="Sort by Name" class="btn btn-outline-primary">
                </form>
            </div>

            <div style="padding-left: 400px; padding-bottom: 30px;">
                <form action="{{ route('admin.filterByDeliveryStatus') }}" method="get">
                    <select name="delivery_status" class="btn btn-outline-primary">
                        <option value="">Show All</option>
                        <option value="processing">Processing</option>
                        <option value="delivered">Delivered</option>
                        <!-- Add more options if needed -->
                    </select>
                    <input type="submit" value="Filter" class="btn btn-outline-primary">
                </form>
            </div>


            

            <!-- Table of Orders -->
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
                    <th style="padding: 10px;">Send Email</th>
                    <th style="padding: 10px;">Delete Order</th>
                </tr>

                @forelse($order as $order)
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
                            <img class="img_size" src="/product/{{$order->image}}">
                        </td>
                        <td>
                            @if($order->delivery_status=='processing')
                                <a href="{{ route('admin.delivered', $order->id) }}"
                                   onclick="return confirm('Are you sure this product is delivered?')"
                                   class="btn btn-primary">Delivered</a>
                            @else
                                <p style="color: green;">Delivered</p>
                            @endif
                        </td>
                        <td>
                            <a href="{{url('print',$order->id)}}" class="btn btn-secondary">Print</a>
                        </td>
                        <td>
                            <a href="{{url('email',$order->id)}}" class="btn btn-info">Send Email</a>
                        </td>
                        <td>
                            <form action="{{ route('admin.deleteOrder', $order->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('Are you sure you want to delete this order?')">Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="14">No Data Found</td>
                    </tr>
                @endforelse
            </table>
        </div>
    </div>
    <!-- Includes for scripts -->
    @include('admin.script')
</div>
<!-- End container-scroller -->
</body>
</html>