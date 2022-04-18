@extends('masters.admin')



@section('form')

    @include('masters.errors')
    <div class="form-body">
        <div class="row">
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3>New Product</h3>
                        <p>Fill the form below</p>
                        <form action="{{route('admin.store.product')}}" method="post" enctype='multipart/form-data' novalidate>
                            @csrf
                            <div class="col-md-6">
                                <input class="form-control" type="text" name="name" value="{{old('name')?? $product->name}}" placeholder="Product name">

                            </div>

                            <div class="col-md-6">
                                <input class="form-control" type="number" name="weight" value="{{old('weight')?? $product->weight}}" placeholder="Weight" step="0.1">

                            </div>

                            <div class="col-md-6">
                                <input class="form-control" type="number" name="price" value="{{old('weight')?? $product->price}}" placeholder="Price" step="0.1">

                            </div>

                            <div class="col-md-6">
                                <input class="form-control" type="text" name="description" value="{{old('description')?? $product->description}}" placeholder="Description">
                            </div>

                            <div class="col-md-6">
                                <input class="form-control" type="text" name="brand" value="{{old('brand')?? $product->brand}}" placeholder="Brand">

                            </div>

                            <div class="col-md-6">
                                <input class="form-control" type="text" name="country_of_origin" value="{{old('country_of_origin')?? $product->country_of_origin}}" placeholder="Country of origin">

                            </div>

                            <div class="col-md-6">
                                <input class="form-control" type="date" name="expiration_date" value="{{old('expiration_date')?? $product->expiration_date}}" placeholder="Expiration Date">

                            </div>

                            <div class="col-md-6">
                                <input class="form-control" type="text" name="manufacturer" value="{{old('manufacturer')?? $product->manufacturer}}" placeholder="Manufacturer">

                            </div>

                            <input id="image" name="image" type="file" class="file" data-browse-on-zone-click="true">


{{--                            <div class="form-group">--}}
{{--                                <label class="form-check-label">--}}
{{--                                    Choose Category--}}
{{--                                </label><br>--}}
{{--                                @foreach($category as $c)--}}
{{--                                    <div class="form-check form-check-inline">--}}
{{--                                        <input class="form-check-input" type="checkbox" value="{{$c->id}}" id="{{$c->name}}" name="category"--}}
{{--                                            {{in_array($t->id, $tIDs) ? 'checked' : ''}}--}}
{{--                                        >--}}
{{--                                        <label class="form-check-label" for="{{$c->name}}">--}}
{{--                                            {{$c->name}}--}}
{{--                                        </label>--}}
{{--                                    </div>--}}
{{--                                @endforeach--}}
{{--                            </div>--}}

                                <div class="col-md-6">
                                  <select name="categoryid" class="form-select mt-3" >
                                    <option name="categoryid" selected disabled value="">Category</option>
                                      @foreach($category as $c)
                                        <option name="categoryid" value="{{ $c->id }}">{{ $c->name }}</option>
                                      @endforeach
                                  </select>
                                </div>


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

