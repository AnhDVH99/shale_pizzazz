@extends('masters.adminMaster')

@section('main')
    <div class="container">
        <h1 class="display-4">Category</h1>
        @include('categoryWithRepos.sessionmessage')
        <table class="table table-hover">
            <thead class="thead-dark">
            <tr>
                {{--        <th scope="col">#</th>--}}
                <th scope="col">Name</th>
                <th scope="col">Image</th>
                <th scope="col">&nbsp;</th>
                <th scope="col">&nbsp;</th>
                <th scope="col">&nbsp;</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>

                    <td>{{$category->ca_name}}</td>

                    <td>
                        <a href="{{route('category.show', ['ca_ID' => $category->ca_ID])}}">
                            <img src="{{asset('images/'. $category->ca_image)}}" alt="" style="{{asset('css/style.css')}};">
                        </a>
                    </td>
                    <td>
                        <a type="button" class="btn btn-primary btn-sm"
                           href="{{route('category.show', ['ca_ID' => $category->ca_ID])}}"
                        >Details</a>
                    </td>
                    <td><a type="button" class="btn btn-success btn-sm"
                           href="{{route('category.edit', ['ca_ID' => $category->ca_ID])}}"
                        >Edit</a>
                    </td>
                    <td>

                        <a type="button" class="btn btn-danger btn-sm"
                           href="{{route('category.confirm', ['ca_ID' => $category->ca_ID])}}"
                        >Delete</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
@endsection

@section('script')
@endsection
