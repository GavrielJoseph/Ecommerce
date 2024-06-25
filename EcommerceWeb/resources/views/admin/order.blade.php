<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    @include('admin.css')
    <link rel="stylesheet" href="css/adm.css">


</head>
<body>
<div class="container-scroller">
    <!-- Sidebar and Header includes -->
    @include('admin.sidebar')
    @include('admin.header')

    <div class="main-panel">
        <div class="content-wrapper">

            <h1 class="page-title">All Orders</h1>

            <!-- untuk search form -->
            <div class="search-form">
                <form action="{{url('search')}}" method="get">
                    @csrf
                    <input type="text" class="search-input-field" name="search" placeholder="Search Here">
                    <input type="submit" value="Search" class="search-button">
                </form>
            </div>

            <!-- button sort by delivery status -->
            <div class="search-form">
                <form action="{{url('sort')}}" method="get">
                    <input type="submit" value="Sort by Delivery Status" class="sort-status-button">
                </form>
            </div>

            <!-- button sort by name -->
            <div class="search-form">
                <form action="{{ route('admin.sortByName') }}" method="get">
                    <input type="submit" value="Sort by Name" class="sort-name-button">
                </form>
            </div>

            <!-- filter by delivery status -->
            <div class="search-form">
                <form action="{{ route('admin.filterByDeliveryStatus') }}" method="get">
                    <select name="delivery_status" class="filter-select-field">
                        <option value="">Show All</option>
                        <option value="processing">Processing</option>
                        <option value="delivered">Delivered</option>

                    </select>
                    <input type="submit" value="Filter" class="filter-button">
                </form>
            </div>

            <!-- Table  -->
            <table class="order-table">
                <tr class="header-bg">
                    <th class="header-cell">Name</th>
                    <th class="header-cell">Email</th>
                    <th class="header-cell">Address</th>
                    <th class="header-cell">Phone number</th>
                    <th class="header-cell">Product name</th>
                    <th class="header-cell">Quantity</th>
                    <th class="header-cell">Price</th>
                    <th class="header-cell">Payment Status</th>
                    <th class="header-cell">Delivery Status</th>
                    <th class="header-cell">Image</th>
                    <th class="header-cell">Delivered</th>
                    <th class="header-cell">Download PDF</th>
                    <th class="header-cell">Send Email</th>
                    <th class="header-cell">Delete Order</th>
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
                            <img class="product-image" src="/product/{{$order->image}}">
                        </td>
                        <td>
                            @if($order->delivery_status == 'processing')
                                <a href="{{ route('admin.delivered', $order->id) }}"
                                onclick="return confirm('Are you sure this product is delivered?')"
                                class="action-button delivered-btn">Delivered</a>
                            @else
                                <p style="color: green;">Delivered</p>
                            @endif
                        </td>
                        <td>
                            <a href="{{url('print',$order->id)}}" class="action-button btn btn-secondary">Print</a>
                        </td>
                        <td>
                            <a href="{{url('email',$order->id)}}" class="action-button btn btn-info">Send Email</a>
                        </td>
                        <td>
                            <form action="{{ route('admin.deleteOrder', $order->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="action-button btn btn-danger"
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
