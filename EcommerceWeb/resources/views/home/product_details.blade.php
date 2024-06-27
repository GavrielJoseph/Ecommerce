<!DOCTYPE html>
<html>
<head>
   <!-- Basic -->
   <base href="/public">

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
      <!-- Bagian header dimulai -->
      @include('home.header')

      <div class="col-sm-6 col-md-4 col-lg-4" style="margin: auto; width: 50%; padding: 30px">
         <div class="img-box" style="padding: 20px">
            <img src="product/{{$product->image}}" alt="">
         </div>
         <div class="detail-box">
            <h5>{{$product->name}}</h5>

            <!-- Menampilkan harga dengan diskon jika ada -->
            @if($product->total_discount != null)
               <h6 style="color: red">Rp {{$product->total_discount}}</h6>
               <h6 style="text-decoration: line-through;">Rp {{$product->price}}</h6>
            @else
               <h6>Rp {{$product->price}}</h6>
            @endif

            <h6>Product Category: {{$product->category}}</h6>
            <h6>Product Details: {{$product->description}}</h6>
            <h6>Stocks: {{$product->quantity}}</h6>

            <!-- Form untuk menambahkan produk ke cart -->
            @if($product->quantity > 0)
               <form action="{{url('add_cart', $product->id)}}" method="Post">
                  @csrf
                  <div class="row">
                     <div class="col-md-4">
                        <input type="number" name="quantity" value="1" min="1" style="width: 100px">
                     </div>
                     <div class="col-md-4">
                        <input type="submit" value="Add to Cart" class="btn btn-primary">
                     </div>
                  </div>
               </form>
            @else
               <!-- Alert jika stock sudah habis -->
               <div class="alert alert-danger" role="alert">
                  This product is out of stock.
               </div>
               <button class="btn btn-secondary" disabled>Add to Cart</button>
            @endif
         </div>
      </div>
   </div>

   <!-- Bagian footer dimulai -->
   @include('home.footer')


   <div class="cpy_">
      <p class="mx-auto">© 2024 Kelompok 12<a href="https://html.design/"></a><br>
         <a href="" target="_blank"></a>
      </p>
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
