@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Published Posts</div>
        <div class="panel-body">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Image</th>
                    <th>Title</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @if($posts->count() > 0)
                    @foreach($posts as $post)
                        <tr>
                            <td><img src="{{$post->featured}}" alt="No Photo" height="50px"></td>
                            <td>{{$post->title}}</td>
                            <td>
                                <a href="{{route('post.edit', ['id' => $post->id])}}" class="btn btn-sm btn-info">
                                    Edit
                                </a>
                            </td>
                            <td>
                                <a href="{{route('post.delete', ['id' => $post->id])}}" class="btn btn-sm btn-danger">
                                    Trash
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <th colspan="5" class="text-center">
                            No Post
                        </th>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>



@stop