@extends('guru/guru_master')
@section('konten')
    {{-- table  --}}
    <div style="display: block; width: 100%;">
        <div class="card-bodycoy" style=" margin-bottom: 3%; margin-top: 3%; background-color: white;">
            <h4 class="card-title">Data Bimbingan Pribadi Reschedule</h4>
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
                                    <a  href="/guru/bimbinganpribadi/detail/{{ $item->id }}">
                                        <label class="badge badge-warning">Detail</label>
                                    </a>
                                    {{-- <a href="/guru/konseling/getbimbinganpribadipending/{{ $item->id }}">
                                        <label class="badge badge-success">Tindakan</label>
                                    </a> --}}
                                    {{-- <a href="/admin/konsul/delete/{{ $item->id }}">
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
                <h4 class="card-title">Data Bimbingan Pribadi Pendding</h4>
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
                                        {{ $item->created_at }}
                                    </td>
                                    <td>
                                        {{ $item->tanggal_konseling }}
                                    </td>
                                    <td>
                                        <a href="/guru/bimbinganpribadi/detail/{{ $item->id }}">
                                            <label class="badge badge-warning">Detail</label>
                                        </a>
                                        <a href="/guru/konseling/getbimbinganpribadipending/{{ $item->id }}">
                                            <label class="badge badge-success">Tindakan</label>
                                        </a>
                                        {{-- <a href="/admin/konsul/delete/{{ $item->id }}">
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

            {{-- table accept --}}
            <div style="display: block; width: 100%;">
                <div class="card-bodycoy" style=" margin-bottom: 3%; margin-top: 3%; background-color: white;">
                    <h4 class="card-title">Data Bimbingan Pribadi Accept</h4>
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
                                            {{ $item->created_at }}
                                        </td>
                                        <td>
                                            <a href="/guru/bimbinganpribadi/detail/{{ $item->id }}">
                                                <label class="badge badge-warning">Detail</label>
                                            </a>
                                            <a href="/guru/konseling/getbimbinganpribadi/{{ $item->id }}">
                                                <label class="badge badge-success">Tindakan</label>
                                            </a>
                                            {{-- <a href="/admin/konsul/delete/{{ $item->id }}">
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
                    <h4 class="card-title">Data Bimbingan Pribadi Complete</h4>
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
                                    <th>Created</th>
                                    <th>Hasil Konseling</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($getkonsul as $item)
                                    @if ($item->hasil_konseling == null)
                                    @else
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
                                                <a href="/guru/bimbinganpribadi/detail/{{ $item->id }}">
                                                    <label class="badge badge-warning">Detail</label>
                                                </a>
                                                {{-- <a href="/admin/konsul/delete/{{ $item->id }}">
                                                    <label class="badge badge-danger">Delete</label>
                                                </a> --}}
                                            </td>
                                        </tr>
                                        @endif
                                        @endif
                                    @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            {{-- form add kerawanan --}}
            <div class="card-bodyformrawan" style="display: none; margin-bottom: 3%; background-color: white;">
                <h4 class="card-title">Default form</h4>
                <p class="card-description">Basic form layout</p>
                <form class="forms-sample" action="/guru/peta-kerawanan/add" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <Label>Pilih Kerawanan</Label>
                        <select class="form-control form-control-lg" id="exampleFormControlSelect1" name="kerawanan_id">
                            <option disabled>Pilih Kerawanan</option>
                            @foreach ($getjeniskerawanan as $item)
                                <option value="{{ $item->id }}">{{ $item->jenis_kerawanan }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <Label>Pilih Kelas</Label>
                        <select class="form-control form-control-lg" id="kelas_id">
                            <option disabled selected>Pilih Kelas</option>
                            @foreach ($getkelas as $item)
                                <option value="{{ $item->id }}" walas="{{ $item->walas_id }}">
                                    {{ $item->tingkat_kelas }}
                                    {{ $item->jurusan }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <Label>Pilih Murid</Label>
                        <select class="form-control form-control-lg" id="murid_id" name="murid_id">
                            <option disabled>Pilih Murid</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="walas_id" name="walas_id"
                            placeholder="ini untuk menangkap walas_id " value="">
                    </div>

                    <button class="btn btn-primary mr-2"> Submit </button>
                    <button id="cancle-formrawan" type="button" class="btn btn-light">Cancel</button>
                </form>
            </div>
            {{-- end kelas --}}

            <div class="card-bodyrawan" id="tableguru"
                style="background-color: white; margin-top: 3%; margin-bottom: 5%;">
                <h4 class="card-title">Peta Kerawanan</h4>
                <p class="card-description"> Data <code>.Konsultasi</code></p>
                <button style="" id="openPopuprawan" type="button"
                    class="btn btn-primary mt-2 mt-sm-0 btn-icon-text">
                    <i class="mdi mdi-plus-circle"></i> Add Kerawanan </button>

                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Nama Murid</th>
                                <th>Wali Kelas</th>
                                <th>Guru Bk</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($getkerawanan as $item)
                                @if ($item->kesimpulan == null)
                                    @if ($item->gurubk_id == Auth::id())
                                        <tr>
                                            <td>{{ $item->murid_id }}</td>
                                            <td>{{ $item->murid->name }}</td>
                                            <td>{{ $item->walass->name_guru }}</td>
                                            <td>{{ $item->gurus->name }}</td>
                                            <td>
                                                <a class="detail-btn  "
                                                    href="/guru/petakerawanan/detail/{{ $item->murid_id }}"
                                                    rel="modal:open" style="margin-right: 2%;">
                                                    <label class="badge badge-primary">Details</label>
                                                </a>
                                                <a
                                                    href="/guru/petakerawanan/kesimpulan/{{ $item->murid_id }}"style="margin-right: 2%;">
                                                    <label class="badge badge-success">Tindakan</label>
                                                </a>
                                                {{-- <a href="/guru/peta-kerawanan/delete/{{ $item->murid_id }}">
                                                    <label class="badge badge-danger">Delete</label>
                                                </a> --}}
                                            </td>
                                        </tr>
                                    @endif
                                @else
                                @endif
                            @endforeach

                            {{-- @foreach ($getkerawanan as $userId => $kerawanan)
                        php $user = App\Models\Murid::find($userId); ?>
                        <tr>
                            <td rowspan="{{ count($kerawanan) + 1 }}">{{ $userId }}</td>
                            <td rowspan="{{ count($kerawanan) + 1 }}">{{ $user->name }}</td> --}}
                            {{-- <td rowspan="{{ count($kerawanan) + 1 }}">{{ $userr->walas_id }}</td> --}}
                            {{-- <td rowspan="{{ count($kerawanan) + 1}}">
                                @if ($user->kelas)
                                {{ $user->kelas->walas->name_guru }}
                            @endif
                            </td>
                            <td rowspan="{{ count($kerawanan) + 1}}"> --}}
                            {{-- @php $gurubkId = App\Models\Kerawanan::where('murid_id', $userId)->value('gurubk_id');
                                $gurubkName = App\Models\Gurubk::where('user_id', $gurubkId)->value('name');
                                @endphp --}}
                            {{-- <span>Guru BK: {{ $gurubkName }}</span>                               --}}
                            </td>
                            </tr>
                            {{-- @php $isFirstRow = true; @endphp --}}
                            {{-- @foreach ($kerawanan as $kerawananId => $jumlah) --}}
                            {{-- @php $jenisKerawanan = App\Models\JenisKerawanan::find($kerawananId); @endphp --}}
                            <tr>
                                {{-- <td>{{ $jenisKerawanan->jenis_kerawanan }}</td> --}}
                                {{-- <td>{{ $jumlah }}</td> --}}
                                {{-- @if ($isFirstRow)
                                    <td rowspan="{{ count($kerawanan) }}" class="d-flex justify-content-end">
                                        <a class="detail-btn  " href="/guru/petakerawanan/detail/{{ $userId }}" rel="modal:open" style="margin-right: 2%;">
                                            <label class="badge badge-primary">Details</label>
                                        </a>
                                        <a href="/guru/petakerawanan/kesimpulan/{{ $userId }}"style="margin-right: 2%;">
                                            <label class="badge badge-success">Tindakan</label>
                                        </a>
                                        <a href="/guru/peta-kerawanan/delete/{{$userId}}">
                                            <label class="badge badge-danger">Delete</label>
                                        </a>
                                    </td>
                                    @php $isFirstRow = false; @endphp
                                @endif
                            </tr>
                        @endforeach
                    @endforeach --}}
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card-bodyrawan" id="tableguru"
                style="background-color: white; margin-top: 3%; margin-bottom: 5%;">
                <h4 class="card-title">Peta Kerawanan Counseling results</h4>
                <p class="card-description"> Data <code>.Counseling results</code></p>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Nama Walas</th>
                                <th>Nama Murid</th>
                                <th>Jenis_kerawanan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($getkerawanan as $get)
                                @if ($get->kesimpulan == null)
                                @else
                                    @if ($item->gurubk_id == Auth::id())
                                        <tr>
                                            <td>{{ $get->murid_id }}</td>
                                            <td>{{ $get->murid->name }}</td>
                                            <td>{{ $get->walass->name_guru }}</td>
                                            <td>{{ $get->gurus->name }}</td>
                                            <td>
                                                <a href="/guru/petakerawanan/detail/{{ $get->murid_id }}">
                                                    <label class="badge badge-primary">Details</label>
                                                </a>
                                                    {{-- <a href="/guru/peta-kerawanan/delete/{{ $get->murid_id }}">
                                                        <label class="badge badge-danger">Delete</label>
                                                    </a> --}}
                                            </td>
                                        </tr>
                                    @endif
                                @endif
                            @endforeach
                        </tbody>
                    </table>
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
