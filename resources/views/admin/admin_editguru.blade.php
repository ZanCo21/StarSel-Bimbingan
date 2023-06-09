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
                    <p class="m-0">ADM-ADM</p>
                </a>
            </div>
            <button id="openPopup" type="button" class="btn btn-primary mt-2 mt-sm-0 btn-icon-text">
                <i class="mdi mdi-plus-circle"></i> Edit Guru </button>
        </div>
    </div>

{{-- form --}}

    {{-- form edit guru --}}
    <div class="card-bodyformedit">
        <h4 class="card-title">Default form</h4>
        <p class="card-description">Basic form layout</p>
        <form class="forms-sample" action="/admin/guru/update/{{ $geteditguru->user_id }}" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="exampleInputUsername1">Nama Lengkap</label>
                <input type="text" class="form-control" id="" name="name" value="{{ $geteditguru->name }}">
            </div>
            <div class="form-group">
                <label for="exampleInputUsername1">Email</label>
                <input type="email" class="form-control" id="exampleInputUsername1" name="email" value="{{ $getedituser->email }}">
            </div>
            <div class="form-group">
                <label for="exampleInputUsername1">Nip</label>
                <input type="text" class="form-control" id="exampleInputUsername1" name="nip" value="{{ $geteditguru->nip }}">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Tanggal Lahir</label>
                <input type="date" class="form-control" id="exampleInputPassword1" name="tgl_lahir" value="{{ $geteditguru->tgl_lahir }}">
            </div>
            <div class="form-group">
                <select class="form-control form-control-lg" id="exampleFormControlSelect1" name="jenis_kelamin">
                    <option disabled>{{ $geteditguru->jenis_kelamin }}</option>
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                </select>
            </div>
            <button class="btn btn-primary mr-2"> Submit </button>
            <a href="/admin/guru">
                <button id="cancle-form" type="button" class="btn btn-light">Cancel</button>
            </a>
        </form>
    </div>
    {{-- form add guru end --}}
{{-- form --}}

@endsection
