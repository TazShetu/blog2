@extends('layouts.app')

@section('content')

    <div class="panel pane-default">
        <div class="panel-heading">
            Edit Tag: {{$tag->tag}}
        </div>
        <div class="panel-body">
            <form action="{{route('tag.update', ['id' => $tag->id])}}" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="name">Tag Name</label>
                    <input type="text" class="form-control" name="tag" value="{{$tag->tag}}">
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-primary" type="submit">Update</button>
                    </div>
                </div>
            </form>
        </div>

        @include('admin.includes.errors')

    </div>

@stop

