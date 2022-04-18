@extends('masters.admin')

@section('main')


    <div class="container">
        <h1 class="display-4">Service Details</h1>
        @include('service.detail_service')
        <a type="button" href="{{route('admin.index.service')}}" class="btn btn-info">&lt;&lt;&nbsp;Index</a>
    </div>
@endsection
