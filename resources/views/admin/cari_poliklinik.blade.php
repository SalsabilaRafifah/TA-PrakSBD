@extends('layout.layout')

@section('title', 'Cari Poli')

@section('content')
            <div class="container-fluid mg-t-20">

				<!-- breadcrumb -->

				<div class="breadcrumb-header justify-content-between">

					
					<div class="left-content">
						<h4 class="content-title mb-1">Cari Poli</h4>
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
								<div class="table-responsive">
							<a href="/poliklinik">Kembali</a>
                            <p>{{count($poliklinik)}} hasil pencarian untuk <b>{{$keyword}}</b></p>
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
						<?php $i=1 ?>
						@foreach($poliklinik as $t)					<tr>
												<th scope="row">{{$i++}}</th>
												<td>{{$t->nama_poli}}</td>
												<td>{{$t->gedung}}</td>
												<td>
												</td>
												<td>{{$t->updated_at}}</td>

        			  <td>

                            <a href="/edit_poliklinik/{{$t->id}}"><i class="fas fa-pencil-alt" style="margin-right:5px"></i></a>
                            <form class="d-inline" method="post" action="/hapus_poliklinik">
                            <input type="hidden" value="{{$t->id}}" name="id">
                            <button class="btn" onclick="return confirm('Yakin mau menghapus?')"><i class="far fa-trash-alt"></i></button>
                            </form>
												</td>
											</tr>
						@endforeach					
										</tbody>
									</table>
								</div><!-- bd -->
							</div><!-- bd -->
						</div><!-- bd -->
					</div>
					<!--/div-->
				</div>
				<!-- /row -->


            </div>
@endsection