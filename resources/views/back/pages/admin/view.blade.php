@extends('back.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Preview Admin Details')
@section('content')
    {{-- main content --}}

    <div class="row clearfix">
        <div class="col-sm-12 mb-30">
            <div class="card-body">

                <div class="card card-box">

                    <div class="card-body">
                        <h2>Name : {{ $preview_admin->name }}</h2><br>
                        <h2>User Name : {{ $preview_admin->username }}</h2><br>
                        <h2>Email : {{ $preview_admin->email }}</h2><br>
                        Profile Picture : <img width="200" height="200" src="/uploads/admin/{{ $preview_admin->image }}">
                    </div>
                </div>
            </div>
        </div>

@endsection

@push('scripts')
@endpush
