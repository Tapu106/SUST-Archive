@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
          <div class="panel panel-default">
              <div class="panel-body">
                <table class="table table-hover">
                    <thead>
                        <th>
                            Title
                        </th>
                        <th>
                            Editing
                        </th>
                        <th>
                            Deleting
                        </th>
                    </thead>
    
                    <tbody>
                        @foreach($categories as $category)
                        <tr>
                            <td>
                                {{ $category->category_name }}
                            </td>
                            <td>
                                <a href="{{ route('category.edit',['id'=> $category->id]) }}" class="btn btn-xs btn-info">
                                    <!-- <span class="glyphicon glyphicon-pencil"></span> -->
                                    <!-- <i class="glyphicon glyphicon-trash"></i> -->
                                    <i class="fas fa-user-edit"></i>
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('category.delete',['id'=> $category->id]) }}" class="btn btn-xs btn-info">
                                    <!-- <span class="glyphicon glyphicon-trash"></span> -->
                                  
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
    
    
                        @endforeach
                    </tbody>
    
                </table>
    
              </div>
          </div>



@endsection