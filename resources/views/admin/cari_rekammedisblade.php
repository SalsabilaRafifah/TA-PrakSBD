@extends('layout.layout')

@section('title', 'Cari rekammedis')

@section('content')
            <div class="container-fluid mg-t-20">
				
				<!-- row opened -->
				<div class="row row-sm">

					<!--div-->
					<div class="col-xl-12">
						<div class="card">
							<div class="card-body">
								<div class="table-responsive">
								<p>{{count($rekammedis)}} hasil pencarian untuk <b>{{$keyword}}</b></p>    
									<table class="table table-striped mg-b-0 text-md-nowrap border">
										<thead>
											<tr>
												<th>No</th>
												<th>Pasien</th>
												<th>keluhan</th>

                    		<th>Tanggal Periksa</th>
												<th>Diagnosa</th>
												<th>Aksi</th>
					<?php $i=1?>
					@foreach($rekammedis as $d)						</tr>
										</thead>
										<tbody>
						<?php $i=1?>	
							<tr>
												<th scope="row">{{$i++}}</th>
												<td>{{$d->nama}}</td>
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
							</div><!-- bd -->
						</div><!-- bd -->
					</div>
					<!--/div-->
				</div>
				<!-- /row -->


            </div>
@endsection