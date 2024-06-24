<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <base href="/public">

  <!-- Include CSS -->
  @include('admin.css')
  <link rel="stylesheet" href="css/adm.css">
  

  <title>Update Product</title>
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

        @if(session()->has('message'))
        <div class="alert alert-success">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
          {{ session()->get('message') }}
        </div>
        @endif

        <div class="update_product_center">
          <h1 class="update_product_font_size">Update Product</h1>

          <form action="{{ url('/update_product_confirm',$product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="update_product_div_design">
              <label class="update_product_label">Product name :</label>
              <input class="update_product_text_color" type="text" name="name" placeholder="Write here" required="" value="{{$product->name}}">
            </div>

            <div class="update_product_div_design">
              <label class="update_product_label">Product Description :</label>
              <input class="update_product_text_color" type="text" name="description" placeholder="Write here" required="" value="{{$product->description}}">
            </div>

            <div class="update_product_div_design">
              <label class="update_product_label">Product Price :</label>
              <input class="update_product_text_color" type="text" id="price" name="price" placeholder="Write here" required="" value="{{$product->price}}">
            </div>

            <div class="update_product_div_design">
              <label class="update_product_label">Discount Price :</label>
              <input class="update_product_text_color" type="text" id="disc_price" name="disc_price" placeholder="Write here" value="{{$product->total_discount}}">
            </div>

            <div class="update_product_div_design">
              <label class="update_product_label">Product Quantity :</label>
              <input class="update_product_text_color" type="number" min="0" name="quantity" placeholder="Write here" required="" value="{{$product->quantity}}">
            </div>

            <div class="update_product_div_design">
              <label class="update_product_label">Product Category :</label>
              <select class="update_product_text_color update_product_select" name="category" required="">
                <option value="{{$product->category}}" selected="">{{$product->category}}</option>

                @foreach($category as $cat)

                <option value="{{$cat->category_name}}">{{$cat->category_name}}</option>

                @endforeach

              </select>
            </div>

            <div class="update_product_div_design">
              <label class="update_product_label">Current Product Image :</label>
              <img class="update_product_img" style="margin:auto;" height="100" width="100" src="/product/{{$product->image}}">
            </div>

            <div class="update_product_div_design">
              <label class="update_product_label">Change Product Image :</label>
              <input class="update_product_input" type="file" name="image">
            </div>

            <div class="update_product_div_design">
              <input type="submit" value="Update Product" class="update_product_btn update_product_btn_primary">
            </div>

          </form>

        </div>

      </div>
    </div>
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  @include('admin.script')
  <!-- End custom js for this page -->
  <script>
    document.getElementById('price').addEventListener('input', function(e) {
      this.value = formatNumber(this.value);
    });

    document.getElementById('disc_price').addEventListener('input', function(e) {
      this.value = formatNumber(this.value);
    });

    function formatNumber(value) {
      return value.replace(/\D/g, '')
        .replace(/\B(?=(\d{3})+(?!\d))/g, '.');
    }
  </script>
</body>

</html>