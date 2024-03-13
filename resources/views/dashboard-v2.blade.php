@extends('layouts.app')

@section('title', 'Dashboard')

@section('content_header')
    @isset($error)
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-ban"></i> Gagal!</h5>
            {{ $error }}
        </div>
    @endisset
    @isset($success)
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-check"></i> Berhasil!</h5>
            {{ $success }}
        </div>
    @endisset
    <h1>
        Dashboard
    </h1>
@endsection

@section('content')
        <input type="hidden" id="suppliersCount" value="{{ $suppliersCount }}">
        <input type="hidden" id="zonesCount" value="{{ $zonesCount }}">
        <input type="hidden" id="partnersCount" value="{{ $partnersCount }}">
        <input type="hidden" id="itemSoldCount" value="{{ $itemSoldCount }}">
        <input type="hidden" id="sellListCount" value="{{ $sellListCount }}">
        <input type="hidden" id="scheduleSOCount" value="{{ $scheduleSOCount }}">
        <form action="{{ route('dashboard') }}" id="theForm">
            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <input type="date" name="filterStart" id="filterStart" class="form-control" value="{{ $filterStart ?? '' }}">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <input type="date" name="filterEnd" id="filterEnd" class="form-control" value="{{ $filterEnd ?? '' }}">
                    </div>
                </div>
                <div class="col-md-1">
                    <button class="btn btn-primary">Filter</button>
                </div>
            </div>
        </form>
        <div class="row mb-4">
            <div class="col-md-4">
                <h4>Asset Gudang</h4>
                <select id="assetGudang">
                    <option value="ALL" selected>ALL</option>
                </select>
                <div>
                    <table class="table table-bordered table-hover" id="asset-gudang-list">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Jenis</th>
                                <th>Jumlah Obat</th>
                                <th>Total Aset</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                        <tfoot>
                            <th colspan="2"></th>
                            <th></th>
                            <th></th>
                        </tfoot>
                    </table>
                </div>                
            </div>
            <div class="col-md-4">
                <h4>Master SKU</h4>
                <div>
                    <table class="table table-bordered table-hover" id="master-sku-list">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Supplier</th>
                                <th>Jumlah SKU</th>
                                <th>SKU Tersedia</th>
                                <th>Jumlah Obat</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                        <tfoot>
                            <th colspan="2"></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tfoot>
                    </table>
                </div>                
            </div>
            <div class="col-md-4">
                <h4>Penjualan</h4>
                <select id="penjualan">
                    <option value="Supplier" selected>SUPPLIER</option>
                    <option value="Layanan">LAYANAN</option>
                </select>
                <div>
                    <table class="table table-bordered table-hover" id="penjualan-list">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Jenis</th>
                                <th>Jumlah Obat</th>
                                <th>Total Harga</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                        <tfoot>
                            <th colspan="2"></th>
                            <th></th>
                            <th></th>
                        </tfoot>
                    </table>
                </div>                
            </div>
        </div>
        <div class="row mb-4"> 
            <div class="col-md-4">
                <h4>List Permintaan</h4>
                <div>
                    <table class="table table-bordered table-hover" id="list-permintaan">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Jenis</th>
                                <th>Jumlah Permintaan</th>
                                <th>Jumlah Obat</th>
                                <th>Total Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot>
                            <th colspan="2"></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tfoot>
                    </table>
                </div>                
            </div>
            <div class="col-md-4">
                <h4>List Pengiriman</h4>
                <div>
                    <table class="table table-bordered table-hover" id="list-pengiriman">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Jenis</th>
                                <th>Jumlah Pengiriman</th>
                                <th>Jumlah Obat</th>
                                <th>Total Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot>
                            <th colspan="2"></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tfoot>
                    </table>
                </div>                
            </div>
            <div class="col-md-4">
                <h4>Penjualan Klinik</h4>
                <select id="penjualan-klinik">
                    <option value="ALL" selected>ALL</option>
                    <option value="1">REGULER</option>
                    <option value="5">KONSINYASI</option>
                </select>
                <div>
                    <table class="table table-bordered table-hover" id="penjualan-klinik-list">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Klinik</th>
                                <th>Jumlah Obat</th>
                                <th>Total Harga</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                        <tfoot>
                            <th colspan="2"></th>
                            <th></th>
                            <th></th>
                        </tfoot>
                    </table>
                </div>                
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-md-4">
                <h4>List Permintaan Klinik</h4>
                <select id="permintaan-klinik">
                    <option value="ALL" selected>ALL</option>
                    <option value="Reguler">REGULER</option>
                    <option value="Konsinyasi">KONSINYASI</option>
                </select>
                <div>
                    <table class="table table-bordered table-hover" id="permintaan-klinik-list">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Klinik</th>
                                <th>Jumlah Permintaan</th>
                                <th>Jumlah Obat</th>
                                <th>Total Harga</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                        <tfoot>
                            <th colspan="2"></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tfoot>
                    </table>
                </div>                
            </div>
            <div class="col-md-4">
                <h4>List Pengiriman Klinik</h4>
                <select id="pengiriman-klinik">
                    <option value="ALL" selected>ALL</option>
                    <option value="1">REGULER</option>
                    <option value="2">KONSINYASI</option>
                </select>
                <div>
                    <table class="table table-bordered table-hover" id="pengiriman-klinik-list">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Klinik</th>
                                <th>Jumlah Pengiriman</th>
                                <th>Jumlah Obat</th>
                                <th>Total Harga</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                        <tfoot>
                            <th colspan="2"></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tfoot>
                    </table>
                </div>                
            </div>
            <div class="col-md-4">
                <h4>Penjualan Klinik</h4>
                <select id="penjualan-klinik-doc">
                    <option value="ALL" selected>ALL</option>
                    <option value="1">REGULER</option>
                    <option value="5">KONSINYASI</option>
                </select>
                <div>
                    <table class="table table-bordered table-hover" id="penjualan-klinik-doc-list">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No DOC/SO</th>
                                <th>Jumlah Obat</th>
                                <th>Total Harga</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                        <tfoot>
                            <th colspan="2"></th>
                            <th></th>
                            <th></th>
                        </tfoot>
                    </table>
                </div>                
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-md-4">
                <h4>SO</h4>
                <div>
                    <table class="table table-bordered table-hover" id="so-list">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Wilayah</th>
                                <th>Jumlah SO</th>
                                <th>Jumlah Obat</th>
                                <th>Total Harga</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                        <tfoot>
                            <th colspan="2"></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tfoot>
                    </table>
                </div>                
            </div>
            <div class="col-md-4">
                <h4>SP</h4>
                <select id="sp">
                    <option value="ALL" selected>ALL</option>
                </select>
                <div>
                    <table class="table table-bordered table-hover" id="sp-list">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Supplier</th>
                                <th>Jumlah SP</th>
                                <th>Jumlah Obat</th>
                                <th>Total Harga</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                        <tfoot>
                            <th colspan="2"></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tfoot>
                    </table>
                </div>                
            </div>
            <div class="col-md-4">
                <h4>Mitra</h4>
                <div>
                    <table class="table table-bordered table-hover" id="mitra-list">
                        <thead>
                            <tr>
                                <th width="50">No</th>
                                <th>Wilayah</th>
                                <th width="50">Jumlah Mitra</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                        <tfoot>
                            <th colspan="2"></th>
                            <th></th>
                        </tfoot>
                    </table>
                </div>                
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-md-4">
                <h4>SO Klinik</h4>
                <div>
                    <table class="table table-bordered table-hover" id="so-klinik-list">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Klinik</th>
                                <th>Jumlah SO</th>
                                <th>Jumlah Obat</th>
                                <th>Total Harga</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                        <tfoot>
                            <th colspan="2"></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tfoot>
                    </table>
                </div>                
            </div>
            <div class="col-md-4">
                <h4>Obat Terlaris</h4>
                <select id="obat-terlaris">
                    <option value="ALL" selected>ALL</option>
                    <option value="1">REGULER</option>
                    <option value="2">KONSINYASI</option>
                </select>
                <div>
                    <table class="table table-bordered table-hover" id="obat-terlaris-list">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID - Nama Obat</th>
                                <th>Supplier</th>
                                <th>Jumlah Obat</th>
                                <th>Total Harga</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                        <tfoot>
                            <th colspan="3"></th>
                            <th></th>
                            <th></th>
                        </tfoot>
                    </table>
                </div>                
            </div>           
            <div class="col-md-4">
                <h4>Supplier</h4>
                <div>
                    <table class="table table-bordered table-hover" id="supplier-list">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Supplier</th>
                                <th>Jumlah SKU</th>
                                <th>SKU Tersedia</th>
                                <th>Total Harga</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                        <tfoot>
                            <th colspan="2"></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tfoot>
                    </table>
                </div>                
            </div> 
        </div>
        <div class="row mb-4">
            <div class="col-md-6">
                <h4>Jadwal SO Klinik</h4>
                <div>
                    <table class="table table-bordered table-hover" id="so-klinik-schedule-list">
                        <thead>
                            <tr>
                                <th width="50">No</th>
                                <th>Nama Klinik</th>
                                <th>Jadwal SO</th>
                                <th>Jumlah Obat</th>
                                <th>Total Harga</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                        <tfoot>
                            <th colspan="3"></th>
                            <th></th>
                            <th></th>
                        </tfoot>
                    </table>
                </div>                
            </div>
        </div>
@endsection

@section('extra-css')
    <style scoped>
        .content_header{
            display: flex;
            justify-content: space-between;
        }

        .table{
            width: 100% !important;
        }

        .fw-bold{
            font-weight: bold;
        }

        .select2-container{
            width: 100% !important;
            margin-bottom: 1rem;
        }

        .select2-container .select2-selection--single {
            height: calc(2.25rem + 2px);
            border: 1px solid #ced4da !important;
        }

        .select2-container .select2-selection--single .select2-selection__rendered {
            line-height: 1.5;
            padding: .375rem .75rem;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: calc(2.25rem + 2px);
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow b {
            border-color: #555 transparent transparent transparent;
            border-style: solid;
            border-width: 5px 4px 0 4px;
            height: 0;
            left: 50%;
            margin-left: -4px;
            margin-top: -2px;
            position: absolute;
            top: 50%;
            width: 0;
        }
    </style>
@endsection

@section('extra-js')
    <script type="text/javascript">

        $(document).ready(function() {
            let filterStart = '{{ $filterStart == '' ? 'ALL' : $filterStart }}'
            let filterEnd = '{{ $filterEnd == '' ? 'ALL' : $filterEnd }}'
            let suppliersCount = $('#suppliersCount').val()
            let zonesCount = $('#zonesCount').val()
            let partnersCount = $('#partnersCount').val()
            let itemSoldCount = $('#itemSoldCount').val()
            let sellListCount = $('#sellListCount').val()
            let scheduleSOCount = $('#scheduleSOCount').val()
            
            let supplierAssetGudang = $('#assetGudang').val()
            let typePenjualan = $('#penjualan').val()
            let typeSP = $('#sp').val()
            let typePermintaanKlinik = $('#permintaan-klinik').val()
            let typePengirimanKlinik = $('#pengiriman-klinik').val()
            let typePenjualanKlinik = $('#penjualan-klinik').val()
            let typePenjualanKlinikDoc = $('#penjualan-klinik-doc').val()
            let typeObatTerlaris = $('#obat-terlaris').val()

            function initAssetGudangDT(){
                tableAssetGudang = $('#asset-gudang-list').DataTable({
                    "scrollX": true,
                    "processing": true,
                    "serverSide": true,
                    "ajax": {
                        "url": "{{ route('dashboard.asset-gudang') }}",
                        "type": "GET",
                        "data": {
                            "supplier": supplierAssetGudang,
                            "filterStart": filterStart,
                            "filterEnd": filterEnd,
                        }
                    },
                    "columnDefs": [
                        {
                            "data": "no",
                            "name": "no",
                            "targets": 0
                        },
                        {
                            "data": "jenis",
                            "name": "jenis",
                            "targets": 1
                        },
                        {
                            "data": "jumlah_obat",
                            "name": "jumlah_obat",
                            "targets": 2
                        },
                        {
                            "data": "total_aset",
                            "name": "total_aset",
                            "targets": 3
                        }
                    ],
                    order: [],
                    searching: false,
                    lengthChange: false,
                    paging: false,
                    ordering: false,
                    info: false,
                    search: {
                        smart: false,
                        "caseInsensitive": false
                    },
                    "createdRow": function(row, data, dataIndex) {
                        if(dataIndex < 2){
                            $(row).find('td').first().text((tableAssetGudang.page() * tableAssetGudang.page.len()) + dataIndex + 1);
                        }
                        else{
                            $(row).find('td').hide()
                        }
                    },
                    "footerCallback": function (tfoot, data, start, end, display) {
                        $(tfoot).children('th:nth-child(1)').text(data[end-1].no);
                        $(tfoot).children('th:nth-child(2)').text(data[end-1].jenis);
                        $(tfoot).children('th:nth-child(3)').text(data[end-1].jumlah_obat);
                        $(tfoot).children('th:nth-child(4)').text(data[end-1].total_aset);
                    },
                })
            }

            function initMasterSKUListDT(){
                tableMasterSKUList = $('#master-sku-list').DataTable({
                    "scrollX": true,
                    "processing": true,
                    "serverSide": true,
                    "ajax": {
                        "url": "{{ route('dashboard.master-sku-list') }}",
                        "type": "GET",
                        "data": {
                            "filterStart": filterStart,
                            "filterEnd": filterEnd,
                        }
                    },
                    "columnDefs": [
                        {
                            "data": "no",
                            "name": "no",
                            "targets": 0
                        },
                        {
                            "data": "nama_supplier",
                            "name": "nama_supplier",
                            "targets": 1
                        },
                        {
                            "data": "jumlah_sku",
                            "name": "jumlah_sku",
                            "targets": 2
                        },
                        {
                            "data": "sku_tersedia",
                            "name": "sku_tersedia",
                            "targets": 3
                        },
                        {
                            "data": "jumlah_obat",
                            "name": "jumlah_obat",
                            "targets": 4
                        }
                    ],
                    order: [],
                    searching: false,
                    lengthChange: false,
                    paging: false,
                    ordering: false,
                    info: false,
                    search: {
                        smart: false,
                        "caseInsensitive": false
                    },
                    "createdRow": function(row, data, dataIndex) {
                        if(dataIndex < suppliersCount){
                            $(row).find('td').first().text((tableMasterSKUList.page() * tableMasterSKUList.page.len()) + dataIndex + 1);
                        }
                        else{
                            $(row).find('td').hide()
                        }
                    },
                    "footerCallback": function (tfoot, data, start, end, display) {
                        $(tfoot).children('th:nth-child(1)').text(data[end-1].no);
                        $(tfoot).children('th:nth-child(2)').text(data[end-1].nama_supplier);
                        $(tfoot).children('th:nth-child(3)').text(data[end-1].jumlah_sku);
                        $(tfoot).children('th:nth-child(4)').text(data[end-1].sku_tersedia);
                    },
                })
            }

            function initPenjualanDT(){
                tablePenjualan = $('#penjualan-list').DataTable({
                    "scrollX": true,
                    "scrollY": "300px",
                    "scrollCollapse": true,
                    "processing": true,
                    "serverSide": true,
                    "ajax": {
                        "url": "{{ route('dashboard.penjualan') }}",
                        "type": "GET",
                        "data": {
                            "type": typePenjualan,
                            "filterStart": filterStart,
                            "filterEnd": filterEnd,
                        }
                    },
                    "columnDefs": [
                        {
                            "data": "no",
                            "name": "no",
                            "targets": 0
                        },
                        {
                            "data": "jenis",
                            "name": "jenis",
                            "targets": 1
                        },
                        {
                            "data": "jumlah_obat",
                            "name": "jumlah_obat",
                            "targets": 2
                        },
                        {
                            "data": "total_harga",
                            "name": "total_harga",
                            "targets": 3
                        }
                    ],
                    order: [],
                    searching: false,
                    lengthChange: false,
                    paging: false,
                    ordering: false,
                    info: false,
                    search: {
                        smart: false,
                        "caseInsensitive": false
                    },
                    "createdRow": function(row, data, dataIndex) {
                        if(typePenjualan == 'Layanan'){
                            length = 2
                        }
                        else{
                            length = suppliersCount
                        }

                        if(dataIndex < length){
                            $(row).find('td').first().text((tablePenjualan.page() * tablePenjualan.page.len()) + dataIndex + 1);
                        }
                        else{
                            $(row).find('td').hide()
                        }
                    },
                    "footerCallback": function (tfoot, data, start, end, display) {
                        $(tfoot).children('th:nth-child(1)').text(data[end-1].no);
                        $(tfoot).children('th:nth-child(2)').text(data[end-1].jenis);
                        $(tfoot).children('th:nth-child(3)').text(data[end-1].jumlah_obat);
                    },
                })
            }

            function initPenjualanKlinikDT(){
                tablePenjualanKlinik = $('#penjualan-klinik-list').DataTable({
                    "scrollX": true,
                    "scrollY": "300px",
                    "scrollCollapse": true,
                    "processing": true,
                    "serverSide": true,
                    "ajax": {
                        "url": "{{ route('dashboard.penjualan-klinik') }}",
                        "type": "GET",
                        "data": {
                            "type": typePenjualanKlinik,
                            "filterStart": filterStart,
                            "filterEnd": filterEnd,
                        }
                    },
                    "columnDefs": [
                        {
                            "data": "no",
                            "name": "no",
                            "targets": 0
                        },
                        {
                            "data": "nama_klinik",
                            "name": "nama_klinik",
                            "targets": 1
                        },
                        {
                            "data": "jumlah_obat",
                            "name": "jumlah_obat",
                            "targets": 2
                        },
                        {
                            "data": "total_harga",
                            "name": "total_harga",
                            "targets": 3
                        }
                    ],
                    order: [],
                    searching: false,
                    lengthChange: false,
                    paging: false,
                    ordering: false,
                    info: false,
                    search: {
                        smart: false,
                        "caseInsensitive": false
                    },
                    "createdRow": function(row, data, dataIndex) {
                        if(dataIndex < partnersCount){
                            $(row).find('td').first().text((tablePenjualanKlinik.page() * tablePenjualanKlinik.page.len()) + dataIndex + 1);
                        }
                        else{
                            $(row).find('td').hide()
                        }
                    },
                    "footerCallback": function (tfoot, data, start, end, display) {
                        $(tfoot).children('th:nth-child(1)').text(data[end-1].no);
                        $(tfoot).children('th:nth-child(2)').text(data[end-1].nama_klinik);
                        $(tfoot).children('th:nth-child(3)').text(data[end-1].jumlah_obat);
                    },
                })
            }

            function initListPermintaanDT(){
                tableListPermintaan = $('#list-permintaan').DataTable({
                    "scrollX": true,
                    "processing": true,
                    "serverSide": true,
                    "ajax": {
                        "url": "{{ route('dashboard.list-permintaan') }}",
                        "type": "GET",
                        "data": {
                            "filterStart": filterStart,
                            "filterEnd": filterEnd,
                        }
                    },
                    "columnDefs": [
                        {
                            "data": "no",
                            "name": "no",
                            "targets": 0
                        },
                        {
                            "data": "jenis",
                            "name": "jenis",
                            "targets": 1
                        },
                        {
                            "data": "jumlah_permintaan",
                            "name": "jumlah_permintaan",
                            "targets": 2
                        },
                        {
                            "data": "jumlah_obat",
                            "name": "jumlah_obat",
                            "targets": 3
                        },
                        {
                            "data": "total_harga",
                            "name": "total_harga",
                            "targets": 4
                        }
                    ],
                    order: [],
                    searching: false,
                    lengthChange: false,
                    paging: false,
                    ordering: false,
                    info: false,
                    search: {
                        smart: false,
                        "caseInsensitive": false
                    },
                    "createdRow": function(row, data, dataIndex) {
                        if(dataIndex < 2){
                            $(row).find('td').first().text((tableListPermintaan.page() * tableListPermintaan.page.len()) + dataIndex + 1);
                        }
                        else{
                            $(row).find('td').hide()
                        }
                    },
                    "footerCallback": function (tfoot, data, start, end, display) {
                        $(tfoot).children('th:nth-child(1)').text(data[end-1].no);
                        $(tfoot).children('th:nth-child(2)').text(data[end-1].jenis);
                        $(tfoot).children('th:nth-child(3)').text(data[end-1].jumlah_permintaan);
                        $(tfoot).children('th:nth-child(4)').text(data[end-1].jumlah_obat);
                    },
                })
            }

            function initListPengirimanDT(){
                tableListPengiriman = $('#list-pengiriman').DataTable({
                    "scrollX": true,
                    "processing": true,
                    "serverSide": true,
                    "ajax": {
                        "url": "{{ route('dashboard.list-pengiriman') }}",
                        "type": "GET",
                        "data": {
                            "filterStart": filterStart,
                            "filterEnd": filterEnd,
                        }
                    },
                    "columnDefs": [
                        {
                            "data": "no",
                            "name": "no",
                            "targets": 0
                        },
                        {
                            "data": "jenis",
                            "name": "jenis",
                            "targets": 1
                        },
                        {
                            "data": "jumlah_pengiriman",
                            "name": "jumlah_pengiriman",
                            "targets": 2
                        },
                        {
                            "data": "jumlah_obat",
                            "name": "jumlah_obat",
                            "targets": 3
                        },
                        {
                            "data": "total_harga",
                            "name": "total_harga",
                            "targets": 4
                        }
                    ],
                    order: [],
                    searching: false,
                    lengthChange: false,
                    paging: false,
                    ordering: false,
                    info: false,
                    search: {
                        smart: false,
                        "caseInsensitive": false
                    },
                    "createdRow": function(row, data, dataIndex) {
                        if(dataIndex < 2){
                            $(row).find('td').first().text((tableListPengiriman.page() * tableListPengiriman.page.len()) + dataIndex + 1);
                        }
                        else{
                            $(row).find('td').hide()
                        }
                    },
                    "footerCallback": function (tfoot, data, start, end, display) {
                        $(tfoot).children('th:nth-child(1)').text(data[end-1].no);
                        $(tfoot).children('th:nth-child(2)').text(data[end-1].jenis);
                        $(tfoot).children('th:nth-child(3)').text(data[end-1].jumlah_pengiriman);
                        $(tfoot).children('th:nth-child(4)').text(data[end-1].jumlah_obat);
                    },
                })
            }

            function initPenjualanKlinikDocDT(){
                tablePenjualanKlinikDoc = $('#penjualan-klinik-doc-list').DataTable({
                    "scrollX": true,
                    "scrollY": "300px",
                    "scrollCollapse": true,
                    "processing": true,
                    "serverSide": true,
                    "ajax": {
                        "url": "{{ route('dashboard.penjualan-klinik-doc') }}",
                        "type": "GET",
                        "data": {
                            "type": typePenjualanKlinikDoc,
                            "filterStart": filterStart,
                            "filterEnd": filterEnd,
                        }
                    },
                    "columnDefs": [
                        {
                            "data": "no",
                            "name": "no",
                            "targets": 0
                        },
                        {
                            "data": "no_doc",
                            "name": "no_doc",
                            "targets": 1
                        },
                        {
                            "data": "jumlah_obat",
                            "name": "jumlah_obat",
                            "targets": 2
                        },
                        {
                            "data": "total_harga",
                            "name": "total_harga",
                            "targets": 3
                        }
                    ],
                    order: [],
                    searching: false,
                    lengthChange: false,
                    paging: false,
                    ordering: false,
                    info: false,
                    search: {
                        smart: false,
                        "caseInsensitive": false
                    },
                    "createdRow": function(row, data, dataIndex) {
                        if(dataIndex < sellListCount){
                            $(row).find('td').first().text((tablePenjualanKlinikDoc.page() * tablePenjualanKlinikDoc.page.len()) + dataIndex + 1);
                        }
                        else{
                            $(row).find('td').hide()
                        }
                    },
                    "footerCallback": function (tfoot, data, start, end, display) {
                        if(data.length != 0){
                            $(tfoot).children('th:nth-child(1)').text(data[end-1].no);
                            $(tfoot).children('th:nth-child(2)').text(data[end-1].no_doc);
                            $(tfoot).children('th:nth-child(3)').text(data[end-1].jumlah_obat);
                        }
                    },
                })
            }

            function initPermintaanKlinikDT(){
                tablePermintaanKlinik = $('#permintaan-klinik-list').DataTable({
                    "scrollX": true,
                    "scrollY": "300px",
                    "scrollCollapse": true,
                    "processing": true,
                    "serverSide": true,
                    "ajax": {
                        "url": "{{ route('dashboard.permintaan-klinik') }}",
                        "type": "GET",
                        "data": {
                            "type": typePermintaanKlinik,
                            "filterStart": filterStart,
                            "filterEnd": filterEnd,
                        }
                    },
                    "columnDefs": [
                        {
                            "data": "no",
                            "name": "no",
                            "targets": 0
                        },
                        {
                            "data": "nama_klinik",
                            "name": "nama_klinik",
                            "targets": 1
                        },
                        {
                            "data": "jumlah_permintaan",
                            "name": "jumlah_permintaan",
                            "targets": 2
                        },
                        {
                            "data": "jumlah_obat",
                            "name": "jumlah_obat",
                            "targets": 3
                        },
                        {
                            "data": "total_harga",
                            "name": "total_harga",
                            "targets": 4
                        }
                    ],
                    order: [],
                    searching: false,
                    lengthChange: false,
                    paging: false,
                    ordering: false,
                    info: false,
                    search: {
                        smart: false,
                        "caseInsensitive": false
                    },
                    "createdRow": function(row, data, dataIndex) {
                        if(dataIndex < partnersCount){
                            $(row).find('td').first().text((tablePermintaanKlinik.page() * tablePermintaanKlinik.page.len()) + dataIndex + 1);
                        }
                        else{
                            $(row).find('td').hide()
                        }
                    },
                    "footerCallback": function (tfoot, data, start, end, display) {
                        $(tfoot).children('th:nth-child(1)').text(data[end-1].no);
                        $(tfoot).children('th:nth-child(2)').text(data[end-1].nama_klinik);
                        $(tfoot).children('th:nth-child(3)').text(data[end-1].jumlah_permintaan);
                        $(tfoot).children('th:nth-child(4)').text(data[end-1].jumlah_obat);
                    },
                })
            }

            function initPengirimanKlinikDT(){
                tablePengirimanKlinik = $('#pengiriman-klinik-list').DataTable({
                    "scrollX": true,
                    "scrollY": "300px",
                    "scrollCollapse": true,
                    "processing": true,
                    "serverSide": true,
                    "ajax": {
                        "url": "{{ route('dashboard.pengiriman-klinik') }}",
                        "type": "GET",
                        "data": {
                            "type": typePengirimanKlinik,
                            "filterStart": filterStart,
                            "filterEnd": filterEnd,
                        }
                    },
                    "columnDefs": [
                        {
                            "data": "no",
                            "name": "no",
                            "targets": 0
                        },
                        {
                            "data": "nama_klinik",
                            "name": "nama_klinik",
                            "targets": 1
                        },
                        {
                            "data": "jumlah_pengiriman",
                            "name": "jumlah_pengiriman",
                            "targets": 2
                        },
                        {
                            "data": "jumlah_obat",
                            "name": "jumlah_obat",
                            "targets": 3
                        },
                        {
                            "data": "total_harga",
                            "name": "total_harga",
                            "targets": 4
                        }
                    ],
                    order: [],
                    searching: false,
                    lengthChange: false,
                    paging: false,
                    ordering: false,
                    info: false,
                    search: {
                        smart: false,
                        "caseInsensitive": false
                    },
                    "createdRow": function(row, data, dataIndex) {
                        if(dataIndex < partnersCount){
                            $(row).find('td').first().text((tablePengirimanKlinik.page() * tablePengirimanKlinik.page.len()) + dataIndex + 1);
                        }
                        else{
                            $(row).find('td').hide()
                        }
                    },
                    "footerCallback": function (tfoot, data, start, end, display) {
                        $(tfoot).children('th:nth-child(1)').text(data[end-1].no);
                        $(tfoot).children('th:nth-child(2)').text(data[end-1].nama_klinik);
                        $(tfoot).children('th:nth-child(3)').text(data[end-1].jumlah_pengiriman);
                        $(tfoot).children('th:nth-child(4)').text(data[end-1].jumlah_obat);
                    },
                })
            }

            function initSPDT(){
                tableSP = $('#sp-list').DataTable({
                    "scrollX": true,
                    "processing": true,
                    "serverSide": true,
                    "ajax": {
                        "url": "{{ route('dashboard.sp') }}",
                        "type": "GET",
                        "data": {
                            "type": typeSP,
                            "filterStart": filterStart,
                            "filterEnd": filterEnd,
                        }
                    },
                    "columnDefs": [
                        {
                            "data": "no",
                            "name": "no",
                            "targets": 0
                        },
                        {
                            "data": "nama_supplier",
                            "name": "nama_supplier",
                            "targets": 1
                        },
                        {
                            "data": "jumlah_sp",
                            "name": "jumlah_sp",
                            "targets": 2
                        },
                        {
                            "data": "jumlah_obat",
                            "name": "jumlah_obat",
                            "targets": 3
                        },
                        {
                            "data": "total_harga",
                            "name": "total_harga",
                            "targets": 4
                        }
                    ],
                    order: [],
                    searching: false,
                    lengthChange: false,
                    paging: false,
                    ordering: false,
                    info: false,
                    search: {
                        smart: false,
                        "caseInsensitive": false
                    },
                    "createdRow": function(row, data, dataIndex) {
                        if(dataIndex < suppliersCount){
                            $(row).find('td').first().text((tableSP.page() * tableSP.page.len()) + dataIndex + 1);
                        }
                        else{
                            $(row).find('td').hide()
                        }
                    },
                    "footerCallback": function (tfoot, data, start, end, display) {
                        $(tfoot).children('th:nth-child(1)').text(data[end-1].no);
                        $(tfoot).children('th:nth-child(2)').text(data[end-1].nama_supplier);
                        $(tfoot).children('th:nth-child(3)').text(data[end-1].jumlah_sp);
                        $(tfoot).children('th:nth-child(4)').text(data[end-1].jumlah_obat);
                    },
                })
            }
            
            function initSODT(){
                tableSO = $('#so-list').DataTable({
                    "scrollX": true,
                    "scrollCollapse": true,
                    "scrollY": '300px',
                    "processing": true,
                    "serverSide": true,
                    "ajax": {
                        "url": "{{ route('dashboard.so') }}",
                        "type": "GET",
                        "data": {
                            "filterStart": filterStart,
                            "filterEnd": filterEnd,
                        },
                    },
                    "columnDefs": [
                        {
                            "data": "no",
                            "name": "no",
                            "targets": 0
                        },
                        {
                            "data": "wilayah",
                            "name": "wilayah",
                            "targets": 1
                        },
                        {
                            "data": "jumlah_so",
                            "name": "jumlah_so",
                            "targets": 2
                        },
                        {
                            "data": "jumlah_obat",
                            "name": "jumlah_obat",
                            "targets": 3
                        },
                        {
                            "data": "total_harga",
                            "name": "total_harga",
                            "targets": 4
                        }
                    ],
                    order: [],
                    searching: false,
                    lengthChange: false,
                    paging: false,
                    ordering: false,
                    info: false,
                    search: {
                        smart: false,
                        "caseInsensitive": false
                    },
                    "createdRow": function(row, data, dataIndex) {
                        if(dataIndex < zonesCount){
                            $(row).find('td').first().text((tableSO.page() * tableSO.page.len()) + dataIndex + 1);
                        }
                        else{
                            $(row).find('td').hide()
                        }
                    },
                    "footerCallback": function (tfoot, data, start, end, display) {
                        $(tfoot).children('th:nth-child(1)').text(data[end-1].no);
                        $(tfoot).children('th:nth-child(2)').text(data[end-1].wilayah);
                        $(tfoot).children('th:nth-child(3)').text(data[end-1].jumlah_so);
                        $(tfoot).children('th:nth-child(4)').text(data[end-1].jumlah_obat);
                    },
                })
            }

            function initMitraDT(){
                tableMitra = $('#mitra-list').DataTable({
                    "scrollX": true,
                    "scrollY": "300px",
                    "scrollCollapse": true,
                    "processing": true,
                    "serverSide": true,
                    "ajax": {
                        "url": "{{ route('dashboard.mitra-list') }}",
                        "type": "GET",
                        "data": {
                            "filterStart": filterStart,
                            "filterEnd": filterEnd,
                        }
                    },
                    "columnDefs": [
                        {
                            "data": "no",
                            "name": "no",
                            "targets": 0
                        },
                        {
                            "data": "wilayah",
                            "name": "wilayah",
                            "targets": 1
                        },
                        {
                            "data": "jumlah_mitra",
                            "name": "jumlah_mitra",
                            "targets": 2
                        }
                    ],
                    order: [],
                    searching: false,
                    lengthChange: false,
                    paging: false,
                    ordering: false,
                    info: false,
                    search: {
                        smart: false,
                        "caseInsensitive": false
                    },
                    "createdRow": function(row, data, dataIndex) {
                        if(dataIndex < zonesCount){
                            $(row).find('td').first().text((tableMitra.page() * tableMitra.page.len()) + dataIndex + 1);
                        }
                        else{
                            $(row).find('td').hide()
                        }
                    },
                    "footerCallback": function (tfoot, data, start, end, display) {
                        $(tfoot).children('th:nth-child(1)').text(data[end-1].no);
                        $(tfoot).children('th:nth-child(2)').text(data[end-1].wilayah);
                    },
                })
            }

            function initObatTerlarisDT(){
                tableObatTerlaris = $('#obat-terlaris-list').DataTable({
                    "scrollX": true,
                    "scrollY": "300px",
                    "scrollCollapse": true,
                    "processing": true,
                    "serverSide": true,
                    "ajax": {
                        "url": "{{ route('dashboard.obat-terlaris') }}",
                        "type": "GET",
                        "data": {
                            "type": typeObatTerlaris,
                            "filterStart": filterStart,
                            "filterEnd": filterEnd,
                        }
                    },
                    "columnDefs": [
                        {
                            "data": "no",
                            "name": "no",
                            "targets": 0
                        },
                        {
                            "data": "nama_obat",
                            "name": "nama_obat",
                            "targets": 1
                        },
                        {
                            "data": "supplier",
                            "name": "supplier",
                            "targets": 2
                        },
                        {
                            "data": "jumlah_obat",
                            "name": "jumlah_obat",
                            "targets": 3
                        },
                        {
                            "data": "total_harga",
                            "name": "total_harga",
                            "targets": 4
                        }
                    ],
                    order: [],
                    searching: false,
                    lengthChange: false,
                    paging: false,
                    ordering: false,
                    info: false,
                    search: {
                        smart: false,
                        "caseInsensitive": false
                    },
                    "createdRow": function(row, data, dataIndex) {
                        if(dataIndex < itemSoldCount){
                            $(row).find('td').first().text((tableObatTerlaris.page() * tableObatTerlaris.page.len()) + dataIndex + 1);
                        }
                        else{
                            $(row).find('td').hide()
                        }
                    },
                    "footerCallback": function (tfoot, data, start, end, display) {
                        if(data.length != 0){
                            $(tfoot).children('th:nth-child(1)').text(data[end-1].no);
                            $(tfoot).children('th:nth-child(2)').text(data[end-1].nama_obat);
                            $(tfoot).children('th:nth-child(3)').text(data[end-1].supplier);;
                        }
                    },
                })
            }

            function initSOKlinikDT(){
                tableSOKlinik = $('#so-klinik-list').DataTable({
                    "scrollX": true,
                    "scrollY": "300px",
                    "scrollCollapse": true,
                    "processing": true,
                    "serverSide": true,
                    "ajax": {
                        "url": "{{ route('dashboard.so-klinik') }}",
                        "type": "GET",
                        "data": {
                            "filterStart": filterStart,
                            "filterEnd": filterEnd,
                        }
                    },
                    "columnDefs": [
                        {
                            "data": "no",
                            "name": "no",
                            "targets": 0
                        },
                        {
                            "data": "nama_klinik",
                            "name": "nama_klinik",
                            "targets": 1
                        },
                        {
                            "data": "jumlah_so",
                            "name": "jumlah_so",
                            "targets": 2
                        },
                        {
                            "data": "jumlah_obat",
                            "name": "jumlah_obat",
                            "targets": 3
                        },
                        {
                            "data": "total_harga",
                            "name": "total_harga",
                            "targets": 4
                        }
                    ],
                    order: [],
                    searching: false,
                    lengthChange: false,
                    paging: false,
                    ordering: false,
                    info: false,
                    search: {
                        smart: false,
                        "caseInsensitive": false
                    },
                    "createdRow": function(row, data, dataIndex) {
                        if(dataIndex < partnersCount){
                            $(row).find('td').first().text((tableSOKlinik.page() * tableSOKlinik.page.len()) + dataIndex + 1);
                        }
                        else{
                            $(row).find('td').hide()
                        }
                    },
                    "footerCallback": function (tfoot, data, start, end, display) {
                        $(tfoot).children('th:nth-child(1)').text(data[end-1].no);
                        $(tfoot).children('th:nth-child(2)').text(data[end-1].nama_klinik);
                        $(tfoot).children('th:nth-child(3)').text(data[end-1].jumlah_so);
                        $(tfoot).children('th:nth-child(4)').text(data[end-1].jumlah_obat);
                    },
                })
            }

            function initSupplierDT(){
                tableSupplierList = $('#supplier-list').DataTable({
                    "scrollX": true,
                    "scrollY": "300px",
                    "scrollCollapse": true,
                    "processing": true,
                    "serverSide": true,
                    "ajax": {
                        "url": "{{ route('dashboard.supplier-list') }}",
                        "type": "GET",
                        "data": {
                            "filterStart": filterStart,
                            "filterEnd": filterEnd,
                        }
                    },
                    "columnDefs": [
                        {
                            "data": "no",
                            "name": "no",
                            "targets": 0
                        },
                        {
                            "data": "nama_supplier",
                            "name": "nama_supplier",
                            "targets": 1
                        },
                        {
                            "data": "jumlah_sku",
                            "name": "jumlah_sku",
                            "targets": 2
                        },
                        {
                            "data": "sku_tersedia",
                            "name": "sku_tersedia",
                            "targets": 3
                        },
                        {
                            "data": "total_harga",
                            "name": "total_harga",
                            "targets": 4
                        }
                    ],
                    order: [],
                    searching: false,
                    lengthChange: false,
                    paging: false,
                    ordering: false,
                    info: false,
                    search: {
                        smart: false,
                        "caseInsensitive": false
                    },
                    "createdRow": function(row, data, dataIndex) {
                        if(dataIndex < suppliersCount){
                            $(row).find('td').first().text((tableSupplierList.page() * tableSupplierList.page.len()) + dataIndex + 1);
                        }
                        else{
                            $(row).find('td').hide()
                        }
                    },
                    "footerCallback": function (tfoot, data, start, end, display) {
                        $(tfoot).children('th:nth-child(1)').text(data[end-1].no);
                        $(tfoot).children('th:nth-child(2)').text(data[end-1].nama_supplier);
                        $(tfoot).children('th:nth-child(3)').text(data[end-1].jumlah_sku);
                        $(tfoot).children('th:nth-child(4)').text(data[end-1].sku_tersedia);
                    },
                })
            }

            function initSOScheduleDT(){
                tableSOScheduleKlinik = $('#so-klinik-schedule-list').DataTable({
                    "scrollX": true,
                    "scrollY": "300px",
                    "scrollCollapse": true,
                    "processing": true,
                    "serverSide": true,
                    "ajax": {
                        "url": "{{ route('dashboard.so-klinik-schedule') }}",
                        "type": "GET",
                        "data": {
                            "filterStart": filterStart,
                            "filterEnd": filterEnd,
                        }
                    },
                    "columnDefs": [
                        {
                            "data": "no",
                            "name": "no",
                            "targets": 0
                        },
                        {
                            "data": "nama_klinik",
                            "name": "nama_klinik",
                            "targets": 1
                        },
                        {
                            "data": "jadwal_so",
                            "name": "jadwal_so",
                            "targets": 2
                        },
                        {
                            "data": "jumlah_obat",
                            "name": "jumlah_obat",
                            "targets": 3
                        },
                        {
                            "data": "total_harga",
                            "name": "total_harga",
                            "targets": 4
                        }
                    ],
                    order: [],
                    searching: false,
                    lengthChange: false,
                    paging: false,
                    ordering: false,
                    info: false,
                    search: {
                        smart: false,
                        "caseInsensitive": false
                    },
                    "createdRow": function(row, data, dataIndex) {
                        if(dataIndex < scheduleSOCount){
                            $(row).find('td').first().text((tableSOScheduleKlinik.page() * tableSOScheduleKlinik.page.len()) + dataIndex + 1);
                        }
                        else{
                            $(row).find('td').hide()
                        }
                    },
                    "footerCallback": function (tfoot, data, start, end, display) {
                        if(data.length != 0){
                            $(tfoot).children('th:nth-child(1)').text(data[end-1].no);
                            $(tfoot).children('th:nth-child(2)').text(data[end-1].nama_klinik);
                            $(tfoot).children('th:nth-child(3)').text(data[end-1].jadwal_so);
                        }
                    },
                })
            }

            initAssetGudangDT()
            initMasterSKUListDT()
            initPenjualanDT()
            initListPermintaanDT()
            initListPengirimanDT()
            initPenjualanKlinikDT()
            initPermintaanKlinikDT()
            initPengirimanKlinikDT()
            initPenjualanKlinikDocDT()
            initSPDT()
            initSODT()
            initMitraDT()
            initObatTerlarisDT()
            initSOKlinikDT()
            initSupplierDT()
            initSOScheduleDT()

            $('#assetGudang').on('change', function() {
                supplierAssetGudang = $(this).val()

                tableAssetGudang.destroy()
                initAssetGudangDT()
            });

            $('#penjualan').on('change', function() {
                typePenjualan = $(this).val()

                tablePenjualan.destroy()
                initPenjualanDT()
            });

            $('#penjualan-klinik').on('change', function() {
                typePenjualanKlinik = $(this).val()

                tablePenjualanKlinik.destroy()
                initPenjualanKlinikDT()
            });

            $('#penjualan-klinik-doc').on('change', function() {
                typePenjualanKlinikDoc = $(this).val()

                tablePenjualanKlinikDoc.destroy()
                initPenjualanKlinikDocDT()
            });

            $('#sp').on('change', function() {
                typeSP = $(this).val()

                tableSP.destroy()
                initSPDT()
            });
            
            $('#permintaan-klinik').on('change', function() {
                typePermintaanKlinik = $(this).val()

                tablePermintaanKlinik.destroy()
                initPermintaanKlinikDT()
            });

            $('#pengiriman-klinik').on('change', function() {
                typePengirimanKlinik = $(this).val()

                tablePengirimanKlinik.destroy()
                initPengirimanKlinikDT()
            });

            $('#obat-terlaris').on('change', function() {
                typeObatTerlaris = $(this).val()

                tableObatTerlaris.destroy()
                initObatTerlarisDT()
            });
        });

        function number_format(number) {
            return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }

        $('#assetGudang').select2({
            theme: "bootstrap",
            ajax: {
                url: "{{ route('get-all-supplier') }}",
                maximumSelectionLength: 1,
                data: function (params) {
                    return {
                        search: params.term,
                    }
                },
                processResults: function (data) {
                    return data
                }
            },
        });

        $('#penjualan').select2({theme: "bootstrap"})

        $('#penjualan-klinik').select2({theme: "bootstrap"})

        $('#penjualan-klinik-doc').select2({theme: "bootstrap"})

        $('#sp').select2({
            theme: "bootstrap",
            ajax: {
                url: "{{ route('get-all-type') }}",
                maximumSelectionLength: 1,
                data: function (params) {
                    return {
                        search: params.term,
                    }
                },
                processResults: function (data) {
                    return data
                }
            },
        });

        $('#permintaan-klinik').select2({theme: "bootstrap"})

        $('#pengiriman-klinik').select2({theme: "bootstrap"})

        $('#obat-terlaris').select2({theme: "bootstrap"})
    </script>
@endsection