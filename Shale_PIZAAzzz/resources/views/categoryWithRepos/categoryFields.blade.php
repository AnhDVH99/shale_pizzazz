<input type="hidden" name="ca_ID" value="{{old('ca_ID')?? $category->ca_ID}}">
<div class="form-group">
    <label for="ca_name" class="font-weight-bold">Name</label>
    <input type="text" class="form-control" id="ca_name" name="ca_name" value="{{old('ca_name')?? $category->ca_name}}">
</div>

<div class="form-group">
    <label for="ca_image" class="font-weight-bold">Image</label>
    <input type="file" class="form-control" id="ca_image" name="ca_image"
           value="{{old('ca_image')?? $category->ca_image}}">
    <img src="{{asset('image/'. $category->ca_image)}}" alt="" style="...">
</div>

