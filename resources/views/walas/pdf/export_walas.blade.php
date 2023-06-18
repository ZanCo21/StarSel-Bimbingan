<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Peta Kerawanan Walas</title>
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
            <div><span>Wali Kelas</span>{{ $getwalas->name_guru }}</div>
            <div><span>DATE</span> {{ $tanggal }}</div>
        </div>
    </header>
    <main>
        <table style="width: 100%; border: 10px solid black; border-collapse: collapse">
        <thead>
            <tr>
                <th style="height: 50px; border: 10px solid black; background: #9BC2E6;vertical-align: center; font-size: 12px; font-weight: 600; text-align: center"
                    rowspan="2">Id</th>
                <th style="width: 120px;height: 50px; border: 10px solid black; background: #9BC2E6; vertical-align: center; font-size: 12px; font-weight: 600; text-align: center"
                    rowspan="2">Murid</th>
                <th style="width: 150px;height: 50px; border: 10px solid black; background: #9BC2E6; vertical-align: center; font-size: 12px; font-weight: 600; text-align: center"
                    rowspan="2">Wali Kelas</th>
                <th style="width: 130px;height: 50px; border: 10px solid black; background: #9BC2E6; vertical-align: center; font-size: 12px; font-weight: 600; text-align: center"
                    rowspan="2">Guru Bk</th>
                <th style="width: 100%; height: 50px; border: 10px solid black; background: #9BC2E6; vertical-align: center; font-size: 12px; font-weight: 600; text-align: center"
                    colspan="21">Jenis Kerawanan</th>
            </tr>
            <tr>

                @foreach ($getjenis as $item)
                    <th
                        style="width: 120px;height: 35px; border: 10px solid black; font-weight: 600; vertical-align: center; text-align: center; background: #9BC2E6;">
                        {{ $item->jenis_kerawanan }}</th>
                @endforeach

            </tr>
        </thead>
        <tbody>
          @foreach ($data as $key => $item)
              @php
                  $counter = $key + 1;
                  $kerawananIds = $item->murid->kerawanans->pluck('kerawanan_id')->toArray();
              @endphp
              <tr>
                  <td rowspan="2" style="border: 1px solid black; vertical-align: center; text-align: center;">
                      {{ $counter }}
                  </td>
                  <td rowspan="2" style="border: 1px solid black; vertical-align: center; text-align: center;">
                      {{ $item->murid->name }}
                  </td>
                  <td rowspan="2" style="border: 1px solid black; vertical-align: center; text-align: center;">
                      {{ $item->walass->name_guru }}
                  </td>
                  <td rowspan="2" style="border: 1px solid black; vertical-align: center; text-align: center;">
                      {{ $item->gurus->name }}
                  </td>
                  @for ($i = 1; $i <= 21; $i++)
                      <td rowspan="2"
                          style="height: 15px; border: 1px solid black; vertical-align: center; text-align: center;">
                          @if (in_array($i, $kerawananIds))
                              iya
                          @else
                              tidak
                          @endif
                      </td>
                  @endfor
              </tr>
              <tr>
                  {{-- TR INI JGN DI ILANGIN ! --}}
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
