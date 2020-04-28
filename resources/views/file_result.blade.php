@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
          <div class="panel panel-default">
              <div class="panel-body">
                <table class="table table-hover">
                    <thead>
                    <th>
                            File Name
                        </th>
                        <th>
                            File description
                        </th>
                        <th>
                            Uploader
                        </th>
                      
                       
                    </thead>
    
                    <tbody>
                      @foreach($files as $file)
                        <tr>
                          <td>{{ str_limit($file->file_name,5)}}</td>
                            <td> {{  $file->file_description }} </td>
                            <td>{{ $file->user_name }}</td>
                            <td><a href="{{ route('downloadFile', $file->file_name) }}" class="btn btn-primary btn-xs pull-right">Download</a></td> 
                            
                        
                           
                            
                        </tr>



                      @endforeach
                    </tbody>
    
                </table>
    
              </div>
          </div>



@endsection