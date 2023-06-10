@extends('guru/guru_master')
@section('konten')
    {{-- form add hasil --}}
    <div class="card-body">
        <h4 class="card-title">Default form</h4>
        <p class="card-description">Basic form layout</p>
        <form class="forms-sample" action="/konseling/updatebimbingankarir/{{ $getkonsul->id }}" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <label>Jadwal Bimbingan Karir</label>
                <input type="date" class="form-control" id="exampleInputUsername1" placeholder="Tanggal Konseling"
                    value="" name="Tanggal_konseling">
            </div>
            <div class="form-group">
                <label>Tempat Bimbingan Karir</label>
                <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Tempat"
                    value="" name="tempat">
            </div>
            <button class="btn btn-primary mr-2"> Submit </button>
            <a href="/guru/konseling/bimbingankarir">
                <button id="cancle-form" type="button" class="btn btn-light">Cancel</button>
            </a>
        </form>
    </div>
    {{-- end hasil --}}

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
