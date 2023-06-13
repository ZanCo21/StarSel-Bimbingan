@extends('guru/guru_master')
@section('konten')
    {{-- form add hasil --}}
    <div class="card-body">
        <h4 class="card-title">Default form</h4>
        <p class="card-description">Basic form layout</p>
        <form class="forms-sample" action="/konseling/updatebimbingankarir-pending/{{ $getkonsul->id }}" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <label>Tanggal</label>
                <div>
                    <label for=""><b>Tanggal Yang Di minta Siswa</b></label><p class="badge-warning">{{ $getkonsul->tanggal_konseling }}</p>
                </div>
                <input type="date" class="form-control" placeholder="{{ $getkonsul->tanggal_konseling }}" id="exampleInputUsername1" value="{{ $getkonsul->tanggal_konseling }}" name="tanggal_konseling">
            </div>
            <div class="form-group">
                <label>Tempat</label>
                <input type="text" class="form-control" id="exampleInputUsername1" value="" name="tempat">
            </div>
            <button class="btn btn-primary mr-2"> Submit </button>
            <a href="/guru/konseling/bimbingansosial">
                <button id="cancle-form" type="button" class="btn btn-light">Cancel</button>
            </a>
        </form>
    </div>
@endsection
