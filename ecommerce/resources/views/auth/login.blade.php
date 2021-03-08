@extends('layouts.app')

@section('content')


<!-- Contact Form -->
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/styles/contact_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/styles/contact_responsive.css')}}">
<div class="contact_form">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 offset-lg-1" style="border: 1px solid grey; padding: 20px; border-radius: 10px;">
                <div class="contact_form_container">
                    <div class="contact_form_title text-center">Sign In</div>

                    <form action="{{route('login')}}" id="contact_form" method="post">

                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email or Phone Number</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror"
                                value="{{ old('email') }}" name="email" required="" aria-describedby="emailHelp"
                                placeholder="Enter email or Phone Number">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                name="password" required="" aria-describedby="emailHelp" placeholder="password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>
                        <div class="contact_form_button">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                    </form>
                    <br>
                    <a href="{{ route('password.request') }}">I forgot my password</a><br><br>

                    <button class="btn btn-primary btn-block" type="submit"><i class="fab fa-facebook"></i> Login with
                        facebook</button>
                    <button class="btn btn-danger btn-block" type="submit"><i class="fab fa-google"></i> Login with
                        Google</button>


                </div>
            </div>
            <div class="col-lg-5 offset-lg-1" style="border: 1px solid grey; padding: 20px; border-radius: 10px;">
                <div class=" contact_form_container">
                    <div class="contact_form_title text-center">Sign Up</div>

                    <form action="{{route('register')}}" id="contact_form" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Full Name</label>
                            <input type="text" class="form-control" name="name" required="" aria-describedby="emailHelp"
                                placeholder="Enter your Full Name">

                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Phone</label>
                            <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                value="{{ old('phone') }}" name="phone" required="" aria-describedby="emailHelp"
                                placeholder="Enter phone">

                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                value="{{ old('email') }}" name="email" required="" aria-describedby="emailHelp"
                                placeholder="Enter your email">

                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Password</label>
                            <input type="password" class="form-control" name="password" required=""
                                aria-describedby="emailHelp" placeholder="password">

                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Confirm Password</label>
                            <input type="password" class="form-control" name="password_confirmation" required=""
                                aria-describedby="emailHelp" placeholder="retype password">

                        </div>
                        <div class="contact_form_button">
                            <button type="submit" class="btn btn-primary">Sign Up</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <div class="panel"></div>
</div>
@endsection