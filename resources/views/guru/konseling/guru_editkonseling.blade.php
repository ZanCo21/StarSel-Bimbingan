@extends('guru/guru_master')
@section('konten')
    {{-- form add kelas --}}
    <div class="card-bodyform" style="display: block;">
        <h4 class="card-title">Default form</h4>
        <p class="card-description">Basic form layout</p>
        <form class="forms-sample" action="/guru/konsul/update/{{ $getetkonsulpribadi->id }}" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <Label>Pilih Layanan</Label>
                <select class="form-control form-control-lg" name="layanan_id">
                    <option disabled value="{{ $getetkonsulpribadi->layanan_id }}">{{ $getetkonsulpribadi->layanan->jenis_layanan }}</option>
                    @foreach ($getlayanan as $item)
                        <option value="{{ $item->id }}">{{ $item->jenis_layanan }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <Label>Pilih Kelas</Label>
                <select class="form-control form-control-lg" id="kelas_id">
                    <option disabled selected>Pilih Kelas</option>
                    @foreach ($getkelas as $item)
                        <option value="{{ $item->id }}" walas="{{ $item->walas_id }}">{{ $item->tingkat_kelas }}
                            {{ $item->jurusan }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <Label>Pilih Murid</Label>
                <select class="form-control form-control-lg" id="murid_id" name="murid_id">
                    <option value="{{ $getetkonsulpribadi->id }}">{{ $getetkonsulpribadi->murids->name }}</option>
                </select>
            </div>
            <div class="form-group">
                <input type="hidden" class="form-control" id="walas_id" name="walas_id"
                    placeholder="ini untuk menangkap walas_id " value="{{ $getetkonsulpribadi->walas_id }}">
            </div>
            <div class="form-group">
                <label>Tema</label>
                <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Tema" name="tema" value="{{ $getetkonsulpribadi->tema }}">
            </div>
            <div class="form-group">
                <label>Keluhan</label>
                <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Keluhan" name="keluhan" value="{{ $getetkonsulpribadi->keluhan }}">
            </div>
            <div class="form-group">
                <label>Tanggal Konseling</label>
                <input type="date" class="form-control" id="exampleInputUsername1" placeholder="tanggal" name="tanggal_konseling" value="{{ $getetkonsulpribadi->tanggal_konseling }}">
            </div>
            <div class="form-group">
                <label>Tempat</label>
                <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Tempat" name="tempat" value="{{ $getetkonsulpribadi->tempat }}">
            </div>
            <button class="btn btn-primary mr-2"> Submit </button>
            <button id="cancle-form" type="button" class="btn btn-light">Cancel</button>
        </form>
    </div>
    {{-- end kelas --}}
    <script>
        $(document).ready(function() {
            $('#kelas_id').change(function() {
                var kelas = $(this).val();

                $.ajax({
                    url: '/guru/getmurid/' + kelas,
                    type: 'GET',
                    success: function(response) {
                        var muridSelect = $('#murid_id');
                        muridSelect.empty();

                        $.each(response, function(key, value) {
                            muridSelect.append('<option value="' + value.user_id +
                                '">' + value.name + '</option>');
                        });
                    }
                });
            });
        });


        $(document).ready(function() {
            $('#kelas_id').on('change', function() {
                var selectedOption = $(this).find('option:selected');
                var walasId = selectedOption.attr('walas');

                // Set value pada input hidden dengan nama walas_id
                $('#walas_id').val(walasId);
            });
        });

        $(document).ready(function() {
            $('#murid_id').on('change', function() {
                var muridid = $(this).val();


                // Set value pada input hidden dengan nama walas_id
                $('#muridhidden').val(muridid);
            });
        });
    </script>
@endsection
