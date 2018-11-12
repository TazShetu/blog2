@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="panel-heading">Tags</div>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Name</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @if($tags->count() > 0)
                    @foreach($tags as $tag)
                        <tr>
                            <td>{{$tag->tag}}</td>
                            <td>
                                <a href="{{route('tag.edit', ['id' => $tag->id])}}" class="btn btn-sm btn-info">
                                    Edit
                                </a>
                            </td>
                            <td>
                                <a href="{{route('tag.delete', ['id' => $tag->id])}}" class="btn btn-sm btn-danger">
                                    X
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <th colspan="5" class="text-center">
                            No Tags to show
                        </th>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>



@stop