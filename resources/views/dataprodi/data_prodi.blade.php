@extends('layout.app')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Prodi</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Prodi</li>
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
                            <th>Nama Program Studi</th>
                            <TH>Jumlah Mata Kuliah</TH>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($data_prodi->getIterator() as $no => $data_prodi)
                            <tr>
                                <td>{{ $no + 1}}</td>
                              <td>{{ $data_prodi->nama_prodi }}</td>
                              <td>{{ $data_prodi->data_matakuliah->count() }}</td>
                              <td>
                                <form action="/dataprodi/{{ $data_prodi->id }}" method="post">
                                  @csrf
                                  @method("DELETE")
                                  <a href="/dataprodi/{{ $data_prodi->id }}/edit" class="btn btn-sm btn-primary mr-1" >Update</a>
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
                  <h4 class="modal-title">Data Prodi</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <form action="/dataprodi" enctype="multipart/form-data" method="post" class="form-horizontal" autocomplete="off">
                      @csrf
                        <div class="card-body">
                          <div class="form-group">
                            <label>Nama Program Studi</label>
                            <input type="text" name="nama_prodi" class="form-control" placeholder="Nama Program Studi">
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