@extends('layouts.app')

@section('content')


@include('partial.errors')

<div class="panel panel-default">
        <div class="panel-heading">
                Create new Categories
        </div>
        </br>
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
                <form action="{{ route('category.store') }}" method="post">
                {{ csrf_field() }}

                <div class="form-group">
                      <label for="category_name">Name</label>
                      <input type="text" name="category_name" class="form-control">  
                </div>
                <div class="form-group">
                          <div class="text-center">
                                  <button class="btn btn-success" type="submit">
                                          Store Categories

                                  </button>
                          </div>
                  </div>
                  

        
        </form>
        </div>

</div>



@endsection




