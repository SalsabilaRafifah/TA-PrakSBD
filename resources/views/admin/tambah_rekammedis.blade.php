@extends('layout.layout')

@section('title', 'Tambah Rekam Medis')

@section('content')
<div class="container-fluid mg-t-20">
    <div class="breadcrumb-header justify-content-between">
        <div class="left-content">
            <h4 class="content-title mb-1">Tambah Data Rekam Medis</h4>
            <nav aria-label="breadcrumb"></nav>
        </div>
    </div>

    <div class="row row-sm">
        <div class="col-xl-12">
            @if($errors->any())
            <div class="alert alert-danger my-3">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            @if(session('pasien'))
            <div class="alert alert-danger my-4">
                {{ session('pasien') }}
            </div>
            @endif

            <form method="post" action="/store_rekammedis">
                @csrf
                <div class="mb-3">
                    <label for="pasien">Nama Pasien</label>
                    <input type="text" name="pasien" id="pasien" required class="form-control" value="{{ old('pasien') }}">
                </div>
                <div class="mb-3">
                    <label for="id_dokter">ID Dokter</label>
                    <input type="number" name="id_dokter" id="id_dokter" required class="form-control" value="{{ old('id_dokter') }}">
                </div>
                <div class="mb-3">
                    <label for="pasien">ID Poli</label>
                    <input type="number" name="id_poli" id="id_poli" required class="form-control" value="{{ old('id_poli') }}">
                </div>
                <div class="mb-3">
                    <label for="keluhan">Keluhan</label>
                    <input type="textarea" name="keluhan" id="keluhan" class="form-control" value="{{ old('keluhan') }}">
                </div>
                <div class="mb-3">
                    <label for="tgl_periksa">Tanggal Periksa</label>
                    <input type="date" name="tgl_periksa" required class="form-control" id="tgl_periksa" value="{{ old('tgl_periksa') }}">
                </div>
                <div class="mb-3">
                    <label for="diagnosa">Diagnosa</label>
                    <input type="textarea" name="diagnosa" id="diagnosa" class="form-control" value="{{ old('diagnosa') }}">
                </div>
                <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Save</button>
            </form>
        </div>
    </div>
</div>
@endsection