import './bootstrap';
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