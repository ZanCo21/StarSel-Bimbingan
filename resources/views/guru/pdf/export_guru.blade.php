
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Peta Kerawanan Guru</title>
    <style>
        
.clearfix:after {
  content: "";
  display: table;
  clear: both;
}

a {
  color: #5D6975;
  text-decoration: underline;
}

body {
  position: relative;
  width: 21cm;  
  height: 29.7cm; 
  margin: 0 auto; 
  color: #001028;
  background: #FFFFFF; 
  font-family: Arial, sans-serif; 
  font-size: 12px; 
  font-family: Arial;
}

header {
  padding: 10px 0;
  margin-bottom: 30px;
}

#logo {
  text-align: center;
  margin-bottom: 10px;
}

#logo img {
  width: 90px;
}

h1 {
  border-top: 1px solid  #5D6975;
  border-bottom: 1px solid  #5D6975;
  color: #5D6975;
  font-size: 2.4em;
  line-height: 1.4em;
  font-weight: normal;
  text-align: center;
  margin: 0 0 20px 0;
  background: url(dimension.png);
}

#project {
  float: left;
}

#project span {
  color: #5D6975;
  text-align: right;
  width: 52px;
  margin-right: 10px;
  display: inline-block;
  font-size: 0.8em;
}

#company {
  float: right;
  text-align: right;
}

#project div,
#company div {
  white-space: nowrap;        
}

table {
  width: 100%;
  border-collapse: collapse;
  border-spacing: 0;
  margin-bottom: 20px;
}

table tr:nth-child(2n-1) td {
  background: #F5F5F5;
}

table th,
table td {
  text-align: left;
}

table th {
  padding: 5px 20px;
  color: #5D6975;
  border-bottom: 1px solid #C1CED9;
  white-space: nowrap;        
  font-weight: normal;
}

table .service,
table .desc {
  text-align: left;
}

table td {
  padding: 20px;
  text-align: left;
}

table td.service,
table td.desc {
  vertical-align: top;
}

table td.unit,
table td.qty,
table td.total {
  font-size: 1.2em;
}

table td.grand {
  border-top: 1px solid #5D6975;;
}

#notices .notice {
  color: #5D6975;
  font-size: 1.2em;
}

footer {
  color: #5D6975;
  width: 100%;
  height: 30px;
  position: absolute;
  bottom: 0;
  border-top: 1px solid #C1CED9;
  padding: 8px 0;
  text-align: center;
}
    </style>
  </head>
  <body>
    <header class="clearfix" style="width: 90%">
      <div id="logo">
        <img src="data:image/png;base64,{{ $base64Image }}" alt="Logo">      </div>
      <h1>PETA KERAWANAN</h1>
      <div id="company" class="clearfix">
        <div>Smk Taruna Bhakti</div>
        <div>Jl Pekapuran,<br /> Kota Depok, IDN</div>
      </div>
      <div id="project">
        <div><span>GURU BK</span> {{ $gurubk->name }} </div>
        <div><span>DATE</span> {{ $tanggal }}</div>
      </div>
    </header>
    <main>
      <table style="width: 90%;">
        <thead>
          <tr>
            <th class="service">Id</th>
            <th class="desc">Name</th>
            <th class="desc">Kelas</th>
            <th>Wali Kelas</th>
            <th>Guru Bk</th>
            <th>Jenis Kerawanan</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td class="service" style="text-align: center">
                        {{ $item->id }}
                    </td>
                    <td>
                        {{ $item->murid->name }}
                    </td>
                    <td>
                        {{ $item->murid->kelas->tingkat_kelas }} {{ $item->murid->kelas->jurusan }} 
                    </td>
                    <td>
                        {{ $item->walass->name_guru }}
                    </td>
                    <td>
                      {{ $item->gurus->name }}
                    </td>
                    <td>
                        {{ $item->jeniskerawanan->jenis_kerawanan }}
                    </td>
                </tr>
            @endforeach
        </tbody>
      </table>
      <div id="notices">
        <div>NOTICE:</div>
        <div class="notice">This data will always be updated every 30 days.</div>
      </div>
    </main>
  </body>
</html>