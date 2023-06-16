@extends('murid/murid_master')
@section('konten')
    {{-- profile user --}}
    <div class="container">
        <div class="main-body">
            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                @if ($detailsiswa -> murid -> jenis_kelamin=="L")
                                <img src="/assets/images/profile-picture/gambar_default/default-boy.jpg" alt="{{$detailsiswa -> role}}"
                                class="rounded-circle" width="150">
                                @else ($detailsiswa -> murid -> jenis_kelamin=="P")
                                <img src="/assets/images/profile-picture/gambar_default/default-women.jpg" alt="{{$detailsiswa -> role}}"
                                class="rounded-circle" width="150">
                                @endif
                                
                                <div class="mt-3">
                                    <h4>{{$detailsiswa -> name}}</h4>
                                    <p class="text-secondary mb-1" style="text-transform: uppercase">{{$detailsiswa -> role}}</p>
                                    <p class="text-muted font-size-sm" style="text-transform: uppercase">{{$detailsiswa -> murid -> kelas -> tingkat_kelas}} {{$detailsiswa -> murid -> kelas -> jurusan}}</p>
                                    
                                    <a href="/"><button class="btn btn-primary">Landing Page</button></a>
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
                                    <h6 class="mb-0">Nama Lengkap</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{$detailsiswa -> name}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{$detailsiswa -> email}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">NIPD</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{$detailsiswa -> murid -> nipd}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Jenis Kelamin</h6>
                                </div>
                                <div class="col-sm-9 text-secondary" style="text-transform: capitalize">
                                        @if ($detailsiswa -> murid -> nipd=="Laki-laki")
                                            Laki-laki
                                        @else ($detailsiswa -> murid -> nipd=="Perempuan")
                                            Perempuan
                                        @endif
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Kelas</h6>
                                </div>
                                <div class="col-sm-9 text-secondary" style="text-transform: uppercase">
                                    {{$detailsiswa -> murid -> kelas -> tingkat_kelas}} {{$detailsiswa -> murid -> kelas -> jurusan}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-12">
                                    <a class="btn btn-info " target="__blank"
                                        href="/murid/konseling">Buat Jadwal</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
{{-- end profile --}}
@endsection