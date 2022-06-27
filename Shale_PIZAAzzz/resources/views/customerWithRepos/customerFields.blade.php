<input type="hidden" name="cus_id" value="{{old('cus_id')?? $customer->cus_id}}">
<div class="form-group">
    <label for="name" class="font-weight-bold">Username</label>
    <input type="text" class="form-control" id="cus_username" name="cus_username" value="{{old('cus_username')?? $customer->cus_username}}"readonly="readonly">
    {{--        when removing title value to trigger "required" validation, --}}
    {{--        old('title') is not set so $book['title'] is shown--}}
    {{--        it is because redirect()->back() calls edit() which provides $book for view--}}
</div>

<div class="form-group">
    <label for="author" class="font-weight-bold">Email</label>
    <input type="text" class="form-control" id="cus_email" name="cus_email" value="{{old('cus_email')?? $customer->cus_email}}" readonly="readonly">
</div>

<div class="form-group">
    <label for="pages" class="font-weight-bold">Phone</label>
    <input type="text" class="form-control" id="cus_phone" name="cus_phone"  value="{{old('cus_phone')?? $customer->cus_phone}}">
</div>

<div class="form-group">
    <label for="pages" class="font-weight-bold">Full Name</label>
    <input type="text" class="form-control" id="cus_fullname" name="cus_fullname" value="{{old('cus_fullname')?? $customer->cus_fullname}}">
</div>

<div class="form-group">
    <label for="cus_password" class="font-weight-bold">Password</label>
    <input type="password" class="form-control" id="cus_password" name="cus_password"  value="{{old('cus_password')?? $customer->cus_password}}" readonly="readonly">
</div>
<div class="form-group">
    <label for="cus_gender" class="font-weight-bold">Gender</label>
    <select name="cus_gender" class="form-control" id="cus_gender" >
        <option value="F"{{ (old('cus_gender')?? $customer->cus_gender)=='F' ? 'selected' : ''  }}>Female</option>
        <option value="M"{{ (old('cus_gender')?? $customer->cus_gender)=='M' ? 'selected' : ''  }}>Male</option>
        <option value="O"{{ (old('cus_gender')?? $customer->cus_gender)=='O' ? 'selected' : ''  }}>Other</option>
    </select>
</div>
<div class="form-group">
    <label for="cus_dob" class="font-weight-bold">Date of Birth</label>
    <input type="date" class="form-control" id="cus_dob" name="cus_dob"  value="{{old('cus_dob')?? $customer->cus_dob}}">
</div>
