@extends('dashboard.auth.auth')


@section('title')
    Login
@endsection

@section('content')
    <!-- auth page content -->
    <div class="auth-page-content">
        <div class="container">
            <div class="loginn">
                <div class="row ">
                    <div class="col-md-6">
                        <div class="left_login">
                                <div class="card_log">
                                    <div class="text-center ">
                                        <h4 class="text-muted slide_animation">مضياف</p>
                                    </div>
                                        <form class="needs-validation" novalidate action="{{ route('admin.login.post') }}"
                                            method="POST">
                                            @csrf

                                            <div class="mb-3 slide_animation">
                                                <label for="useremail" class="form-label">Email <span
                                                        class="text-danger">*</span></label>
                                                <input type="email" class="form-control" id="useremail" name="email"
                                                    placeholder="Enter email address" required>
                                                <div class="invalid-feedback">
                                                    Please enter email
                                                </div>
                                            </div>


                                            <div class="mb-3 slide_animation">
                                                <label class="form-label" for="password-input">Password</label>
                                                <div class="position-relative auth-pass-inputgroup">
                                                    <input type="password" class="form-control pe-5 password-input"
                                                        name="password" onpaste="return false" placeholder="Enter password"
                                                        id="password-input" aria-describedby="passwordInput" required>
                                                    <button
                                                        class="btn btn-link position-absolute end-0 top-0 text-decoration-none shadow-none text-muted password-addon"
                                                        type="button" id="password-addon"><i
                                                            class="ri-eye-fill align-middle"></i></button>
                                                    <div class="invalid-feedback">
                                                        Please enter password
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="mb-4">
                                            </div>

                                            <div class="mt-4 slide_animation">
                                                <button class="btn btn-success w-100" type="submit">Login</button>
                                            </div>

                                            <div class="mt-4 text-center">

                                            </div>
                                        </form>

                                </div>
                                <!-- end card body -->
                            <!-- end card -->
                        </div>
                    </div>
                    <div class="col-md-6  ">

<img src="{{ asset('img/logo.svg') }}" alt="" class="logo_login">


                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end auth page content -->
@endsection
