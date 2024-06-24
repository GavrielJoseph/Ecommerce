<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  @include('admin.css')

  <style type="text/css">
      
    body {
      background-color: #000; /* Background color hitam */
      color: #fff; /* Warna teks putih */
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

    .div_center {
      text-align: center;
      padding-top: 40px;
    }
    
    .h2_font {
      font-size: 40px;
      padding-bottom: 40px;
    }
    
    .input_color {
      color: #000; /* Warna teks input hitam */
      padding: 8px 12px;
      font-size: 16px;
      border: 1px solid #fff; /* Border putih */
      border-radius: 4px;
      width: 300px;
      margin-bottom: 12px;
      background-color: #fff; /* Background input putih */
    }

    .center {
      margin: auto;
      width: 50%;
      text-align: center;
      margin-top: 30px;
      border: 3px solid #87CEEB; /* Change border color */
      border-radius: 10px; /* Rounded corners for the table */
      overflow: hidden; /* Hide overflow */
      background-color: #000; /* Background color hitam untuk table */
    }

    .center table {
      width: 100%; /* Make the table fill its container */
      border-collapse: collapse; /* Collapse table borders */
      background-color: #000; /* Background color hitam untuk table */
    }

    .center table td, .center table th {
      padding: 12px; /* Padding inside table cells */
      border: 1px solid #87CEEB; /* Border for table cells */
      text-align: left; /* Align text left inside table cells */
      color: #fff; /* Warna teks putih */
    }

    .center table th {
      background-color: #87CEEB; /* Header background color */
    }

    .btn {
      padding: 8px 16px; /* Padding for buttons */
      border: none;
      border-radius: 4px;
      font-size: 16px; /* Font size for buttons */
      cursor: pointer;
      transition: background-color 0.3s;
    }

    .btn-primary {
      background-color: #007bff; /* Primary button color */
      color: white;
    }

    .btn-primary:hover {
      background-color: #0056b3; /* Darker shade on hover */
    }

    .btn-danger {
      background-color: #dc3545; /* Danger button color */
      color: white;
    }

    .btn-danger:hover {
      background-color: #c82333; /* Darker shade on hover */
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

          <div class="div_center">

              <h2 class="h2_font">Add Category</h2>

              <form action="{{url('/add_category')}}" method="POST">

                  @csrf

                  <input class="input_color" type="text" name="category" placeholder="Write category name">
              
                  <input type="submit" class="btn btn-primary" name="submit" value="Add Category">
              </form>

          </div>

          <div class="center">

            <table>

              <thead>
                <tr>
                  <th>Category Name</th>
                  <th>Action</th>
                </tr>
              </thead>

              <tbody>
                @foreach($data as $data)
                <tr>
                  <td>{{$data->category_name}}</td>
                  <td>
                    <a onclick="return confirm('Are you sure you want to delete?')" class="btn btn-danger" href="{{url('delete_category',$data->id)}}">Delete</a>
                  </td>
                </tr>
                @endforeach
              </tbody>

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
