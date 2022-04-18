@extends('masters.admin')

@section('main')
    <div class="container">
        <h1 class="display-4">Are you sure you want to delete?</h1>
        @include('product.detail_product')

        <form action="{{ route('admin.delete.product', ['id' => $product->id]) }}" method="post">
            @csrf
            <input type="hidden" name="id" value="{{$product->id}}">
            <button type="submit" class="btn btn-danger">Delete</button>
            <a href="{{route('admin.index.product')}}" class="btn btn-info">Cancel</a>
        </form>
    </div>
@endsection
