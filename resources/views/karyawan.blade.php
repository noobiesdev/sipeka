@extends('layouts/main')
@section('page','Data Karyawan')
@section('content')
<!-- /.row -->
      <div class="container">
        @if ($message = Session::get('status'))
        <div class="alert alert-success alert-block">
          <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{$message}}</strong>
        </div>
        @endif
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <!-- Button trigger modal Tambah karyawan -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
                      Tambah Akun Karyawan
                    </button>
                    <!-- Modal Tambah Karyawan -->
                    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Register Akun Karyawan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                              <form method="POST" action="/karyawan/store" id="tambahDataKaryawan">
                                @csrf
                                <div class="form-group">
                                  <label>Nama Lengkap</label>
                                  <input type="text" name="nama_lengkap" class="form-control" id="">
                                </div>
                                <div class="form-group">
                                  <label>Username</label>
                                  <input type="text" name="username" class="form-control" id="">
                                </div>
                                <div class="form-group">
                                  <label>Email</label>
                                  <input type="email" name="email" class="form-control" id="">
                                </div>
                            </div>
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" form="tambahDataKaryawan">Tambah</button>
                              </form>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- End Modal Tambah Karyawan -->

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 500px;">
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th>NO</th>
                      <th>Username</th>
                      <th>Nama Lengkap</th>
                      <th>Email</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      @foreach($data_karyawan as $kry)
                      <td>{{$loop->iteration}}</td>
                      <td>{{$kry->username}}</td>
                      <td>{{$kry->nama_lengkap}}</td>
                      <td>{{$kry->email}}</td>
                      <td>
                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#staticBackdrop1{{$kry->id}}">
                          Ubah
                        </button>

                        <!-- Modal Ubah Data Karyawan -->
                        <div class="modal fade" id="staticBackdrop1{{$kry->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Ubah Data Karyawan</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                  <form method="POST" action="/karyawan/{{$kry->id}}/update">
                                    @method('patch')
                                    @csrf
                                    <div class="form-group">
                                      <label>Nama Lengkap</label>
                                      <input type="text" name="nama_lengkap" class="form-control" value="{{$kry->nama_lengkap}}" >
                                    </div>
                                    <div class="form-group">
                                      <label>Username</label>
                                      <input type="text" name="username" class="form-control" value="{{$kry->username}}" >
                                    </div>
                                    <div class="form-group">
                                      <label>Email</label>
                                      <input type="email" name="email" class="form-control" value="{{$kry->email}}" >
                                    </div>
                                </div>
                              <div class="modal-footer">
                                <button type="submit" class="btn btn-primary" >Ubah</button>
                                  </form>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- End Modal Tambah Karyawan -->

                        <!-- <button type="button" class="btn btn-success btn-sm">Update</button> -->
                        <a href="/karyawan/{{$kry->id}}/delete" onclick="return confirm('Yakin akan dihapus?')"><button type="button" class="btn btn-danger btn-sm">Delete</button></a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
              </table>
            </div>
          </div>
@endsection
<!-- end section content -->
