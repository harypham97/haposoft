@extends('layout.default')
@section('title', 'List User')
@section('content')
    <div class="col-12"><h2>Edit info user {{$user->id}}</h2></div>
    <div class="col-12">
        <form method="POST" action="{{route('user.update',$user->id)}}">
            {{ csrf_field() }}
            {{ method_field('PUT')}}
            <div class="form-group">
                <label for="fullName">Full name:</label>
                <input type="text" class="form-control" id="nameUser" value="{{$user->full_name}}" name="nameUser">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="emailUser" placeholder="abc@example.com" value="{{$user->email}}" name="emailUser">
            </div>
            <div class="form-group">
                <label for="">Phone number:</label>
                <input type="text" class="form-control" id="phoneUser" value="{{$user->phone_number}}" name="phoneUser">
            </div>
            <div class="form-group">
                <label for="">Company name:</label>
                <input type="text" class="form-control" id="companyUser" value="{{$user->company_name}}" name="companyUser">
            </div>

            <div class="form-group">
                <label for="content">Content:</label>
                <textarea class="form-control" id="contentUser" rows="3" name="contentUser">{{$user->content}}</textarea>
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit" style= "cursor:pointer">Save changes</button>
            </div>
        </form>
    </div>


@endsection