<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <base href="/public">

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
                <div class="email-form-container">
                    <h1 class="email-form-title">Send Email to {{$order->email}}</h1>
                    <form action="{{url('send_user_email',$order->id)}}" method="POST" class="email-form">
                        @csrf
                        <div>
                            <label>Salam Pembuka Email:</label>
                            <input type="text" name="greeting" required>
                        </div>
                        <div>
                            <label>Baris Pertama Email:</label>
                            <input type="text" name="firstline" required>
                        </div>
                        <div>
                            <label>Isi Email:</label>
                            <input type="text" name="body" required>
                        </div>
                        <div>
                            <label>Kalimat Penutup Email:</label>
                            <input type="text" name="lastline" required>
                        </div>
                        <div>
                            <input type="submit" value="Send Email">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
    </div>
</body>
</html>
