@extends('adminlte::page')

@section('title', 'PELINDO IV - Survey Kepuasan Pelanggan')

@section('content_header')
<h1>Daftar Kuesioner</h1>
@stop

@section('content')
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        {{-- <h3 class="card-title">
                            Daftar Kuesioner
                        </h3> --}}

                        <div class="card-tools">
                            <button type="button" class="btn btn-block btn-primary btn-sm" data-toggle="modal" data-target="#modal-lg">
                                Tambah Baru
                            </button>
                            {{-- <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control float-right" placeholder="Search" />

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th width="5">No</th>
                                    <th>Nama Kuesioner</th>
                                    <th>Tanggal Mulai</th>
                                    <th>Tanggal Selesai</th>
                                    <th>Keterangan</th>
                                    <th width="100"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($listQuestionnaire as $index => $item )
                                <tr>
                                    <td align="center">{{$index +1}}</td>
                                    <td width="100">{{$item->name}}</td>
                                    <td width="50" align="center">
                                        {{date('d-m-Y', strtotime($item->start_date))}}
                                    </td>
                                    <td width="50" align="center">
                                        {{date('d-m-Y', strtotime($item->end_date))}}
                                    </td>
                                    <td>
                                        {{$item->details}}
                                        {{-- @if ($item->is_continuous == 0)
                                            <span class="font-italic">Periodik</span>
                                        @else
                                            <span class="font-italic">Berkelanjutan</span>
                                        @endif --}}
                                    </td>
                                    <td width="100" align="center">
                                        <a href="{{url('')}}/questionnaires/{{$item->questionnaire_id}}" class="btn btn-primary btn-xs">Lihat</a>
                                        <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#modal-update-questionnaires-{{$item->questionnaire_id}}">
                                            Edit
                                        </button>
                                        <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal-delete-questionnaires-{{$item->questionnaire_id}}">
                                            Hapus
                                        </button>
                                    </td>
                                </tr>
                                <div class="modal fade" id="modal-update-questionnaires-{{$item->questionnaire_id}}">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Ubah Kuesioner</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form class="form-horizontal" method="POST" action="{{url('')}}/questionnaires/update">
                                                @csrf
                                                <div class="card-body">
                                                    <div class="form-group row">
                                                        <label for="inputNameUpdate" class="col-sm-3 col-form-label">Nama Kuesioner</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="inputNameUpdate" placeholder="Nama Kuesioner" name="name" value="{{$item->name}}"/>
                                                            @error('name')
                                                                <span class="text-danger" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputStartDate" class="col-sm-3 col-form-label">Tanggal Mulai</label>
                                                        <div class="col-sm-9">
                                                            <input type="date" class="form-control" id="inputStartDateUpdate" placeholder="Tanggal Mulai" name="start_date" value="{{$item->start_date}}"/>
                                                            @error('start_date')
                                                                <span class="text-danger" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputEndDate" class="col-sm-3 col-form-label">Tanggal Selesai</label>
                                                        <div class="col-sm-9">
                                                            <input type="date" class="form-control" id="inputEndDateUpdate" placeholder="Tanggal Selesai" name="end_date" value="{{$item->end_date}}"/>
                                                            @error('end_date')
                                                                <span class="text-danger" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputDetails" class="col-sm-3 col-form-label">Keterangan</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="inputDetailsUpdate" placeholder="Keterangan" name="details" value="{{$item->details}}"/>
                                                            @error('details')
                                                                <span class="text-danger" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="questionnaire_id" value="{{ $item->questionnaire_id }}">

                                                    <button type="submit" class="btn btn-primary" style="float: right;">Simpan</button>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                <div class="modal fade" id="modal-delete-questionnaires-{{$item->questionnaire_id}}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Hapus Pertanyaan</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form class="form-horizontal" method="POST" action="{{url('')}}/questionnaires/update">
                                                @csrf
                                                <div class="card-body">
                                                    <input type="hidden" name="questionnaire_id" value="{{ $item->questionnaire_id }}">
                                                    <input type="hidden" name="is_active" value="0">

                                                    <button type="submit" class="btn btn-danger" style="float: right;">Hapus</button>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
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
                <h4 class="modal-title">Tambah Kuesioner Baru</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-horizontal" method="POST" action="{{url('')}}/questionnaires">
                @csrf
                <div class="card-body">
                    @include('pages.questionnaires.form')
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
