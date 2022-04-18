@extends('masters.admin')



@section('form')

@include('masters.errors')
    <div class="form-body">
        <div class="row">
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3>New Category</h3>
                        <p>Fill the form below</p>
                        <form action="{{route('admin.store.category')}}" method="post" enctype='multipart/form-data' novalidate>
                            @csrf
                            <div class="col-md-6">
                                <input class="form-control" type="text" name="name" value="{{old('name')?? $category->name}}" placeholder="Category name">

                            </div>

                            <div class="col-md-6">
                                <input class="form-control" type="text" name="description" value="{{old('description')?? $category->description}}" placeholder="Description">
                            </div>

                            <input id="image" name="image" type="file" value="" class="file" >

                            {{--            <div class="col-md-12">--}}
                            {{--              <select class="form-select mt-3" >--}}
                            {{--                <option selected disabled value="">Position</option>--}}
                            {{--                <option value="jweb">Junior Web Developer</option>--}}
                            {{--                <option value="sweb">Senior Web Developer</option>--}}
                            {{--                <option value="pmanager">Project Manager</option>--}}
                            {{--              </select>--}}
                            {{--            </div>--}}


{{--                            <div class="col-md-6">--}}
{{--                                <input class="form-control" type="password" name="" placeholder="Password" required>--}}
{{--                            </div>--}}


                            {{--            <div class="col-md-12 mt-3">--}}
                            {{--              <label class="mb-3 mr-1" for="gender">Gender: </label>--}}

                            {{--              <input type="radio" class="btn-check" name="gender" id="male" autocomplete="off" required>--}}
                            {{--              <label class="btn btn-sm btn-outline-secondary" for="male">Male</label>--}}

                            {{--              <input type="radio" class="btn-check" name="gender" id="female" autocomplete="off" required>--}}
                            {{--              <label class="btn btn-sm btn-outline-secondary" for="female">Female</label>--}}

                            {{--              <input type="radio" class="btn-check" name="gender" id="secret" autocomplete="off" required>--}}
                            {{--              <label class="btn btn-sm btn-outline-secondary" for="secret">Secret</label>--}}
                            {{--            </div>--}}

                            {{--            <div class="form-check">--}}
                            {{--              <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>--}}
                            {{--              <label class="form-check-label">I confirm that all data are correct</label>--}}
                            {{--            </div>--}}


                            <div class="form-button mt-3">
                                <button id="submit" type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

