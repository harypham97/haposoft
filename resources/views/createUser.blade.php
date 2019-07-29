@extends('layout.default')
@section('title', 'Create user')
@section('content')
    <div class="col-12"><h2>Add new user </h2></div>
    <div class="col-12">
        <form method="POST" action="{{route('user.store')}}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="full_user">Full name:</label>
                <input type="text" class="form-control" id="full_name"  name="full_name">
            </div>
            <div class="form-group">
                <label for="email_user">Email:</label>
                <input type="text" class="form-control" id="email_user" placeholder="abc@example.com"  name="email">
            </div>
            <div class="form-group">
                <label for="phone_number">Phone number:</label>
                <input type="text" class="form-control" id="phone_number"  name="phone_number">
            </div>
            <div class="form-group">
                <label for="company_name">Company name:</label>
                <input type="text" class="form-control" id="company_name"  name="company_name">
            </div>

            <div class="form-group">
                <label for="content_user">Content:</label>
                <textarea class="form-control" id="content_user" rows="3" name="content"></textarea>
            </div>
            <div class="form-group">
                <label for="image">Upload avatar:</label>
                <input type="file" name="avatar" class="form-control">
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit" style= "cursor:pointer">Save user</button>
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