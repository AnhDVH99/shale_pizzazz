<input type="hidden" name="ad_id" value="{{old('ad_id')?? $admin->ad_id}}">
<div class="form-group">
    <label for="name" class="font-weight-bold">Username</label>
    <input type="text" class="form-control" id="ad_username" name="ad_username" value="{{old('ad_username')?? $admin->ad_username}}"readonly="readonly">
    {{--        when removing title value to trigger "required" validation, --}}
    {{--        old('title') is not set so $book['title'] is shown--}}
    {{--        it is because redirect()->back() calls edit() which provides $book for view--}}
</div>

<div class="form-group">
    <label for="author" class="font-weight-bold">Email</label>
    <input type="text" class="form-control" id="ad_email" name="ad_email" value="{{old('ad_email')?? $admin->ad_email}}">
</div>

<div class="form-group">
    <label for="pages" class="font-weight-bold">Phone</label>
    <input type="text" class="form-control" id="ad_phone" name="ad_phone"  value="{{old('ad_phone')?? $admin->ad_phone}}">
</div>

<div class="form-group">
    <label for="pages" class="font-weight-bold">Full Name</label>
    <input type="text" class="form-control" id="ad_fullname" name="ad_fullname" value="{{old('ad_fullname')?? $admin->ad_fullname}}">
</div>

<div class="form-group">
    <label for="pages" class="font-weight-bold">Password</label>
    <input type="password" class="form-control" id="ad_password" name="ad_password"  value="{{old('ad_password')?? $admin->ad_password}}">
</div>
<div class="form-group">
    <label for="ad_gender" class="font-weight-bold">Gender</label>
    <select name="ad_gender" class="form-control" id="ad_gender" >
        <option value="F"{{ (old('ad_gender')?? $admin->ad_gender)=='F' ? 'selected' : ''  }}>Female</option>
        <option value="M"{{ (old('ad_gender')?? $admin->ad_gender)=='M' ? 'selected' : ''  }}>Male</option>
        <option value="O"{{ (old('ad_gender')?? $admin->ad_gender)=='O' ? 'selected' : ''  }}>Other</option>
    </select>
</div>
<div class="form-group">
    <label for="ad_dob" class="font-weight-bold">Date of Birth</label>
    <input type="date" class="form-control" id="ad_dob" name="ad_dob"  value="{{old('ad_dob')?? $admin->ad_dob}}">
</div>
