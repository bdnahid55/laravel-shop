@extends('back.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Home')
@section('content')

    <!-- Preloader Start  -->
    <div class="pre-loader">
        <div class="pre-loader-box">
            <div class="loader-logo">
                <img src="/back/vendors/images/deskapp-logo.svg" alt="" />
            </div>
            <div class="loader-progress" id="progress_div">
                <div class="bar" id="bar1"></div>
            </div>
            <div class="percent" id="percent1">0%</div>
            <div class="loading-text">Loading...</div>
        </div>
    </div>
    <!-- Preloader End  -->

    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-30">
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
            </div>
        </div>
    </div>  <!-- End of Notification alert -->

    {{-- code start --}}
    <div class="row">
        <div class="col-sm-12 col-md-4 mb-30">
            <div class="card text-white bg-success card-box text-center">
                <div class="card-body">
                    <h5 class="card-title text-white">Total Admin</h5>
                    <p class="card-text">
                        {{ $TotalAdmin }}
                    </p>
                </div>
            </div>
        </div>
    </div>

@endsection
