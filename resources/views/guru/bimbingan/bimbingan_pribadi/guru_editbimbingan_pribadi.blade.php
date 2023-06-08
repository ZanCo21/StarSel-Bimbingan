@extends('guru/guru_master')
@section('konten')
        {{-- form add hasil --}}
        <div class="card-body">
            <h4 class="card-title">Default form</h4>
            <p class="card-description">Basic form layout</p>
            <form class="forms-sample" action="/konseling/updatebimbinganpribadi/{{ $getkonsul->id }}" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <label>Hasil Konseling</label>
                    <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Hasil Konseling" value="{{ $getkonsul->hasil_konseling }}" name="hasil_konseling">
                </div>
                <button class="btn btn-primary mr-2"> Submit </button>
                <button id="cancle-form" type="button" class="btn btn-light">Cancel</button>
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
                        @foreach ($getkonsultable as $item)
                            @if ($item->hasil_konseling == null)
                            @else
                                <tr>
                                    <td class="py-1">
                                        {{ $item->id }}
                                    </td>
                                    <td>
                                        {{ $item->murid->name }}
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
                                        <a href="">
                                            <label class="badge badge-warning">Detail</label>
                                        </a>
                                        <a href="">
                                            <label class="badge badge-success">Edit</label>
                                        </a>
                                        <a href="/admin/konsul/delete/{{ $item->id }}">
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
