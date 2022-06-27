@extends('masters.foodMaster')

@section('main')


    <div class="container">
        <h1 class="display-4">Admin Details</h1>
        @include('foodWithRepos.foodDetails')
        <a type="button" href="{{route('food.index')}}" class="btn btn-info">&lt;&lt;&nbspIndex</a>
    </div>
@endsection
