<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>table excel hasil kerawanan</title>
</head>

<body>
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
                  <td rowspan="2" style="height: 15px; border: 1px solid black; vertical-align: center; text-align: center;">
                      @if (in_array($i, $kerawananIds))
                          &#x2713; <!-- Ikon centang -->
                      @else
                          &#x2717; <!-- Ikon silang -->
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
</body>

</html>
