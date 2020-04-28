@extends('layouts.app')
@section('content')


<!-- <form action="/result" method="post">
<input type="text" placeholder="Search for a post.."></form></br> -->
<div class="container">
    <div class="row">
        <div class="col-md-3"></div>
    </div>
</div>
<div class="form-group">
    <form action="/result_post" method="GET">
        <input type="text" name="queryPost" class="form-control" placeholder="search for a post....">
</div>
<div class="text-center">
    <button class="btn btn-success" type="submit">
        Search Post

    </button>
    </form>

</div>
</br>

@foreach($posts as $p)

<div class="panel panel-default">
    <div class="panel-heading">
        <img src="/uploads/avatars/{{ $p->user->avatar}}" alt="" width="70px" height="60px">&nbsp;&nbsp;&nbsp;
        <span>{{ $p->user->name }}, <b>{{ $p->created_at->diffForHumans() }}</b></span>
        <a href="{{ route('post', ['slug' => $p->slug ]) }}" class="btn btn-success pull-right">view</a>

    </div>


    <div class="panel-body">
        <h4 class="text-center">
            {{$p->title}}
        </h4>
        <p class="text-center">
            {!! str_limit($p->content,80)!!}
        </p>
    </div>

    <div class="panel-footer">
        <p>
            {{  $p->replies->count()  }} Replies
        </p>
    </div>
</div>



@endforeach

<div class="text-center">
    {{  $posts->links() }}
</div>


@endsection