@extends('layouts.app')

@section('content')

    <div class="panel pane-default">
        <div class="panel-heading">
            Edit your profile
        </div>
        <div class="panel-body">
            <form action="{{route('user.profile.update')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="name">User Name</label>
                    <input type="text" class="form-control" name="name" value="{{$user->name}}">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" value="{{$user->email}}">
                </div>

                <div class="form-group">
                    <label for="password">New Password</label>
                    <input type="password" class="form-control" name="password">
                </div>
                <div class="form-group">
                    <label for="password">Upload new Avatar</label>
                    <input type="file" class="form-control" name="avatar">
                </div>
                <div class="form-group">
                    <label for="about">About You</label>
                    <textarea class="form-control" name="about" id="about" cols="6" rows="4">{{$user->profile->about}}</textarea>
                </div>
                <div class="form-group">
                    <label for="password">Facebook profile</label>
                    <input type="text" class="form-control" name="facebook" value="{{$user->profile->facebook}}">
                </div>
                <div class="form-group">
                    <label for="password">Youtube profile</label>
                    <input type="text" class="form-control" name="youtube" value="{{$user->profile->youtube}}">
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-primary" type="submit">Update Profile</button>
                    </div>
                </div>
            </form>
        </div>

        @include('admin.includes.errors')

    </div>

@stop

