<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Our Products</title>
   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
   <!-- Custom CSS -->
   <link rel="stylesheet" href="css/web.css">
</head>
<body>

<section class="product_section layout_padding">
   <div class="container">
      <div class="heading_container heading_center">
         <h2>
            Our <span>products</span>
         </h2>
         <!-- Form untuk pencarian produk -->
         <form action="{{ url('search_product') }}" method="GET" class="mt-4 mb-4">
            @csrf
            <div class="form-row">
               <div class="col">
                  <input type="text" name="search" class="form-control" placeholder="Search here">
               </div>
               <div class="col-auto">
                  <button type="submit" class="btn btn-primary">Search</button>
               </div>
            </div>
         </form>
      </div>
      <div class="row">
         <!-- Menampilkan daftar produk -->
         @foreach($product as $products)
         <div class="col-sm-6 col-md-4 col-lg-4 mb-4">
            <div class="box">
               <div class="option_container">
                  <div class="options">
                     <!-- Tombol untuk melihat detail produk -->
                     <a href="{{ url('product_details', $products->id) }}" class="btn btn-info btn-block">
                        Product Details
                     </a>

                     <!-- Form untuk menambahkan produk ke keranjang -->
                     @if($products->quantity > 0)
                     <form action="{{ url('add_cart', $products->id) }}" method="POST" class="mt-3">
                        @csrf
                        <div class="form-row">
                           <div class="col">
                              <input type="number" name="quantity" value="1" min="1" class="form-control">
                           </div>
                           <div class="col-auto">
                              <input type="submit" value="Add to Cart" class="btn btn-primary btn-block">
                           </div>
                        </div>
                     </form>
                     @else
                     <!-- Alert jika stok produk habis -->
                     <div class="alert alert-danger mt-3" role="alert">
                        This product is out of stock.
                     </div>
                     <button class="btn btn-secondary btn-block" disabled>Add to Cart</button>
                     @endif

                  </div>
               </div>
               <div class="img-box">
                  <img src="product/{{ $products->image }}" alt="">
               </div>
               <div class="detail-box">
                  <h5>{{ $products->name }}</h5>
                  <!-- Menampilkan harga dengan atau tanpa diskon -->
                  @if($products->total_discount != null)
                  <h6 style="color: red">Rp {{ $products->total_discount }}</h6>
                  <h6 style="text-decoration: line-through;">Rp {{ $products->price }}</h6>
                  @else
                  <h6>Rp {{ $products->price }}</h6>
                  @endif
               </div>
            </div>
         </div>
         @endforeach
      </div>
      <!-- Pagination untuk navigasi halaman -->
      <div class="pagination" style="display: flex; justify-content: center; padding-top: 20px;">
         @if ($product->onFirstPage())
         <button class="pagination-button" disabled>Back</button>
         @else
         <a href="{{ $product->previousPageUrl() }}" class="pagination-button">Back</a>
         @endif

         @if ($product->hasMorePages())
         <a href="{{ $product->nextPageUrl() }}" class="pagination-button">Next</a>
         @else
         <button class="pagination-button" disabled>Next</button>
         @endif
      </div>
   </div>
</section>

<!-- Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>
