@extends('layouts.app')

@section('main')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            {{-- <div class="col-sm-6">
                <h1 class="m-0 text-dark">Judul</h1>
            </div> --}}
            <!-- /.col -->
            {{-- <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard v1</li>
                </ol>
            </div> --}}
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            Daftar Parameter
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
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th width="5">No</th>
                                    <th>Nama Parameter</th>
                                    <th>Order</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($listGroup as $index => $item )
                                
                                <tr>
                                    <td align="center">{{$index +1}}</td>
                                    <td>{{$item->name}}</td>
                                    <td width="50" align="center">
                                        {{$item->order}}
                                    </td>
                                    <td width="100" align="center">
                                        <a href="" class="btn btn-warning btn-xs">Edit</a>
                                        <a href="" class="btn btn-danger btn-xs">Hapus</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th width="5">No</th>
                                    <th>Nama Parameter</th>
                                    <th>Order</th>
                                    <th></th>
                                </tr>
                            </tfoot>
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


@endsection
