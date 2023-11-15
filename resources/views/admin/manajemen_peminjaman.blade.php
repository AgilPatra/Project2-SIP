<!-- resources/views/dashboard.blade.php -->

@extends('layouts.admin')

@section('title', 'Data-Peminjaman')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Peminjaman</h1>
    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank"
            href="https://datatables.net">official DataTables documentation</a>.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="PeminjamanTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Anggota</th>
                            <th>Admin</th>
                            <th>Buku</th>
                            <th>Tanggal Peminjaman</th>
                            <th>Tanggal Pengembalian</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($peminjamanList as $data)
                        <tr>
                            <td>{{$data->id}}</td>
                            <td>{{$data->anggota_id}}</td>
                            <td>{{$data->admin_id}}</td>
                            <td>{{$data->buku_id}}</td>
                            <td>{{$data->tanggal_pinjam}}</td>
                            <td>{{$data->tanggal_kembali}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection

@section('scripts')
    <!-- Script tambahan untuk halaman dashboard -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#PeminjamanTable').DataTable();
    });
</script>
@endsection
