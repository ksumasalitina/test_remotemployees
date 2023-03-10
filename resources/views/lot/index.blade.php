@extends('app')

@section('title')
    Lots
@endsection

@section('content')
    <a class="btn btn-info mb-3" href="{{route('lot.create')}}">Add lot</a>

    <form action="{{route('lot.index')}}" method="GET">
        <select name="category_filter">
            <option selected disabled>Choose category</option>
            @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
        <button type="submit" class="btn btn-warning">Filter</button>
    </form>

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
        @foreach($lots as $lot)
            <tr>
                <th scope="row">{{$lot->id}}</th>
                <td>{{$lot->name}}</td>
                <td><a class="btn btn-info" href="{{route('lot.show', $lot->id)}}">Show</a></td>
                <td><a class="btn btn-warning" href="{{route('lot.edit', $lot->id)}}">Edit</a></td>
                <td>
                    <form action="{{route('lot.destroy', $lot->id)}}" method="POST">
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
