@props(['comment'])

<div class="comment-section message-box">
    <a href="/rates/?user={{$comment->user->id}}"><img class="profile-img" src="{{$comment->user->profile_picture}}"></a>
    <div class="message-content">
        <div class="message-header">
          <a class="name author-link" href="/rates/?user={{$comment->user->id}}">{{$comment->user->name}}</a>  
        </div>
        <p class="message-line">
          {{$comment->message}}
        </p>
        <p class="message-line time">
          {{ date_format($comment->created_at, 'd.m.y') }}
        </p>
      </div>
</div>