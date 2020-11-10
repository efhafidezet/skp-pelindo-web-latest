@extends('adminlte::page')

@section('title', 'PELINDO IV - Survey Kepuasan Pelanggan')

@section('content_header')
<h1>Hasil Kuesioner</h1>
@stop

@section('content')
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            {{-- Daftar Parameter --}}
                        </h3>

                        {{-- <div class="card-tools">
                            <button type="button" class="btn btn-block btn-primary btn-sm" data-toggle="modal" data-target="#modal-lg">
                                Tambah Baru
                            </button>
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control float-right" placeholder="Search" />

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th width="5">No</th>
                                    <th>Pengguna</th>
                                    <th>Kuesioner</th>
                                    <th>Tanggal dan Waktu</th>
                                    <th align="center">Lokasi</th>
                                    <th align="center">Foto</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($listResult as $index => $item )
                                <tr>
                                    <td align="center">{{$index+1}}</td>
                                    <td>{{$item->user_id}}</td>
                                    <td>{{$item->questionnaire_id}}</td>
                                    <td>{{$item->attempt_date}}</td>
                                    <td align="">
                                        <a href="http://maps.google.com/?q={{$item->latitude.','.$item->longitude}}" class="btn btn-secondary btn-xs" target="_blank">
                                            Lihat
                                        </a>
                                    </td>
                                    <td align="">
                                        <button type="button" class="btn btn-secondary btn-xs" data-toggle="modal" data-target="#modal-img-{{$index+1}}">
                                            Lihat
                                        </button>
                                    </td>
                                    <td width="100" align="center">
                                        <a href="" class="btn btn-warning btn-xs">Lihat Jawaban</a>
                                    </td>
                                </tr>
                                <div class="modal fade" id="modal-img-{{$index+1}}">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Gambar</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                                <div class="card-body">
                                                    <img style="display: block; margin-left: auto; margin-right: auto; width: 25%%;" src="data:image/png;base64, {{$item->photo}}" alt="Red dot" />
                                                </div>
                                                <!-- /.card-body -->
                                                {{-- <div class="modal-footer">
                                                    
                                                </div> --}}
                                                <!-- /.card-footer -->
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                <!-- /.modal -->
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->

<div class="modal fade" id="modal-lg">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Parameter Baru</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-horizontal" method="POST" action="{{url('')}}/groups">
                @csrf
                <div class="card-body">
                    @include('pages.groups.form')
                    {{-- <div class="form-group row">
                        <label for="inputName" class="col-sm-3 col-form-label">Nama Parameter</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="inputName" placeholder="Nama Parameter" name="name"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputOrder" class="col-sm-3 col-form-label">Order</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="inputOrder" placeholder="Order" name="order"/>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary" style="float: right;">Simpan</button> --}}
                </div>
                <!-- /.card-body -->
                {{-- <div class="modal-footer">
                    
                </div> --}}
                <!-- /.card-footer -->
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    console.log('Hi!'); 
</script>
@stop
