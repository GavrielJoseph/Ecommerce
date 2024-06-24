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
        @if(session()->has('message'))
        <div class="alert alert-success">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
          {{session()->get('message')}}
        </div>
        @endif
        <div class="product_div_center">
          <h1 class="product_font_size">Add Product</h1>
          <form action="{{url('/add_product')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="product_div_design">
              <label class="product_label">Product name :</label>
              <input class="product_text_color" type="text" name="name" placeholder="Write here" required="">
            </div>
            <div class="product_div_design">
              <label class="product_label">Product Description :</label>
              <input class="product_text_color" type="text" name="description" placeholder="Write here" required="">
            </div>
            <div class="product_div_design">
              <label class="product_label">Product Price :</label>
              <input class="product_text_color" type="text" id="price" name="price" placeholder="Write here" required="">
            </div>
            <div class="product_div_design">
              <label class="product_label">Discount Price :</label>
              <input class="product_text_color" type="text" id="disc_price" name="disc_price" placeholder="Write here">
            </div>
            <div class="product_div_design">
              <label class="product_label">Product Quantity :</label>
              <input class="product_text_color" type="number" min="0" name="quantity" placeholder="Write here" required="">
            </div>
            <div class="product_div_design">
              <label class="product_label">Product Category :</label>
              <select class="product_text_color" name="category" required="">
                <option value="" selected="">Choose category here</option>
                @foreach($category as $category)
                <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                @endforeach
              </select>
            </div>
            <div class="product_div_design">
              <label class="product_label">Product Image :</label>
              <input type="file" name="image" required="">
            </div>
            <div class="product_div_design">
              <input type="submit" value="Add Product" class="btn product_btn-primary">
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