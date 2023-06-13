
  <table class="table-data" aria-label="TABLE">
    <thead>
      <tr role="row">
        <th class="judul-table-info-data">id</th>
        <th class="judul-table-info-data">Nama</th>
        <th class="judul-table-info-data">Tanggal Lahir</th>
        <th class="judul-table-info-data">NIP</th>
        <th class="judul-table-info-data">Jenis kelamin</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($guru as $item)
      <tr role="row">
        <td class="table-info-center">{{ $item->user_id }}</td>
        <td class="table-info-left">{{ $item->name }}</td>
        <td class="table-info-center"> {{ $item->tgl_lahir }}</td>
        <td class="table-info-center">{{ $item->nip }}</td>
        <td class="table-info-center">{{ $item->jenis_kelamin }}</td>
      </tr>
      @endforeach
