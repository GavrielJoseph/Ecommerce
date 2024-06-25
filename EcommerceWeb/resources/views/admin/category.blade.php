<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  @include('admin.css')
  <link rel="stylesheet" href="css/adm.css">
</head>
<body>
  <div class="container-scroller">
    <!-- Sidebar partial -->
    @include('admin.sidebar')
    <!-- Header partial -->
    @include('admin.header')
    
    <div class="main-panel">
      <div class="content-wrapper">

        <!-- Menampilkan pesan sukses jika ada -->
        @if(session()->has('message'))
        <div class="alert alert-success">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
          {{session()->get('message')}}
        </div>
        @endif

        <div class="div_center">
          <h2 class="h2_font">Add Category</h2>
          
          <!-- Form untuk menambah kategori baru -->
          <form action="{{url('/add_category')}}" method="POST">
            @csrf
            <input class="input_color" type="text" name="category" placeholder="Write category name">
            <input type="submit" class="btn btn-primary" name="submit" value="Add Category">
          </form>
        </div>

        <div class="category">
          <!-- Tabel untuk menampilkan daftar kategori yang ada -->
          <table>
            <thead>
              <tr>
                <th>Category Name</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <!-- Looping data kategori dari database -->
              @foreach($data as $data)
              <tr>
                <td>{{$data->category_name}}</td>
                <td>
                  <!-- Tombol untuk menghapus kategori dengan konfirmasi -->
                  <a onclick="return confirm('Are you sure you want to delete?')" class="btn btn-danger" href="{{url('delete_category',$data->id)}}">Delete</a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>

      </div>
    </div>
  </div>
  
  <!-- Memuat plugin JavaScript -->
  @include('admin.script')
  <!-- End custom js for this page -->
</body>
</html>
