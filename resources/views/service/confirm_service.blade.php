@extends('masters.admin')

@section('main')
    <div class="container">
        <h1 class="display-4">Are you sure you want to delete?</h1>
        @include('service.detail_service')

        <form action="{{ route('admin.delete.service', ['id' => $service->id]) }}" method="post">
            @csrf
            <input type="hidden" name="id" value="{{$service->id}}">
            <button type="submit" class="btn btn-danger">Delete</button>
            <a href="{{route('admin.index.service')}}" class="btn btn-info">Cancel</a>
        </form>
    </div>
@endsection
