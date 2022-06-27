@extends('masters.adminMaster')

@section('main')
    <div class="container">
        <h1 class="display-4">Update an Admin</h1>


        @include('partials.errors')

        <form action="{{route('admin.update', ['ad_id' => old('ad_id')?? $admin->ad_id])}}" method="post">
            @csrf
            @include('adminWithRepos.adminFields')

            <button type="submit" class="btn btn-dark">Submit</button>
        </form>
    </div>
@endsection
