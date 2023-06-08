@extends('guru/guru_master')
@section('konten')
    {{-- table --}}
    <div style="display: block; width: 100%;">
        <div class="card-bodycoy" style=" margin-bottom: 3%; margin-top: 3%; background-color: white;">
            <h4 class="card-title">Data Bimbingan Pribadi</h4>
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
                                        <a>
                                            <label class="badge badge-warning">Detail</label>
                                        </a>
                                        <a href="/guru/konseling/getbimbinganpribadi/{{ $item->id }}">
                                            <label class="badge badge-success">Input Hasil</label>
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

        {{-- form add hasil --}}
        <div class="card-bodyform">
            <h4 class="card-title">Default form</h4>
            <p class="card-description">Basic form layout</p>
            <form class="forms-sample" action="" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <label>Hasil Konseling</label>
                    <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Hasil Konseling" name="hasil_konseling">
                </div>
                <button class="btn btn-primary mr-2"> Submit </button>
                <button id="cancle-form" type="button" class="btn btn-light">Cancel</button>
            </form>
        </div>
        {{-- end hasil --}}

        <div class="card-body">
            <h4 class="card-title">Data Bimbingan Pribadi</h4>
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
    </div>

      {{-- form add kerawanan --}}
      <div class="card-bodyformrawan" style="display: none; margin-bottom: 3%; background-color: white;">
        <h4 class="card-title">Default form</h4>
        <p class="card-description">Basic form layout</p>
        <form class="forms-sample" action="/guru/peta-kerawanan/add" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <select class="form-control form-control-lg" id="exampleFormControlSelect1" name="walas_id">
                    <option disabled selected>Pilih Nama Wali Kelas</option>
                    @foreach ($getwalas as $item)
                    <option value="{{ $item->user_id }}">
                        {{ $item->name_guru }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <select class="form-control form-control-lg" id="exampleFormControlSelect1" name="murid_id">
                    <option disabled selected>Pilih Nama Murid</option>
                    @foreach ($getmurid as $item)
                    <option value="{{ $item->user_id }}">
                        {{ $item->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <select class="form-control form-control-lg" id="exampleFormControlSelect1" name="murid_id">
                    <option disabled selected>Pilih Jenis</option>
                    @foreach ($getjeniskerawanan as $item)
                    <option value="{{ $item->id }}">
                        {{ $item->jenis_kerawanan }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button class="btn btn-primary mr-2"> Submit </button>
            <button id="cancle-formrawan" type="button" class="btn btn-light">Cancel</button>
        </form>
    </div>
    {{-- end kelas --}}

    <div class="card-bodyrawan" id="tableguru" style="background-color: white; margin-top: 3%; margin-bottom: 5%;">
        <h4 class="card-title">Peta Kerawanan</h4>
        <p class="card-description"> Data <code>.Konsultasi</code></p>
        <button style="" id="openPopuprawan" type="button" class="btn btn-primary mt-2 mt-sm-0 btn-icon-text">
            <i class="mdi mdi-plus-circle"></i> Add Kerawanan </button>

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
                        <tr>
                            <td class="py-1">
                                {{ $get->id }}
                            </td>
                            <td>
                                @foreach ($get->murids as $murid)
                                    {{ $murid->name }}
                                @endforeach
                            </td>
                            <td>
                                @if ($get->walas instanceof Illuminate\Database\Eloquent\Collection)
                                    @foreach ($get->walas as $ss)
                                        {{ $ss->name_guru }}
                                    @endforeach
                                @endif
                            </td>
                            <td>
                                {{ $get->jenis_kewaranan }}
                            </td>
                            <td>
                                <a>
                                    <label class="badge badge-primary">Details</label>
                                <a href="/guru/peta-kerawanan/get/{{ $get->id }}">
                                    <label class="badge badge-success">Input Hasil</label>
                                </a>
                                <a href="/guru/peta-kerawanan/delete/{{$get->id}}">
                                    <label class="badge badge-danger">Delete</label>
                                </a>
                            </td>
                        </tr>
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
        </script>
    @endsection
