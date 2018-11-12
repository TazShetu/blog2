@extends('layouts.app')

@section('content')

    <div class="panel pane-default">
        <div class="panel-heading">
            Edit Blog Settings
        </div>
        <div class="panel-body">
            <form action="{{route('settings.update')}}" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="name">Site Name</label>
                    <input type="text" class="form-control" name="site_name" value="{{$settings->site_name}}">
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" name="address" value="{{$settings->address}}">
                </div>
                <div class="form-group">
                    <label for="contact">Contact (phone)</label>
                    <input type="text" class="form-control" name="contact_number" value="{{$settings->contact_number}}">
                </div>
                <div class="form-group">
                    <label for="email">Contact Email</label>
                    <input type="text" class="form-control" name="contact_email" value="{{$settings->contact_email}}">
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-primary" type="submit">Update Settings</button>
                    </div>
                </div>
            </form>
        </div>

        @include('admin.includes.errors')

    </div>

@stop

