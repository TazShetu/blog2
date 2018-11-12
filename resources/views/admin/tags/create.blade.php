@extends('layouts.app')

@section('content')

    <div class="panel pane-default">
        <div class="panel-heading">
            Create a new Tag
        </div>
        <div class="panel-body">
            <form action="{{route('tag.store')}}" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="name">Tag Name</label>
                    <input type="text" class="form-control" name="tag">
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

