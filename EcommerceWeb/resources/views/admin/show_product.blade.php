<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    @include('admin.css')
    <link rel="stylesheet" href="css/adm.css">

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
          <!-- Menampilkan pesan jika ada -->
          @if(session()->has('message'))
            <div class="admin_show_product_alert-success">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
              {{session()->get('message')}}
            </div>
          @endif

          <h2 class="admin_show_product_font_size">All Products</h2>

           <!-- Tabel untuk menampilkan semua produk -->
          <table class="admin_show_product_center admin_show_product_table">
            <tr class="admin_show_product_th_color">
              <th class="admin_show_product_th_design">Product name</th>
              <th class="admin_show_product_th_design">Description</th>
              <th class="admin_show_product_th_design">Quantity</th>
              <th class="admin_show_product_th_design">Category</th>
              <th class="admin_show_product_th_design">Price</th>
              <th class="admin_show_product_th_design">Discount Price</th>
              <th class="admin_show_product_th_design">Product Image</th>
              <th class="admin_show_product_th_design">Edit</th>
              <th class="admin_show_product_th_design">Delete</th>
            </tr>

            <!-- Menampilkan data produk dalam tabel -->
            @foreach($product as $product)
              <tr class="admin_show_product_tr">
                <td class="admin_show_product_td">{{$product->name}}</td>
                <td class="admin_show_product_td">{{$product->description}}</td>
                <td class="admin_show_product_td">{{$product->quantity}}</td>
                <td class="admin_show_product_td">{{$product->category}}</td>
                <td class="admin_show_product_td">{{$product->price}}</td>
                <td class="admin_show_product_td">{{$product->total_discount}}</td>
                <td class="admin_show_product_td">
                  <img class="admin_show_product_img_size" src="/product/{{$product->image}}">
                </td>
                <td class="admin_show_product_td">
                  <a class="admin_show_product_btn admin_show_product_btn-success" href="{{url('update_product',$product->id)}}">Edit</a>
                </td>
                <td class="admin_show_product_td">
                  <a class="admin_show_product_btn admin_show_product_btn-danger" onclick="return confirm('Are you sure?')" href="{{url('delete_product',$product->id)}}">Delete</a>
                </td>
              </tr>
            @endforeach
          </table>
        </div>
      </div>
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>
