@extends('layouts.master')
@section('content')
<section class="contact" id="contact" style="margin-top: 7rem; background: #0a0d14">
<div style="display: flex; justify-content:center; align-items:center; margin-bottom: 5rem;">
    <h1>{{ $content->title }}</h1>
</div>

   <div style="display: flex; justify-content: center; align-items: center; width: 100%; gap: 2rem; margin-bottom: 90px; flex-direction: column">
    <div style="width: 40%;">
        {{ $content->description }}
    </div>
    <div style="width: 40%;">
        <img src="{{ asset('storage/destination/'.$content->image) }}" style="width: 100%;">
        <div style="margin-top: 1rem;">
            <button value="{{ $content->id }}" id="like-button" style="background-color: #f49e09; color: #fff; border: none; padding: 5px 10px; cursor: pointer; border-radius: 5px;"><span id="is_liked">@if($content->is_liked == 1) Unliked @else Like @endif</span></button>
            <span id="like-count">{{ $content->like }}</span> Likes
        </div>
    </div>
</div>
<a href="{{ route('destination') }}" style="color:white; text-decoration: underline">
    <span style="display:flex; justify-content:center; align-items:center;">View More</span>
</a>
<div style="max-width: 500px; margin: 20px auto; padding: 20px; background-color: #333; box-shadow: 0px 0px 5px rgba(255, 255, 255, 0.3);">
    <h2 style="font-size: 20px; margin-top: 0;">Add a Comment</h2>

    <textarea id="comment-input" rows="4" style="width: 100%; padding: 10px; margin-bottom: 10px; background-color: #444; border: none; color: #fff;" placeholder="Write your comment here..."></textarea>

    <span id="commentValidation" style="color: red; font-size:.9rem;"></span>
    <br>
    <button id="add-comment-btn" style="background-color: #f49e09; color: #fff; border: none; padding: 10px 15px; cursor: pointer; border-radius: 5px;">Add Comment</button>

    <div id="comments-list" style="margin-top: 20px; display:flex; justify-content:center; align-items:left; flex-direction: column; gap: 1rem;">
        <div style="display: flex; gap: .5rem;">
            <img src="{{ asset('user/assets/images/user_avatar.jpg') }}" alt="" style="width: 50px; height: 50px; border-radius: 50px;">
            <div style="display:flex; justify-content:center; align-items:left; flex-direction:column">

                <span style="font-size: .7em;">2:00</span>
            </div>
        </div>
        <div style="font-size: .8em; padding-left: 3.5rem;">
                comment here
        </div>

    </div>
</div>
@endsection


@section('like')
<script>
$(document).ready(function () {
    $(document).on('click', '#like-button', function () {
        var pid = $(this).val();

        var csrfToken = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            type: "GET",
            url: "/destination/like/" + pid,
            headers: {
                'X-CSRF-Token': csrfToken
            },
           success: function (response) {
                 $('#like-count').html(response.likeCount);
                 $('#is_liked').html(response.is_liked);
            },

            error: function (xhr, status, error) {
                console.error('AJAX error:', error);
            }
        });
    });
});
</script>
@endsection



@section('comment')
<script>

function addComment() {
    var csrfToken = $('meta[name="csrf-token"]').attr('content');

    var commentData = {
        comment: $('#comment-input').val(),
        id: {{ $content->id }}
    };

    $.ajax({
        type: "POST",
        url: "/destination/comment/",
        headers: {
            'X-CSRF-Token': csrfToken
        },
        data: commentData,
        success: function (response) {
            $('#comment-input').val('');
        },
        error: function (xhr) {
            if (xhr.status === 422) {
                var errors = xhr.responseJSON.errors;
                $('#commentValidation').html(errors['comment'][0]);
            } else {
                console.log('An error occurred:', xhr.statusText);
            }
        }
    });
}




function displayComments() {
    var csrfToken = $('meta[name="csrf-token"]').attr('content');

    var commentData = {
        comment: $('#comment-input').val(),
        id: {{ $content->id }}
    };

    $.ajax({
        type: "GET",
        url: "/destination/comment/" + {{ $content->id }},
        headers: {
            'X-CSRF-Token': csrfToken
        },
        data: commentData,
        success: function (response) {
            response.forEach(function (getComment) {
                var commentHtml = '';
                getComment.comment.forEach(function (comments) {

                    commentHtml += '<div style="margin-top: 20px; display: flex; justify-content: center; align-items: left; flex-direction: column; gap: 1rem;">' +
                        '<div style="display: flex; gap: .5rem;">' +
                        '<img src="{{ asset('user/assets/images/user_avatar.jpg') }}" alt="" style="width: 50px; height: 50px; border-radius: 50px;">' +
                        '<div style="display: flex; justify-content: center; align-items: left; flex-direction: column;">' +
                        '<span>Anonymous</span>' +
                        '<span style="font-size: .7em;">' + comments.created_at + '</span>' +
                        '</div>' +
                        '</div>' +
                        '<div style="font-size: .8em; padding-left: 3.5rem;">' + comments.comment + '</div>' +
                        '</div>';
                });

                $('#comments-list').empty();
                $('#comments-list').append(commentHtml);
            });
        },
        error: function (xhr, status, error) {
            console.error('AJAX error:', error);
        }
    });
}


$(document).ready(function () {
    displayComments();

    $(document).on('click', '#add-comment-btn', function () {
        addComment();
        displayComments();
    });
});

</script>
@endsection
