<input type="hidden" name="p_id" value="{{old('p_id')?? $food->p_id}}">
<div class="form-group">
    <label for="p_name" class="font-weight-bold">Name</label>
    <input type="text" class="form-control" id="p_name" name="p_name" value="{{old('p_name')?? $food->p_name}}">
    {{--        when removing title value to trigger "required" validation, --}}
    {{--        old('title') is not set so $book['title'] is shown--}}
    {{--        it is because redirect()->back() calls edit() which provides $book for view--}}
</div>

<div class="form-group">
    <label for="p_price" class="font-weight-bold">Price</label>
    <input type="number" class="form-control" id="p_price" name="p_price" value="{{old('p_price')?? $food->p_price}}">
</div>

<div class="form-group">
    <label for="p_size" class="font-weight-bold">Size</label>
    <select name="p_size" class="form-control" id="p_size" >
        <option value="S"{{ (old('p_size')?? $food->p_size)=='S' ? 'selected' : ''  }}>S</option>
        <option value="M"{{ (old('p_size')?? $food->p_size)=='M' ? 'selected' : ''  }}>M</option>
        <option value="L"{{ (old('p_size')?? $food->p_size)=='L' ? 'selected' : ''  }}>L</option>
        <option value="XL"{{ (old('p_size')?? $food->p_size)=='XL' ? 'selected' : ''  }}>XL</option>
    </select>
</div>
<div class="form-group">
    <label for="p_description" class="font-weight-bold">Description</label>
    <input type="text" class="form-control" id="p_description" name="p_description" value="{{old('p_description')?? $food->p_description}}">
</div>
{{--one-to-many relationship--}}
@php
    $cId = old('ca_ID') ?? $food->ca_ID?? null;
@endphp
<div class="form-group">
    <label for="ca_ID" class="font-weight-bold">Category</label>
    <select name="ca_ID" class="form-control" id="ca_ID" >
        <option value="0">Please select a category :)</option>
        @foreach($categories as $c)
            <option value="{{ $c->ca_ID }}"
                {{ ($cId != null && $c->ca_ID == $cId) ? 'selected' : '' }}
            >{{ $c->ca_name }}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="p_description" class="font-weight-bold">Image</label>
    <input type="file" class="form-control" id="p_image" name="p_image"
           value="{{old('p_image')?? $food->p_image}}">
    <img src="{{asset('images/'. $food->p_image)}}" alt="" style="...">
</div>
