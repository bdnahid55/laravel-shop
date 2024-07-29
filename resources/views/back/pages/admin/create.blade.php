@extends('back.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Create Admin user')
@section('content')
    {{-- main content --}}

    <div class="row clearfix">
        <div class="col-sm-12 mb-30">
            <div class="card-body">
                <!-- alert -->
                <?php if( Session::get('success') != null){ ?>

                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <div class="alert-icon">
                        <i class="icon-check"></i>
                    </div>
                    <div class="alert-message">
                        <span><strong><?php echo Session::get('success'); ?> </strong></span>
                    </div>
                </div>
                <?php Session::put('success',null); } ?>

                <?php if( Session::get('failed') != null){ ?>

                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <div class="alert-icon">
                        <i class="icon-close"></i>
                    </div>
                    <div class="alert-message">
                        <span><strong><?php echo Session::get('failed'); ?> </strong></span>
                    </div>
                </div>
                <?php Session::put('failed',null); } ?>
                <!-- end alert -->

                {{-- alert message --}}
                <div id="success_message"></div>

                <div class="card card-box">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-12">
                                <i class="fas fa-table me-1"></i>Create New Admin User
                            </div>
                        </div>
                    </div>

                    <div class="card-body">

                        <form action="{{ route('admin.admins.insert-admins') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group mb-3">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Name" required>
                                @error('name')
                                    <div style="color: red">{{ $message }}</div><br>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="username">Username</label>
                                <input type="text" name="username" class="form-control" value="{{ old('username') }}" placeholder=" Set your username" required>
                                @error('username')
                                    <div style="color: red">{{ $message }}</div><br>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="Email" required>
                                @error('email')
                                    <div style="color: red">{{ $message }}</div><br>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="password">Password</label>
                                <input type="text" name="password" class="form-control" value="{{ old('password') }}" placeholder="Write strong password" required>
                                @error('password')
                                    <div style="color: red">{{ $message }}</div><br>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Upload Profile Picture</label><br>
                                <div style="color: red">[Note: Profile picture need to be 80x80]</div>
                                <input type="file" class="form-control" name="image"/>

                                @error('image')
                                    <div style="color: red">{{ $message }}</div><br>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-primary">Create</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>

    @endsection


    @push('scripts')

    @endpush
