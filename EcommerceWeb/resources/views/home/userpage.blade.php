<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="images/favicon.png" type="">
    <title>Famms - Fashion HTML Template</title>
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
    <!-- font awesome style -->
    <link href="home/css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="home/css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="home/css/responsive.css" rel="stylesheet" />

    <style>
        /* Comment and Reply Styles */
        .discussion-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .discussion-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .discussion-header h1 {
            font-size: 30px;
            color: #333;
        }

        .comment-form {
            text-align: center;
            margin-bottom: 30px;
        }

        .comment-form textarea {
            height: 150px;
            width: 100%;
            max-width: 600px;
            padding: 10px;
            border: 1px solid #ced4da;
            border-radius: 5px;
            resize: none;
        }

        .comment-form .btn-primary {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }

        .comment-form .btn-primary:hover {
            background-color: #0056b3;
        }

        .comments-section {
            text-align: left;
        }

        .comments-section h1 {
            font-size: 20px;
            padding-bottom: 20px;
            color: #555;
        }

        .comment {
            background: white;
            border: 1px solid #ced4da;
            border-radius: 5px;
            padding: 15px;
            margin-bottom: 15px;
            position: relative;
        }

        .comment-content {
            overflow: hidden;
        }

        .comment b {
            color: #333;
        }

        .comment p {
            color: #555;
            margin: 10px 0;
        }

        .comment-actions {
            margin-top: 10px;
            font-size: 0.9em;
        }

        .comment-actions a {
            color: #007bff;
            text-decoration: none;
            margin-right: 10px;
        }

        .comment-actions a:hover {
            text-decoration: underline;
        }

        .reply-section {
            padding-left: 20px;
            margin-top: 10px;
            background: #f1f1f1;
            border-left: 2px solid #ced4da;
            padding: 10px;
            border-radius: 5px;
        }

        .reply-section b {
            color: #333;
        }

        .reply-section p {
            color: #555;
            margin: 10px 0;
        }

        .reply-section a {
            color: #007bff;
            text-decoration: none;
        }

        .reply-section a:hover {
            text-decoration: underline;
        }

        .replyDiv {
            display: none;
            margin-top: 20px;
            text-align: center;
        }

        .replyDiv textarea {
            height: 100px;
            width: 100%;
            max-width: 500px;
            padding: 10px;
            border: 1px solid #ced4da;
            border-radius: 5px;
            resize: none;
        }

        .replyDiv .btn {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }

        .replyDiv .btn:hover {
            background-color: #0056b3;
        }

        .replyDiv .btn-close {
            background-color: #f44336;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .replyDiv .btn-close:hover {
            background-color: #d32f2f;
        }

        .timestamp {
            color: #777;
            font-size: 0.9em;
            margin-top: 5px;
        }

        .load-more {
            text-align: center;
            margin-top: 20px;
        }

        .load-more button {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .load-more button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="hero_area">
        <!-- header section strats -->
        @include('home.header')
        <!-- end header section -->
        <!-- slider section -->
        @include('home.slider')
        <!-- end slider section -->
    </div>
    <!-- why section -->
    @include('home.why')
    <!-- end why section -->
    <!-- arrival section -->
    @include('home.newarrival')
    <!-- end arrival section -->
    <!-- product section -->
    @include('home.product')
    <!-- end product section -->

    <!-- Comment and reply -->
    <div class="discussion-container">
        <div class="discussion-header">
            <h1>Discussion</h1>
        </div>

        <div class="comment-form">
            <form action="{{url('add_comment')}}" method="POST">
                @csrf
                <textarea placeholder="Type something here" name="comment"></textarea>
                <br>
                <input type="submit" class="btn btn-primary" value="Comment">
            </form>
        </div>

        <div class="comments-section">
            <h1>All comments</h1>
            @foreach($comment as $comment)
            <div class="comment">
                <div class="comment-content">
                    <b>{{$comment->name}}</b>
                    <span class="timestamp">{{$comment->created_at->diffForHumans()}}</span>
                    <p>{{$comment->comment}}</p>
                    <div class="comment-actions">
                        <a href="javascript:void(0);" onclick="reply(this)" data-Commentid="{{$comment->id}}">Reply</a>
                        <a href="javascript:void(0);" onclick="likeComment(this)" data-id="{{$comment->id}}">Like</a> <span id="likes-{{$comment->id}}">{{$comment->likes}}</span>
                        @if($comment->user_id == Auth::id())
                        <a href="javascript:void(0);" onclick="deleteComment(this)" data-id="{{$comment->id}}">Delete</a>
                        @endif
                    </div>
                </div>

                @foreach($reply as $rep)
                @if($rep->comment_id == $comment->id)
                <div class="reply-section">
                    <b>{{$rep->name}}</b>
                    <span class="timestamp">{{$rep->created_at->diffForHumans()}}</span>
                    <p>{{$rep->reply}}</p>
                    <div class="comment-actions">
                        <a href="javascript:void(0);" onclick="reply(this)" data-Commentid="{{$comment->id}}">Reply</a>
                        <a href="javascript:void(0);">Like</a>
                        @if($rep->user_id == Auth::id())
                        <a href="javascript:void(0);">Delete</a>
                        @endif
                    </div>
                </div>
                @endif
                @endforeach
            </div>
            @endforeach

            <!-- Load More Comments -->
            <div class="load-more">
                <button>Load More Comments</button>
            </div>
        </div>

        <!-- Reply Textbox -->
        <div class="replyDiv">
            <form action="{{url('add_reply')}}" method="POST">
                @csrf
                <input type="text" name="commentId" id="commentId" hidden="">
                <textarea name="reply" placeholder="Write something here"></textarea>
                <br>
                <button type="submit" class="btn">Reply</button>
                <a href="javascript:void(0);" class="btn btn-close" onClick="reply_close(this)">Close</a>
            </form>
        </div>
    </div>

    <!-- subscribe section -->
    @include('home.subscribe')
    <!-- end subscribe section -->
    <!-- client section -->
    @include('home.client')
    <!-- end client section -->
    <!-- footer start -->
    @include('home.footer')
    <!-- footer end -->
    <div class="cpy_">
        <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
        </p>
    </div>

    <script>
        function reply(caller) {
            document.getElementById('commentId').value = $(caller).attr('data-Commentid');
            $('.replyDiv').insertAfter($(caller));
            $('.replyDiv').show();
        }

        function reply_close(caller) {
            $('.replyDiv').hide();
        }

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
                  if(response.success) {
                     // Update the like count in the UI
                     var likesCount = $('#likes-' + commentId).text();
                     likesCount = parseInt(likesCount) + 1;
                     $('#likes-' + commentId).text(likesCount);
                     alert('Comment liked');
                  } else {
                     alert(response.message || 'Failed to like comment');
                  }
            },
            error: function(xhr, status, error) {
                  console.error(xhr.responseText);
                  alert('Error occurred: ' + error);
            }
         });
      }



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
                    if(response.success) {
                        $(caller).closest('.comment').remove();
                        alert('Comment deleted');
                    } else {
                        alert('Failed to delete comment');
                    }
                }
            });
        }
    </script>

   <script>
        document.addEventListener("DOMContentLoaded", function(event) { 
            var scrollpos = localStorage.getItem('scrollpos');
            if (scrollpos) window.scrollTo(0, scrollpos);
        });

        window.onbeforeunload = function(e) {
            localStorage.setItem('scrollpos', window.scrollY);
        };
    </script>

    <!-- jQery -->
    <script src="home/js/jquery-3.4.1.min.js"></script>
    <!-- popper js -->
    <script src="home/js/popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="home/js/bootstrap.js"></script>
    <!-- custom js -->
    <script src="home/js/custom.js"></script>
</body>
</html>
