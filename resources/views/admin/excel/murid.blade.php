
<table class="table-data" aria-label="TABLE">
  <thead>
    <tr role="row">
      <th class="judul-table-info-data">id</th>
      <th class="judul-table-info-data">Kelas</th>
      <th class="judul-table-info-data">Nama</th>
      <th class="judul-table-info-data">NIPD</th>
      <th class="judul-table-info-data">Jenis kelamin</th>
      <th class="judul-table-info-data">Tanggal Lahir</th>
    </tr>
  </thead>
  <tbody>
      @foreach ($murid as $item)
    <tr role="row">
      <td class="table-info-center">{{ $item->user_id }}</td>
      <td class="table-info-center">{{ $item->kelas->tingkat_kelas }} {{ $item->kelas->jurusan }}</td>
      <td class="table-info-left">{{ $item->name }}</td>
      <td class="table-info-center">{{ $item->nipd }}</td>
      <td class="table-info-center">{{ $item->jenis_kelamin }}</td>
      <td class="table-info-center"> {{ $item->tgl_lahir }}</td>
    </tr>
    @endforeach
