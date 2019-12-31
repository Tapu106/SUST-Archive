@extends('layouts.app')

@section('content')


       @include('partial.errors')

<div class="panel panel-default">
        <div class="panel-heading">
                Update Category: {{ $category->category_name }}
        </div>
        </br>
        <div class="panel-body">
                <form action="{{ route('category.update',['id'=> $category->id]) }}" method="post">
                {{ csrf_field() }}

                <div class="form-group">
                      <label for="category_name">Name</label>
                      <input type="text" name="category_name" value="{{$category->category_name}}" class="form-control">  
                </div>
                <div class="form-group">
                          <div class="text-center">
                                  <button class="btn btn-success" type="submit">
                                          Update category

                                  </button>
                          </div>
                  </div>
                  

        
        </form>
        </div>

</div>



@endsection




