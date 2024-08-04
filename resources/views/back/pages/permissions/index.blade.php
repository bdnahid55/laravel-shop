@extends('back.layout.datatable-pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'All Permission')
@section('content')
{{-- alert message --}}
<div id="success_message"></div>
<!-- Export Datatable start -->
<div class="card-box mb-30">
    <div class="pd-20">
        <h4 class="text-blue h4">All Permission</h4>
    </div>
    <div class="pb-20">
        <table class="table hover data-table-export nowrap">
            <thead>
                <tr class="text-center">
                    <th class="table-plus datatable-nosort">ID</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($permissions as $key => $permission)
                    <tr>
                        <td class="table-plus">{{ ++$key }}</td>
                        <td>{{ $permission->name }}</td>
                        <td>
                            <a href="{{ route('admin.permissions.edit', $permission->id) }}"
                                class="btn btn-square btn-warning waves-effect waves-light"><i
                                    class="fa fa-pencil"></i></a>
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

