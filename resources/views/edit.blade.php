@extends('layout.default')
@section('title', 'Edit user')
@section('content')
    <div class="col-12"><h2>Edit info user {{$user->id}}</h2></div>
    <div class="col-12">
        <form method="POST" action="{{route('user.update',$user->id)}}" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PUT')}}
            <div class="form-group">
                <label for="fullName">Full name:</label>
                <input type="text" class="form-control" id="full_name" value="{{$user->full_name}}" name="full_name">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" class="form-control" id="email_user" placeholder="abc@example.com" value="{{$user->email}}" name="email">
            </div>
            <div class="form-group">
                <label for="">Phone number:</label>
                <input type="text" class="form-control" id="phone_number" value="{{$user->phone_number}}" name="phone_number">
            </div>
            <div class="form-group">
                <label for="">Company name:</label>
                <input type="text" class="form-control" id="company_name" value="{{$user->company_name}}" name="company_name">
            </div>

            <div class="form-group">
                <label for="content">Content:</label>
                <textarea class="form-control" id="content_user" rows="3" name="content">{{$user->content}}</textarea>
            </div>
            <div class="form-group">
                <label for="image">Upload avatar:</label>
                <input type="file" name="avatar" class="form-control">
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit" style= "cursor:pointer">Save changes</button>
            </div>
        </form>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection