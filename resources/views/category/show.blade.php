@extends('app')

@section('title')
    {{$category->name}}
@endsection

@section('content')
    <div class="d-flex justify-content-center">
        <div>
            <h5>Name</h5><br>
            <p>{{$category->name}}</p><br>

            <a class="btn btn-warning w-100" href="{{route('category.index')}}">Back</a>
        </div>
    </div>
@endsection
