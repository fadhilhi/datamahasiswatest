@extends('layout.app')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Update Mahasiswa</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Update Mahasiswa</li>
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
                    <form action="/datamahasiswa/{{ $data_mahasiswa->id }}" enctype="multipart/form-data" method="post" class="form-horizontal" autocomplete="off">
                      @method('put')
                      @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label>NIM</label>
                                <input type="text" class="form-control" value="{{ old('nim') ?? $data_mahasiswa->nim }}" name="nim">
                            </div>
                            <div class="form-group">
                                <label>Nama Mahasiswa</label>
                                <input type="text" class="form-control" value="{{ old('nama_mahasiswa') ?? $data_mahasiswa->nama_mahasiswa }}" name="nama_mahasiswa">
                            </div>
                            <div class="form-group">
                                <label>Pilih Program Studi</label>
                                <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;" name="id_prodi">
                                  @foreach($data_prodi as $data_prodi)
                                    <option {{ $data_prodi->id == $data_mahasiswa->id_prodi ? 'selected' : '' }} value="{{ $data_prodi->id }}">{{ $data_prodi->nama_prodi }}</option>
                                  @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer ">
                            <a href="/datamahasiswa" class="btn btn-sm btn-primary mr-1">Back</a>
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