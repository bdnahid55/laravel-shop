@extends('back.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Edit Admin')
@section('content')
{{-- main content --}}

<div class="row clearfix">
<div class="col-sm-12 mb-30">
    <div class="card-body">
        {{-- alert message --}}
        <div id="success_message"></div>

        <div class="card card-box">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-12">
                        <i class="fas fa-table me-1"></i>Edit Admin
                    </div>
                </div>
            </div>

            <div class="card-body">
                <form action="{{ route('admin.admins.update-admins',$admin_data->id) }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group mb-3">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" value="{{ $admin_data->name }}" placeholder="Name" required>
                        @error('name')
                            <div style="color: red">{{ $message }}</div><br>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="username">User Name</label>
                        <input type="text" name="username" class="form-control" value="{{ $admin_data->username }}" placeholder="username" required>
                        @error('username')
                            <div style="color: red">{{ $message }}</div><br>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" value="{{ $admin_data->email }}" placeholder="Email" required>
                        @error('email')
                            <div style="color: red">{{ $message }}</div><br>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Write strong password">
                        @error('password')
                            <div style="color: red">{{ $message }}</div><br>
                        @enderror
                    </div>

                    <div class="form-group">
                    <label>Upload Profile Picture</label><br>
                        <div style="color: red">[Note: Profile picture need to be 80x80]</div>

                        @if ($admin_data->image == null)
                            <p></p>
                        @else
                            <p>Old Image: <img width="100" height="100" src="{{url('uploads/admin',$admin_data->image)}}"> <br><br></p>
                        @endif

                        <input type="file" name="image" class="form-control-file form-control height-auto">
                        @error('image')
                            <div style="color: red">{{ $message }}</div><br>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>

@endsection
