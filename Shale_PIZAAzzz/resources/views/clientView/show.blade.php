@extends('masters.clientMaster')
@section('main')

<div class="container w3-black" style="max-width: 1536px;font-size: x-large">
    <h1 class="display-4">Food Details</h1>
    @include('clientView.foodDetails')
    <a type="button" href="{{route('clientView.index')}}" class="btn btn-info" style="font-size: x-large">&lt;&lt;&nbspIndex</a>
</div>
@endsection
