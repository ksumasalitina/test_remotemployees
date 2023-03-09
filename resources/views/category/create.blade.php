@extends('app')

@section('title')
    Create category
@endsection

@section('content')
    <div class="d-flex justify-content-center">
        <form action="{{route('category.store')}}" method="POST" class="w-50">
            @csrf
            <label for="name">Name</label>
            <input type="text" class="form-control mb-3" id="name" name="name" required/>

            <button class="btn btn-warning w-100" type="submit">Submit</button>
        </form>

        @error('name')
        <p class="text-danger center-text">{{$message}}</p>
        @enderror
    </div>
@endsection
