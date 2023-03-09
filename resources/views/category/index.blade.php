@extends('app')

@section('title')
    Categories
@endsection

@section('content')
    <a class="btn btn-info mb-3" href="{{route('category.create')}}">Add lot</a>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
            <tr>
                <th scope="row">{{$category->id}}</th>
                <td>{{$category->name}}</td>
                <td><a class="btn btn-info" href="{{route('category.show', $category->id)}}">Show</a></td>
                <td><a class="btn btn-warning" href="{{route('category.edit', $category->id)}}">Edit</a></td>
                <td>
                    <form action="{{route('category.destroy', $category->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
