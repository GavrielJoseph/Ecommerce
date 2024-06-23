<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Discussion</title>
    <link rel="stylesheet" href="css/app.css">
</head>
<body>
    <section class="discussion-container">
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
            <div id="comments-container">
                @foreach($comment as $comment)
                <div class="comment" data-id="{{$comment->id}}">
                    <div class="comment-content">
                        <b>{{$comment->name}}</b>
                        <span class="timestamp">{{$comment->created_at->diffForHumans()}}</span>
                        <p>{{$comment->comment}}</p>
                        <div class="comment-actions">
                            <a href="javascript:void(0);" onclick="reply(this)" data-Commentid="{{$comment->id}}">Reply</a>
                            <a href="javascript:void(0);" onclick="likeComment(this)" data-id="{{$comment->id}}">Like</a> 
                            <span id="likes-{{$comment->id}}">{{$comment->likes}}</span>
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
            </div>

            <!-- Load More Comments -->
            <div class="load-more">
                <button id="prevBtn" style="display: none;" onclick="showPreviousComments()">Previous</button>
                <button id="nextBtn" onclick="showNextComments()">Next</button>
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
    </section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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

    <script>
        let currentIndex = 0;
        const commentsPerPage = 3;
        const comments = document.querySelectorAll('.comment');
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');

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

        function showNextComments() {
            if (currentIndex + commentsPerPage < comments.length) {
                currentIndex += commentsPerPage;
                showComments();
            }
        }

        function showPreviousComments() {
            if (currentIndex - commentsPerPage >= 0) {
                currentIndex -= commentsPerPage;
                showComments();
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            showComments();
        });
    </script>
</body>
</html>
