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
                    <p class="m-0">HASIL-KONSULTASI</p>
                </a>
            </div>
            {{-- <button id="openPopup" type="button" class="btn btn-primary mt-2 mt-sm-0 btn-icon-text">
                <i class="mdi mdi-plus-circle"></i> Add Konsultais </button> --}}
        </div>
    </div>

    {{-- form add guru --}}
    {{-- <div class="card-bodyform">
        <h4 class="card-title">ADD KONSULTASI</h4>
        <form class="forms-sample" action="/admin/guru/addguru" method="POST">
            {{ csrf_field() }}
          
            <button class="btn btn-primary mr-2"> Submit </button>
            <button id="cancle-form" type="button" class="btn btn-light">Cancel</button>
        </form>
    </div> --}}

    <div class="card-body" id="tableguru" style="background-color: white">
        <h4 class="card-title">Hasil Konsultasi</h4>
        <p class="card-description"> Data <code>.Konsultasi</code>
        </p>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Nama Siswa</th>
                        <th>Nama Guru</th>
                        <th>Tema</th>
                        <th>Tempat</th>
                        <th>Keluhan</th>
                        <th>Hasil Konseling</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($getjadwals as $get)
                        <tr>
                            <td class="py-1">
                                {{ $get->id }}
                            </td>
                            <td>
                                @foreach ($get->layanans as $item)
                                    {{ $item->jenis_layanan }}
                                @endforeach
                            </td>
                            <td>
                                @foreach ($get->murid as $murids)
                                    {{ $murids->name }}
                                @endforeach
                            </td>
                            <td>
                                @if ($get->gurus instanceof Illuminate\Database\Eloquent\Collection)
                                    @foreach ($get->gurus as $ss)
                                        {{ $ss->name }}
                                    @endforeach
                                @endif
                            </td>
                            <td>
                                {{ $get->tema }}
                            </td>
                            <td>
                                {{ $get->tempat }}
                            </td>
                            <td>
                                {{ $get->keluhan }}
                            </td>
                            <td>
                                {{ $get->hasil_konseling }}
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
