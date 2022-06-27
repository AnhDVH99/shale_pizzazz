@extends('masters.adminMaster')

@section('main')
    <div class="container">
        <h1 class="display-4">Are you sure you want to delete?</h1>
        @include('categoryWithRepos.categoryDetails')

        <form action="{{route('category.destroy', ['ca_ID' =>$category->ca_ID])}}" method="post">
            @csrf
            <input type="hidden" name="id" value="{{$category->ca_ID}}">
            <button type="submit" class="btn btn-danger">Delete</button>
            <a href="{{route('category.index')}}" class="btn btn-info">Cancel</a>
        </form>
    </div>
@endsection
