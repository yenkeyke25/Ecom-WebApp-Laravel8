@extends('layouts.app')
@section('content')
<!-- content wrpper -->


<div class="contact_form">
    <div class="container">
        <div class="row">
            <div class="col-8 card">
                <table class="table table-response">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">First</th>
                            <th scope="col"> Last</th>
                            <th scope="col">Body</th>
                        </tr>

                    </thead>
                    <tbody>

                        <tr>

                            <td scope="col">1</td>
                            <td scope="col">mark 1</td>
                            <td scope="col">mark 2</td>
                            <td scope="col">mark 3</td>

                        </tr>
                        <tr>

                            <td scope="col">1</td>
                            <td scope="col">mark 1</td>
                            <td scope="col">mark 2</td>
                            <td scope="col">mark 3</td>

                        </tr>
                        <tr>

                            <td scope="col">1</td>
                            <td scope="col">mark 1</td>
                            <td scope="col">mark 2</td>
                            <td scope="col">mark 3</td>

                        </tr>
                        <tr>

                            <td scope="col">1</td>
                            <td scope="col">mark 1</td>
                            <td scope="col">mark 2</td>
                            <td scope="col">mark 3</td>

                        </tr>

                    </tbody>
                </table>
            </div>
            <div class="col-4">

                <div class="card">

                    <img src="{{asset('public/frontend/images/image.jpg')}}" alt="" class="card-img-top"
                        style="height: 90px ; width:90px; margin-left:34%;">
                    <div class="card-body">
                        <h5 class="card-title text-center">{{Auth::user()->name}}</h5>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item ">
                            <a href="{{route('password.change')}}">Change Password</a>

                        </li>
                        <li class="list-group-item ">
                            line 2

                        </li>
                        <li class="list-group-item ">
                            line 3

                        </li>

                    </ul>
                    <div class="card-body">
                        <a href="{{route('user.logout')}}" class="btn btn-danger btn-sm btn-block">Logout</a>


                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
<!--/ content wrapper -->
@endsection