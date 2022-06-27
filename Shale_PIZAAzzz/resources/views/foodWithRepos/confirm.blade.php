@extends('masters.foodMaster')

@section('main')
    <div class="container">
        <h1 class="display-4">Are you sure you want to delete?</h1>
        @include('foodWithRepos.foodDetails')

        <form action="{{route('food.destroy', ['p_id' => $food -> p_id])}}" method="post">
            @csrf
            <input type="hidden" name="p_id" value="{{$food->p_id}}">
            <button type="submit" class="btn btn-danger">Delete</button>
            <a href="{{route('food.index')}}" class="btn btn-info">Cancel</a>
        </form>
    </div>
@endsection
