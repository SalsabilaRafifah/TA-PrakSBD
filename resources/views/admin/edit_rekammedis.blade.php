@extends('layout.layout')

@section('title', 'Edit Data Rekam Medis')

@section('content')
    <div class="container-fluid mg-t-20">

				<!-- breadcrumb -->

				<div class="breadcrumb-header justify-content-between">

					
					<div class="left-content">
						<h4 class="content-title mb-1">Edit Data Rekam Medis</h4>
						<nav aria-label="breadcrumb">
						</nav>
					</div>


				</div>
				<!-- breadcrumb -->

				
				<!-- row opened -->
				<div class="row row-sm">

					<!--div-->
					    
					    @if($errors->any())
					        <div class="alert alert-danger my-3">
					            <ul>
					                @foreach($errors->all() as $e)
					                <li>{{$e}}</li>
					                @endforeach
					            </ul>
					        </div>
					    @endif
					    
					    @if(session('pasien'))
					    <div class="alert alert-danger my-4">
					        {{session('pasien')}}
					    </div>
					    @endif
					    
                        <form method="post" action="/update_rekammedis">
                            @csrf
                            <input type="hidden" name="id" value="{{$data->id}}">
                            <div class="mb-3">
                                <label for="pasien">Nama Pasien</label>
                                <input type="text" name="pasien" id="pasien" required class="form-control" value="{{ $pasien->nama }}">
                            </div>
							<div class="mb-3">
                                <label for="id_dokter">ID Dokter</label>
                                <input type="number" name="id_dokter" id="id_dokter" required class="form-control" value="{{ $dokter->id }}">
                            </div>
							<div class="mb-3">
                                <label for="id_poli">ID Poli</label>
                                <input type="number" name="id_poli" id="id_poli" required class="form-control" value="{{ $poliklinik->id }}">
                            </div>
                        <div class="mb-3">
                            <label for="keluhan">keluhan</label>
                            <input type="textarea" name="keluhan" required class="form-control" id="keluhan" value="{{ $data->keluhan }}">
                        </div>
                        <div class="mb-3">
                            <label for="tgl_periksa">Tanggal Periksa</label>
                            <input type="date" name="tgl_periksa" required class="form-control" id="tgl_periksa" value="{{ $data->tgl_periksa }}">
                        </div>
                        <div class="mb-3">
                            <label for="diagnosa">Diagnosa</label>
                            <input type="textarea" name="diagnosa" id="diagnosa" class="form-control" value="{{ $data->diagnosa }}">
                        </div>
                        <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Save</button>
                        </form>
					</div>
					<!--/div-->
				</div>
				<!-- /row -->


            </div>
@endsection