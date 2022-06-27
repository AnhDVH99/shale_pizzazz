<dl class="row">

    <dt class="col-sm-3">Name</dt>
    <dd class="col-sm-9">{{ $food->p_name }}</dd>

    <dt class="col-sm-3">Price</dt>
    <dd class="col-sm-9">{{ $food->p_price }}vnđ</dd>

    <dt class="col-sm-3">Size</dt>
    <dd class="col-sm-9">{{ $food->p_size }}</dd>

    <dt class="col-sm-3">Description</dt>
    <dd class="col-sm-9">{{ $food->p_description }}</dd>

    <dt class="col-sm-3">Category</dt>
    <dd class="col-sm-9">{{ $categories->ca_name }}</dd>

    <dt class="col-sm-3">Image</dt>
    <dd class="col-sm-9"><img src="{{asset('images/'. $food->p_image)}}" alt="" style="..."></dd>

</dl>
