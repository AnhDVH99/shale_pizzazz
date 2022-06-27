@extends('masters.adminMaster')

@section('main')
    <div class="container">
        <h1 class="display-4">Customer Manager</h1>
        @include('adminWithRepos.sessionmessage')
        <table class="table table-hover">
            <thead class="thead-dark">
            <tr>

                <th scope="col">Full Name</th>
                <th scope="col">Phone</th>
                <th scope="col">Gender</th>
                <th scope="col">Dob</th>
                <th scope="col">&nbsp;</th>
                <th scope="col">&nbsp;</th>
            </tr>
            </thead>
            <tbody>
            @foreach($customers as $customer)

                <tr>
                    {{--                    <a type="hidden">{{$admin -> ad_id}}</a>--}}
                    <td>{{$customer -> cus_fullname}}</td>
                    <td>{{$customer -> cus_phone}}</td>
                    <td>{{$customer -> cus_gender}}</td>
                    <td>{{$customer -> cus_dob}}</td>
                    <td><a type="button" class="btn btn-primary btn-sm" href="{{route('customer.show',['cus_id'=> $customer->cus_id])}}">Details</a>
                    </td>
                    <td ><a type="button" class="btn btn-success btn-sm " href="{{route('customer.edit', ['cus_id' => $customer->cus_id])}}"
                            {{--                 data-book="{{join('|', $class)}}"--}}
                            {{--                 data-class="{{join('|', $class) . "|" . route('book.destroy', ['id' => $class['id']])}}"--}}
                        >Edit</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
@endsection
