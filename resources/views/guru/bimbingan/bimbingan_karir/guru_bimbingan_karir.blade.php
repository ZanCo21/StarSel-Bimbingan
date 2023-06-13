@extends('guru/guru_master')
@section('konten')
    <div style="display: block; width: 100%;">
        <div class="card-bodycoy" style=" margin-bottom: 3%; margin-top: 3%; background-color: white;">
            <h4 class="card-title">Data Bimbingan Karir Reschedule</h4>
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
                        @foreach ($getkonsulkarir as $item)
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
                                            <a href="/guru/bimbingankarir/detail/{{ $item->id }}">
                                                <label class="badge badge-warning">Detail</label>
                                            </a>
                                            {{-- <a href="/guru/konseling/deletekarir/{{ $item->id }}">
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
                <h4 class="card-title">Data Bimbingan karir Pendding</h4>
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
                            @foreach ($getkonsulkarir as $item)
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
                                                <a href="/guru/bimbingankarir/detail/{{ $item->id }}">
                                                    <label class="badge badge-warning">Detail</label>
                                                </a>
                                                <a href="/guru/konseling/getbimbingankarirpending/{{ $item->id }}">
                                                    <label class="badge badge-success">Input Response</label>
                                                </a>
                                                {{-- <a href="/guru/konseling/deletekarir/{{ $item->id }}">
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

                {{-- table --}}
                <div style="display: block; width: 100%;">
                    <div class="card-bodycoy" style=" margin-bottom: 3%; margin-top: 3%; background-color: white;">
                        <h4 class="card-title">Jadwal Bimbingan Karir Accept</h4>
                        <p class="card-description"> Data<code>.succes</code>
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
                                    @foreach ($getkonsulkarir as $item)
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
                                                        {{ $item->created_at }}
                                                    </td>
                                                    <td>
                                                        <a href="/guru/bimbingankarir/detail/{{ $item->id }}">
                                                            <label class="badge badge-warning">Detail</label>
                                                        </a>
                                                        <a href="/guru/konseling/getbimbingankarir/{{ $item->id }}">
                                                            <label class="badge badge-success">Input hasil</label>
                                                        </a>
                                                        {{-- <a href="/guru/konseling/deletekarir/{{ $item->id }}">
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

                    {{-- form add hasil --}}
                    <div class="card-bodyform">
                        <h4 class="card-title">Default form</h4>
                        <p class="card-description">Basic form layout</p>
                        <form class="forms-sample" action="" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label>Hasil Konseling</label>
                                <input type="text" class="form-control" id="exampleInputUsername1"
                                    placeholder="Hasil Konseling" name="hasil_konseling">
                            </div>
                            <button class="btn btn-primary mr-2"> Submit </button>
                            <button id="cancle-form" type="button" class="btn btn-light">Cancel</button>
                        </form>
                    </div>
                    {{-- end hasil --}}

                    <div class="card-body">
                        <h4 class="card-title">Data Bimbingan Karir Complete</h4>
                        <p class="card-description"> <code>.counseling results</code>
                        </p>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Murid</th>
                                        <th>Tema</th>
                                        <th>Status</th>
                                        <th>Hasil Konseling</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($getkonsulkarir as $item)
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
                                                    {{ $item->created_at }}
                                                </td>
                                                <td>
                                                    {{ $item->hasil_konseling }}
                                                </td>
                                                <td>
                                                    <a href="/guru/bimbingankarir/detail/{{ $item->id }}">
                                                        <label class="badge badge-warning">Detail</label>
                                                    </a>
                                                    {{-- <a href="/guru/konseling/deletekarir/{{ $item->id }}">
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
                </div>
                <script>
                    // Ambil elemen dengan ID
                    const openPopupButton = document.getElementById('openPopuprawan');
                    const closePopupButton = document.getElementById('cancle-formrawan');

                    // Fungsi untuk menampilkan pop-up
                    function openPopup() {
                        // Ambil elemen card-body
                        const cardBody = document.querySelector('.card-bodyformrawan');
                        const cardtable = document.querySelector('.card-bodyrawan');


                        // Tampilkan elemen card-body sebagai pop-up
                        cardBody.style.display = 'block';
                        cardtable.style.display = 'none';
                    }

                    function closePopup() {
                        // Ambil elemen card-body
                        const cardBody = document.querySelector('.card-bodyformrawan');
                        const cardtable = document.querySelector('.card-bodyrawan');


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
