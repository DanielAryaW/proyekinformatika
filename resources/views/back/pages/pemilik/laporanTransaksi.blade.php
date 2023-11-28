@extends('back.layout-pemilik.laporanTransaksi-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Laporan Transaksi')
@section('content')

    <div class="pd-20">
        <h4 class="text-blue h4">Laporan Transaksi</h4>
    </div>
    <div class="pb-20">
        <div id="DataTables_Table_2_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
            <table class="table hover multiple-select-row data-table-export nowrap dataTable no-footer dtr-inline collapsed"
                id="DataTables_Table_2" role="grid">
                <thead>
                    <tr role="row">
                        <th class="table-plus datatable-nosort sorting_asc" rowspan="1" colspan="1" aria-label="Name">
                            Name</th>
                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1"
                            aria-label="Age: activate to sort column ascending">Age</th>
                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1"
                            aria-label="Office: activate to sort column ascending">Office</th>
                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1"
                            aria-label="Address: activate to sort column ascending" style="">Address</th>
                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1"
                            aria-label="Start Date: activate to sort column ascending" style="display: none;">Start Date
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1" colspan="1"
                            aria-label="Salart: activate to sort column ascending" style="display: none;">Salart</th>
                    </tr>
                </thead>
                <tbody>
                    <tr role="row" class="odd">
                        <td class="table-plus sorting_1" tabindex="0">Andrea J. Cagle</td>
                        <td>30</td>
                        <td>Gemini</td>
                        <td style="">1280 Prospect Valley Road Long Beach, CA 90802</td>
                        <td style="display: none;">29-03-2018</td>
                        <td style="display: none;">$162,700</td>
                    </tr>
                    <tr role="row" class="even">
                        <td class="table-plus sorting_1" tabindex="0">Andrea J. Cagle</td>
                        <td>20</td>
                        <td>Gemini</td>
                        <td style="">2829 Trainer Avenue Peoria, IL 61602</td>
                        <td style="display: none;">29-03-2018</td>
                        <td style="display: none;">$162,700</td>
                    </tr>
                    <tr role="row" class="odd">
                        <td class="table-plus sorting_1" tabindex="0">Andrea J. Cagle</td>
                        <td>30</td>
                        <td>Sagittarius</td>
                        <td style="">1280 Prospect Valley Road Long Beach, CA 90802</td>
                        <td style="display: none;">29-03-2018</td>
                        <td style="display: none;">$162,700</td>
                    </tr>
                    <tr role="row" class="even">
                        <td class="table-plus sorting_1" tabindex="0">Andrea J. Cagle</td>
                        <td>25</td>
                        <td>Gemini</td>
                        <td style="">2829 Trainer Avenue Peoria, IL 61602</td>
                        <td style="display: none;">29-03-2018</td>
                        <td style="display: none;">$162,700</td>
                    </tr>
                    <tr role="row" class="odd">
                        <td class="table-plus sorting_1" tabindex="0">Andrea J. Cagle</td>
                        <td>20</td>
                        <td>Sagittarius</td>
                        <td style="">1280 Prospect Valley Road Long Beach, CA 90802</td>
                        <td style="display: none;">29-03-2018</td>
                        <td style="display: none;">$162,700</td>
                    </tr>
                    <tr role="row" class="even">
                        <td class="table-plus sorting_1" tabindex="0">Andrea J. Cagle</td>
                        <td>18</td>
                        <td>Gemini</td>
                        <td style="">1280 Prospect Valley Road Long Beach, CA 90802</td>
                        <td style="display: none;">29-03-2018</td>
                        <td style="display: none;">$162,700</td>
                    </tr>
                    <tr role="row" class="odd">
                        <td class="table-plus sorting_1" tabindex="0">Andrea J. Cagle</td>
                        <td>30</td>
                        <td>Sagittarius</td>
                        <td style="">1280 Prospect Valley Road Long Beach, CA 90802</td>
                        <td style="display: none;">29-03-2018</td>
                        <td style="display: none;">$162,700</td>
                    </tr>
                    <tr role="row" class="even">
                        <td class="table-plus sorting_1" tabindex="0">Andrea J. Cagle</td>
                        <td>30</td>
                        <td>Sagittarius</td>
                        <td style="">1280 Prospect Valley Road Long Beach, CA 90802</td>
                        <td style="display: none;">29-03-2018</td>
                        <td style="display: none;">$162,700</td>
                    </tr>
                    <tr role="row" class="odd">
                        <td class="table-plus sorting_1" tabindex="0">Andrea J. Cagle</td>
                        <td>30</td>
                        <td>Gemini</td>
                        <td style="">1280 Prospect Valley Road Long Beach, CA 90802</td>
                        <td style="display: none;">29-03-2018</td>
                        <td style="display: none;">$162,700</td>
                    </tr>
                    <tr role="row" class="even">
                        <td class="table-plus sorting_1" tabindex="0">Andrea J. Cagle</td>
                        <td>30</td>
                        <td>Gemini</td>
                        <td style="">1280 Prospect Valley Road Long Beach, CA 90802</td>
                        <td style="display: none;">29-03-2018</td>
                        <td style="display: none;">$162,700</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
