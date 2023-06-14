@extends('murid/murid_master')
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
                    <p class="m-0">SISWA-KONSULTASI</p>
                </a>
            </div>
            <button id="openPopup" type="button" class="btn btn-primary mt-2 mt-sm-0 btn-icon-text">
                <i class="mdi mdi-plus-circle"></i> Add Konsultais </button>
        </div>
    </div>

    {{-- form add kelas --}}
    <div class="card-bodyform">
        <h4 class="card-title">FORM TAMBAH JADWAL KONSULTASI</h4>
        <p class="card-description">TAMBAH JADWAL KONSULTASI</p>
        <form class="forms-sample" action="/murid/konseling/add" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <Label>Pilih Layanan</Label>
                <select class="form-control form-control-lg" id="exampleFormControlSelect1" name="layanan_id" required>
                    <option disabled>Pilih Layanan</option>
                    @foreach ($getlayanan as $item)
                        <option value="{{ $item->id }}">{{ $item->jenis_layanan }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <input type="hidden" class="form-control" id="walas_id" name="walas_id"
                    placeholder="ini untuk menangkap walas_id " value="{{ $kelasMurid->kelas->walas_id}}">
            </div>
            <div class="form-group">
                <input type="hidden" class="form-control" id="gurubk_id" name="gurubk_id"
                    placeholder="ini untuk menangkap gurubk_id " value="{{ $kelasMurid->kelas->gurubk_id}}">
            </div>
            <div class="form-group">
                <input type="hidden" class="form-control" id="murid_id" name="murid_id"
                    placeholder="ini untuk menangkap murid_id " value="{{ $muridId }}">
            </div>
            <div class="form-group">
                <label>Tema</label>
                <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Tema" name="tema" required>
            </div>
            <div class="form-group">
                <label>Tanggal Konseling</label>
                <input type="datetime-local" class="form-control" id="exampleInputUsername1" placeholder="tanggal"
                    name="tanggal_konseling" required>
            </div>
            <div class="form-group">
                <label>Keluhan</label>
                <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Keluhan" name="keluhan" required>
            </div>
            <button class="btn btn-primary mr-2"> Submit </button>
            <button id="cancle-form" type="button" class="btn btn-light">Cancel</button>
        </form>
    </div>
    {{-- end kelas --}}

    <div class="card-body" id="tableguru" style="background-color: white">
        <h4 class="card-title">New Jadwal Konsultasi</h4>
        <p class="card-description"> Data<code>Konsultasi</code>
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
                    @foreach ($konseling as $item)
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
                            @if ( $item->status == 'pending' )
                            <span class="badge badge-warning">{{ $item->status }}</span>
                            @else
                            <span class="badge badge-success">{{ $item->status }}</span>
                            @endif
                        </td>
                        <td>
                            {{ $item->created_at }}
                        </td>
                        <td>
                            <a href="/murid/konseling/detail/{{$item->id}}">
                                <label class="badge badge-warning">Detail</label>
                            </a>
                            {{-- <a href="">
                                <label class="badge badge-success">Edit</label>
                            </a> --}}
                            {{-- <a href="/admin/konsul/delete/{{ $item->id }}">
                                <label class="badge badge-danger">Delete</label>
                            </a> --}}
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
