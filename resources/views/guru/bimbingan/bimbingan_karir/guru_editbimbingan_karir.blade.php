@extends('guru/guru_master')
@section('konten')
    {{-- form add hasil --}}
    <div class="card-body">
        <h4 class="card-title">Hasil Konseling</h4>
        <p class="card-description"></p>
        <form class="forms-sample" action="/konseling/updatebimbingankarir/{{ $getkonsul->id }}" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <label>Hasil Konseling</label>
                <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Hasil Konseling"
                    value="" name="hasil_konseling">
            </div>
            <button class="btn btn-primary mr-2"> Submit </button>
            <a href="/guru/konseling/bimbingankarir">
                <button id="cancle-form" type="button" class="btn btn-light">Cancel</button>
            </a>
        </form>
    </div>
    {{-- end hasil --}}
@endsection
