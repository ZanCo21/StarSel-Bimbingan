@extends('admin/admin_master')
@section('konten')
    <div class="page-header flex-wrap">
        <div class="header-left">
            <button class="btn btn-primary mb-2 mb-md-0 mr-2"> Create new document </button>
            <button class="btn btn-outline-primary bg-white mb-2 mb-md-0"> Import documents </button>
        </div>
        <div class="header-right d-flex flex-wrap mt-2 mt-sm-0">
            <div class="d-flex align-items-center">
                <a href="#">
                    <p class="m-0 pr-3">Dashboard</p>
                </a>
                <a class="pl-3 mr-4" href="#">
                    <p class="m-0">ADM-MRD</p>
                </a>
            </div>
            <button id="openPopup" type="button" class="btn btn-primary mt-2 mt-sm-0 btn-icon-text">
                <i class="mdi mdi-plus-circle"></i> Edit Murid </button>
        </div>
    </div>

    {{-- form --}}

    {{-- form edit guru --}}
    <div class="card-bodyformedit">
        <h4 class="card-title">FORM EDIT MURID</h4>
        <p class="card-description">Edit Data Murid</p>
        <form class="forms-sample" action="/admin/murid/update/{{ $geteditmurid->user_id }}" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="exampleInputUsername1">Nama Lengkap</label>
                <input type="text" class="form-control" id="exampleInputUsername1" name="name"
                    value="{{ $geteditmurid->name }}">
            </div>
            <div class="form-group">
                <label for="exampleInputUsername1">Email</label>
                <input type="text" class="form-control" id="exampleInputUsername1" name="email"
                    value="{{ $getedituser->email }}">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">NIPD</label>
                <input type="number" class="form-control" id="exampleInputPassword1" name="nipd"
                    value="{{ $geteditmurid->nipd }}">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Jenis kelamin</label>
                <select class="form-control form-control-lg" id="exampleFormControlSelect1" name="jenis_kelamin">
                    <option disabled>{{ $geteditmurid->jenis_kelamin }}</option>
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Kelas & jurusan</label>
                <select class="form-control form-control-lg" id="exampleFormControlSelect1" name="kelas_id">
                    @if ($geteditkelass)
                        <option disabled value="{{ $geteditkelass->kelas_id }}">{{ $geteditkelass->tingkat_kelas }}
                            {{ $geteditkelass->jurusan }}</option>
                    @endif
                    @foreach ($geteditkelas as $item)
                        <option value="{{ $item->id }}">{{ $item->tingkat_kelas }} {{ $item->jurusan }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Tanggal Lahir</label>
                <input type="date" class="form-control" id="exampleInputPassword1" name="tgl_lahir"
                value="{{ $geteditmurid->tgl_lahir }}">
            </div>
            <button class="btn btn-primary mr-2"> Submit </button>
            <a href="/admin/murid">
                <button id="cancle-form" type="button" class="btn btn-light">Cancel</button>
            </a>
        </form>
    </div>
    {{-- form add guru end --}}
    {{-- form --}}
@endsection
