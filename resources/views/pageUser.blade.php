@extends('layout.default')
@section('title', 'List User')
@section('content')
    <div class="d-flex flex-column">
        <h2> List User</h2>
        @if (Session::has('message'))
            <p style="color: red">{{ Session::get('message') }}</p>
        @endif
    </div>
    <table class="table table-bordered table-hover ">
        <thead>
        <tr>
            <th>ID</th>
            <th>Full name</th>
            <th>Create at</th>
            <th class="w-25">Action</th>
        </tr>
        </thead>
        <tbody>

        @foreach ($listUser as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->full_name}}</td>
                <td>{{$user->created_at}}</td>
                <td class="d-flex">
                    <a class="btn btn-outline-primary" id="{{$user->id}}" title="View"
                       href="{{ route('user.show',$user->id)}}">
                        <i class="fa fa-fw fa-search"></i>
                    </a>
                    <a class="btn btn-outline-warning ml-3 mr-3" id="{{$user->id}}" title="Edit"
                       href="{{ route('user.edit',$user->id)}}">
                        <i class="fa fa-fw fa-edit"></i>
                    </a>
                    <form method="POST" action="{{ route('user.destroy', [$user->id]) }}">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button class="btn btn-outline-danger" type="submit" title="Delete"
                                onclick="return confirm('Are you sure you want to delete the record {{ $user->id }} ?')">
                            <i class="fa fa-fw fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <form method="GET" action="{{route('user.create')}}">
        <button class="btn btn-primary" style="cursor:pointer"> Add new user</button>
    </form>
@endsection



