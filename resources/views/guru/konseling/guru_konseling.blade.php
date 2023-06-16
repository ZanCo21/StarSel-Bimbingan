@extends('guru/guru_master')
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
                    <p class="m-0">GURU-KONSULTASI</p>
                </a>
            </div>
            <button id="openPopup" type="button" class="btn btn-primary mt-2 mt-sm-0 btn-icon-text">
                <i class="mdi mdi-plus-circle"></i> Add Konsultasi </button>
        </div>
    </div>


    <div>
        <div style="display:none; margin-bottom: 2%" class="card-btn">
            <button type="button" class="btn btn-primary" style="margin-right: 2%" onclick="formPribadi()"> Bimbingan
                Pribadi </button>
            <button type="button" class="btn btn-success"style="margin-right: 2%" onclick="formSosial()"> Bimbingan
                Sosial </button>
            <button type="button" class="btn btn-danger"style="margin-right: 2%" onclick="formKarir()"> Bimbingan Karir
            </button>
            <button type="button" class="btn btn-warning" onclick="formBelajar()"> Bimbingan Belajar </button>
            </a>
        </div>
        {{-- form add konspri --}}
        <div id="form-pribadi" class="card-bodyform">
            <h4 class="card-title" style="color: blue">Konsultsi Pribadi</h4>
            <form class="forms-sample" action="/guru/konsultais/add" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <input type="hidden" class="form-control" id="exampleInputUsername1" placeholder="Tema"
                        name="layanan_id" value="4">
                </div>
                <div class="form-group">
                    <input type="hidden" class="form-control" id="exampleInputUsername1" placeholder="status"
                        name="status" value="accept">
                </div>
                <div class="form-group">
                    <Label>Pilih Kelas</Label>
                    <select class="form-control form-control-lg" id="kelas_id">
                        <option disabled selected>Pilih Kelas</option>
                        @foreach ($getkelas as $item)
                            <option value="{{ $item->id }}" walas="{{ $item->walas_id }}">{{ $item->tingkat_kelas }}
                                {{ $item->jurusan }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <Label>Pilih Murid</Label>
                    <select class="form-control form-control-lg" id="murid_id" name="murid_id">
                        <option disabled>Pilih Murid</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="hidden" class="form-control" id="walas_id" name="walas_id"
                        placeholder="ini untuk menangkap walas_id " value="">
                </div>
                <div class="form-group">
                    <label>Tema</label>
                    <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Tema" name="tema">
                </div>
                <input type="hidden" class="form-control" id="exampleInputUsername1" placeholder="Tema" name="status"
                    value="accept">
                <div class="form-group">
                    <label>Keluhan</label>
                    <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Keluhan"
                        name="keluhan">
                </div>
                <div class="form-group">
                    <label>Tanggal Konseling</label>
                    <input type="date" class="form-control" id="exampleInputUsername1" placeholder="tanggal"
                        name="tanggal_konseling">
                </div>
                <div class="form-group">
                    <label>Tempat</label>
                    <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Tempat"
                        name="tempat">
                </div>
                <button class="btn btn-primary mr-2"> Submit </button>
                <button id="cancle-form" type="button" class="btn btn-light">Cancel</button>
            </form>
        </div>
        {{-- end kelas --}}

        {{-- form add fomsos --}}
        <div id="form-sosial" class="card-bodyform" style="display: none;">
            <h4 class="card-title" style="color: green">Konsultasi Sosial</h4>
            <form class="forms-sample" action="/guru/konseling/addbimbingansosial" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <input type="hidden" class="form-control" id="exampleInputUsername1" placeholder="Tema"
                        name="layanan_id" value="3">
                </div>
                <input type="hidden" class="form-control" id="exampleInputUsername1" placeholder="status"
                    name="status" value="accept">
                <div class="form-group">
                    <Label>Pilih Kelas</Label>
                    <select class="form-control form-control-lg" id="kelas_idsos">
                        <option disabled selected>Pilih Kelas</option>
                        @foreach ($getkelas as $item)
                            <option style="" value="{{ $item->id }}" walas="{{ $item->walas_id }}">
                                {{ $item->tingkat_kelas }}
                                {{ $item->jurusan }}</option>
                        @endforeach
                    </select>
                </div>
                <div class='form-group'>
                    <p>Murid</p>
                    <select class="js-example-basic-multiple" id="murid_idsos" multiple="multiple" style="width: 100%;"
                        name="murid_id[]">
                        <option value=""></option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="hidden" class="form-control" id="walas_idsos" name="walas_id"
                        placeholder="ini untuk menangkap walas_id " value="">
                </div>
                <div class="form-group">
                    <label>Tema</label>
                    <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Tema"
                        name="tema">
                </div>
                <div class="form-group">
                    <label>Keluhan</label>
                    <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Keluhan"
                        name="keluhan">
                </div>
                <div class="form-group">
                    <label>Tanggal Konseling</label>
                    <input type="datetime-local" class="form-control" id="exampleInputUsername1" placeholder="tanggal"
                        name="tanggal_konseling">
                </div>
                <div class="form-group">
                    <label>Tempat</label>
                    <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Tempat"
                        name="tempat">
                </div>
                <button class="btn btn-primary mr-2"> Submit </button>
                <a href="/guru/konseling">
                    <button id="cancle-form" type="button" class="btn btn-light">Cancel</button>
                </a>
            </form>
        </div>
        {{-- end kelas --}}

        {{-- form add karir --}}
        <div id="form-karir" class="card-bodyform" style="display: none;">
            <h4 class="card-title" style="">Konsultasi Karir</h4>
            <form class="forms-sample" action="/guru/konseling/addbimbingankarir" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <input type="hidden" class="form-control" id="exampleInputUsername1" placeholder="Tema"
                        name="layanan_id" value="2">
                </div>
                <input type="hidden" class="form-control" id="exampleInputUsername1" placeholder="status"
                    name="status" value="accept">
                <div class="form-group">
                    <Label>Pilih Kelas</Label>
                    <select class="form-control form-control-lg" id="kelas_idrir">
                        <option disabled selected>Pilih Kelas</option>
                        @foreach ($getkelas as $item)
                            <option style="" value="{{ $item->id }}" walas="{{ $item->walas_id }}">
                                {{ $item->tingkat_kelas }}
                                {{ $item->jurusan }}</option>
                        @endforeach
                    </select>
                </div>
                <div class='form-group'>
                    <p>Murid</p>
                    <select class="js-example-basic-multiple" id="murid_idrir" multiple="multiple" style="width: 100%;"
                        name="murid_id[]">
                        <option value=""></option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="hidden" class="form-control" id="walas_idrir" name="walas_id"
                        placeholder="ini untuk menangkap walas_id " value="">
                </div>
                <div class="form-group">
                    <label>Tema</label>
                    <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Tema"
                        name="tema">
                </div>
                <div class="form-group">
                    <label>Tujuan</label>
                    <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Tujuan"
                        name="keluhan">
                </div>
                <div class="form-group">
                    <label>Tanggal Konseling</label>
                    <input type="date" class="form-control" id="exampleInputUsername1" placeholder="tanggal"
                        name="tanggal_konseling">
                </div>
                <div class="form-group">
                    <label>Tempat</label>
                    <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Tempat"
                        name="tempat">
                </div>
                <button class="btn btn-primary mr-2"> Submit </button>
                <button id="cancle-formm" type="button" class="btn btn-light">Cancel</button>
            </form>
        </div>
        {{-- end kelas --}}

        {{-- form add belajar --}}
        <div id="form-belajar" class="card-bodyform" style="display: none;">
            <h4 class="card-title" style="color: green">Konsultasi Belajar</h4>
            <form class="forms-sample" action="/guru/konseling/addbimbinganbelajar" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <input type="hidden" class="form-control" id="exampleInputUsername1" placeholder="Tema"
                        name="layanan_id" value="1">
                </div>
                <input type="hidden" class="form-control" id="exampleInputUsername1" placeholder="status"
                    name="status" value="accept">
                <div class="form-group">
                    <Label>Pilih Kelas</Label>
                    <select class="form-control form-control-lg" id="kelas_idjar">
                        <option disabled selected>Pilih Kelas</option>
                        @foreach ($getkelas as $item)
                            <option style="" value="{{ $item->id }}" walas="{{ $item->walas_id }}">
                                {{ $item->tingkat_kelas }}
                                {{ $item->jurusan }}</option>
                        @endforeach
                    </select>
                </div>
                <div class='form-group'>
                    <p>Murid</p>
                    <div class="form-group">
                        <Label>Pilih Murid</Label>
                        <select class="form-control form-control-lg" id="murid_idjar" name="murid_id">
                            <option disabled>Pilih Murid</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <input type="hidden" class="form-control" id="walas_idjar" name="walas_id"
                        placeholder="ini untuk menangkap walas_id " value="">
                </div>
                <div class="form-group">
                    <label>Tema</label>
                    <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Tema"
                        name="tema">
                </div>
                <div class="form-group">
                    <label>Tujuan</label>
                    <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Tujuan"
                        name="keluhan">
                </div>
                <div class="form-group">
                    <label>Tanggal Konseling</label>
                    <input type="date" class="form-control" id="exampleInputUsername1" placeholder="tanggal"
                        name="tanggal_konseling">
                </div>
                <div class="form-group">
                    <label>Tempat</label>
                    <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Tempat"
                        name="tempat">
                </div>
                <button class="btn btn-primary mr-2"> Submit </button>
                <button id="cancle-formm" type="button" class="btn btn-light">Cancel</button>
            </form>
        </div>
        {{-- end kelas --}}

        <div class="card-body" id="tableguru" style="background-color: white">
            <h4 class="card-title">New Data Konsultasi</h4>
            <p class="card-description">Data<code>Konsultasi</code>
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
                                    {{-- <a href="">
                                        <label class="badge badge-warning">Detail</label>
                                    </a> --}}
                                    <a href="/guru/konsul/getkonsul/{{ $item->id }}">
                                        <label class="badge badge-primary">Edit</label>
                                    </a>
                                    {{-- <a href="/guru/konsul/delete/{{ $item->id }}">
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
            // bimbingan Belajar
            $(document).ready(function() {
                $('#kelas_idjar').change(function() {
                    var kelas = $(this).val();

                    $.ajax({
                        url: '/guru/getmurid/' + kelas,
                        type: 'GET',
                        success: function(response) {
                            var muridSelect = $('#murid_idjar');
                            muridSelect.empty();

                            $.each(response, function(key, value) {
                                muridSelect.append('<option value="' + value.user_id +
                                    '">' + value.name + '</option>');
                            });
                        }
                    });
                });
            });

            $(document).ready(function() {
                $('#kelas_idjar').on('change', function() {
                    var selectedOption = $(this).find('option:selected');
                    var walasId = selectedOption.attr('walas');

                    // Set value pada input hidden dengan nama walas_id
                    $('#walas_idjar').val(walasId);
                });
            });

            $(document).ready(function() {
                $('#murid_idjar').on('change', function() {
                    var muridid = $(this).val();


                    // Set value pada input hidden dengan nama walas_id
                    $('#muridhidden').val(muridid);
                });
            });
            // bimbingan belajar end

            // bimbingan karir
            $(document).ready(function() {
                $('#murid_idrir').select2({
                    placeholder: 'Pilih Murid',
                });
            });

            // bimbingan karir
            $(document).ready(function() {
                $('#kelas_idrir').change(function() {
                    var kelas = $(this).val();

                    $.ajax({
                        url: '/guru/getmurid/' + kelas,
                        type: 'GET',
                        success: function(response) {
                            var muridSelect = $('#murid_idrir');
                            muridSelect.empty();

                            $.each(response, function(key, value) {
                                muridSelect.append('<option value="' + value.user_id +
                                    '">' + value.name + '</option>');
                            });
                        }
                    });
                });
            });


            $(document).ready(function() {
                $('#kelas_idrir').on('change', function() {
                    var selectedOption = $(this).find('option:selected');
                    var walasId = selectedOption.attr('walas');

                    // Set value pada input hidden dengan nama walas_id
                    $('#walas_idrir').val(walasId);
                });
            });

            $(document).ready(function() {
                $('#murid_idrir').on('change', function() {
                    var muridid = $(this).val();


                    // Set value pada input hidden dengan nama walas_id
                    $('#muridhidden').val(muridid);
                });
            });
            // bimbingan karir end

            // bimbingan kasos
            $(document).ready(function() {
                $('#murid_idsos').select2({
                    placeholder: 'Pilih Murid',
                });
            });
            $(document).ready(function() {
                $('#kelas_idsos').change(function() {
                    var kelas = $(this).val();

                    $.ajax({
                        url: '/guru/getmurid/' + kelas,
                        type: 'GET',
                        success: function(response) {
                            var muridSelect = $('#murid_idsos');
                            muridSelect.empty();

                            $.each(response, function(key, value) {
                                muridSelect.append('<option value="' + value.user_id +
                                    '">' + value.name + '</option>');
                            });
                        }
                    });
                });
            });


            $(document).ready(function() {
                $('#kelas_idsos').on('change', function() {
                    var selectedOption = $(this).find('option:selected');
                    var walasId = selectedOption.attr('walas');

                    // Set value pada input hidden dengan nama walas_id
                    $('#walas_idsos').val(walasId);
                });
            });

            $(document).ready(function() {
                $('#murid_id').on('change', function() {
                    var muridid = $(this).val();


                    // Set value pada input hidden dengan nama walas_id
                    $('#muridhidden').val(muridid);
                });
            });
            // bimbingan karir end

            // ini buat menghilangkan div tapi masih error
            function formPribadi() {
                var fp = document.getElementById('form-pribadi');
                var fs = document.getElementById('form-sosial');
                if (fp.style.display === "none") {
                    fp.style.display = "block";
                    fs.style.display = "none";
                }
            }

            function formSosial() {
                var fs = document.getElementById('form-sosial');
                var fp = document.getElementById('form-pribadi');
                if (fs.style.display === "none") {
                    fs.style.display = "block";
                    fp.style.display = "none";
                }
            }


            function formKarir() {
                var fs = document.getElementById('form-sosial');
                var fp = document.getElementById('form-pribadi');
                var fk = document.getElementById('form-karir');
                var fb = document.getElementById('form-belajar');
                if (fk.style.display === "none") {
                    fs.style.display = "none";
                    fp.style.display = "none";
                    fk.style.display = "block";
                    fb.style.display = "none";
                }
            }

            function formBelajar() {
                var fs = document.getElementById('form-sosial');
                var fp = document.getElementById('form-pribadi');
                var fk = document.getElementById('form-karir');
                var fb = document.getElementById('form-belajar');
                if (fb.style.display === "none") {
                    fs.style.display = "none";
                    fp.style.display = "none";
                    fk.style.display = "none";
                    fb.style.display = "block";
                }
            }


            // ini buat menghilangkan table pas klik add konsul
            // Ambil elemen dengan ID
            const openPopupButton = document.getElementById('openPopup');
            const closePopupButton = document.getElementById('cancle-form');
            const closePopupButtonn = document.getElementById('cancle-formm');

            // Fungsi untuk menampilkan pop-up
            function openPopup() {
                // Ambil elemen card-body
                const cardBody = document.querySelector('.card-bodyform');
                const cardBodyy = document.querySelector('.card-btn');
                const cardtable = document.querySelector('.card-body');


                // Tampilkan elemen card-body sebagai pop-up
                cardBody.style.display = 'block';
                cardBodyy.style.display = 'block';
                cardtable.style.display = 'none';
            }

            function closePopup() {
                // Ambil elemen card-body
                const cardBody = document.querySelector('.card-bodyform');
                const cardBodysos = document.querySelector('.card-bodyformm');
                const cardBodyy = document.querySelector('.card-btn');
                const cardtable = document.querySelector('.card-body');


                // Tampilkan elemen card-body sebagai pop-up
                cardBodysos.style.display = 'none';
                cardBody.style.display = 'none';
                cardBodyy.style.display = 'none';
                cardtable.style.display = 'block';
            }

            function closePopupp() {
                // Ambil elemen card-body
                const cardBody = document.querySelector('.card-bodyform');
                const cardBodysos = document.querySelector('.card-bodyformm');
                const cardBodyy = document.querySelector('.card-btn');
                const cardtable = document.querySelector('.card-body');


                // Tampilkan elemen card-body sebagai pop-up
                cardBodysos.style.display = 'none';
                cardBody.style.display = 'none';
                cardBodyy.style.display = 'none';
                cardtable.style.display = 'block';
            }

            // Tambahkan event listener untuk memanggil fungsi openPopup saat tombol diklik
            openPopupButton.addEventListener('click', openPopup);
            closePopupButton.addEventListener('click', closePopup);
            closePopupButtonn.addEventListener('click', closePopupp);


            $(document).ready(function() {
                $('#kelas_id').change(function() {
                    var kelas = $(this).val();

                    $.ajax({
                        url: '/guru/getmurid/' + kelas,
                        type: 'GET',
                        success: function(response) {
                            var muridSelect = $('#murid_id');
                            muridSelect.empty();

                            $.each(response, function(key, value) {
                                muridSelect.append('<option value="' + value.user_id +
                                    '">' + value.name + '</option>');
                            });
                        }
                    });
                });
            });


            $(document).ready(function() {
                $('#kelas_id').on('change', function() {
                    var selectedOption = $(this).find('option:selected');
                    var walasId = selectedOption.attr('walas');

                    // Set value pada input hidden dengan nama walas_id
                    $('#walas_id').val(walasId);
                });
            });

            $(document).ready(function() {
                $('#murid_id').on('change', function() {
                    var muridid = $(this).val();


                    // Set value pada input hidden dengan nama walas_id
                    $('#muridhidden').val(muridid);
                });
            });
        </script>
    @endsection