@extends('walas/walas_master')
@section('konten')
 {{-- profile user --}}
 <div class="container">
    <div class="main-body">
        <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin"
                                class="rounded-circle" width="150"
                                height="150">
                            <div class="mt-3">
                                <h4>{{ $getwalas->name_guru }}</h4>
                                <p class="text-secondary mb-1">Wali Kelas</p>
                                <p class="text-muted font-size-sm">{{ $kelas->tingkat_kelas }} {{ $kelas->jurusan }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Full Name</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{ $getwalas->name_guru }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Email</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{ $user->email }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">NIP</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{ $getwalas->nip }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Identity</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{ $user->role }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Account Created</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{ $getwalas->created_at }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-12">
                                <a class="btn btn-info " target="__blank"
                                    href="https://www.bootdey.com/snippets/view/profile-edit-data-and-skills">Edit</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
{{-- end profile --}}

{{-- table --}}
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


{{-- <div style="display: block; width: 100%;">

<div class="card-body">
    <h4 class="card-title">Data Konseling</h4>
    <p class="card-description">  <code>.table</code>
    </p>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>VatNo.</th>
                    <th>Jadwal</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Jacob</td>
                    <td>53275531</td>
                    <td>12 May 2017</td>
                    <td>
                        <label class="badge badge-success">Accept</label>
                    </td>
                    <td>
                        <label class="badge badge-danger">Detail</label>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<div class="card-body">
    <h4 class="card-title">Data Konseling</h4>
    <p class="card-description">  <code>.table</code>
    </p>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>VatNo.</th>
                    <th>Jadwal</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Jacob</td>
                    <td>53275531</td>
                    <td>12 May 2017</td>
                    <td>
                        <label class="badge badge-">Panding</label>
                    </td>
                    <td>
                        <label class="badge badge-danger">Detail</label>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
</div> --}}
@endsection