@extends('adminlte::page')

@section('title', 'PELINDO IV - Survey Kepuasan Pelanggan')

@section('content_header')
<h1>Daftar Enumerator</h1>
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
                            {{-- Daftar Parameter --}}
                        </h3>

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
                    <div class="card-body">
                        <table id="example2" class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th width="5">No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp
                                @foreach ($listEnumerator as $index => $item )
                                <tr>
                                    <td align="center">{{$no}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->email}}</td>
                                    <td width="100" align="center">
                                        <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#modal-update-{{$item->id}}">
                                            Edit
                                        </button>
                                        <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal-delete-{{$item->id}}">
                                            Hapus
                                        </button>
                                    </td>
                                </tr>
                                <div class="modal fade" id="modal-update-{{$item->id}}">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Ubah Kuesioner</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form class="form-horizontal" method="POST" action="{{url('')}}/enumerators/update">
                                                @csrf
                                                <div class="card-body">
                                                    <div class="form-group row">
                                                        <label for="inputName" class="col-sm-3 col-form-label">Nama</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control" id="inputName" placeholder="Nama" name="name" value="{{$item->name}}"/>
                                                            @error('name')
                                                                <span class="text-danger" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputEmail" class="col-sm-3 col-form-label">Email</label>
                                                        <div class="col-sm-9">
                                                            <input type="email" class="form-control" id="inputEmail" placeholder="Email" name="email" value="{{$item->email}}"/>
                                                            @error('email')
                                                                <span class="text-danger" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputPassword" class="col-sm-3 col-form-label">Password</label>
                                                        <div class="col-sm-9">
                                                            <input type="password" class="form-control" id="inputPassword" placeholder="Password" name="password" value="" required/>
                                                            @error('password')
                                                                <span class="text-danger" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="role" class="form-control" value="{{$item->role}}" placeholder="role">
                                                    <input type="hidden" name="details" class="form-control" value="{{$item->details}}" placeholder="details">
                                                    <input type="hidden" name="is_active" class="form-control" value="{{$item->is_active}}" placeholder="is_active">
                                                    <input type="hidden" name="id" class="form-control" value="{{$item->id}}" placeholder="is_active">
                                
                                                    <button type="submit" class="btn btn-primary" style="float: right;">Simpan</button>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                {{-- <div class="modal fade" id="modal-delete-{{$item->id}}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Hapus Pertanyaan</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form class="form-horizontal" method="POST" action="{{url('')}}/groups/update">
                                                @csrf
                                                <div class="card-body">
                                                    <input type="hidden" name="group_id" value="{{ $item->group_id }}">
                                                    <input type="hidden" name="is_active" value="0">

                                                    <button type="submit" class="btn btn-danger" style="float: right;">Hapus</button>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div> --}}
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
            <form class="form-horizontal" method="POST" action="{{url('')}}/enumerators">
                @csrf
                <div class="card-body">
                    <div class="form-group row">
                        <label for="inputName" class="col-sm-3 col-form-label">Nama</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="inputName" placeholder="Nama" name="name" value="{{ old('name') }}"/>
                            @error('name')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" id="inputEmail" placeholder="Email" name="email" value="{{ old('email') }}"/>
                            @error('email')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-3 col-form-label">Password</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="inputPassword" placeholder="Password" name="password" value="{{ old('password') }}"/>
                            @error('password')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <input type="hidden" name="role" class="form-control" value="2" placeholder="role">
                    <input type="hidden" name="details" class="form-control" value="null" placeholder="details">
                    <input type="hidden" name="is_active" class="form-control" value="1" placeholder="is_active">

                    <button type="submit" class="btn btn-primary" style="float: right;">Simpan</button>
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
