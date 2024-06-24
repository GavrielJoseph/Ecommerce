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
        padding: 15px;
        font-family: Arial, sans-serif;
        font-size: 18px;
        border-right: 1px solid #ddd;
      }

      .th_design:last-child {
        border-right: none;
      }

      table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
        font-family: Arial, sans-serif;
        background-color: #333;
        color: #f2f2f2;
        border-radius: 10px;
        overflow: hidden;
      }

      th, td {
        padding: 12px;
        border-bottom: 1px solid #555;
        border-right: 1px solid #555;
      }

      th:last-child, td:last-child {
        border-right: none;
      }

      tr:hover {
        background-color: #555;
      }

      .btn {
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        text-decoration: none;
        font-family: Arial, sans-serif;
        font-size: 14px;
        cursor: pointer;
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
          font-size: 14px;
          padding: 10px;
        }

        .img_size {
          width: 80px;
        }

        .btn {
          padding: 8px 16px;
          font-size: 12px;
        }
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
          @if(session()->has('message'))
            <div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
              {{session()->get('message')}}
            </div>
          @endif

          <h2 class="font_size">All Products</h2>

          <table class="center">
            <tr class="th_color">
              <th class="th_design">Product name</th>
              <th class="th_design">Description</th>
              <th class="th_design">Quantity</th>
              <th class="th_design">Category</th>
              <th class="th_design">Price</th>
              <th class="th_design">Discount Price</th>
              <th class="th_design">Product Image</th>
              <th class="th_design">Edit</th>
              <th class="th_design">Delete</th>
            </tr>

            @foreach($product as $product)
              <tr>
                <td>{{$product->name}}</td>
                <td>{{$product->description}}</td>
                <td>{{$product->quantity}}</td>
                <td>{{$product->category}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->total_discount}}</td>
                <td>
                  <img class="img_size" src="/product/{{$product->image}}">
                </td>
                <td>
                  <a class="btn btn-success" href="{{url('update_product',$product->id)}}">Edit</a>
                </td>
                <td>
                  <a class="btn btn-danger" onclick="return confirm('Are you sure?')" href="{{url('delete_product',$product->id)}}">Delete</a>
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
