<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta tags untuk pengaturan karakter, kompatibilitas, dan responsif -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Judul halaman -->
    <title>Discussion</title>
    
    <!-- Link ke stylesheet eksternal -->
    <link rel="stylesheet" href="css/app.css">
</head>

<body>
    <!-- Kontainer utama untuk bagian diskusi -->
    <section class="discussion-container">
        <!-- Header diskusi -->
        <div class="discussion-header">
            <h1>Discussion</h1>
        </div>

        <!-- Form untuk menambahkan komentar baru -->
        <div class="comment-form">
            <form action="{{url('add_comment')}}" method="POST">
                @csrf
                <textarea placeholder="Tulis sesuatu di sini" name="comment"></textarea>
                <br>
                <input type="submit" class="btn btn-primary" value="Komentar">
            </form>
        </div>

        <!-- Bagian menampilkan semua komentar -->
        <div class="comments-section">
            <h1>Semua komentar</h1>
            <div id="comments-container">
                @foreach($comment as $comment)
                <div class="comment" data-id="{{$comment->id}}">
                    <div class="comment-content">
                        <!-- Nama pengomentar -->
                        <b>{{$comment->name}}</b>
                        <!-- Waktu sejak comment dibuat -->
                        <span class="timestamp">{{$comment->created_at->diffForHumans()}}</span>
                        <!-- Isi komentar -->
                        <p>{{$comment->comment}}</p>
                        <div class="comment-actions">
                            <!-- Tombol untuk balas komentar -->
                            <a href="javascript:void(0);" onclick="reply(this)" data-Commentid="{{$comment->id}}">Balas</a>
                            <!-- Tombol untuk menyukai komentar -->
                            <a href="javascript:void(0);" onclick="likeComment(this)" data-id="{{$comment->id}}">Suka</a>
                            <!-- Jumlah suka untuk komentar ini -->
                            <span id="likes-{{$comment->id}}">{{$comment->likes}}</span>
                            <!-- Tombol untuk menghapus komentar (hanya terlihat oleh pemilik komentar) -->
                            @if($comment->user_id == Auth::id())
                            <a href="javascript:void(0);" onclick="deleteComment(this)" data-id="{{$comment->id}}">Hapus</a>
                            @endif
                        </div>
                    </div>

                    <!-- Loop untuk balasan yang terkait dengan komentar ini -->
                    @foreach($reply as $rep)
                    @if($rep->comment_id == $comment->id)
                    <div class="reply-section">
                        <!-- Nama yang membalas -->
                        <b>{{$rep->name}}</b>
                        <!-- Waktu sejak comment dibalas -->
                        <span class="timestamp">{{$rep->created_at->diffForHumans()}}</span>
                        <!-- hasil balasan -->
                        <p>{{$rep->reply}}</p>
                        <div class="comment-actions">
                            <!-- Tombol untuk reply -->
                            <a href="javascript:void(0);" onclick="reply(this)" data-Commentid="{{$comment->id}}">Balas</a>
                            <!-- Tombol untuk like -->
                            <a href="javascript:void(0);">Suka</a>
                            <!-- Tombol untuk menghapus balasan (hanya terlihat oleh pemilik balasan) -->
                            @if($rep->user_id == Auth::id())
                            <a href="javascript:void(0);">Hapus</a>
                            @endif
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
                @endforeach
            </div>

            <!-- Tombol untuk navigasi komentar -->
            <div class="load-more">
                <button id="prevBtn" style="display: none;" onclick="showPreviousComments()">Sebelumnya</button>
                <button id="nextBtn" onclick="showNextComments()">Berikutnya</button>
            </div>
        </div>

        <!-- Kotak teks untuk membalas -->
        <div class="replyDiv">
            <form action="{{url('add_reply')}}" method="POST">
                @csrf
                <input type="text" name="commentId" id="commentId" hidden="">
                <textarea name="reply" placeholder="Tulis sesuatu di sini"></textarea>
                <br>
                <button type="submit" class="btn">Balas</button>
                <a href="javascript:void(0);" class="btn btn-close" onClick="reply_close(this)">Tutup</a>
            </form>
        </div>
    </section>

    <!-- Pustaka jQuery untuk manipulasi DOM -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <!-- Skrip JavaScript untuk fungsionalitas komentar -->
    <script>
        // Fungsi untuk menangani klik tombol balas
        function reply(caller) {
            document.getElementById('commentId').value = $(caller).attr('data-Commentid');
            $('.replyDiv').insertAfter($(caller));
            $('.replyDiv').show();
        }

        // Fungsi untuk menangani klik tombol tutup pada form balasan
        function reply_close(caller) {
            $('.replyDiv').hide();
        }

        // Fungsi untuk menangani klik tombol suka pada komentar
        function likeComment(caller) {
            var commentId = $(caller).attr('data-id');
            $.ajax({
                url: "{{url('like_comment')}}",
                type: 'POST',
                data: {
                    _token: '{{csrf_token()}}',
                    commentId: commentId
                },
                success: function(response) {
                    if (response.success) {
                        // Update jumlah suka di UI
                        var likesCount = $('#likes-' + commentId).text();
                        likesCount = parseInt(likesCount) + 1;
                        $('#likes-' + commentId).text(likesCount);
                        alert('Komentar disukai');
                    } else {
                        alert(response.message || 'Gagal menyukai komentar');
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    alert('Terjadi kesalahan: ' + error);
                }
            });
        }

        // Fungsi untuk menangani klik tombol hapus pada komentar
        function deleteComment(caller) {
            var commentId = $(caller).attr('data-id');
            $.ajax({
                url: "{{url('delete_comment')}}",
                type: 'POST',
                data: {
                    _token: '{{csrf_token()}}',
                    commentId: commentId
                },
                success: function(response) {
                    if (response.success) {
                        $(caller).closest('.comment').remove();
                        alert('Komentar dihapus');
                    } else {
                        alert('Gagal menghapus komentar');
                    }
                }
            });
        }
    </script>

    <!-- Skrip JavaScript untuk menangani posisi scroll dan paginasi komentar -->
    <script>
        // Memulihkan posisi scroll saat kembali ke halaman
        document.addEventListener("DOMContentLoaded", function(event) {
            var scrollpos = localStorage.getItem('scrollpos');
            if (scrollpos) window.scrollTo(0, scrollpos);
        });

        // Menyimpan posisi scroll sebelum meninggalkan halaman
        window.onbeforeunload = function(e) {
            localStorage.setItem('scrollpos', window.scrollY);
        };
        
        // Fungsi untuk menangani paginasi komentar
        let currentIndex = 0;
        const commentsPerPage = 3;
        const comments = document.querySelectorAll('.comment');
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');

        // Fungsi untuk menampilkan komentar berdasarkan currentIndex
        function showComments() {
            comments.forEach((comment, index) => {
                if (index >= currentIndex && index < currentIndex + commentsPerPage) {
                    comment.style.display = 'block';
                } else {
                    comment.style.display = 'none';
                }
            });
            prevBtn.style.display = currentIndex === 0 ? 'none' : 'inline-block';
            nextBtn.style.display = currentIndex + commentsPerPage >= comments.length ? 'none' : 'inline-block';
        }

        // Fungsi untuk menampilkan set komentar berikutnya
        function showNextComments() {
            if (currentIndex + commentsPerPage < comments.length) {
                currentIndex += commentsPerPage;
                showComments();
            }
        }

        // Fungsi untuk menampilkan set komentar sebelumnya
        function showPreviousComments() {
            if (currentIndex - commentsPerPage >= 0) {
                currentIndex -= commentsPerPage;
                showComments();
            }
        }

        // Menampilkan set komentar awal saat halaman dimuat
        document.addEventListener('DOMContentLoaded', function() {
            showComments();
        });
    </script>
</body>

</html>
