@extends('masters.admin')

@section('main')


    <div class="container">
        <h1 class="display-4">Category Details</h1>
        @include('category.detail_category')
        <a type="button" href="{{route('admin.index.category')}}" class="btn btn-info">&lt;&lt;&nbsp;Index</a>
    </div>
@endsection
