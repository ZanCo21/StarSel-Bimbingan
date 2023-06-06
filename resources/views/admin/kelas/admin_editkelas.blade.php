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
                <i class="mdi mdi-plus-circle"></i> Edit kelas </button>
        </div>
    </div>

{{-- form --}}
    {{-- form edit kelas --}}
    <div class="card-body">
        <h4 class="card-title">Default form</h4>
        <p class="card-description">Basic form layout</p>
        <form class="forms-sample" action="/admin/kelas/update/{{ $geteditkelas->id }}" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="exampleInputUsername1">Tingkat kelas</label>
                <input type="text" class="form-control" id="exampleInputUsername1" name="tingkat_kelas" value="{{ $geteditkelas->tingkat_kelas }}">
            </div>
            <div class="form-group">
                <label for="exampleInputUsername1">Nama jurusan</label>
                <input type="text" class="form-control" id="exampleInputUsername1" value="{{ $geteditkelas->jurusan }}" name="jurusan">
            </div>
            <div class="form-group">
                <select class="form-control form-control-lg" id="exampleFormControlSelect1" name="gurubk_id">
                    <option  disabled >{{ $geteditkelas->gurubk->name }}</option>
                    @foreach ($getgurus as $item)
                    <option value="{{ $item->user_id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <select class="form-control form-control-lg" id="exampleFormControlSelect1" name="walas_id">
                    <option disabled>{{ $geteditkelas->walas->name_guru }}</option>
                    @foreach ($getwalas as $item)
                    <option value="{{ $item->user_id }}">{{ $item->name_guru }}</option>
                    @endforeach
                </select>
            </div>
            <button class="btn btn-primary mr-2"> Submit </button>
            <a href="/admin/kelas">
                <button id="cancle-form" type="button" class="btn btn-light">Cancel</button>
            </a>
        </form>
    </div>
    {{-- form add guru end --}}
{{-- form --}}

@endsection
