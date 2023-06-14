@extends('admin/admin_master')
@section('konten')
    <div class="page-header flex-wrap">
        <div class="header-left">
            <a href="/export+gurubk+excel">
                <button class="btn btn-outline-primary bg-white mb-2 mb-md-0"> Export Excel </button>
            </a>
            <a href="/export+gurubk+pdf" target="_blank">
                <button class="btn btn-outline-primary bg-white mb-2 mb-md-0"> Export Pdf </button>
            </a>
            <a href="">
                <button class="btn btn-outline-primary bg-white mb-2 mb-md-0"> Import Excel </button>
            </a>
            <a href="">
                <button class="btn btn-outline-primary bg-white mb-2 mb-md-0"> Import Pdf </button>
            </a>
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
                <i class="mdi mdi-plus-circle"></i> Add Guru </button>
        </div>
    </div>

{{-- form --}}
    {{-- form add guru --}}
    <div class="card-bodyform">
        <h4 class="card-title">Default form</h4>
        <p class="card-description">Basic form layout</p>
        <form class="forms-sample" action="{{ route('add_admin_guru') }}" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="exampleInputEmail1">Nama lengkap</label>
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nama lengkap" name="name">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" name="email">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Tanggal Lahir</label>
                <input type="date" class="form-control" id="exampleInputPassword1" placeholder="Tanggal lahir"
                    name="tgl_lahir">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Nip</label>
                <input type="number" class="form-control" id="exampleInputEmail1" placeholder="000232" name="nip">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Jenis kelamin</label>
                <select class="form-control form-control-lg" id="exampleFormControlSelect1" name="jenis_kelamin">
                    <option disabled selected>Jenis kelamin</option>
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password"
                    name="password">
            </div>
            <button class="btn btn-primary mr-2"> Submit </button>
            <button id="cancle-form" type="button" class="btn btn-light">Cancel</button>
        </form>
    </div>
    {{-- form add guru end --}}
{{-- form --}}

    <div class="card-body" id="tableguru" style="background-color: white">
        <h4 class="card-title">Table Guru BK</h4>
        <p class="card-description">Data<code>Guru BK</code>
        </p>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nama Lengkap</th>
                        <th>Jenis Kelamin</th>
                        <th>Tanggal Lahir</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($getgurus as $item)
                        <tr>
                            <td class="py-1">
                                {{ $item->user_id }}
                            </td>
                            <td> 
                              {{ $item->name }}
                            </td>
                            <td> 
                              {{ $item->jenis_kelamin }}
                            </td>
                            <td> 
                              {{ $item->tgl_lahir }}
                            </td>
                            <td>
                                <a href="/admin/guru/get/{{ $item->user_id }}">
                                    <label class="badge badge-success">Edit</label>
                                </a>
                                <a href="/admin/guru/delete/{{$item->user_id}}">
                                    <label class="badge badge-danger">Delete</label>
                                </a>
                                
                                {{-- <p class="badge badge-danger" data-id="<?php echo $item['user_id']; ?>"><a class="detail-btn " href="#ex1" rel="modal:open">DETAIL</a></p> --}}
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
