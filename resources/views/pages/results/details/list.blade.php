@extends('adminlte::page')

@section('title', 'PELINDO IV - Survey Kepuasan Pelanggan')

@section('content_header')
<h1>Hasil {{$detailQ->name}}: {{$getLogUser->name}}</h1>
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
                                    <th>Jawaban</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp
                                @foreach ($list_0 as $index_0 => $item)
                                    <tr>
                                        <td align="center">{{$no}}</td>
                                        <td>{{$item->question}}</td>
                                        <td>
                                            @foreach ($listAnswer as $itemLA)
                                                @if ($itemLA->question_id == $item->question_id && $itemLA->log_attempt_id == $getLogA->log_attempt_id)
                                                    {{$itemLA->answer_1}}
                                                @endif
                                                {{-- {{$item->question_id}} --}}
                                            @endforeach
                                            {{-- {{$getLogA->log_attempt_id}} --}}
                                        </td>
                                    </tr>
                                @php $no++; @endphp
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
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            {{-- Daftar Pertanyaan  --}}
                            Kuesioner
                        </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <td align="center" rowspan="0" width="50" style="vertical-align : middle;">
                                        <b>ID</b>
                                    </td>
                                    <td rowspan="0" style="vertical-align : middle;">
                                        <b>Pertanyaan</b>
                                    </td>
                                    <td align="center" colspan="2">
                                        <b>Jawaban</b>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td align="center">
                                        <b>Kepuasan</b>
                                    </td>
                                    <td align="center">
                                        <b>Kepentingan</b>
                                    </td>
                                  </tr>
                            </thead>
                            <tbody>
                                @foreach ($listGroup as $val)
                                @if ($val->group_id != 0)
                                    <tr class="bg-white">
                                        <td colspan="2" class="font-italic">
                                            {{$val->name}}
                                        </td>
                                        <td align="center" colspan="2">
                                            <button type="button" class="btn btn-secondary btn-xs" data-toggle="modal" data-target="#modal-question">
                                                Saran & Catatan
                                            </button>
                                        </td>
                                    </tr>

                                    @php $no = 1; @endphp
                                    @foreach ($list_1 as $index => $item)
                                        @if($val->group_id == $item->group_id)
                                        <tr>
                                            <td align="center">{{$no}}</td>
                                            <td>{{$item->question}}</td>
                                            <td align="center">
                                                @foreach ($listAnswer as $itemLA)
                                                    @if ($itemLA->question_id == $item->question_id && $itemLA->log_attempt_id == $getLogA->log_attempt_id)
                                                        {{$itemLA->answer_1}}
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td align="center">
                                                @foreach ($listAnswer as $itemLA)
                                                    @if ($itemLA->question_id == $item->question_id && $itemLA->log_attempt_id == $getLogA->log_attempt_id)
                                                        {{$itemLA->answer_2}}
                                                    @endif
                                                @endforeach
                                            </td>
                                        </tr>
                                        @php $no++; @endphp
                                        @endif
                                    @endforeach
                                @endif
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
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    console.log('Hi!'); 
</script>
@stop