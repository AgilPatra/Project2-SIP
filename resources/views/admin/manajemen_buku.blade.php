@extends('layouts.admin')

@section('title', 'Data-Buku')

@section('content')
<div class="container-fluid">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if (Session::has('status'))
<div class="alert alert-info" role="alert">{{Session::get('message')}}</div>
@endif

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Buku</h1>

    <!-- Modal Tambah -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahDataModal">
                Tambah Data
            </button>
            <div class="modal fade" id="tambahDataModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <!-- Isi modal, termasuk form -->
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Data Baru</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="/admin/simpan-buku" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="judul">Judul:</label>
                                    <input type="text" class="form-control" id="judul" name="judul" required>
                                </div>
                                <div class="form-group">
                                    <label for="penulis">Penulis:</label>
                                    <input type="penulis" class="form-control" id="penulis" name="penulis" required>
                                </div>
                                <div class="form-group">
                                    <label for="tahun_terbit">Tahun Terbit:</label>
                                    <input type="tahun_terbit" class="form-control" id="tahun_terbit" name="tahun_terbit" required>
                                </div>
                                <div class="form-group">
                                    <label for="isbn">ISBN:</label>
                                    <input type="isbn" class="form-control" id="isbn" name="isbn" required>
                                </div>
                                <div class="form-group">
                                    <label for="jumlah_tersedia">Jumlah Tersedia:</label>
                                    <input type="jumlah_tersedia" class="form-control" id="jumlah_tersedia" name="jumlah_tersedia" required>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary">Kirim</button>
                                </div>
                            </form>
                        </div>
                      
                    </div>
                </div>
            </div>
                    
        </div>

   

       
        <div class="card-body">
            <div class="table-responsive">
                <table id="BukuTable" class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Judul</th>
                            <th>Penulis</th>
                            <th>Tahun Terbit</th>
                            <th>ISBN</th>
                            <th>Jumlah</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bukuList as $data)
                        <tr>
                            <td>{{$data->id}}</td>
                            <td>{{$data->judul}}</td>
                            <td>{{$data->penulis}}</td>
                            <td>{{$data->tahun_terbit}}</td>
                            <td>{{$data->isbn}}</td>
                            <td>{{$data->jumlah_tersedia}}</td>
                            <td>

            <!-- Modal Edit -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editDataModal{{ $data->id }}">
                Edit
            </button>
            @foreach ($bukuList as $data)
            <div class="modal fade" id="editDataModal{{ $data->id }}" tabindex="-1" role="dialog" 
                aria-labelledby="editDataModal{{ $data->id }}" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <!-- Isi modal, termasuk form -->
                        <div class="modal-header">
                            <h5 class="modal-title" id="editDataModal{{ $data->id }}">Edit Data</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('admin_update_buku', ['id' => $data->id]) }}" method="POST">
                                @csrf
                                @method('PUT')  
                                <div class="form-group">
                                    <label for="judul">Judul:</label>
                                    <input type="text" class="form-control" id="judul" name="judul" value="{{ $data->judul }}"  required>
                                </div>
                                <div class="form-group">
                                    <label for="penulis">Penulis:</label>
                                    <input type="penulis" class="form-control" id="penulis" name="penulis" value="{{ $data->penulis }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="tahun_terbit">Tahun Terbit:</label>
                                    <input type="tahun_terbit" class="form-control" id="tahun_terbit" name="tahun_terbit" value="{{ $data->tahun_terbit }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="isbn">ISBN:</label>
                                    <input type="isbn" class="form-control" id="isbn" name="isbn" value="{{ $data->isbn }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="jumlah_tersedia">Jumlah Tersedia:</label>
                                    <input type="jumlah_tersedia" class="form-control" id="jumlah_tersedia" name="jumlah_tersedia" value="{{ $data->jumlah_tersedia }}" required>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary">Kirim</button>
                                </div>
                            </form>
                        </div>
                      
                    </div>
                </div>
            </div>
            @endforeach
                    
            <!-- Modal Hapus -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#hapusDataModal{{ $data->id }}">
               Hapus
            </button>
            @foreach ($bukuList as $data)
            <div class="modal fade" id="hapusDataModal{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="hapusDataModalLabel{{ $data->id }}" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <!-- Isi modal, termasuk form -->
                        <div class="modal-header">
                            <h5 class="modal-title" id="hapusDataModalLabel">Hapus Data {{ $data->id }} {{ $data->judul }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('admin_destroy_buku', ['id' => $data->id]) }}" method="POST">
                                @csrf
                                @method('delete')
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary">Hapus</button>
                                </div>
                            </form>
                        </div>
                      
                    </div>
                </div>
            </div>
            @endforeach
                    

                            </td>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#BukuTable').DataTable();
    });
</script>
@endsection
