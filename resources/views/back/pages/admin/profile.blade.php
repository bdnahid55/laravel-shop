@extends('back.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Admin profile')
@section('content')
    <div class="row">

        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mb-5">
            <div class="pd-20 card-box height-100-p">
                <div class="profile-photo">
                    @if ($admin->image)
                        <img src="/uploads/admin/{{ $admin->image }}" alt="user" />
                    @else
                        <img src="/back/vendors/images/profile-photo.jpg" alt="user" class="avatar-photo">
                    @endif

                </div>
                <h5 class="text-center h5 mb-0">{{ $admin->name }}</h5>
                <p class="text-center text-muted font-14">
                    User Name: {{ $admin->username }} <br>
                    Email: {{ $admin->email }}
                </p>

            </div>
        </div>

        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 mb-30">
            <div class="card-box height-100-p overflow-hidden">
                @if (Session::get('fail'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        {{ Session::get('fail') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                @endif

                @if (Session::get('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ Session::get('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                @endif

                <div class="profile-tab height-100-p">
                    <div class="tab height-100-p">
                        <ul class="nav nav-tabs customtab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#UpdatePassword" role="tab"
                                    aria-selected="false">Update Password</a>
                            </li>
                        </ul>
                        <div class="tab-content">

                            <!-- UpdatePassword Tab start -->
                            <div class="tab-pane fade active show" id="UpdatePassword" role="tabpanel">
                                <div class="pd-20 profile-task-wrap">
                                    <!-- Update Password Form -->

                                    <form method="POST" action="{{ route('admin.password-update', $admin->id) }}">
                                        @csrf

                                        <div class="form-group">
                                            <label for="old_password">Old Password</label>
                                            <input type="password" id="old_password" name="old_password"
                                                class="form-control" required>
                                            @error('old_password')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="new_password">New Password</label>
                                            <input type="password" id="new_password" name="new_password"
                                                class="form-control" required>
                                            @error('new_password')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="new_password_confirmation">Confirm New Password</label>
                                            <input type="password" id="new_password_confirmation"
                                                name="new_password_confirmation" class="form-control" required>
                                            @error('new_password_confirmation')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <button type="submit" class="btn btn-primary">Update Password</button>
                                    </form>
                                </div>
                            </div>
                            <!-- UpdatePassword Tab End -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
