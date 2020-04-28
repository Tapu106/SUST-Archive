@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
<div class="panel panel-default">
    <div class="panel-body">
        <table class="table table-hover">
            <thead>
                <th>
                    Session
                </th>

            </thead>

            <tbody>
            <?php foreach ($session as $v_session) { ?>
                
                <tr>
                <td><h4 style="font-weight:bold">{{$v_session->session_name}}</h4><td>
                 <td ><a href="{{URL::to('/semester/'.$v_session->session_id)}}" class="btn btn-primary pull-right">View</a></td>
                    
                 </tr>
               <?php } ?>
            </tbody>

        </table>

    </div>
</div>



@endsection