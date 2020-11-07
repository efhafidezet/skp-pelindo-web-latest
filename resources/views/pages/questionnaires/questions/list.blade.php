@extends('adminlte::page')

@section('title', 'PELINDO IV - Survey Kepuasan Pelanggan')

@section('content_header')
<h1>Nama Kuesioner</h1>
@stop

@section('content')
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            {{-- Daftar Pertanyaan  --}}
                            Demografi Responden
                        </h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-block btn-primary btn-sm" data-toggle="modal" data-target="#modal-demo">
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
                                    <th width="50">ID</th>
                                    <th>Pertanyaan</th>
                                    <th width="150"></th>
                                    <th width="100"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp
                                @foreach ($list_0 as $index_0 => $item)
                                    <tr>
                                        <td align="center">{{$no}}</td>
                                        <td>{{$item->question}}</td>
                                        <td>
                                            <button type="button" class="btn btn-secondary btn-xs" data-toggle="modal" data-target="#modal-question-answer{{$item->question_id}}">
                                                Opsi Jawaban
                                            </button>
                                        </td>
                                        <td>
                                            <a href="" class="btn btn-warning btn-xs">Edit</a>
                                            <a href="" class="btn btn-danger btn-xs">Hapus</a>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="modal-question-answer{{$item->question_id}}">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Opsi Jawaban</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                    <div class="card-body">
                                                        @php $nolq = 1; @endphp
                                                        @foreach ($listQuestionAnswer as $itemlq)
                                                        @if ($itemlq->question_id == $item->question_id)                                                        
                                                            <div class="form-group row">
                                                                <label for="inputQuestionAnswer{{$nolq}}" class="col-sm-3 col-form-label">Jawaban {{$nolq}}</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" class="form-control" id="inputQuestionAnswer{{$nolq}}" placeholder="Jawaban {{$nolq}}" 
                                                                    name="name" value="{{$itemlq->answer}}" readonly/>
                                                                </div>
                                                            </div>
                                                        @php $nolq++; @endphp
                                                        @endif
                                                        @endforeach
                                                        {{-- <button type="submit" class="btn btn-primary" style="float: right;">Simpan</button> --}}
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
                                @php $no++; @endphp
                                @endforeach
                                {{-- <tr>
                                    <td>1</td>
                                    <td>Silakan pilih peran atau posisi Anda di perusahaan</td>
                                    <td>
                                        <a href="" class="btn btn-secondary btn-xs">Opsi Jawaban</a>
                                    </td>
                                    <td>
                                        <a href="" class="btn btn-warning btn-xs">Edit</a>
                                        <a href="" class="btn btn-danger btn-xs">Hapus</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Lokasi pelayanan PT. Pelabuhan Indonesia IV (Persero) yang paling banyak Anda terima? </td>
                                    <td>
                                        <a href="" class="btn btn-secondary btn-xs">Opsi Jawaban</a>
                                    </td>
                                    <td>
                                        <a href="" class="btn btn-warning btn-xs">Edit</a>
                                        <a href="" class="btn btn-danger btn-xs">Hapus</a>
                                    </td>
                                </tr> --}}
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            {{-- Daftar Pertanyaan  --}}
                            Kuesioner
                        </h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-block btn-primary btn-sm" data-toggle="modal" data-target="#modal-question">
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
                                    <th width="50">ID</th>
                                    <th>Pertanyaan</th>
                                    <th width="100"></th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- <tr class="bg-white">
                                    <td colspan="3" class="font-italic">
                                        Nama Parameter 1
                                    </td>
                                </tr> --}}
                                @foreach ($listGroup as $val)
                                @if ($val->group_id != 0)
                                    <tr class="bg-white">
                                        <td colspan="3" class="font-italic">
                                            {{$val->name}}
                                        </td>
                                    </tr>

                                    @php $no = 1; @endphp
                                    @foreach ($list_1 as $index => $item)
                                        @if($val->group_id == $item->group_id)
                                        <tr>
                                            <td align="center">{{$no}}</td>
                                            <td>{{$item->question}}</td>
                                            <td>
                                                <a href="" class="btn btn-warning btn-xs">Edit</a>
                                                <a href="" class="btn btn-danger btn-xs">Hapus</a>
                                            </td>
                                        </tr>
                                        @php $no++; @endphp
                                        @endif
                                    @endforeach
                                @endif
                                @endforeach
                                
                                {{-- <tr>
                                    <td>1</td>
                                    <td>Kebersihan kolam pelabuhan</td>
                                    <td>
                                        <a href="" class="btn btn-warning btn-xs">Edit</a>
                                        <a href="" class="btn btn-danger btn-xs">Hapus</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Kondisi fisik ruang PPSA</td>
                                    <td>
                                        <a href="" class="btn btn-warning btn-xs">Edit</a>
                                        <a href="" class="btn btn-danger btn-xs">Hapus</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Kelengkapan dan kondisi rambu-rambu navigasi</td>
                                    <td>
                                        <a href="" class="btn btn-warning btn-xs">Edit</a>
                                        <a href="" class="btn btn-danger btn-xs">Hapus</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Kondisi fisik dermaga dan fasilitasnya</td>
                                    <td>
                                        <a href="" class="btn btn-warning btn-xs">Edit</a>
                                        <a href="" class="btn btn-danger btn-xs">Hapus</a>
                                    </td>
                                </tr> --}}
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

<div class="modal fade" id="modal-demo">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Pertanyaan Demografi Responden Baru</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-horizontal" method="POST" action="{{url('')}}/question">
                @csrf
                <div class="card-body">
                    @include('pages.questionnaires.questions.form_0')
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

<div class="modal fade" id="modal-question">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Pertanyaan Kuesioner Baru</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-horizontal" method="POST" action="{{url('')}}/question">
                @csrf
                <div class="card-body">
                    @include('pages.questionnaires.questions.form_1')
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