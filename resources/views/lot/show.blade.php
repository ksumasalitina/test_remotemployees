@extends('app')

@section('title')
    {{$lot->name}}
@endsection

@section('content')
    <div class="d-flex justify-content-center">
        <div>
            <h5>Name</h5><br>
            <p>{{$lot->name}}</p><br>

            <h5>Description</h5><br>
            <p>{{$lot->description}}</p><br>

            <h5>Category</h5><br>
            <p>{{$lot->category->name}}</p><br>

            <a class="btn btn-warning w-100" href="{{route('lot.index')}}">Back</a>
        </div>
    </div>
@endsection
