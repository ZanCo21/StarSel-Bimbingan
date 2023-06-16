@extends('murid/murid_master')
@section('konten')
    {{-- form add hasil --}}
    <div class="card-body">
        <h4 class="card-title">Default form</h4>
        <p class="card-description">Basic form layout</p>
        <form class="forms-sample" action="/murid/konseling/add" method="POST">
            {{ csrf_field() }}
            <input type="hidden" name="layanan_id" value="2">
            <div class="form-group">
                <input type="hidden" class="form-control" id="walas_id" name="walas_id"
                    placeholder="ini untuk menangkap walas_id " value="{{ $kelasMurid->kelas->walas_id}}">
            </div>
            <div class="form-group">
                <input type="hidden" class="form-control" id="gurubk_id" name="gurubk_id"
                    placeholder="ini untuk menangkap gurubk_id " value="{{ $kelasMurid->kelas->gurubk_id}}">
            </div>
            <div class="form-group">
                <input type="hidden" class="form-control" id="murid_id" name="murid_id"
                    placeholder="ini untuk menangkap murid_id " value="{{ $muridId }}">
            </div>
            <div class="form-group">
                <label>Tema</label>
                <select name="tema" class="form-control form-control-lg">
                    <option value="Lanjut Kuliah">lanjut Kuliah</option>
                    <option value="Lanjut kerja">lanjut Kerja</option>
                </select>
            </div>
            <div class="form-group">
                <label>Tanggal Konseling</label>
                <input type="datetime-local" class="form-control" id="exampleInputUsername1" placeholder="tanggal"
                    name="tanggal_konseling" required>
            </div>
            <div class="form-group">
                <label>Tujuan</label>
                <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Keluhan" name="keluhan" required>
            </div>
            <button class="btn btn-primary mr-2"> Submit </button>
            <button id="cancle-form" type="button" class="btn btn-light">Cancel</button>
        </form>
    </div>
@endsection
