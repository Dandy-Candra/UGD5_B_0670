@extends('dashboard')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Edit Pegawai</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="#">Pegawai</a>
                    </li>
                    <li class="breadcrumb-item active">Edit</li>
                </ol>

            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('pegawai.update', $data->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label class="font-weight-bold">NIP</label>
                                    <input type="text"
                                        class="form-control @error('nomor_induk_pegawai') is-invalid @enderror"
                                        name="nomor_induk_pegawai"
                                        value="{{ old('nomor_induk_pegawai', $data->nomor_induk_pegawai) }}"
                                        placeholder="Masukkan NIP">
                                    @error('nomor_induk_pegawai')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group col-md-4">
                                    <label class="font-weight-bold">Nama Pegawai</label>
                                    <input type="text" class="form-control @error('nama_pegawai') is-invalid @enderror"
                                        name="nama_pegawai" value="{{ old('nama_pegawai', $data->nama_pegawai) }}"
                                        placeholder="Masukkan Nama Pegawai">
                                    @error('nama_pegawai')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="form-group col-md-4">
                                    <label class="font-weight-bold">Departemen</label>
                                    <select name="departemen" class="form-select" id="departemen" required>
                                        @forelse ($departemen as $item)
                                        @if($item->id == $data->id_departemen)
                                        <option selected>{{ $item->nama_departemen }}</option>
                                        @else
                                        <option>{{ $item->nama_departemen }}</option>
                                        @endif
                                        @empty
                                        <div class="alert alert-danger">
                                            Data Departemen belum tersedia
                                        </div>
                                        @endforelse
                                    </select>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label class="font-weight-bold">Telepon</label>
                                    <input type="text" class="form-control @error('telepon') is-invalid @enderror"
                                        name="telepon" value="{{ old('telepon', $data->telepon) }}"
                                        placeholder="Masukkan Nomor Telepon">
                                    @error('telepon')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror

                                </div>
                                <div class="form-group col-md-6">
                                    <label class="font-weight-bold">Email</label>
                                    <input type="text" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email' , $data->email) }}"
                                        placeholder="Masukkan Email">
                                    @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label class="font-weight-bold">Gender</label>
                                    <select name="gender" class="form-select" id="gender" required>

                                        @if($data->gender == 1)
                                        <option selected>Pria</option>
                                        <option>Wanita</option>
                                        @else
                                        <option>Pria</option>
                                        <option selected>Wanita</option>
                                        @endif

                                    </select>
                                </div>

                                <div class="form-group col-md-4">
                                    <label class="font-weight-bold">Status</label>
                                    <select name="status" class="form-select" id="status" required>

                                        @if($data->status == 1)
                                        <option selected>Aktif</option>
                                        <option>Tidak Aktif</option>
                                        @else
                                        <option>Aktif</option>
                                        <option selected>Tidak Aktif</option>
                                        @endif


                                    </select>
                                </div>

                                <div class="form-group col-md-4">
                                    <label class="font-weight-bold">Gaji Pokok</label>
                                    <input type="text" class="form-control @error('gaji_pokok') is-invalid @enderror"
                                        name="gaji_pokok" value="{{ old('gaji_pokok' , $data->gaji_pokok) }}"
                                        placeholder="Masukkan Gaji Pokok">
                                    @error('gaji_pokok')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-md-4 btn-primary">SIMPAN</button>
                            </div>

                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection