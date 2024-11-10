@extends('layout.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between py-4">
                    <h3 class="page-title">Dashboard</h3>
                    <ol class="breadcrumb p-0 m-0">
                        <li class="breadcrumb-item"><a href="#">Zircos</a></li>
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- end row -->

        <div class="row">
            <div class="col-lg-6 col-md-4">
                <div class="card-box widget-box-one">
                    <div class="wigdet-one-content">
                        <p class="m-0 text-uppercase font-600 font-secondary text-overflow">Statistics</p>
                        <h2 class="text-danger"><span data-plugin="counterup">34578</span></h2>
                        <p class="text-muted m-0"><b>Last:</b> 30.4k</p>
                    </div>
                </div>
            </div><!-- end col -->

            <div class="col-lg-6 col-md-4">
                <div class="card-box widget-box-one">
                    <div class="wigdet-one-content">
                        <p class="m-0 text-uppercase font-600 font-secondary text-overflow">Total Users</p>
                        <h2 class="text-primary"><span data-plugin="counterup">3245</span></h2>
                        <p class="text-muted m-0"><b>Last:</b> 20k</p>
                    </div>
                </div>
            </div><!-- end col -->
        </div>
        <!-- end row -->

        <div class="row">
            <div class="col-lg-6">
                <div class="card-box">
                    <h4 class="header-title m-t-0">Recent Users</h4>
                    <div class="table-responsive">
                        <table class="table table-hover m-0">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>User Name</th>
                                    <th>Phone</th>
                                    <th>Location</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><img src="assets/images/users/avatar-1.jpg" loading="lazy" alt="user"
                                            class="thumb-sm img-circle"></td>
                                    <td>
                                        <h5 class="m-0">Louis Hansen</h5>
                                        <p class="m-0 text-muted font-13"><small>Web designer</small></p>
                                    </td>
                                    <td>+12 3456 789</td>
                                    <td>USA</td>
                                    <td>07/08/2016</td>
                                </tr>
                                <!-- more rows -->
                            </tbody>
                        </table>
                    </div> <!-- table-responsive -->
                </div>
            </div><!-- end col -->

            <div class="col-lg-6">
                <div class="card-box">
                    <h4 class="header-title m-t-0">Recent Users</h4>
                    <div class="table-responsive">
                        <table class="table table-hover m-0">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>User Name</th>
                                    <th>Phone</th>
                                    <th>Location</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><span class="avatar-sm-box bg-success">L</span></td>
                                    <td>
                                        <h5 class="m-0">Louis Hansen</h5>
                                        <p class="m-0 text-muted font-13"><small>Web designer</small></p>
                                    </td>
                                    <td>+12 3456 789</td>
                                    <td>USA</td>
                                    <td>07/08/2016</td>
                                </tr>
                                <!-- more rows -->
                            </tbody>
                        </table>
                    </div> <!-- table-responsive -->
                </div>
            </div><!-- end col -->
        </div>
        <!-- end row -->
    </div>
@endsection
