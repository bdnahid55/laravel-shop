@extends('back.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Edit Permission')
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
                            <i class="fas fa-table me-1"></i>Edit permission
                        </div>
                    </div>
                </div>

                <div class="card-body">

                    <form action="{{ route('admin.permissions.update',$permission->id) }}" method="post">
                        @csrf

                        <div class="form-group mb-3">
                            <label for="name">Permission Name</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name', $permission->name) }}" placeholder="Permission Name" required>
                            @error('name')
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


@push('scripts')

@endpush
