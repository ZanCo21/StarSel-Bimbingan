@extends('guru/guru_master')
@section('konten')
    {{-- form add hasil --}}
    <div class="card-body">
        <h4 class="card-title">Default form</h4>
        <p class="card-description">Basic form layout</p>
        <form class="forms-sample" action="/konseling/updatebimbinganbelajar/{{ $getkonsul->id }}" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <label>Hasil Konseling</label>
                <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Hasil Konseling"
                    value="" name="hasil_konseling">
            </div>
            <button class="btn btn-primary mr-2"> Submit </button>
            <button id="cancle-form" type="button" class="btn btn-light">Cancel</button>
        </form>
    </div>
    {{-- end hasil --}}
@endsection
