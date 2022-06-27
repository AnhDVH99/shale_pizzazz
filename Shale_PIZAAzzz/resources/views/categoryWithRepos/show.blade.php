@extends('masters.adminMaster')

@section('main')

    <div class="container w3-black">
        <h1 class="display-4">Category Details</h1>
        @include('categoryWithRepos.categoryDetails')
        <a type="button" href="{{route('category.index')}}" class="btn btn-info">&lt;&lt;&nbsp;Index</a>
    </div>
@endsection
