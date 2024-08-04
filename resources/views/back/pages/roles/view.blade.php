@extends('back.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Preview Role Details')
@section('content')
    {{-- main content --}}

    <div class="row clearfix">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Role</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('admin.roles.index') }}"> Back</a>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $role->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Permissions:</strong>
                @if (!empty($rolePermissions))
                    @foreach ($rolePermissions as $v)
                    <button type="button" class="btn btn-primary btn-sm mb-2">
                        {{ $v->name }}
                        <span class="sr-only">{{ $v->name }},</span>
                    </button>

                    @endforeach
                @endif
            </div>
        </div>

    @endsection

    @push('scripts')
    @endpush
