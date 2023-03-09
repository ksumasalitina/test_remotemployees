@extends('app')

@section('title')
    Edit lot
@endsection

@section('content')
    <div class="d-flex justify-content-center">
        <form action="{{route('lot.update', $lot->id)}}" method="POST" class="w-50">
            @csrf
            @method('PUT')
            <label for="name">Name</label>
            <input type="text" class="form-control mb-3" id="name" name="name" value="{{$lot->name}}" required/>

            <label for="description">Description</label>
            <textarea class="form-control mb-3" id="description" name="description" required>{{$lot->description}}</textarea>

            <label for="category">Choose category</label>
            <select class="form-control mb-3" name="category_id" id="category">
                <option value="{{$lot->category->id}}">{{$lot->category->name}}</option>
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
