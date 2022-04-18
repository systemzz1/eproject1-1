<dl class="row">
    <dt class="col-sm-3">ID</dt>
    <dd class="col-sm-9">{{ $service->id }}</dd>

    <dt class="col-sm-3">Category</dt>
    <dd class="col-sm-9">{{ $categoryname =  \App\repos\eproject::getCategoryById($service->categoryid)[0]->name  }}</dd>

    <dt class="col-sm-3">Name</dt>
    <dd class="col-sm-9">{{ $service->name }}</dd>

    <dt class="col-sm-3">Price</dt>
    <dd class="col-sm-9">{{ $service->price }}</dd>

    <dt class="col-sm-3">Description</dt>
    <dd class="col-sm-9">{{$service->description }}</dd>

    <dt class="col-sm-3">Service validity period</dt>
    <dd class="col-sm-9">{{$service->service_validity_period }}</dd>


    <dt class="col-sm-3">Image</dt>
    <dd class="col-sm-9">
        {{ $service->image }}
        <div class="image">
            <img src="{{ url('img/admin_upload/'.$service->image) }}" alt="description of image"></div>
    </dd>



</dl>
