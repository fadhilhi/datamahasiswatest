@extends('layout.app')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Update Mata Kuliah</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Update Mata Kuliah</li>
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
                    <form action="/datamatkul/{{ $data_matakuliah->id }}" enctype="multipart/form-data" method="post" class="form-horizontal" autocomplete="off">
                      @method('put')
                      @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label>Nama Mata Kuliah</label>
                                <input type="text" class="form-control" value="{{ old('nama_matakuliah') ?? $data_matakuliah->nama_matakuliah }}" name="nama_matakuliah">
                            </div>
                            <div class="form-group">
                                <label>Pilih Program Studi</label>
                                <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;" name="id_prodi">
                                  @foreach($data_prodi as $data_prodi)
                                    <option {{ $data_prodi->id == $data_matakuliah->id_prodi ? 'selected' : '' }} value="{{ $data_prodi->id }}">{{ $data_prodi->nama_prodi }}</option>
                                  @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer ">
                            <a href="/datamatkul" class="btn btn-sm btn-primary mr-1">Back</a>
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