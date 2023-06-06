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
    <div class="card-bodyform">
        <h4 class="card-title">Default form</h4>
        <p class="card-description">Basic form layout</p>
        <form class="forms-sample" action="{{ url('/admin/murid/add') }}" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="exampleInputUsername1">Name</label>
                <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Username" name="name">
            </div>
            <div class="form-group">
                <label for="exampleInputUsername1">Email</label>
                <input type="email" class="form-control" id="exampleInputUsername1" placeholder="email" name="email">
            </div>
            <div class="form-group">
                <label for="exampleInputUsername1">Nipd</label>
                <input type="number" class="form-control" id="exampleInputUsername1" placeholder="nipd" name="nipd">
            </div>
            <div class="form-group">
                <select class="form-control form-control-lg" id="exampleFormControlSelect1" name="jenis_kelamin">
                    <option disabled selected>Jenis kelamin</option>
                    <option value="L">L</option>
                    <option value="P">P</option>
                </select>
            </div>
            <div class="form-group">
                <select class="form-control form-control-lg" id="exampleFormControlSelect1" name="kelas_id">
                    <option disabled selected>Pilih Kelas</option>
                    @foreach ($getkelas as $item)
                    <option value="{{ $item->id }}">{{ $item->tingkat_kelas }} {{ $item->jurusan }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputUsername1">Tanggal Lahir</label>
                <input type="date" class="form-control" id="exampleInputUsername1" placeholder="Tanggal Lahir" name="tgl_lahir">
            </div>
            <div class="form-group">
                <label for="exampleInputUsername1">Password</label>
                <input type="password" class="form-control" id="exampleInputUsername1" placeholder="password" name="password">
            </div>
            <button class="btn btn-primary mr-2"> Submit </button>
            <button id="cancle-form" type="button" class="btn btn-light">Cancel</button>
        </form>
    </div>
    {{-- end kelas --}}

    <div class="card-body" id="tableguru" style="background-color: white">
        <h4 class="card-title">Table Kelas</h4>
        <p class="card-description"> Data <code>.Murid</code>
        </p>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>User id</th>
                        <th>kelas</th>
                        <th>Walas</th>
                        <th>Nipd</th>
                        <th>Jenis Kemlamin</th>
                        <th>Tanggal Lahir</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($getmurid as $item)
                        <tr>
                            <td class="py-1">
                                {{ $item->user_id }}
                            </td>
                            <td> 
                              {{ $item->kelas->tingkat_kelas }}{{ $item->kelas->jurusan }}
                            </td>
                            <td> 
                                {{ $item->kelas->walas->name_guru }}
                            </td>
                            <td> 
                              {{ $item->nipd }}
                            </td>
                            <td> 
                              {{ $item->jenis_kelamin }}
                            </td>
                            <td> 
                                {{ $item->tgl_lahir }}
                              </td>
                            <td>
                                <a href="/admin/murid/get/{{ $item->user_id }}">
                                    <label class="badge badge-success">Edit</label>
                                </a>
                                <a href="/admin/murid/delete/{{$item->user_id}}">
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
