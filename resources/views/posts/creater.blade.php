@extends('layouts.app')

@section('content')


@include('partial.errors')

<div class="panel panel-default">
        <div class="panel-heading">
                Create a new post
        </div>
        <p class="alert-success" >
						 <?php
						$message=Session::get('message');
					
						if ($message) {
							echo $message;
							Session::put('message',NULL);
						}

						?>

					</p>

        <div class="panel-body">
                <form action="{{ route('post.store') }}" method="post">
                {{ csrf_field() }}

                <div class="form-group">
                      <label for="title">Title</label>
                      <input type="text" name="title" class="form-control">  
                </div>
                <div class="form-group">
                        <label for="category">Select a category</label>
                        <select name="category_id" id="category" class="form-control">
                                <option value="">Select Category</option>
                        @foreach($categories as $category)

                        <option value="{{$category->id }}">{{$category->category_name}}</option>



                        @endforeach

                        </select>
                </div>
                <div class="form-group">
                        <label for="content">Content</label>
                        <textarea type="text" name="content" id="content" cols="5" rows="5" class="form-control">  </textarea>
                  </div>


                  <div class="form-group">
                          <div class="text-center">
                                  <button class="btn btn-success" type="submit">
                                          Store Post 

                                  </button>
                          </div>
                  </div>
                  

        
        </form>
        </div>

</div>



@endsection