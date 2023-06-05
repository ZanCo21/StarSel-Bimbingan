@extends('admin/admin_master')
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
                    <p class="m-0">ADM-ADM</p>
                </a>
            </div>
            <button id="openPopup" type="button" class="btn btn-primary mt-2 mt-sm-0 btn-icon-text">
                <i class="mdi mdi-plus-circle"></i> Add Kelas </button>
        </div>
    </div>

    {{-- form add guru --}}
    <div class="card-bodyform">
        <h4 class="card-title">Default form</h4>
        <p class="card-description">Basic form layout</p>
        <form class="forms-sample" action="/admin/guru/addmurid" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="exampleInputUsername1">Nama Kelas</label>
                <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Username" name="name_kelas">
            </div>
            <div class="form-group">
                <label for="exampleInputUsername1">Nama jurusan</label>
                <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Username" name="jurusan">
            </div>
            <div class="form-group">
                <select class="form-control form-control-lg" id="exampleFormControlSelect1" name="jenis_kelamin">
                    <option>Pilih Guru BK</option>
                    @foreach ($getgurus as $item)
                    <option value="{{ $item->user_id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <button class="btn btn-primary mr-2"> Submit </button>
            <button id="cancle-form" type="button" class="btn btn-light">Cancel</button>
        </form>
    </div>

    <div class="card-body" id="tableguru" style="background-color: white">
        <h4 class="card-title">Table Kelas</h4>
        <p class="card-description"> Data <code>.Murid</code>
        </p>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>gurubk_id</th>
                        <th>Name_kelas</th>
                        <th>jurusan</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @foreach ($getgurus as $item)
                        <tr>
                            <td class="py-1">
                                {{ $item->user_id }}
                            </td>
                            <td> 
                              {{ $item->name }}
                            </td>
                            <td> 
                              {{ $item->kelas }}
                            </td>
                            <td> 
                              {{ $item->jenis_kelamin }}
                            </td>
                            <td> 
                              {{ $item->tgl_lahir }}
                            </td>
                        </tr>
                    @endforeach --}}
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
