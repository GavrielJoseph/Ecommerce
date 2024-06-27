<!DOCTYPE html>
<html>
<head>
   <!-- Pengaturan dasar -->
   <meta charset="utf-8" />
   <meta http-equiv="X-UA-Compatible" content="IE=edge" />
   <!-- Meta viewport untuk tampilan responsif -->
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
   <!-- Meta deskripsi dan kata kunci -->
   <meta name="keywords" content="" />
   <meta name="description" content="" />
   <meta name="author" content="" />
   <link rel="shortcut icon" href="images/favicon.png" type="">
   <title>GM</title>
   <!-- CSS Bootstrap -->
   <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
   <!-- Font Awesome untuk ikon -->
   <link href="home/css/font-awesome.min.css" rel="stylesheet" />
   <!-- Custom styles untuk template -->
   <link href="home/css/style.css" rel="stylesheet" />
   <!-- Style responsif -->
   <link href="home/css/responsive.css" rel="stylesheet" />
</head>
<body>
   <div class="hero_area">
      <!-- Bagian header dimulai -->
      @include('home.header')

      <!-- Bagian untuk menampilkan pesan sukses jika ada -->
      @if(session()->has('message'))
         <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            {{ session()->get('message') }}
         </div>
      @endif

      <div class="center">
         <!-- Tabel untuk menampilkan daftar produk dalam keranjang -->
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
                     <!-- Tombol untuk menghapus produk dari keranjang -->
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
               // Format total harga dengan tanda pemisah ribuan
               $totalprice_formatted = number_format($totalprice, 0, ',', '.');
            ?>     
         </table>

         <!-- Menampilkan total harga keseluruhan -->
         <div>
            <h1 class="total_design">Total Harga: Rp {{ $totalprice_formatted }}</h1>
         </div>

         <!-- Bagian untuk memesan produk -->
         <div>
            <h1 style="font-size: 25px; padding-bottom: 15px;">Order Here</h1>
            <div class="order-buttons">
               <!-- Tombol untuk membayar secara langsung atau transfer -->
               <a href="{{url('cash_order')}}" class="btn btn-danger">COD/TRANSFER</a>
               <!-- Tombol untuk membayar menggunakan kartu -->
               <a href="{{url('stripe',$totalprice)}}" class="btn btn-danger">Pay Using Card</a>
            </div>
         </div>
      </div>

      <br>
   </div>

   <!-- Bagian hak cipta -->
   <div class="cpy_">
      <p class="mx-auto">© 2024 Kelompok 12<a href=""></a><br>
        <a href="" target=""></a>
      </p>
   </div>

   <!-- Script JavaScript -->
   <script src="home/js/jquery-3.4.1.min.js"></script>
   <script src="home/js/popper.min.js"></script>
   <script src="home/js/bootstrap.js"></script>
   <script src="home/js/custom.js"></script>
</body>
</html>
