@extends('layouts.app')

@section('content')

    <div class="panel pane-default">
        <div class="panel-heading">
            Create a new User
        </div>
        <div class="panel-body">
            <form action="{{route('user.store')}}" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="name">User Name</label>
                    <input type="text" class="form-control" name="name">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email">
                </div>

                {{--Here no password field--}}
                {{--we will store only our own 1 password--}}

                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-primary" type="submit">Add User</button>
                    </div>
                </div>
            </form>
        </div>

        @include('admin.includes.errors')

    </div>

@stop

