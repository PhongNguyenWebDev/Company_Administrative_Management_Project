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
                            <h4 class="text-uppercase font-bold m-b-0">Sign In</h4>
                        </div>
                        <div class="account-content">
                            <form class="form-horizontal" action="{{ route('login') }}" method="post">
                                @csrf
                                <div class="form-group ">
                                    <div class="col-xs-12">
                                        <input class="form-control" type="email" name="email"
                                            value="{{ old('email') }}" placeholder="Email">
                                        @error('email')
                                            <div class="invalid-feedback text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <input class="form-control" type="password" name="password" placeholder="Password">
                                        @error('password')
                                            <div class="invalid-feedback text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group text-center m-t-30">
                                    <div class="col-sm-12">
                                        <a href="{{ route('password.request') }}" class="text-muted"><i
                                                class="fa fa-lock m-r-5"></i>
                                            Forgot your password?</a>
                                    </div>
                                </div>
                                <div class="form-group account-btn text-center m-t-10">
                                    <div class="col-xs-12">
                                        <button class="btn w-md btn-bordered btn-danger waves-effect waves-light"
                                            type="submit">Log In</button>
                                    </div>
                                </div>
                            </form>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <!-- end card-box-->
                    <div class="row m-t-50">
                        <div class="col-sm-12 text-center">
                            <p class="text-muted">Don't have an account? <a href="{{ route('register') }}"
                                    class="text-primary m-l-5"><b>Sign Up</b></a></p>
                        </div>
                    </div>
                </div>
                <!-- end wrapper -->

            </div>
        </div>
    </div>
    @if (session('success'))
        <script>
            Swal.fire({
                title: 'Success!',
                text: '{{ session('success') }}',
                icon: 'success',
                confirmButtonText: 'OK'
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            Swal.fire({
                title: 'Error!',
                text: '{{ session('error') }}',
                icon: 'error',
                confirmButtonText: 'OK'
            });
        </script>
    @endif

    @if ($errors->any())
        <script>
            Swal.fire({
                title: 'Error!',
                text: '{{ implode(', ', $errors->all()) }}',
                icon: 'error',
                confirmButtonText: 'OK'
            });
        </script>
    @endif
@endsection
