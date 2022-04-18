@extends('masters.admin')

@section('main')


    <div class="container">
        <h1 class="display-4">Product Details</h1>
        @include('product.detail_product')
        <a type="button" href="{{route('admin.index.product')}}" class="btn btn-info">&lt;&lt;&nbsp;Index</a>
    </div>
@endsection
