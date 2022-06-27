@extends('masters.adminMaster')

@section('main')


    <div class="container">
        <h1 class="display-4">Admin Details</h1>
        @include('adminWithRepos.adminDetails')
        <a type="button" href="{{route('admin.index')}}" class="btn btn-info">&lt;&lt;&nbspIndex</a>
    </div>
@endsection
