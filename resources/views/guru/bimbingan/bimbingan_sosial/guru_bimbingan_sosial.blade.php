@extends('guru/guru_master')
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
                    <p class="m-0">GURU-KONSULTASI SOSIAL</p>
                </a>
            </div>
            {{-- <button id="openPopup" type="button" class="btn btn-primary mt-2 mt-sm-0 btn-icon-text">
                <i class="mdi mdi-plus-circle"></i> Add Konsultais </button> --}}
        </div>
    </div>



    {{-- form add kelas --}}
    <div class="card-bodyform">
        <h4 class="card-title">Default form</h4>
        <p class="card-description">Basic form layout</p>
        <form class="forms-sample" action="{{ url('/guru/konseling/addbimbingansosial') }}" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <Label>Pilih Layanan</Label>
                <select class="form-control form-control-lg" id="exampleFormControlSelect1" name="layanan_id">
                    <option disabled>Pilih Layanan</option>
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
            <div class='form-group'>
                <p>Murid</p>
                <select class="js-example-basic-multiple" id="multiplemurid" multiple="multiple" style="width: 100%;"
                    name="murid_id[]">
                    <option value=""></option>
                </select>
            </div>
            {{-- <div class="form-group">
                <Label>Pilih Murid</Label>
                <select class="form-control form-control-lg" id="murid_id" name="murid_id">
                    <option disabled>Pilih Murid</option>
                </select>
            </div> --}}
            <div class="form-group">
                <input type="hidden" class="form-control" id="walas_id" name="walas_id"
                    placeholder="ini untuk menangkap walas_id " value="">
            </div>
            <div class="form-group">
                <label>Tema</label>
                <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Tema" name="tema">
            </div>
            <div class="form-group">
                <label>Keluhan</label>
                <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Keluhan" name="keluhan">
            </div>
            <div class="form-group">
                <label>Tanggal Konseling</label>
                <input type="date" class="form-control" id="exampleInputUsername1" placeholder="tanggal"
                    name="tanggal_konseling">
            </div>
            <div class="form-group">
                <label>Tempat</label>
                <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Tempat" name="tempat">
            </div>
            <button class="btn btn-primary mr-2"> Submit </button>
            <button id="cancle-form" type="button" class="btn btn-light">Cancel</button>
        </form>
    </div>
    {{-- end kelas --}}
    <div class="card-body" id="tableguru" style="background-color: white">
        <h4 class="card-title">Data Bimbingan Sosial</h4>
        <p class="card-description"> Data <code>.Konsultasi</code>
        </p>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Murid</th>
                        <th>Tema</th>
                        <th>Status</th>
                        <th>Created</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($getkonsul as $item)
                    @if ($item->hasil_konseling == null)
                        <tr>
                            <td class="py-1">
                                {{ $item->id }}
                            </td>
                            <td>
                                {{ $item->murid->name }}
                            </td>
                            <td>
                                {{ $item->tema }}
                            </td>
                            <td>
                                @if ($item->status == 'pending')
                                    <span class="badge badge-warning">{{ $item->status }}</span>
                                @else
                                    <span class="badge badge-success">{{ $item->status }}</span>
                                @endif
                            </td>
                            <td>
                                {{ $item->created_at }}
                            </td>
                            <td>
                                <a href="">
                                    <label class="badge badge-warning">Detail</label>
                                </a>
                                <a href="/guru/konseling/getbimbingansosial/{{ $item->id }}">
                                    <label class="badge badge-success">Input Hasil</label>
                                </a>
                                <a href="/guru/konsul/getkonsul/{{ $item->id }}">
                                    <label class="badge badge-primary">Edit</label>
                                </a>
                                <a href="/admin/konsul/delete/{{ $item->id }}">
                                    <label class="badge badge-danger">Delete</label>
                                </a>
                            </td>
                        </tr>
                        @else
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-body" id="tableguru" style="background-color: white; margin-top: 3%; margin-bottom: 3%;">
        <h4 class="card-title">Bimbingan Sosial <br> .counseling results</h4>
        <p class="card-description"> Data <code>.counseling results</code>
        </p>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Murid</th>
                        <th>Tema</th>
                        <th>Status</th>
                        <th>Hasil konseling</th>
                        <th>Created</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($getkonsul as $item)
                        @if ($item->hasil_konseling == null)
                        @else
                            <tr>
                                <td class="py-1">
                                    {{ $item->id }}
                                </td>
                                <td>
                                    {{ $item->murid->name }}
                                </td>
                                <td>
                                    {{ $item->tema }}
                                </td>
                                <td>
                                    @if ($item->status == 'pending')
                                        <span class="badge badge-warning">{{ $item->status }}</span>
                                    @else
                                        <span class="badge badge-success">{{ $item->status }}</span>
                                    @endif
                                </td>
                                <td>
                                    {{ $item->created_at }}
                                </td>
                                <td>
                                    {{ $item->hasil_konseling }}
                                </td>
                                <td>
                                    <a href="">
                                        <label class="badge badge-warning">Detail</label>
                                    </a>
                                    <a href="/admin/konsul/delete/{{ $item->id }}">
                                        <label class="badge badge-danger">Delete</label>
                                    </a>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
        // select multipel
        $(document).ready(function() {
            $('#multiplemurid').select2({
                placeholder: 'Pilih Murid',
            });
        });

        $("#multiplemurid").change(function() {
            var idmhs = $("#multiplemurid").val();

            $("#multiplemurid").attr("multiple", "multiple");
            $.get("{{ url('ngampumk') }}/" + idmhs, function(data) {
                $('#multiplemurid').html(data);
            });
            $("#selectmk").select2({
                placeholder: 'Pilih Matakuliah',
                allowClear: true,
                ajax: {
                    url: "{{ url('selectmk') }}" + '/' + idmhs,
                    processResults: function({
                        data
                    }) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    id: item.id,
                                    text: item.nama_matakuliah
                                }
                            })
                        }
                    }
                }
            });
        });

        // Ambil elemen dengan ID
        const openPopupButton = document.getElementById('openPopup');
        const closePopupButton = document.getElementById('cancle-form');

        // Fungsi untuk menampilkan pop-up
        function openPopup() {
            // Ambil elemen card-body
            const cardBody = document.querySelector('.card-bodyform');
            const cardtable = document.querySelector('.card-body');


            // Tampilkan elemen card-body sebagai pop-up
            cardBody.style.display = 'block';
            cardtable.style.display = 'none';
        }

        function closePopup() {
            // Ambil elemen card-body
            const cardBody = document.querySelector('.card-bodyform');
            const cardtable = document.querySelector('.card-body');


            // Tampilkan elemen card-body sebagai pop-up
            cardBody.style.display = 'none';
            cardtable.style.display = 'block';
        }

        // Tambahkan event listener untuk memanggil fungsi openPopup saat tombol diklik
        openPopupButton.addEventListener('click', openPopup);
        closePopupButton.addEventListener('click', closePopup);

        $(document).ready(function() {
            $('#kelas_id').change(function() {
                var kelas = $(this).val();

                $.ajax({
                    url: '/guru/getmurid/' + kelas,
                    type: 'GET',
                    success: function(response) {
                        var muridSelect = $('#multiplemurid');
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
