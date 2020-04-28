@extends('layouts.app')
@section('content')
            
        
        <div class="panel panel-default" style="margin-right: 30px;">
            <div class="panel-body">
                <img src="/uploads/avatars/{{ $user->avatar }}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
            <h2>{{ $user->name }}'s Profile</h2>
            <form enctype="multipart/form-data" action="/profile" method="POST">
                <label>Update Profile Image</label>
                <input type="file" name="avatar">
                <input type="hidden" name="_token" value="{{ csrf_token() }}"></br>
                <input type="submit" class="btn btn-primary">
            </form>
        </br>

         <a href="{{ route('profile.edit',['id'=> $user->id]) }}" class="btn btn-success" style="margin-bottom: 10px;">Edit Profile</a></br>
              <table class="table table-hover">
                <tr>
                    <td>Name</td>
                    <td>{{$user->name}}</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>{{$user->email}}</td>
                </tr>
                <tr>
                    <td>Point</td>
                    <td>{{$user->points}} pts</td>
                </tr>
                <tr>
                    <td>Date of Birth</td>
                    <td>{{date('d M Y', strtotime($user->date_of_birth))}}</td>
                </tr>
                <tr>
                    <td>Contact</td>
                    <td>{{$user->Contact_number}}</td>
                </tr>
                <tr>
                    <td>Gender</td>
                    <td class="text-capitalize">{{$user->gender}}</td>
                </tr>
  
              </table>
  
        
</div>
</div>




@endsection
