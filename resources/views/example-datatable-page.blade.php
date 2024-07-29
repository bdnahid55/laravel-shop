@extends('back.layout.datatable-pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page title here')
@section('content')
    <!-- Export Datatable start -->
    <div class="card-box mb-30">
        <div class="pd-20">
            <h4 class="text-blue h4">Data Table with Export Buttons</h4>
        </div>
        <div class="pb-20">
            <table class="table hover multiple-select-row data-table-export nowrap">
                <thead>
                    <tr>
                        <th class="table-plus datatable-nosort">Name</th>
                        <th>Age</th>
                        <th>Office</th>
                        <th>Address</th>
                        <th>Start Date</th>
                        <th>Salart</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="table-plus">Gloria F. Mead</td>
                        <td>25</td>
                        <td>Sagittarius</td>
                        <td>2829 Trainer Avenue Peoria, IL 61602</td>
                        <td>29-03-2018</td>
                        <td>$162,700</td>
                    </tr>
                    <tr>
                        <td class="table-plus">Andrea J. Cagle</td>
                        <td>30</td>
                        <td>Gemini</td>
                        <td>1280 Prospect Valley Road Long Beach, CA 90802</td>
                        <td>29-03-2018</td>
                        <td>$162,700</td>
                    </tr>
                    <tr>
                        <td class="table-plus">Andrea J. Cagle</td>
                        <td>20</td>
                        <td>Gemini</td>
                        <td>2829 Trainer Avenue Peoria, IL 61602</td>
                        <td>29-03-2018</td>
                        <td>$162,700</td>
                    </tr>
                    <tr>
                        <td class="table-plus">Andrea J. Cagle</td>
                        <td>30</td>
                        <td>Sagittarius</td>
                        <td>1280 Prospect Valley Road Long Beach, CA 90802</td>
                        <td>29-03-2018</td>
                        <td>$162,700</td>
                    </tr>
                    <tr>
                        <td class="table-plus">Andrea J. Cagle</td>
                        <td>25</td>
                        <td>Gemini</td>
                        <td>2829 Trainer Avenue Peoria, IL 61602</td>
                        <td>29-03-2018</td>
                        <td>$162,700</td>
                    </tr>
                    <tr>
                        <td class="table-plus">Andrea J. Cagle</td>
                        <td>20</td>
                        <td>Sagittarius</td>
                        <td>1280 Prospect Valley Road Long Beach, CA 90802</td>
                        <td>29-03-2018</td>
                        <td>$162,700</td>
                    </tr>
                    <tr>
                        <td class="table-plus">Andrea J. Cagle</td>
                        <td>18</td>
                        <td>Gemini</td>
                        <td>1280 Prospect Valley Road Long Beach, CA 90802</td>
                        <td>29-03-2018</td>
                        <td>$162,700</td>
                    </tr>
                    <tr>
                        <td class="table-plus">Andrea J. Cagle</td>
                        <td>30</td>
                        <td>Sagittarius</td>
                        <td>1280 Prospect Valley Road Long Beach, CA 90802</td>
                        <td>29-03-2018</td>
                        <td>$162,700</td>
                    </tr>
                    <tr>
                        <td class="table-plus">Andrea J. Cagle</td>
                        <td>30</td>
                        <td>Sagittarius</td>
                        <td>1280 Prospect Valley Road Long Beach, CA 90802</td>
                        <td>29-03-2018</td>
                        <td>$162,700</td>
                    </tr>
                    <tr>
                        <td class="table-plus">Andrea J. Cagle</td>
                        <td>30</td>
                        <td>Gemini</td>
                        <td>1280 Prospect Valley Road Long Beach, CA 90802</td>
                        <td>29-03-2018</td>
                        <td>$162,700</td>
                    </tr>
                    <tr>
                        <td class="table-plus">Andrea J. Cagle</td>
                        <td>30</td>
                        <td>Gemini</td>
                        <td>1280 Prospect Valley Road Long Beach, CA 90802</td>
                        <td>29-03-2018</td>
                        <td>$162,700</td>
                    </tr>
                    <tr>
                        <td class="table-plus">Andrea J. Cagle</td>
                        <td>30</td>
                        <td>Gemini</td>
                        <td>1280 Prospect Valley Road Long Beach, CA 90802</td>
                        <td>29-03-2018</td>
                        <td>$162,700</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Export Datatable End -->
@endsection
