<!DOCTYPE html>
<html>
<head>
    <title>Order PDF</title>
</head>
<body>

    <h1>Order Details</h1>

    Customer name: <h3>{{$order->name}}</h3>
    Customer email: <h3>{{$order->email}}</h3>
    Customer phone number: <h3>{{$order->phone_number}}</h3>
    Customer address: <h3>{{$order->address}}</h3>
    Customer ID: <h3>{{$order->user_id}}</h3>

    Product name: <h3>{{$order->product_name}}</h3>
    Product price: <h3>{{$order->price}}</h3>
    Total item: <h3>{{$order->quantity}}</h3>
    Product status: <h3>{{$order->payment_status}}</h3>
    Product ID: <h3>{{$order->product_id}}</h3>

    <br><br>
    <img height="250" width="230" src="product/{{$order->image}}">

</body>
</html>