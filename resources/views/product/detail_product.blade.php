<dl class="row">
    <dt class="col-sm-3">ID</dt>
    <dd class="col-sm-9">{{ $product->id }}</dd>

    <dt class="col-sm-3">Category</dt>
    <dd class="col-sm-9">{{ $categoryname =  \App\repos\eproject::getCategoryById($product->categoryid)[0]->name  }}</dd>

    <dt class="col-sm-3">Name</dt>
    <dd class="col-sm-9">{{ $product->name }}</dd>

    <dt class="col-sm-3">Weight</dt>
    <dd class="col-sm-9">{{ $product->weight }}</dd>

    <dt class="col-sm-3">Price</dt>
    <dd class="col-sm-9">{{ $product->price }}</dd>

    <dt class="col-sm-3">Description</dt>
    <dd class="col-sm-9">{{$product->description }}</dd>

    <dt class="col-sm-3">Brand</dt>
    <dd class="col-sm-9">{{$product->brand }}</dd>

    <dt class="col-sm-3">Country_of_origin</dt>
    <dd class="col-sm-9">{{$product->country_of_origin }}</dd>

    <dt class="col-sm-3">Expiration_date</dt>
    <dd class="col-sm-9">{{$product->expiration_date }}</dd>

    <dt class="col-sm-3">Manufacturer</dt>
    <dd class="col-sm-9">{{$product->manufacturer }}</dd>


    <dt class="col-sm-3">Image</dt>
    <dd class="col-sm-9">
        {{ $product->image }}
        <div class="image">
            <img src="{{ url('img/admin_upload/'.$product->image) }}" alt="description of image"></div>
    </dd>



</dl>
