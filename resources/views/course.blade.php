@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
<div class="panel panel-default">
    <div class="panel-body">
        <table class="table table-hover">
            <thead>
                <th>
                    Semester
                </th>

            </thead>

            <tbody>
            <?php foreach ($course as $v_course) { ?>
               <tr>
                   <td><h4 style="font-weight:bold">{{$v_course->course_code}}</h4></td>
               <td ><a href="{{URL::to('/show_file/'.$v_course->course_id)}}" class="btn btn-primary pull-right">View</a></td>
                   
                </tr>
                      
               <?php } ?>
            </tbody>

        </table>

    </div>
</div>



@endsection