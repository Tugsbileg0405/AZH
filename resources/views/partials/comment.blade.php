<div class="media">
    <a href="#" class="avatar avatar-blue pull-left">
        <img class="media-object" src="{{ asset('img/userdefault.png')}}">
    </a>
    <div class="media-body">
        <h3 class="media-heading"> 
            @If($comment->user)
                {{ $comment->users->name }}
            @else
                {{ $comment->name }}
            @endif
        </h3>
        <h5 class="text-muted pull-right">{{ $comment->created_at->format('Y/m/d H:i') }}</h5>
        <p>{{ $comment->comment }}</p>
    </div>
</div>