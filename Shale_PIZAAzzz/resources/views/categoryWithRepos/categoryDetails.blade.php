<dl class="row">
    <dt class="col-sm-3">ID</dt>
    <dd class="col-sm-9">{{ $category->ca_ID }}</dd>

    <dt class="col-sm-3">Name</dt>
    <dd class="col-sm-9">{{ $category->ca_name }}</dd>

    <dt class="col-sm-3">Image</dt>
    <dd><img src="{{asset('image/'. $category->ca_image)}}" alt="" style="..."></dd>

</dl>
