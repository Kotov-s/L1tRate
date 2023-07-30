@props(['comment'])

<div class="comment-section shadow">
    <a href="/rates/?user={{$comment->user->id}}"><img class="profile-img" src="{{$comment->user->profile_picture}}"></a>
    <div >
        <div class="mb-2 mx-2">
          <a class="author-link my-font-color name text-decoration-none" href="/rates/?user={{$comment->user->id}}"> <strong>{{$comment->user->name}}</strong> </a>  
        </div>
        <p class="message-line">
          {{$comment->message}}
        </p>
        <p class="d-flex justify-content-end message-line">
          {{ date_format($comment->created_at, 'd.m.y') }}
        </p>
      </div>
</div>