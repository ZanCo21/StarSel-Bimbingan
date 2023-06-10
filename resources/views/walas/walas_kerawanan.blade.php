@extends('walas/walas_master')
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
                    <p class="m-0">PETA-KERAWANAN</p>
                </a>
            </div>
            <button id="openPopup" type="button" class="btn btn-primary mt-2 mt-sm-0 btn-icon-text">
                <i class="mdi mdi-plus-circle"></i> Add Kerawanan </button>
        </div>
    </div>

    {{-- form add guru --}}
    <div class="card-bodyform">
        <h4 class="card-title">ADD KERAWANAN</h4>

        <form class="forms-sample" action="/walas/peta-kerawanan/add" method="POST">

            {{ csrf_field() }}
            <div class="form-group">
                <select class="form-control form-control-lg" id="exampleFormControlSelect1" name="walas_id">
                    <option disabled selected>Pilih Nama Wali Kelas</option>
                    @foreach ($getWalas as $get)
                        <option value="{{ $get->user_id }}">
                            {{ $get->name_guru }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <select class="form-control form-control-lg" id="exampleFormControlSelect1" name="murid_id">
                    <option disabled selected>Pilih Nama Murid</option>
                    @foreach ($getkerawanan as $get)
                        @foreach ($get->murids as $item)
                            <option value="{{ $item->user_id }}">
                                {{ $item->name }}
                            </option>
                        @endforeach
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <select class="form-control form-control-lg" id="exampleFormControlSelect1" name="kerawanan_id">
                    <option disabled selected>Jenis Kerawanan</option>

                    @foreach ($getJenisKerawanan as $item)
                        <option value="{{ $item->id }}">
                            {{ $item->jenis_kerawanan }}
                        </option>
                    @endforeach

                </select>
            </div>
            <div class="form-group">
                <select class="form-control form-control-lg" id="exampleFormControlSelect1" name="gurubk_id">
                    <option disabled selected>Pilih Guru Bk</option>
                    @foreach ($getGurubk as $get)
                        <option value="{{ $get->user_id }}">
                            {{ $get->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button class="btn btn-primary mr-2"> Submit </button>
            <button id="cancle-form" type="button" class="btn btn-light">Cancel</button>

        </form>

    </div>

    <div class="card-body" id="tableguru" style="background-color: white">
        <h4 class="card-title">Peta Kerawanan</h4>
        <p class="card-description"> Data <code>.Konsultasi</code>
        </p>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Nama Murid</th>
                        <th>Nama Walas</th>
                        <th>Nama Guru Bimbingan</th>
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

                                @foreach ($getGurubk as $ss)
                                    {{ $ss->name }}
                                @endforeach

                            </td>
                            <td>
                                @foreach ($get->jenis_kerawanan as $item)
                                    {{ $item->jenis_kerawanan }}
                                @endforeach
                            </td>
                            <td>
                                <a href="/walas/peta-kerawanan/details/{{ $get->id }}">
                                    <label class="badge badge-primary">Details</label>
                                    <a href="/walas/peta-kerawanan/get/{{ $get->id }}">
                                        <label class="badge badge-success">Edit</label>
                                    </a>
                                    <a href="/walas/peta-kerawanan/delete/{{ $get->id }}">
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
    </script>
@endsection
