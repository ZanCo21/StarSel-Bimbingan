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
                    <p class="m-0">GURU-KONSULTASI BIMBINGAN BELAJAR</p>
                </a>
            </div>
        </div>
    </div>


    <div style="display: block; width: 100%;">
        <div class="card-bodycoy" style=" margin-bottom: 3%; margin-top: 3%; background-color: white;">
            <h4 class="card-title">Data Bimbingan Belajar Reschedule</h4>
            <p class="card-description"> <code>.table</code>
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
                            <th>Tanggal Konseling</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($getkonsul as $item)
                            @if ($item->status == 'reschedule')
                            @if ($item->guru_id == Auth::id())
                            <tr>
                                <td class="py-1">
                                    {{ $item->id }}
                                </td>
                                <td>
                                    {{ $item->murids->name }}
                                </td>
                                <td>
                                    {{ $item->tema }}
                                </td>
                                <td>
                                        <span class="badge badge-warning">{{ $item->status }}</span>
                                </td>
                                <td>
                                    {{ $item->created_at }}
                                </td>
                                <td>
                                    {{ $item->tanggal_konseling }}
                                </td>
                                <td>
                                    <a href="/guru/bimbinganbelajar/detail/{{ $item->id }}">
                                        <label class="badge badge-warning">Detail</label>
                                    </a>
                                    {{-- <a href="{{ $item->id }}">
                                        <label class="badge badge-danger">Delete</label>
                                    </a> --}}
                                </td>
                            </tr>
                            @endif
                            @else
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    
    {{-- table pendding --}}
    <div style="display: block; width: 100%;">
        <div class="card-bodycoy" style=" margin-bottom: 3%; margin-top: 3%; background-color: white;">
            <h4 class="card-title">Data Bimbingan Belajar Pendding</h4>
            <p class="card-description"> <code>.table</code>
            </p>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Murid</th>
                            <th>Tema</th>
                            <th>Status</th>
                            <th>Tanggal Konseling</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($getkonsul as $item)
                            @if ($item->status == 'pending')
                            @if ($item->guru_id == Auth::id())
                            <tr>
                                <td class="py-1">
                                    {{ $item->id }}
                                </td>
                                <td>
                                    {{ $item->murids->name }}
                                </td>
                                <td>
                                    {{ $item->tema }}
                                </td>
                                <td>
                                        <span class="badge badge-danger">{{ $item->status }}</span>
                                </td>
                                <td>
                                    {{ $item->tanggal_konseling }}
                                </td>
                                <td>
                                    <a  href="/guru/bimbinganbelajar/detail/{{ $item->id }}">
                                        <label class="badge badge-warning">Detail</label>
                                    </a>
                                    <a href="/guru/konseling/getbimbinganbelajarpending/{{ $item->id }}">
                                        <label class="badge badge-success">Input Response</label>
                                    </a>
                                    {{-- <a href="{{ $item->id }}">
                                        <label class="badge badge-danger">Delete</label>
                                    </a> --}}
                                </td>
                            </tr>
                            @endif
                            @else
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    <div class="card-body" id="tableguru" style="background-color: white">
        <h4 class="card-title">Data Bimbingan Belajar</h4>
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
                        <th>Tanggal Konseling</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($getkonsul as $item)
                    @if ($item->status == 'accept')
                    @if ($item->guru_id == Auth::id())
                    <tr>
                        <td class="py-1">
                            {{ $item->id }}
                        </td>
                        <td>
                            {{ $item->murids->name }}
                        </td>
                        <td>
                            {{ $item->tema }}
                        </td>
                        <td>
                                <span class="badge badge-success">{{ $item->status }}</span>
                        </td>
                        <td>
                            {{ $item->tanggal_konseling }}
                        </td>
                        <td>
                            <a  href="/guru/bimbinganbelajar/detail/{{ $item->id }}">
                                <label class="badge badge-warning">Detail</label>
                            </a>
                            <a href="/guru/konseling/getbimbinganbelajar/{{ $item->id }}">
                                <label class="badge badge-success">Input Hasil</label>
                            </a>
                            {{-- <a href="/guru/konsul/getkonsul/{{ $item->id }}">
                                <label class="badge badge-primary">Edit</label>
                            </a> --}}
                            {{-- <a href="{{ $item->id }}">
                                <label class="badge badge-danger">Delete</label>
                            </a> --}}
                        </td>
                    </tr>
                    @endif
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
                        <th>Tanggal Konseling</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($getkonsul as $item)
                        @if ($item->status == 'complete')
                        @if ($item->guru_id == Auth::id())
                        <tr>
                            <td class="py-1">
                                    {{ $item->id }}
                                </td>
                                <td>
                                    {{ $item->murids->name }}
                                </td>
                                <td>
                                    {{ $item->tema }}
                                </td>
                                <td>
                                        <span class="badge badge-info">{{ $item->status }}</span>
                                </td>
                                <td>
                                    {{ $item->tanggal_konseling }}
                                </td>
                                <td>
                                    {{ $item->hasil_konseling }}
                                </td>
                                <td>
                                    <a  href="/guru/bimbinganbelajar/detail/{{ $item->id }}">
                                        <label class="badge badge-warning">Detail</label>
                                    </a>
                                    {{-- <a href="{{ $item->id }}">
                                        <label class="badge badge-danger">Delete</label>
                                    </a> --}}
                                </td>
                            </tr>
                        @endif
                            @else
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
