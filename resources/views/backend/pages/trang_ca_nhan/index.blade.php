@extends('backend.layouts.master')
@section('title', 'Trang cá nhân')

@section('content')
    <div class="card overflow-hidden">
        <div class="card-body p-0">
            <img src="../../dist/images/backgrounds/profilebg.jpg" alt="" class="img-fluid">
            <div class="row align-items-center">
                <div class="col-lg-4 order-lg-1 order-2">
                </div>
                <div class="col-lg-4 mt-n3 order-lg-2 order-1">
                    <div class="mt-n5">
                        <div class="d-flex align-items-center justify-content-center mb-2">
                            <div class="linear-gradient d-flex align-items-center justify-content-center rounded-circle" style="width: 110px; height: 110px;";>
                                <div class="border border-4 border-white d-flex align-items-center justify-content-center rounded-circle overflow-hidden" style="width: 100px; height: 100px;";>
                                    <img src="../../dist/images/profile/user-1.jpg" alt="" class="w-100 h-100">
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <h5 class="fs-5 mb-0 fw-semibold">Mathew Anderson</h5>
                            <p class="mb-0 fs-4">Designer</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 order-last">
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Cập nhật tài khoản</h3>
                </div>
                <!-- form start -->
                <form role="form">
                    <div class="box-body">
                        <div class="form-group">
                            <label>Tên đăng nhập</label>
                            <input type="text" class="form-control"  placeholder="Enter Username">
                        </div>
                        <div class="form-group">
                            <label>Specialization</label>
                            <input type="text" class="form-control"  placeholder="Enter Specialization">
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" class="form-control"  placeholder="Enter Phone No">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="Email" class="form-control"  placeholder="Enter Email">
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control"  placeholder="Enter your Description"></textarea>
                        </div>

                        <p class="text-muted text-center">Change Password</p>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="Email" class="form-control"  placeholder="Enter Password">
                        </div>

                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="Email" class="form-control"  placeholder="Renter Password">
                        </div>



                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">


                        <button type="submit" class="btn btn-primary">Update</button>

                    </div>
                </form>
            </div>
            <!-- /.box -->


            <!-- /.box-body -->

        </div>
    </div>
@endsection

