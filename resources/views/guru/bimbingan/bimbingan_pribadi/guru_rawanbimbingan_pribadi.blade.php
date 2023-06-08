@extends('guru/guru_master')
@section('konten')
        {{-- form add hasil --}}
        <div class="card-body">
            <h4 class="card-title">Default form</h4>
            <p class="card-description">Basic form layout</p>
            <form class="forms-sample" action="/guru/peta-kerawanan/{{ $getkerawanan->id }}" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <label>Hasil Konseling</label>
                    <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Hasil Konseling" value="" name="jenis_kerawanan">
                </div>
                <button class="btn btn-primary mr-2"> Submit </button>
                <a href="/guru/konseling/bimbinganpribadi">
                    <button id="cancle-form" type="button" class="btn btn-light">Cancel</button>
                </a>
            </form>
        </div>
        {{-- end hasil --}}

        <div class="card-body">
            <h4 class="card-title">Data Bimbingan Pribadi</h4>
            <p class="card-description"> <code>.counseling results</code>
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
                            <th>Hasil Konseling</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($getkerawanan as $get)
                        @if ($get->hasil_konseling == null)
                        @else
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
                                {{ $get->jenis_kewaranan }}
                            </td>
                            <td>
                                <a>
                                    <label class="badge badge-primary">Details</label>
                                <a href="/guru/peta-kerawanan/get/{{ $get->id }}">
                                    <label class="badge badge-success">Input Hasil</label>
                                </a>
                                <a href="/guru/peta-kerawanan/delete/{{$get->id}}">
                                    <label class="badge badge-danger">Delete</label>
                                </a>
                            </td>
                        </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- <script>
        // Ambil elemen dengan ID
        const openPopupButton = document.getElementById('openPopup');
        const closePopupButton = document.getElementById('cancle-form');

        // Fungsi untuk menampilkan pop-up
        function openPopup() {
            // Ambil elemen card-body
            const cardBody = document.querySelector('.card-bodyform');
            const cardtable = document.querySelector('.card-bodycoy');


            // Tampilkan elemen card-body sebagai pop-up
            cardBody.style.display = 'block';
            cardtable.style.display = 'none';
        }

        function closePopup() {
            // Ambil elemen card-body
            const cardBody = document.querySelector('.card-bodyform');
            const cardtable = document.querySelector('.card-bodycoy');


            // Tampilkan elemen card-body sebagai pop-up
            cardBody.style.display = 'none';
            cardtable.style.display = 'block';
        }

        // Tambahkan event listener untuk memanggil fungsi openPopup saat tombol diklik
        openPopupButton.addEventListener('click', openPopup);
        closePopupButton.addEventListener('click', closePopup);
        </script> --}}
    @endsection
