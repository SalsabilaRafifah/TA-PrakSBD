@extends('layout.layout')

@section('title', 'Data Poliklinik')

@section('content')
            <div class="container-fluid mg-t-20">

				<!-- breadcrumb -->

				<div class="breadcrumb-header justify-content-between">

					
					<div class="left-content">
						<h4 class="content-title mb-1">Data Poliklinik</h4>
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
 <form method="post" action="/cari_poliklinik">
     @csrf
							        <div class="input-group mb-4">
							            <input type="text" placeholder="Cari Nama Poli..." required class="form-control" name="keyword">
							            <button type="submit" class="btn btn-primary">Cari</button>
							        </div>
							    </form>
							    <a href="/tambah_poliklinik" class="btn btn-success mb-3">Tambah</a>
								<div class="table-responsive">
								    @if(session('sukses'))
								    <div class="alert alert-success my-4">
								        {{session('sukses')}}
								    </div>
								    @endif
								    
								    @if(session('hapus'))
								    <div class="alert alert-danger my-4">
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
												<th>Nama Poli</th>
												<th>gedung</th>
												<th>Terakhir Diupdate</th>
																	<th>Aksi</th>
											</tr>
										</thead>
										<tbody>
						<?php
						//rumus: ($poliklinik->currentPage()*data per halaman) - (data per halaman - 1)
						$i=($poliklinik->currentPage()*10) - 9 
						?>
						@foreach($poliklinik as $t)					<tr>
												<th scope="row">{{$i++}}</th>
												<td>{{$t->nama_poli}}</td>
												<td>{{$t->gedung}}</td>
												<td>{{$t->updated_at}}</td>

        			  <td>

                            <a href="/edit_poliklinik/{{$t->id}}"><i class="fas fa-pencil-alt" style="margin-right:5px"></i></a>
                            <form class="d-inline" method="post" action="/hapus_poliklinik">
                                @csrf
                            <input type="hidden" value="{{$t->id}}" name="id">
                            <button class="btn" onclick="return confirm('Yakin mau menghapus?')"><i class="far fa-trash-alt"></i></button>
                            </form>
												</td>
											</tr>
						@endforeach					
										</tbody>
									</table>
								</div><!-- bd -->
							{{$poliklinik->links()}}
							</div><!-- bd -->
						</div><!-- bd -->
					</div>
					<!--/div-->
				</div>
				<!-- /row -->


            </div>
@endsection