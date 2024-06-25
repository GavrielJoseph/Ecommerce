<!DOCTYPE html>
<html lang="en">
<head>

    <base href="/public">

    @include('admin.css')
    <link rel="stylesheet" href="css/adm.css">
</head>
<body>
    <div class="container-scroller">
        @include('admin.sidebar')
        <!-- partial -->
        @include('admin.header')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="email-form-container">
                    <h1 class="email-form-title">Send Email to {{$order->email}}</h1>
                    <!-- Form untuk mengirim email -->
                    <form action="{{url('send_user_email',$order->id)}}" method="POST" class="email-form">
                        @csrf
                        <div>
                            <label>Salam Pembuka Email:</label>
                            <input type="text" name="greeting" required> <!-- Input untuk salam pembuka email -->
                        </div>
                        <div>
                            <label>Baris Pertama Email:</label>
                            <input type="text" name="firstline" required> <!-- Input untuk baris pertama email -->
                        </div>
                        <div>
                            <label>Isi Email:</label>
                            <input type="text" name="body" required> <!-- Input untuk isi email -->
                        </div>
                        <div>
                            <label>Kalimat Penutup Email:</label>
                            <input type="text" name="lastline" required> <!-- Input untuk kalimat penutup email -->
                        </div>
                        <div>
                            <input type="submit" value="Send Email"> <!-- Tombol untuk mengirim email -->
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
