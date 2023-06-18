<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Peta Kerawanan GURUBK</title>
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
            border-top: 1px solid #5D6975;
            border-bottom: 1px solid #5D6975;
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
            border-top: 1px solid #5D6975;
            ;
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
            <img src="data:image/png;base64,{{ $base64Image }}" alt="Logo">
        </div>
        <h1>PETA KERAWANAN</h1>
        <div id="company" class="clearfix">
            <div>Smk Taruna Bhakti</div>
            <div>Jl Pekapuran,<br /> Kota Depok, IDN</div>
        </div>
        <div id="project">
            @php $isFirstRow = true; @endphp
            @foreach ($data as $item)
                @if ($isFirstRow)
                    <div><span>GURU BK</span> {{ $item->gurus->name }}</div>
                    @php $isFirstRow = false; @endphp
                @endif
            @endforeach
            <div><span>DATE</span> {{ $tanggal }}</div>
        </div>
    </header>
    <main>
        <table style="width:90%">
            @php
                $previousId = null; // variabel untuk menyimpan ID sebelumnya
            @endphp
           @foreach ($data as $key => $item)
           @php
               $counter = $key + 1;
               $kerawananIds = $item->murid->kerawanans->pluck('kerawanan_id')->toArray();
               $currentId = $item->id; // mengambil ID saat ini
           @endphp
           @if ($currentId !== $previousId)
               {{-- Membuat baris baru hanya ketika ID baru ditemukan --}}
               @if ($key !== 0)
                   </td>
                   </tr>
               @endif
               <tr>
                   <th colspan="2" style="background-color: #9BC2E6;">Data ID: {{ $currentId }}</th>
               </tr>
               <tr>
                   <th>Name:</th>
                   <th>{{ $item->murid->name }}</th>
               </tr>
               <tr>
                <th>Kelas:</th>
                <th>{{ $item->murid->kelas->tingkat_kelas }} {{ $item->murid->kelas->jurusan }}</th>
            </tr>
               <tr>
                   <th>Jenis Kerawanan:</th>
                   <th>
                       @foreach ($getjenis as $jenis)
                           <strong>{{ $jenis->jenis_kerawanan }}:</strong>
                           @if (in_array($jenis->id, $kerawananIds))
                               iya
                           @else
                               tidak
                           @endif
                           <br>
                       @endforeach
                   </th>
               </tr>
           @else
               <tr>
                   <th></th>
                   <th>
                       @foreach ($getjenis as $jenis)
                           <strong>{{ $jenis->jenis_kerawanan }}:</strong>
                           @if (in_array($jenis->id, $kerawananIds))
                               iya
                           @else
                               tidak
                           @endif
                           <br>
                       @endforeach
                   </th>
               </tr>
           @endif
           @php
               $previousId = $currentId; // mengupdate ID sebelumnya dengan ID saat ini
           @endphp
       @endforeach
       </td>
       </tr>
       
            </td>
            </tr>
        </table>
        <div id="notices">
            <div>NOTICE:</div>
            <div class="notice">This data will always be updated every 30 days.</div>
        </div>
    </main>
</body>

</html>
