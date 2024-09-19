@extends('auth.layout')
@section('content')
    <div class="container-alt">
        <div class="row">
            <div class="col-sm-12">
                <div class="wrapper-page">
                    <div class="m-t-40 account-pages">
                        <div class="text-center account-logo-box">
                            <h2 class="text-uppercase">
                                <a href="index.html" class="text-success">
                                    <span><img src="assets/images/logo.png" alt="" height="36"></span>
                                </a>
                            </h2>
                            <!--<h4 class="text-uppercase font-bold m-b-0">Sign In</h4>-->
                        </div>
                        @if (session('announce'))
                            {{ session('announce') }}
                        @endif
                        <div class="account-content">
                            <form class="form-horizontal" action="{{ route('register') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <input class="form-control @error('email') is-invalid @enderror" name="email"
                                            type="email" placeholder="Email" value="{{ old('email') }}">
                                        @error('email')
                                            <div class="invalid-feedback text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <input class="form-control @error('name') is-invalid @enderror" name="name"
                                            type="text" placeholder="Username" value="{{ old('name') }}">
                                        @error('name')
                                            <div class="invalid-feedback text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <input class="form-control @error('password') is-invalid @enderror" name="password"
                                            type="password" placeholder="Password">
                                        @error('password')
                                            <div class="invalid-feedback text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <input class="form-control" name="company" type="text" placeholder="Company"
                                            value="{{ old('company') }}">
                                        @error('company')
                                            <div class="invalid-feedback text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <div class="checkbox checkbox-success">
                                            <input id="checkbox-signup" type="checkbox" checked="checked">
                                            <label for="checkbox-signup">I accept <a href="#">Terms and
                                                    Conditions</a></label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group account-btn text-center m-t-10">
                                    <div class="col-xs-12">
                                        <button class="btn w-md btn-danger btn-bordered waves-effect waves-light"
                                            type="submit">Register
                                        </button>
                                    </div>
                                </div>
                            </form>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <!-- end card-box-->
                    <div class="row m-t-50">
                        <div class="col-sm-12 text-center">
                            <p class="text-muted">Already have account?<a href="{{ route('login') }}"
                                    class="text-primary m-l-5"><b>Sign In</b></a></p>
                        </div>
                    </div>
                </div>
                <!-- end wrapper -->
            </div>
        </div>
    </div>
@endsection
