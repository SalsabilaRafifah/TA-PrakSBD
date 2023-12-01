@extends('layout.layout')

@section('title', 'Edit Tempat Tidur')

@section('content')
    <div class="container-fluid mg-t-20">

				<!-- breadcrumb -->

				<div class="breadcrumb-header justify-content-between">

					
					<div class="left-content">
						<h4 class="content-title mb-1">Edit Tempat Tidur</h4>
						<nav aria-label="breadcrumb">
						</nav>
					</div>


				</div>
				<!-- breadcrumb -->

				
				<!-- row opened -->
				<div class="row row-sm">

					<!--div-->
					<div class="col-xl-12">
					    
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
					    
                        <form method="post" action="/update_poliklinik">
                            @csrf
                            <div class="mb-3">
                                <input type="hidden" name="id" value="{{$data->id}}">
                                <label for="nama_poli">Nama Poli</label>
                                <input type="text" name="nama_poli" id="nama_poli" required class="form-control" value="{{ $data->nama_poli }}">
                            </div>
                        <div class="mb-3">
                            <label for="gedung">gedung</label>
                            <input type="text" name="gedung" required class="form-control" id="gedung" value="{{ $data->gedung }}">
                        </div>
                        <button type="submit" class="btn btn-success" name="update"><i class="fas fa-save"></i> Update</button>
                        </form>
					</div>
					<!--/div-->
				</div>
				<!-- /row -->


            </div>
@endsection