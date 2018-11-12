@extends('layouts.app')

@section('styles')
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">


@stop

@section('content')

    <div class="panel pane-default">
        <div class="panel-heading">
            Create a new Post
        </div>
        <div class="panel-body">
            <form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
                {{--enctype="multipart/form-data" to upload file--}}
                {{csrf_field()}}
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title">
                    {{--name is the column name--}}
                </div>
                <div class="form-group">
                    <label for="featured">Featured Image</label>
                    <input type="file" class="form-control" name="featured">
                </div>
                <div class="form-group">
                    <label for="category">Select Category</label>
                    <select name="category_id" id="category" class="form-control">
                        <option value="">Choose One</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>


                <div class="form-group">
                    <label for="tags">Select Tags</label><br>
                    @foreach($tags as $tag)
                        <div class="checkbox-inline">
                            <label><input type="checkbox" name="tags[]" value="{{$tag->id}}">{{$tag->tag}}</label>
                        </div>
                    @endforeach
                </div>


                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea name="content" id="summernote" cols="5" rows="10" class="form-control"></textarea>
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



@section('scripts')

    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote();
        });
    </script>

@stop
