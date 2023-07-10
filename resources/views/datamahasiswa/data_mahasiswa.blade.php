@extends('layout.app')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Mahasiswa</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Mahasiswa</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
              <div class="row">
                <div class="col-12">
                  <div class="card">
                   
                   <!-- /.card-header -->
                  <div class="card-body">
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-info">
                        Tambah Data
                    </button>
                    <hr>
                  <table id="example2" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>NIM</th>
                        <th>Nama Mahasiswa</th>
                        <th>Program Studi</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($data_mahasiswa->getIterator() as $no => $data_mahasiswa)
                        <tr>
                            <td>{{ $no + 1 }}</td>
                            <td>{{ $data_mahasiswa->nim }}</td>
                            <td>{{ $data_mahasiswa->nama_mahasiswa }}</td>
                            <td>{{ $data_mahasiswa->data_prodi->nama_prodi }}</td>
                            <td>
                                <form action="/datamahasiswa/{{ $data_mahasiswa->id }}" method="post">
                                @csrf
                                @method("DELETE")
                                <a href="/datamahasiswa/{{ $data_mahasiswa->id }}/edit" class="btn btn-sm btn-primary mr-1" >Update</a>
                                <button type="submit" class="btn btn-sm btn-danger mr-1">Delete</button>
                                </form>
                            </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
          </section>
          <!-- /.content -->

          <!-- .modal -->
          <div class="modal fade" id="modal-info">
            <div class="modal-dialog">
              <div class="modal-content bg-default">
                <div class="modal-header">
                  <h4 class="modal-title">Data Mahasiswa</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                      <form action="/datamahasiswa" enctype="multipart/form-data" method="post" class="form-horizontal" autocomplete="off">
                        @csrf
                        <div class="card-body">
                          <div class="form-group">
                            <label>NIM</label>
                            <input type="text" name="nim" class="form-control" placeholder="NIM">
                          </div> 
                          <div class="form-group">
                            <label>Nama Mahasiswa</label>
                            <input type="text" name="nama_mahasiswa" class="form-control" placeholder="Nama Mahasiswa">
                          </div>  
                          <div class="form-group">
                            <label>Pilih Program Studi</label>
                            <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;" name="id_prodi">
                              @foreach($data_prodi as $data_prodi)
                                <option value="{{ $data_prodi->id }}">{{ $data_prodi->nama_prodi }}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="modal-footer justify-content-between">
                          <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-outline-light">Save changes</button>
                        </div>
                      </form>
                </div>
                
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
          <!-- /.modal -->
  </div>
  <!-- /.content-wrapper -->
  
</div>
<!-- ./wrapper -->
@endsection