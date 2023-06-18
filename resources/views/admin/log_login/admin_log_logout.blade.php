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

    {{-- form add kelas --}}
    {{-- <div class="card-bodyform">
        <h4 class="card-title">Default form</h4>
        <p class="card-description">Basic form layout</p>
        <form class="forms-sample" action="/admin/addkelas" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="exampleInputUsername1">Tingkat kelas</label>
                <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Username" name="tingkat_kelas">
            </div>
            <div class="form-group">
                <label for="exampleInputUsername1">Nama jurusan</label>
                <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Multimedia" name="jurusan">
            </div>
            <div class="form-group">
                <select class="form-control form-control-lg" id="exampleFormControlSelect1" name="gurubk_id">
                    <option  disabled selected>Pilih Guru BK</option>
                    @foreach ($getgurus as $item)
                    <option value="{{ $item->user_id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <select class="form-control form-control-lg" id="exampleFormControlSelect1" name="walas_id">
                    <option disabled selected>Pilih Walas</option>
                    @foreach ($getwalas as $item)
                    <option value="{{ $item->user_id }}">{{ $item->name_guru }}</option>
                    @endforeach
                </select>
            </div>
            <button class="btn btn-primary mr-2"> Submit </button>
            <button id="cancle-form" type="button" class="btn btn-light">Cancel</button>
        </form>
    </div> --}}
    {{-- end kelas --}}

    <div class="card-body" id="tableguru" style="background-color: white">
        <h4 class="card-title">Table Kelas</h4>
        <p class="card-description"> Data <code>.Murid</code>
        </p>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Ip Address</th>
                        <th>Waktu Logout</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($logoutLogs as $item)
                        <tr>
                            <td class="py-1">
                                {{ $item->id }}
                            </td>
                            <td> 
                              {{ $item->user->name }}
                            </td>
                            <td> 
                              {{ $item->user->email }}
                            </td>
                            <td> 
                                {{ $item->user->role }}
                            </td>
                            <td> 
                                {{ $item->ip_address }}
                            </td>
                            <td> 
                              {{ $item->timestamp }}
                            </td>
                            <td>
                                <a href="/admin/kelas/get/{{ $item->id }}">
                                    <label class="badge badge-success">Edit</label>
                                </a>
                                <a href="/admin/kelas/delete/{{$item->id}}">
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
