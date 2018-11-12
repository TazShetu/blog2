@extends('layouts.app')

@section('styles')
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">


@stop

@section('content')

    <div class="panel pane-default">
        <div class="panel-heading">
            Edit Post: {{$post->title}}
        </div>
        <div class="panel-body">
            <form action="{{route('post.update', ['id' => $post->id])}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" value="{{$post->title}}">
                </div>
                <div class="form-group">
                    <label for="featured">Featured Image</label>
                    <input type="file" class="form-control" name="featured">
                </div>

                <div class="form-group">
                    <label for="category">Select Category</label>
                    <select name="category_id" id="category" class="form-control">
                        {{--<option value="{{$post->category->id}}">{{$post->category->name}}</option>--}}
                        @foreach($categories as $category)
                            <option value="{{$category->id}}"
                             @if($post->category_id == $category->id)
                                selected
                             @endif
                            >{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="tags">Select Tags</label><br>
                    @foreach($tags as $tag)
                        <div class="checkbox-inline">
                            <label>
                                <input type="checkbox" name="tags[]" value="{{$tag->id}}"
                                @foreach($post->tags as $t)
                                    @if($tag->id == $t->id)
                                        checked
                                    @endif
                                @endforeach
                                >{{$tag->tag}}
                            </label>
                        </div>
                    @endforeach
                </div>

                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea name="content" id="summernote" cols="5" rows="5" class="form-control">{{$post->content}}</textarea>
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

