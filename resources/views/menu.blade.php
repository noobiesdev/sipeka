@extends('layouts/main')
@section('page','Data Menu')
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
                      Tambah Menu
                    </button>
                    <!-- Modal Tambah Karyawan -->
                    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Tambah Menu</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                              <form method="POST" action="/menu/store" id="tambahDataMenu" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                  <label>Nama Menu</label>
                                  <input type="text" name="nama_menu" class="form-control" id="">
                                </div>
                                <div class="form-group">
                                  <label>Harga</label>
                                  <input type="number" name="harga" class="form-control" id="">
                                </div>
                                <div class="input-group mb-3">
                                  <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect01">Tipe</label>
                                  </div>
                                  <select class="custom-select" name="tipe" id="inputGroupSelect01">
                                    <option selected value="makanan">Makanan</option>
                                    <option value="minuman">Minuman</option>
                                  </select>
                                </div>
                                <div class="form-group">
                                  <label for="exampleFormControlFile1">Foto</label>
                                  <input type="file" name="foto" class="form-control-file" id="exampleFormControlFile1">
                                </div>
                                <div class="form-group">
                                  <label for="exampleFormControlTextarea1">Deskripsi</label>
                                  <textarea class="form-control" name="deskripsi" id="exampleFormControlTextarea1" rows="3"></textarea>
                                </div>
                            </div>
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" form="tambahDataMenu">Tambah</button>
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
                      <th>Foto Menu</th>
                      <th>Nama Menu</th>
                      <th>Harga</th>
                      <th>Tipe</th>
                      <th>Deskripsi</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      @foreach($data_menu as $menu)
                      <td><img src="{{ asset('uploads/menu/' . $menu->foto)}}" width="100px;" height="100px" alt="foto"></td>
                      <td>{{$menu->nama_menu}}</td>
                      <td>{{$menu->harga}}</td>
                      <td>{{$menu->tipe}}</td>
                      <td>{{$menu->deskripsi}}</td>
                      <td>
                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#staticBackdrop1{{$menu->id}}">
                          Ubah
                        </button>

                        <!-- Modal Ubah Data Karyawan -->
                        <div class="modal fade" id="staticBackdrop1{{$menu->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Ubah Data Menu</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                  <form method="POST" action="/menu/{{$menu->id}}/update" enctype="multipart/form-data">
                                    @method('patch')
                                    @csrf
                                    <div class="form-group">
                                      <label>Nama Menu</label>
                                      <input type="text" name="nama_menu" class="form-control" value="{{$menu->nama_menu}}" >
                                    </div>
                                    <div class="form-group">
                                      <label>Harga</label>
                                      <input type="number" name="username" class="form-control" value="{{$menu->harga}}" >
                                    </div>
                                    <div class="input-group mb-3">
                                      <div class="input-group-prepend">
                                        <label class="input-group-text" for="inputGroupSelect01">Tipe</label>
                                      </div>
                                      <select class="custom-select" name="tipe" id="inputGroupSelect01">
                                        <option selected disabled>Pilih...</option>
                                        <option value="makanan">Makanan</option>
                                        <option value="minuman">Minuman</option>
                                      </select>
                                    </div>
                                    <div class="form-group">
                                      <label for="exampleFormControlFile1">Foto</label>
                                      <input type="file" name="foto" class="form-control-file" id="exampleFormControlFile1">
                                    </div>
                                    <div class="form-group">
                                      <label for="exampleFormControlTextarea1">Deskripsi</label>
                                      <textarea class="form-control" name="deskripsi" id="exampleFormControlTextarea1" rows="3">{{$menu->harga}}</textarea>
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
                        <a href="/menu/{{$menu->id}}/delete" onclick="return confirm('Yakin akan dihapus?')"><button type="button" class="btn btn-danger btn-sm">Delete</button></a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
              </table>
            </div>
          </div>
@endsection
<!-- end section content -->
