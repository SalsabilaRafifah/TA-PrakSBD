@extends('layout.layout')

@section('title', 'Data rekammedis')

@section('content')
            <div class="container-fluid mg-t-20">

				<!-- breadcrumb -->

				<div class="breadcrumb-header justify-content-between">

					
					<div class="left-content">
						<h4 class="content-title mb-1">Data Rekam Medis</h4>
						<nav aria-label="breadcrumb">
						</nav>
					</div>


				</div>
				<!-- breadcrumb -->

				
				<!-- row opened -->
				<div class="row row-sm">

					<!--div-->
					<div class="col-xl-12">
						<div class="card">
							<div class="card-body">
 <form method="post" action="/cari_rekammedis">
     @csrf
							        <div class="input-group mb-4">
							            <input type="text" placeholder="Cari Nama Pasien..." required class="form-control" name="keyword">
							            <button type="submit" class="btn btn-primary">Cari</button>
							        </div>
							    </form>
							    <a href="/tambah_rekammedis" class="btn btn-success mb-3">Tambah</a>
								<div class="table-responsive">
								    @if(session('sukses'))
								    <div class="alert alert-success my-4">
								        {{session('sukses')}}
								    </div>
								    @endif
								    
								    @if(session('hapus'))
								    <div class="alert alert-warning my-4">
								        {{session('hapus')}}
								    </div>
								    @endif
								    
								    @if(session('update'))
								    <div class="alert alert-info my-4">
								        {{session('update')}}
								    </div>
								    @endif
								    
									<table class="table table-striped mg-b-0 text-md-nowrap border">
										<thead>
											<tr>
												<th>No</th>
												<th>Nama Pasien</th>
												<th>ID Dokter</th>
												<th>ID Poli</th>
												<th>Keluhan</th>
                    		<th>Tanggal Periksa</th>
												<th>Diagnosa</th>
												<th>Aksi</th>
					<?php 
					//rumus: ($rekammedis->currentPage()*data per halaman) - (data per halaman - 1)
					$i=($rekammedis->currentPage()*10) - 9?>
					@foreach($rekammedis as $d)						</tr>
										</thead>
										<tbody>
						<?php $i=1?>	
							<tr>
												<th scope="row">{{$i++}}</th>
												<td>{{$d->nama}}</td>
												<td>{{$d->id_dokter}}</td>
												<td>{{$d->id_poli}}</td>
												<td>{{$d->keluhan}}</td>
												<td>{{$d->tgl_periksa}}</td>
												<td>
												    <?php  
									if($d->diagnosa){
								echo $d->diagnosa;
									}
									else{
									    echo 'none';
									}
							?>
												</td>
												<td>
                            <a href="/edit_rekammedis/{{$d->id}}"><i class="fas fa-pencil-alt" style="margin-right:5px"></i></a>
                            <form class="d-inline" method="post" action="/hapus_rekammedis">
                                @csrf
                            <input type="hidden" name="id" value="{{$d->id}}">
                            <button type="submit" class="btn" onclick="return confirm('Yakin ingin menghapus?')"><i class="far fa-trash-alt"></i></button>
							</form>					</td>
											</tr>
					@endforeach
										</tbody>
									</table>
								</div><!-- bd -->
							{{$rekammedis->links()}}
							</div><!-- bd -->
						</div><!-- bd -->
					</div>
					<!--/div-->
				</div>
				<!-- /row -->


            </div>
@endsection