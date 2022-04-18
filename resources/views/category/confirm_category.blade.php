@extends('masters.admin')

@section('main')
    <div class="container">
        <h1 class="display-4">Are you sure you want to delete?</h1>
        @include('category.detail_category')

        <form action="{{ route('admin.delete.category', ['id' => $category->id]) }}" method="post">
            @csrf
            <input type="hidden" name="id" value="{{$category->id}}">
            <button type="submit" class="btn btn-danger">Delete</button>
            <a href="{{route('admin.index.category')}}" class="btn btn-info">Cancel</a>
        </form>
    </div>
@endsection
