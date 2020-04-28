@extends('layouts.app')
@section('content')
<div class="panel-group">
<div class="panel panel-default">
    <div class="panel-heading panel-success">
    @if($post->user)
    <img src="/uploads/avatars/{{ $post->user->avatar }}" alt="" width="70px" height="60px">&nbsp;&nbsp;&nbsp;
    <span>{{ $post->user->name }}, <b>{{ $post->created_at->diffForHumans() }}</b>, <b>({{ $post->user->points }})</b></span>
    <?php $user_info = Auth::User() ?>
    <?php if( $user_info->role=="TEACHER") { ?>
    <b><a href="{{ route('post.delete', ['id' => $post->id ]) }}" class="btn btn-danger btn-xs pull-right" >Delete</a></b>
    <?php  } ?>
    
    @if($post->is_being_watched_by_auth_user())

    <a href="{{ route('post.unwatch', ['id' => $post->id ]) }}" class="btn btn-success btn-xs pull-right" style="margin-right: 10px">unwatch</a></br>

    @else

    <a href="{{ route('post.watch', ['id' => $post->id ]) }}" class="btn btn-success btn-xs pull-right"style="margin-right: 10px">watch</a></br>

    @endif



    </div>


<div class="panel-body">
    <h4 class="text-center">
        {{$post->title}}
    </h4>
    <p class="text-center">
        {!! $post->content !!}
    </p>

    <hr>
    @if($best_answer)
    <div class="text-center" style="padding: 40px">
    <h3 class="text-center">BEST ANSWER</h3>

        <div class="panel panel-success">
        
        <div class="panel-heading">
            <img src="{{ $best_answer->user->avatar }}" alt="" width= "40px" height="40px">&nbsp;&nbsp;&nbsp;
            <span> {{ $best_answer->user->name }}, <b>{{ $best_answer->user->points }}</b> </span>
        </div>
        
        <div class="panel-body">
             {{ $best_answer->content}}
        </div>
        </div>

    </div>
    @endif


</div>
@endif

<div class="panel-footer">
    <p>
        {{  $post->replies->count()  }} Replies
    </p>
</div>
</div>
</div>



@foreach ($post->replies as $r)

<div class="panel panel-default">
    <div class="panel-heading">
    <img src="/uploads/avatars/{{ $r->user->avatar}}" alt="" width="70px" height="60px">&nbsp;&nbsp;&nbsp;
    <span>{{ $r->user->name }}, <b>{{ $r->created_at->diffForHumans() }}</b>,<b>({{ $r->user->points }})</b></span>

    @if(!$best_answer)
    <a href="{{ route('post.best.answer',['id'=> $r->id ])  }}" class="btn btn-xs btn-info pull-right">Mark as Best Answer</a></br>
    @endif
     
   
    </div>


<div class="panel-body">
   <p class="text-center">
        {{ $r->content}}
    </p>
</div>

<div class="panel-footer">
   
    @if($r->is_liked_by_auth_user())

        <a href="{{ route('reply.unlike', ['id'=> $r->id ])  }}" class="btn btn-danger btn-xs">Unlike <span class="badge">{{ $r->likes->count() }}</span></a>

    @else

    <a href="{{ route('reply.like', ['id'=> $r->id ])  }}" class="btn btn-success btn-xs">Like <span class="badge">{{ $r->likes->count() }}</span></a>

    @endif

</div>
</div>

@endforeach

<div class="panel panel-default">
    <div class="panel-body">
        <form action="{{ route('post.reply' ,['id' => $post->id ]) }}" method="post">
        
            {{   csrf_field()  }}
            <label for="reply">Leave a reply....</label>
            <div class="form-group">
                <textarea name="reply" id="reply" cols="30" rows="10" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <button class="btn pull-right">Leave a reply</button>
            </div>
        </form>
    </div>
</div>




@endsection
