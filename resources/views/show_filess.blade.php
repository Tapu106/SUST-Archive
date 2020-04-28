@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
<div class="panel panel-default">
    <div class="panel-body">
        <table class="table table-hover">
            <thead>
                <th>
                    Files
                </th>
                <th>
                    Uploader
                </th>
               <th>
                    Upload Description
                </th>

            </thead>

            <tbody>
            <?php $user_info = Auth::User() ?>
            @if($user_info->role=="TEACHER")

            <?php foreach ($file as $v_file) { ?>
               <tr>
               <!-- <td>{{ $v_file->file_name }}</td> -->
               <td>{{ str_limit($v_file->file_name,20)}}</td>
               
               
               <td>{{ $v_file->user_name  }}</td>
               
               <td>{{  $v_file->file_description}}</td>
             <td><a href="{{ route('downloadFile', $v_file->file_name) }}" class="btn btn-primary btn-xs pull-right"><i class="fas fa-download"></i></a></td>
                                
             @if($v_file->uploaded_file_status==0)
             <td><a href="{{ route('file.inactive',['id' => $v_file->file_id]) }}" class="btn btn-danger btn-xs pull-right"><i class="fas fa-thumbs-down"></i></a></td>
              @else  
              <td><a href="{{ route('file.active',['id' => $v_file->file_id]) }}" class="btn btn-success btn-xs pull-right"><i class="fas fa-thumbs-up"></i></a></td>
             @endif

            
            
   
                </tr>
        <?php } ?>
        @else
                
        <?php foreach ($file as $v_file) { ?>
            @if($v_file->uploaded_file_status==0)
            <tr>
            <!-- <td>{{ $v_file->file_name }}</uploaded_file_statustd> -->
            <td>{{ str_limit($v_file->file_name,20)}}</td>
            
            
            <td>{{ $v_file->user_name  }}</td>
            
            <td>{{  $v_file->file_description}}</td>
          <td><a href="{{ route('downloadFile', $v_file->file_name) }}" class="btn btn-primary btn-xs pull-right"><i class="fas fa-download"></i></a></td>
                      

                
        @endif
        <?php  } ?>
        @endif
            
   
    </tr>
            </tbody>

        </table>

    </div>
</div>



@endsection