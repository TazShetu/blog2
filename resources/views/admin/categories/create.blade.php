@extends('layouts.app')

@section('content')

    <div class="panel pane-default">
        <div class="panel-heading">
            Create a new Category
        </div>
        <div class="panel-body">
            <form action="{{route('category.store')}}" method="post">
                {{--enctype="multipart/form-data" to upload file--}}
                {{csrf_field()}}
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name">
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-primary" type="submit">Create</button>
                    </div>
                </div>
            </form>
        </div>

        @include('admin.includes.errors')

    </div>

@stop

