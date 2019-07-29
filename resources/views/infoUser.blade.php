@extends('layout.default')
@section('title', 'Information User')
@section('content')
        <div class="col-lg-12">
            <h2 class="d-block">Information User {{$user->id}}</h2>
        </div>
        <ul>
            <li>Full name: {{$user->full_name}}</li>
            <li>Email: {{$user->email}}</li>
            <li>Phone number: {{$user->phone_number}}</li>
            <li>Company name: {{$user->company_name}}</li>
            <li>Content: {{$user->content}}</li>
            <li>
                Avatar: {{$user->avatar}}
                <img src="{{$urlAvatar}}" alt="img avatar">

            </li>
            <li>Create at: {{$user->created_at}}</li>
            <li>Update at: {{$user->updated_at}} </li>
        </ul>
@endsection