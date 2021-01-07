@extends('layouts.master')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Pelamar</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                  <li class="breadcrumb-item active">Pelamar</li>
              </ol>
          </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
                @if(session('diterima'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <i class="icon fas fa-check"></i>
                        {{session('diterima')}}
                    </div>
                @endif
                @if(session('ditolak'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <i class="icon fas fa-times"></i>
                            {{session('ditolak')}}
                        </div>
                    @endif
                    <!-- @if(Request::get('keyword'))
                    <a href="/admin/datausers" class="btn btn-primary" style="margin-bottom: 15px;"><i class="fas fa-arrow-left"></i> Kembali</a>
                    @else

                    @endif -->
                    <button type="button" class="btn btn-md btn-primary" data-toggle="modal" data-target="#exampleModal" style="margin-bottom: 15px;">
                        <i class="fas fa-plus"></i> Tambah Admin
                    </button>
                    
                <!-- <form action="/admin/datausers" method="GET">
                    <div class="input-group md-form form-sm form-2 pl-0 mb-2">
                    <input class="form-control my-0 py-1" type="text" name="keyword" value="{{Request::get('keyword')}}" placeholder="Search by username .." aria-label="Search">
                    <div class="input-group-append">
                        <span class="input-group-text cyan lighten-2" id="basic-text1"><i class="fas fa-search text-grey"
                            aria-hidden="true"></i></span>
                    </div>
                    </div>
                </form> --> 
            </div>
            <!-- /.card-header -->
                <div class="card-body">
                    <div style="overflow-x: auto;">
                        <table id="DataTables" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>NIK KTP</th>
                                    <th>USERNAME</th>
                                    <th>NAMA LENGKAP</th>
                                    <th>EMAIL</th>
                                    <th>SATKER</th>
                                    <th>STATUS</th>
                                    @if (auth()->user()->level=="admin")
                                    <th>AKSI</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $usar)
                                <tr>
                                    <td>{{$usar->no_ktp}}</td>
                                    <td>{{$usar->username}}</td>
                                    <td>{{$usar->biodata->nama_lengkap}}</td>
                                    <td>{{$usar->email}}</td>
                                    <td>{{$usar->satker}}</td>
                                    <td class="text-center">
                                        @switch($usar)
                                            @case($usar->biodata->status == 'Diterima')
                                                <button class="btn btn-success"><i>{{$usar->biodata->status}}</i></button>
                                                @break
                                            @case($usar->biodata->status == 'Ditolak')
                                                <button class="btn btn-danger"><i>{{$usar->biodata->status}}</i></button>
                                                @break
                                            @default
                                                @if ($usar->biodata->status != "")
                                                    <a href="#">
                                                    <button class="btn btn-warning"><i>{{$usar->biodata->status}}</i></button>
                                                    </a>
                                                @else
                                                @endif
                                        @endswitch
                                        <!-- @if ($usar->biodata->status != "")
                                        <a href="#">
                                        <button class="btn btn-warning"><i>{{$usar->biodata->status}}</i></button>
                                        </a>
                                        @else
                                        @endif -->
                                    </td>
                                    @if (auth()->user()->level=="admin")
                                    <td><a href="/admin/{{$usar->id}}/detail" class="btn btn-info btn-sm">Detail</a></td>
                                    @endif
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- Modal Tambah User -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Admin</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                                <form action="/admin/create" method="POST" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                      <label>NIK KTP</label>
                                      <input type="text" name="no_ktp" id="no_ktp" class="form-control" id="exampleFormControlInput1" placeholder="NIK KTP">
                                    </div>
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" name="username" id="username" class="form-control" id="exampleFormControlInput2" placeholder="masukan username">
                                    </div>
                                    <div class="form-group">
                                        <label>Email Address</label>
                                        <input type="email" name="email" id="email" class="form-control" id="exampleFormControlInput3" placeholder="name@example.com">
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" name="remember_token" id="remember_token" class="form-control" placeholder="{{csrf_token()}}">
                                    </div>
                                    <div class="form-group">
                                        <label>Satker</label>
                                        <select class="form-control" name="satker" id="satker">
                                          <option>UPT BAHASA</option>
                                          <option>UPT PERPUSTAKAAN</option>
                                          <option>UPT PP & K</option>
                                          <option>UPT TEKNOLOGI INFORMASI</option>
                                          <option>UPT LAB TERPADU</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Level</label>
                                        <select class="form-control" name="level" id="level">
                                            <option>admin</option>
                                            <option>user</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <div class="input-group" id="show_hide_password">
                                        <input type="password" class="form-control" name="password" id="password" placeholder="password">
                                            <div class="input-group-text">
                                                <a href="#"><i class="fas fa-eye-slash" aria-hidden="true"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Image</label>
                                        <input type="file" name="image" class="form-control" aria-describedby="text" id="image">
                                      </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
        <!-- /.card -->
</section>

@endsection