@extends('layout.app')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Update Data Program Studi</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Update Data Program Studi</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-default">

                <div class="card-body">
                    <form action="/dataprodi/{{ $data_prodi->id }}" enctype="multipart/form-data" method="post" class="form-horizontal" autocomplete="off">
                      @method('put')
                      @csrf
                        <div class="card-body">
                          <div class="form-group">
                            <label>Nama Program Studi</label>
                            <input type="text" class="form-control" value="{{ old('nama_prodi') ?? $data_prodi->nama_prodi }}" name="nama_prodi">
                          </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer ">
                            <a href="/data_prodi" class="btn btn-sm btn-primary mr-1">Back</a>
                            <button type="submit" class="btn btn-sm btn-danger mr-1">Save changes</button>
                        </div>
                    </form>
                </div>
                {{-- card body --}}
              </div>
        </div>
    </section>

  </div>


@endsection