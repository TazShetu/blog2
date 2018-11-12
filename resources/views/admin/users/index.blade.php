@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Users</div>
        <div class="panel-body">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Permission</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                    @if($users->count() > 0)
                        @foreach($users as $user)
                            <tr>
                                <td><img src="{{asset($user->profile->avatar)}}" alt="No Photo" height="50px" style="border-radius: 30%;"></td>
                                {{--here we must use asset() to link through all that--}}
                                <td>{{$user->name}}</td>
                                <td>
                                    @if($user->admin)
                                        <a href="{{route('user.not.admin', ['id' => $user->id])}}" class="btn btn-sm btn-info">Remove Permission</a>
                                    @else
                                        <a href="{{route('user.admin', ['id' => $user->id])}}" class="btn btn-sm btn-success">Make Admin</a>
                                    @endif
                                </td>
                                <td>
                                    {{--here we r making sure user(admin) can not delete his own profile--}}
                                    @if(Auth::id() !== $user->id)
                                        <a href="{{route('user.delete', ['id' => $user->id])}}" class="btn btn-sm btn-danger">Delete</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <th colspan="5" class="text-center">
                                No User
                            </th>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>



@stop