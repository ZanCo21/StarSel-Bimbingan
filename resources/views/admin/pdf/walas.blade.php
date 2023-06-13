<style>
  .table-data {
  margin: 8% auto;

      border-collapse: separate;
border-spacing: 0;

  }

  table tr th,
  table tr td {
      border-right: 1px solid #bbb;
border-bottom: 1px solid #bbb;
  }

  table tr th:first-child,
table tr td:first-child {
border-left: 1px solid #bbb;
}

table tr th {
border-top: 1px solid #bbb;
}
/* top-left border-radius */
table tr:first-child th:first-child {
border-top-left-radius: 4px;
}

/* top-right border-radius */
table tr:first-child th:last-child {
border-top-right-radius: 4px;
}

/* bottom-left border-radius */
table tr:last-child td:first-child {
border-bottom-left-radius: 4px;
}

/* bottom-right border-radius */
table tr:last-child td:last-child {
border-bottom-right-radius: 4px;
}

/* -- The Stlyes -- */
* {
  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap');
  font-family: 'Poppins', sans-serif;
}

th, td{
  padding: 8px 10px;
  text-transform: capitalize
}

th{
color: #111;
font-weight: 700;
font-size: 1rem;
}

td {
  font-weight: 500;
font-size: 0.8rem;
}

  .judul-table-info-data,
  .table-info-center {
      text-align: center;
  }

  .table-info-left {
      padding: 2%
  }
</style>
<table class="table-data" aria-label="TABLE">
        <thead>
            
          <tr role="row">
            <th class="judul-table-info-data">id</th>
            <th class="judul-table-info-data">Nama</th>
            <th class="judul-table-info-data">NIP</th>
            <th class="judul-table-info-data">Jenis kelamin</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($walas as $item)
          <tr role="row">
            <td class="table-info-center">{{ $item->user_id }}</td>
            <td class="table-info-left">{{ $item->name_guru }}</td>
            <td class="table-info-center">{{ $item->nip }}</td>
            <td class="table-info-center">{{ $item->jenis_kelamin }}</td>
          </tr>
          @endforeach

        </tbody>
      </table>

