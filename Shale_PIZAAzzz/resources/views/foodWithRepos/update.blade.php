@extends('masters.foodMaster')

@section('main')
    <div class="container">
        <h1 class="display-4">Update a Food</h1>


        @include('partials.errors')

        <form action="{{route('food.update', ['p_id' => old('p_id')?? $food->p_id])}}" method="post">
            @csrf
            @include('foodWithRepos.foodFields')

            <button type="submit" class="btn btn-dark">Submit</button>
        </form>
    </div>
@endsection
