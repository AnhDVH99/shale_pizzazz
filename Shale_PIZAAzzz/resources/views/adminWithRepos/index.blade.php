@extends('masters.adminMaster')

@section('main')
    <div class="container">
        <h1 class="display-4">Admin Manager</h1>
        @include('adminWithRepos.sessionmessage')
        <table class="table table-hover">
            <thead class="thead-dark">
            <tr>

                <th scope="col">Username</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">&nbsp;</th>
                <th scope="col">&nbsp;</th>
            </tr>
            </thead>
            <tbody>
            @foreach($admins as $admin)

                <tr>
{{--                    <a type="hidden">{{$admin -> ad_id}}</a>--}}
                    <td>{{$admin -> ad_username}}</td>
                    <td>{{$admin -> ad_email}}</td>
                    <td>{{$admin -> ad_phone}}</td>
                    <td><a type="button" class="btn btn-primary btn-sm" href="{{route('admin.show',['ad_id'=> $admin->ad_id])}}">Details</a>
                    </td>
                    <td ><a type="button" class="btn btn-success btn-sm " href="{{route('admin.edit', ['ad_id' => $admin->ad_id])}}"
                            {{--                 data-book="{{join('|', $class)}}"--}}
                            {{--                 data-class="{{join('|', $class) . "|" . route('book.destroy', ['id' => $class['id']])}}"--}}
                        >Edit</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
@endsection
