@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
<div class="panel panel-default">
    <div class="panel-body">
        <table class="table table-hover">
            <thead>
                <th>
                    Department Name
                </th>

            </thead>

            <tbody>
                <?php

$department=DB::table('dept')
         
          ->get();
foreach($department as $v_department){?>
                <tr>
                    <td><h4 style="font-weight:bold">{{$v_department->department_name}}</h4></td>
                        <td><a href="{{URL::to('department/session/'.$v_department->department_id)}}" class="btn btn-primary pull-right">View</a></td>

                </tr>


                <?php } ?>
                
            </tbody>

        </table>

    </div>
</div>



@endsection