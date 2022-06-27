@extends('masters.foodMaster')

@section('main')
    <div class="container">
        <h1 class="display-4">Food Manager</h1>
        @include('foodWithRepos.sessionmessage')
        <table class="table table-hover">
            <thead class="thead-dark">
            <tr>

                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Size</th>
                <th scope="col">Description</th>
                <th scope="col">Image</th>
                <th scope="col">&nbsp;</th>
                <th scope="col">&nbsp;</th>
                <th scope="col">&nbsp;</th>
            </tr>
            </thead>
            <tbody>
            @foreach($foods as $food)

                <tr>
                    {{--                    <a type="hidden">{{$admin -> ad_id}}</a>--}}
                    <td>{{$food -> p_name}}</td>
                    <td>{{$food -> p_price}}vnđ</td>
                    <td>{{$food -> p_size}}</td>
                    <td>{{$food -> p_description}}</td>
                    <td>
                        <a href="{{route('food.show', ['p_id' => $food->p_id])}}">
                            <img src="{{asset('images/'. $food->p_image)}}" alt="" style="...">
                        </a>
                    </td>
                    <td><a type="button" class="btn btn-primary btn-sm" href="{{route('food.show',['p_id'=> $food->p_id])}}">Details</a>
                    </td>
                    <td ><a type="button" class="btn btn-success btn-sm " href="{{route('food.edit', ['p_id' => $food->p_id])}}"
                            {{--                 data-book="{{join('|', $class)}}"--}}
                            {{--                 data-class="{{join('|', $class) . "|" . route('book.destroy', ['id' => $class['id']])}}"--}}
                        >Edit</a></td>
                    <td><a type="button" class="btn btn-danger btn-sm" href="{{route('food.destroy',['p_id'=> $food->p_id])}}">Delete</a>
                </tr>
            @endforeach
            </tbody>
        </table>
@endsection
