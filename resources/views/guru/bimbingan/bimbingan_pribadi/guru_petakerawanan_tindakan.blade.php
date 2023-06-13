@extends('guru/guru_master')
@section('konten')
    {{-- form add hasil --}}
    <div class="card-body">
        <h4 class="card-title">Kesimpulan</h4>
        <p class="card-description">Kesimpulan petakerawanan</p>
        <form class="forms-sample" action="/guru/petakerawanan/addkesimpulan/{{ $getkerawanan->murid_id }}" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <label>Kesimpulan</label>
                <input type="text" class="form-control" id="Kesimpulan" value="" name="kesimpulan">
            </div>
            <button class="btn btn-primary mr-2"> Submit </button>
            <a href="/guru/konseling/bimbinganpribadi">
                <button id="cancle-form" type="button" class="btn btn-light">Cancel</button>
            </a>
        </form>
    </div>
@endsection
