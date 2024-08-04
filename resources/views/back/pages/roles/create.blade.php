@extends('back.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Create Role')
@section('content')
    {{-- main content --}}

    <div class="row clearfix">
        <div class="col-sm-12 mb-30">
            <div class="card-body">
                {{-- alert message --}}
                <div id="success_message"></div>

                <div class="card card-box">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-lg-12 margin-tb">
                                <div class="pull-left">
                                    <h2>Create New Role</h2>
                                </div>
                                <div class="pull-right">
                                    <a class="btn btn-primary btn-sm mb-2" href="{{ route('admin.roles.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">

                        <form method="POST" action="{{ route('admin.roles.store') }}">
                            @csrf
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Role Name:</strong>
                                        <input type="text" name="name" value="{{ old('name') }}" placeholder="Role Name" class="form-control">
                                        @error('name')
                                            <div style="color: red">{{ $message }}</div><br>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Permission:</strong><br>
                                        @error('permission')
                                            <div style="color: red">{{ $message }}</div><br>
                                        @enderror

                                        @if ($permissions->isNotEmpty())
                                            @foreach ($permissions as $permission)
                                                <input type="checkbox" class="form-check-input ms-2 mb-4" name="permission[]" id="permission-{{ $permission->id }}" value="{{ $permission->name }}" >
                                                <label for="permission-{{ $permission->id }}">{{ $permission->name }}</label>
                                            @endforeach
                                        @endif

                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary btn-sm mb-3"><i class="fa-solid fa-floppy-disk"></i>Save</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

    @endsection


    @push('scripts')
    @endpush
