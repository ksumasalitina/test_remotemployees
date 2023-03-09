@extends('app')

@section('title')
    Create lot
@endsection

@section('content')
    <div class="d-flex justify-content-center">
        <form action="{{route('lot.store')}}" method="POST" class="w-50">
            @csrf
            <label for="name">Name</label>
            <input type="text" class="form-control mb-3" id="name" name="name" required/>

            <label for="description">Description</label>
            <textarea class="form-control mb-3" id="description" name="description" required></textarea>

            <label for="category">Choose category</label>
            <select class="form-control mb-3" name="category_id" id="category">
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>

            <button class="btn btn-warning w-100" type="submit">Submit</button>
        </form>

        @error('name')
        <p class="text-danger center-text">{{$message}}</p>
        @enderror
        @error('description')
        <p class="text-danger center-text">{{$message}}</p>
        @enderror
        @error('category_id')
        <p class="text-danger center-text">{{$message}}</p>
        @enderror
    </div>
@endsection
