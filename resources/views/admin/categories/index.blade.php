@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="panel-heading">Categories</div>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Name</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                    @if($categories->count() > 0)
                        @foreach($categories as $category)
                            <tr>
                                <td>{{$category->name}}</td>
                                <td>
                                    <a href="{{route('category.edit', ['id' => $category->id])}}" class="btn btn-sm btn-info">
                                        <span class="glyphicon glyphicon-pencil"></span>
                                    </a>
                                </td>
                                <td>
                                    <a href="{{route('category.delete', ['id' => $category->id])}}" class="btn btn-sm btn-danger">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <th colspan="5" class="text-center">
                                No Category
                            </th>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>



@stop