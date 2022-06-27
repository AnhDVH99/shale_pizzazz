@extends('masters.adminMaster')

@section('main')


    <div class="container">
        <h1 class="display-4">Admin Details</h1>
        @include('customerWithRepos.customerDetails')
        <a type="button" href="{{route('customer.index')}}" class="btn btn-info">&lt;&lt;&nbspIndex</a>
    </div>
@endsection
