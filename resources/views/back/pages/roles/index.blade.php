@extends('back.layout.datatable-pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'All Role list')
@section('content')
    {{-- alert message --}}
    <div id="success_message"></div>
    <!-- Export Datatable start -->
    <div class="card-box mb-20">
        <div class="pd-10 d-flex">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h3>Role Management</h3>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success btn-sm" href="{{ route('admin.roles.create') }}"><i class="fa fa-plus"></i> Create New Role</a>
                </div>
            </div>
        </div><hr>


        <div class="pb-20">
            <table class="table hover data-table-export nowrap">
                <thead>
                    <tr class="text-left">
                        <th class="table-plus datatable-nosort">No</th>
                        <th>Name</th>
                        {{-- <th>Permissions</th> --}}
                        <th width="180px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($roles as $key => $role)
                        <tr>
                            <td class="table-plus">{{ ++$key }}</td>
                            <td>{{ $role->name }}</td>
                            {{-- <td>{{ $role->permissions->pluck('name')->implode(', ') }}</td> --}}
                            <td>
                                <a class="btn btn-primary btn-sm" href="{{ route('admin.roles.show', $role->id) }}"><i class="fa fa-eye"></i></a>

                                <a class="btn btn-warning btn-sm" href="{{ route('admin.roles.edit', $role->id) }}"><i class="fa fa-pencil"></i></a>

                                <form method="post" action="{{ route('admin.roles.destroy', $role->id) }}" style="display:inline">
                                    @csrf
                                    <button type="submit" onclick="return confirm('Are you sure you want to delete this role?')" class="btn btn-danger btn-sm"><i class="fa fa-close"></i></button>
                                </form>

                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="100%" class="text-center">No data found</td>
                        </tr>
                    @endforelse

                </tbody>
            </table>

        </div>
    </div>
    <!-- Export Datatable End -->

@endsection
