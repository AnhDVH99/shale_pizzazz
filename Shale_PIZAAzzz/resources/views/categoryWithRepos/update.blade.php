@extends('masters.adminMaster')

@section('main')
    <div class="container">
        <h1 class="display-4">Update An Existing Category</h1>


        @include('partials.errors')

        <form action="{{route('category.update', ['ca_ID' => old('ca_ID')?? $category->ca_ID])}}" method="post" >
            @csrf
            @include('categoryWithRepos.categoryFields')

            <button type="submit" class="btn btn-dark">Submit</button>
        </form>
    </div>
@endsection
