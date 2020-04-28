@extends('layouts.app')
@section('content')


<div class="panel panel-default" style="margin-right: 30px;">
    <div class="panel-body">
        <form action="{{ route('profile.update',['id'=> $pro->id]) }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }} 
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-left">Name*</label>
                    <div class="col-md-8">
                        <input id="name" type="text" class="form-control" name="name" value="{{$pro->name}}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-left">Email*</label>
                    <div class="col-md-8">
                        <input id="email" type="text" class="form-control" name="email" value="{{$pro->email}}">
                    </div>
                </div>


                <div class="form-group row">
                    <label for="gender" class="col-md-4 col-form-label text-md-left">Gender*</label>
                    <div class="col-md-8">
                        <select class="form-control" name="gender">
                            <option value="Male" {{$pro->gender=='Male'?'selected':''}}>Male</option>
                            <option value="Female" {{$pro->gender=='Female'?'selected':''}}>Female</option>
                        </select>
                    </div>
                </div>


                <div class="form-group row">
                    <label for="contact_number" class="col-md-4 col-form-label text-md-left">Contact Number*</label>
                    <div class="col-md-8">
                        <input id="contact_number" type="text" class="form-control" name="Contact_number" value="{{$pro->Contact_number}}">
                    </div>
                </div>

                <input type="submit" class= "btn btn-success btn-block" value="Save Changes">

        </form>
    </div>
</div>
















@endsection