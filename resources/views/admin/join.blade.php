@extends('layout.layout')

@section('title', 'Join')

@section('content')
    <div class="container-fluid mg-t-20">
        <!-- breadcrumb -->
        <div class="breadcrumb-header justify-content-between">
            <div class="left-content">
                <h4 class="content-title mb-1">Hasil Join</h4>
                <nav aria-label="breadcrumb"></nav>
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
                            <table class="table table-striped mg-b-0 text-md-nowrap border">
                                <thead>
                                    <tr>
                                        <th>Nama Pasien</th>
                                        <th>Nama Dokter</th>
                                        <th>Tanggal Periksa</th>
                                        <th>Keluhan</th>
                                        <th>Diagnosa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $d)
                                    <tr>
                                        <td>{{ $d->nama_pasien }}</td>
                                        <td>{{ $d->nama_dokter }}</td>
                                        <td>{{ $d->tgl_periksa }}</td>
                                        <td>{{ $d->keluhan }}</td>
                                        <td>{{ $d->diagnosa }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div><!-- bd -->
                        <div class="mt-3"></div>
                        {{ $data->links() }}
                    </div><!-- bd -->
                </div><!-- bd -->
            </div>
            <!--/div-->
        </div>
        <!-- /row -->
    </div>
@endsection