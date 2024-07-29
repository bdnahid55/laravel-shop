@extends('back.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'All Backup')
@section('content')
    {{-- main content --}}

    <div class="row clearfix">
        <div class="col-md-12 mb-30">
            <div class="card-body">

                {{-- alert message --}}
                <div id="success_message"></div>

                <div class="card card-box">
                    <div class="card-header">
                        <h4>All backup List
                            <a href="{{ route('admin.backup.delete-backup') }}" class="btn btn-danger float-end btn-sm">Delete Backups</a>
                            <a href="{{ route('admin.backup.create-new-backup') }}" class="btn btn-success float-end btn-sm">Create new Backup</a>
                        </h4>
                    </div>

                    <div class="card-body">
                        <div class="pd-20">
                            <h4 class="text-blue text-center h4">All Backup list</h4>
                        </div>
                        <div class="pb-20">
                            @if (count($backups) > 0)
                                <ul class="list-group">
                                    @foreach ($backups as $backup)
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            <a class="text-primary"
                                                href="{{ url('backups/laravel/' . $backup->getFilename()) }}"
                                                target="_blank">
                                                {{ $backup->getFilename() }}
                                            </a> <span class="badge badge-primary badge-pill">
                                                {{ number_format($backup->getSize() / (1024 * 1024), 2) }} MB</span>
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <p class="text-center h4">No backup found.</p>
                            @endif

                        </div>

                    </div>
                </div>
            </div>
        </div>

    @endsection


    @push('scripts')
    @endpush
