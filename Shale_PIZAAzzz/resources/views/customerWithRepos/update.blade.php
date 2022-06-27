@extends('masters.adminMaster')

@section('main')
    <div class="container">
        <h1 class="display-4">Update a Customer</h1>


        @include('partials.errors')

        <form action="{{route('customer.update', ['cus_id' => old('cus_id')?? $customer->cus_id])}}" method="post">
            @csrf
            @include('customerWithRepos.customerFields')

            <button type="submit" class="btn btn-dark">Submit</button>
        </form>
    </div>
@endsection
