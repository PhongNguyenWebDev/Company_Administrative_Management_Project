<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your App Title</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom CSS for centering content */
        body,
        html {
            height: 100%;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row text-center" style="width:40%;">
            <div class="col-12">
                <div class="wrapper-page">
                    <div class="m-t-40 account-pages">
                        <div class="text-center account-logo-box">
                            <h2 class="text-uppercase">
                                <a href="index.html" class="text-success">
                                    <span><img src="public\assets\images\logo.png" alt="" height="36"></span>
                                </a>
                            </h2>
                            <!--<h4 class="text-uppercase font-bold m-b-0">Sign In</h4>-->
                        </div>
                        <div class="account-content">
                            <h2><strong>RESET PASSWORD</strong></h2>
                            <div class="text-center m-b-20">
                                <p class="text-muted m-b-0 font-13">Enter your email address and we'll send you an email
                                    with instructions to reset your password. </p>
                            </div>
                            <form class="form-horizontal" action="{{ route('password.update') }}" method="post">
                                @csrf
                                <input type="hidden" name="token" value="{{ $token }}">
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <input class="form-control" type="password" name="password" required
                                            placeholder="Enter Password">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <input class="form-control" type="password" name="password_confirmation"
                                            required placeholder="Confirm Password">
                                    </div>
                                </div>

                                <div class="form-group account-btn text-center m-t-10">
                                    <div class="col-xs-12">
                                        <button class="btn w-md btn-bordered btn-danger waves-effect waves-light"
                                            type="submit">Reset Password
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

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Your other JS files -->
</body>

</html>
