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
                <i class="mdi mdi-plus-circle"></i> Edit Layanan </button>
        </div>
    </div>

{{-- form --}}

    {{-- form edit guru --}}
    <div class="card-bodyformedit">
        <h4 class="card-title">Edit form</h4>
        <p class="card-description">Layanan</p>
        <form class="forms-sample" action="/admin/layanan/update/{{ $geteditlayanan->id }}" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="exampleInputUsername1">Jenis Layanan</label>
                <input type="text" class="form-control" id="exampleInputUsername1" name="jenis_layanan" value="{{ $geteditlayanan->jenis_layanan }}">
            </div>
            <button class="btn btn-primary mr-2"> Submit </button>
            <a href="/admin/layanan">
                <button id="cancle-form" type="button" class="btn btn-light">Cancel</button>
            </a>
        </form>
    </div>
    {{-- form add guru end --}}
{{-- form --}}

@endsection
